<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $maestroClienteId = null;

	public $components = array(
		'Session',
        /*'Auth' => array(
        	'authenticate' => array("CustomLogin"),
        	//'authenticate' => array('Form' => array('userModel' => 'GeneralUser','fields' => array('username' => 'username','password' => 'password'),),),
            //'loginRedirect' => array('plugin'=>'general','controller' => 'GeneralUsers', 'action' => 'login'),
            'logoutRedirect' => array('plugin'=>'general','controller' => 'GeneralUsers', 'action' => 'login'),
           	'loginAction' => array('plugin'=>'general','controller' => 'GeneralUsers', 'action' => 'login'),
			'loginError' => 'Invalid Username or Password entered, please try again.',
			'authorize' => array('Controller'),
			'authError' => false)*/
	);
	
	public function isAuthorized($user){
		return true;
	}
	
    public function beforeFilter(){
    	$this->response->disableCache();
    	
    	ini_set('memory_limit', '-1');
		//$this->Auth->allow('login','logout','perfile','seleccionSistema', 'validamosUsuarioXSistemas');
		
		//$this->set('user', $this->Auth->user());
	}
	
	public function beforeRender(){
		parent::beforeRender();
	}
}