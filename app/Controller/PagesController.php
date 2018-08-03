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

	public $uses = array();
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow("home","admin_login");
	}
	
	public function home(){
		die("asdas");
	}
	
	public function admin_login(){
		$this->layout = "admin_login";
		
		if($this->request->is('post')){
			if ($this->Auth->login()) {
				$this->Session->setFlash(__("Bienvenido/a %s",$this->Auth->user('username')),"mensaje-exito");
				return $this->redirect($this->Auth->redirectUrl());
			}
			
			$this->request->data['User']['password'] = '';
		}
	}
	
	public function admin_pages(){
		
		$this->set('title_for_layout','Admin | Home');
		
	}
}