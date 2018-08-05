<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{
    
    public $alias = "User";
    
    public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher(array('hashType' => 'sha256'));
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        
        if( isset($this->data[$this->alias]['password']) && empty($this->data[$this->alias]['password']) ){
            unset($this->data[$this->alias]['password']);
        }
        return true;
    }
}