<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');



/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */

class PagesController extends AppController {
	
	public $name = 'Pages';

	public $uses = array(
		'Page',
		'User',
		'Contact'
	);
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow("seleccion","home","saveContact","admin_login");
	}
	
	public function seleccion(){
		$this->layout = "seleccion_pagina";
	}
	
	public function home(){
		$secciones = $this->Page->find('all',[
				'recursive' => -1,
				'order' => ['order_menu' => 'ASC']
		]);
		
		$seccionesMenu = Hash::combine($secciones,'{n}.Page.title','{n}.Page.slug');
		$this->set(compact('secciones','seccionesMenu'));
	}
	
	public function saveContact(){
		$this->layout = "ajax";
		if($this->request->is('post')){
			
			$this->Contact->create();
			$this->request->data['Contact']['created'] = (new DateTime())->format('Y-m-d H:i:s');
			$this->request->data['Contact']['modified'] = (new DateTime())->format('Y-m-d H:i:s');
			if($this->Contact->save($this->request->data)){

				$this->request->data = $this->Contact->find('first',[
					'recursive' => -1,
					'conditions' => ['id' => $this->Contact->id]
				]);

				list($ano,$mes,$dia) = explode('-',substr($this->request->data['Contact']['created'],0,10));
				$nuevaFecha = "$dia/$mes/$ano";
				
				$this->request->data['Contact']['created'] = substr($this->request->data['Contact']['created'],10);
				$this->request->data['Contact']['created'] = $nuevaFecha.$this->request->data['Contact']['created'];

				App::uses('CakeEmail', 'Network/Email');
				$Email = new CakeEmail();
				$Email
					->config('leblas')
					->emailFormat('html')

					->from(['contacto@leblas.cl' => 'Leblas'])
					->to('alexander.lepe@leblas.cl')
					->subject('Leblas | Nuevo Contacto Enviado')
					->template('default','default')
					->helpers(["Html"])
					->viewVars([
						'contact' => $this->request->data
					]);
				
				try{
					$Email->send();
					die("sended");
				}catch(Exception $e){
					Configure::write('debug',1);
					dbug($e->getMessage());
					die("error");
				}
			}
		}
		die("error");
	}
	
	public function admin_login(){
		$this->set('title_for_layout','Admin | Login');
		
		if($this->request->is('post')){
			if ($this->Auth->login()) {
				$this->Session->setFlash(__("Bienvenido/a %s",$this->Auth->user('username')),"mensaje-exito");
				return $this->redirect($this->Auth->redirectUrl());
			}
			
			$this->request->data['User']['password'] = '';
		}
	}
	
	public function admin_logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function admin_pages(){
		$this->set('title_for_layout','Admin | Home');
		
		if($this->request->is(['post','put'])){
			if($this->Page->save($this->request->data)){
				$this->Session->setFlash(__("Página actualizada correctamente."),"mensaje-exito");
				$this->redirect(['action' => 'pages','admin' => true]);
			} else {
				$this->Session->setFlash(__("Ha ocurrido un error al guardar la página."),"mensaje-error");
			}
		}
		
		$paginas = $this->Page->find('list',[
			'fields' => ['id','title'],
			'order' => ['title']
		]);
		
		$this->set(compact('paginas'));
	}
	
	public function admin_getPage(){
		$this->layout = "ajax";
		if($this->request->is('post')){
			
			$this->Page->id = $this->request->data['page'];
			if(!$this->Page->exists()){
				die("<i>La página seleccionada no existe.</i>");
			}
			
			$this->request->data = $this->Page->find('first',[
					'recursive' => -1,
					'conditions' => ['id' => $this->Page->id]
			]);
		}
	}
	
	public function admin_users(){
		$this->set('title_for_layout','Admin | Usuarios');
		$this->set('users',$this->User->find('all',[
				'recursive' => -1
		]));
	}
	
	public function admin_add_user(){
		$this->set('title_for_layout','Admin | Agregar Usuario');
		if($this->request->is('post')){
			$this->User->create();
			if($this->User->save($this->request->data)){
				$this->Session->setFlash(__('Usuario creado correctamente.'),'mensaje-exito');
				$this->redirect(['action' => 'index','admin' => true]);
			}
			$this->Session->setFlash(__('No se pudo crear el usuario.'),'mensaje-error');
		}
	}
	
	public function admin_edit_user($id = null){
		$this->set('title_for_layout','Admin | Editar Usuario');
		
		$this->User->id = $id;
		if(!$this->User->exists()){
			throw new NotFoundException(__('Usuario inválido.'));
		}
		
		if($this->request->is(['post','put'])){
			
			if($this->User->save($this->request->data)){
				$this->Session->setFlash(__('Usuario actualizado correctamente.'),'mensaje-exito');
				$this->redirect(['action' => 'users','admin' => true]);
			}
			$this->Session->setFlash(__('No se pudo actualizar el usuario.'),'mensaje-error');
		}
		
		$this->request->data = $this->User->find('first',[
			'recursive' => -1,
			'conditions' => ['id' => $id]
		]);
	}
	
	public function admin_disable_user($id){
		$this->User->id = $id;
		if(!$this->User->exists()){
			throw new NotFoundException(__('Usuario inválido.'));
		}
		
		$estadoActual = $this->User->field('status');
		
		if($this->User->saveField('status', $estadoActual ? 0 : 1)){
			$this->Session->setFlash(__('Usuario actualizado correctamente.'),'mensaje-exito');
		} else {
			$this->Session->setFlash(__('No se pudo actualizar el usuario.'),'mensaje-error');
		}
		$this->redirect(['action' => 'users','admin' => true]);
	}
	
	public function admin_contacts(){
		$this->set('title_for_layout','Admin | Contactos');
		$this->set('contacts',$this->Contact->find('all',[
				'recursive' => -1,
				'order' => ['created' => 'DESC']
		]));
	}
	
	public function admin_delete_contact($id = null){
		
		$this->Contact->id = $id;
		if(!$this->Contact->exists()){
			throw new NotFoundException(__('Contacto inválido.'));
		}
			
		if($this->Contact->delete()){
			$this->Session->setFlash(__('Contacto eliminado correctamente.'),'mensaje-exito');
			$this->redirect(['action' => 'contacts','admin' => true]);
		} else {
		$this->Session->setFlash(__('No se pudo eliminar el contacto.'),'mensaje-error');
	    }
		
	}
}