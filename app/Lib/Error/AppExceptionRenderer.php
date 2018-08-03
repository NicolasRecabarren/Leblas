<?php

App::uses('ExceptionRenderer', 'Error');

class AppExceptionRenderer extends ExceptionRenderer {

    
      public function error400($error) {
            // die('error');
           
      
      		if($this->controller->request->is('ajax')){
                        $this->controller->set("titleForModal",'Gestor Archivos');
                        $this->controller->set("error",$error);
                        $this->controller->layout="GestorArchivos.modal_gestor";
                        $this->controller->render('/Errors/error400_modal_gestor');
                        $this->controller->response->send();
      		}else{
                        
      			$this->controller->redirect(array('plugin'=>false, 'controller' => 'errors', 'action' => 'error400'));
      		}
	    }
    
}