<?php
App::uses('AppModel', 'Model');

class Page extends AppModel{
    
    public $useTable = "pages";
    public $alias = "Page";
    public $replace = [
        'á' => 'a',     'Á' => 'A',
        'é' => 'e',     'É' => 'E',
        'í' => 'i',     'Í' => 'I',
        'ó' => 'o',     'Ó' => 'O',
        'ú' => 'u',     'Ú' => 'U',
        'ñ' => 'n',     'Ñ' => 'N',
        ' ' => '-'
    ];
    
    public function beforeSave($options = []){
        if(isset($this->data[$this->alias]['slug']) && empty($this->data[$this->alias]['slug'])){
            $this->data[$this->alias]['slug'] = strtolower(str_replace(
                array_keys($this->replace),
                array_values($this->replace),
                $this->data[$this->alias]['title']
            ));
        }
        return true;
    }
}