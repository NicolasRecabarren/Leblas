<?php
    echo $this->Form->create('Page',[
            'novalidate' => true,
            'id' => 'EditPageForm',
            'url' => ['controller' => 'pages','action' => 'pages', 'admin' => true]
    ]);
    
    echo $this->Form->hidden('id');
    
    echo $this->Form->input('title',[
            'label' => [
                'text' => 'Título',
                'class' => 'control-label'
            ],
            'class' => 'form-control',
            'div' => 'form-group col col-md-4',
            'type' => 'text'
    ]);
    
    echo $this->Form->input('slug',[
            'label' => [
                'text' => 'Url',
                'class' => 'control-label'
            ],
            'class' => 'form-control',
            'div' => 'form-group col col-md-4',
            'type' => 'text'
    ]);
    
    echo $this->Form->input('order_menu',[
            'label' => [
                'text' => 'Posición en menú y home',
                'class' => 'control-label'
            ],
            'class' => 'form-control',
            'div' => 'form-group col col-md-4',
            'readonly' => 'readonly',
            'type' => 'number'
    ]);
    
    echo $this->Form->input('content',[
            'label' => [
                'text' => 'Contenido',
                'class' => 'control-label'
            ],
            'type' => 'textarea',
            'class' => 'col-md-12',
            'div' => 'form-group col-md-12'
    ]);
    
    echo '<button type="submit" class="btn btn-success" style="margin-top: 20px;">'.
            '<i class="fa fa-edit"></i> Guardar cambios'.
         '</button>';
    
    echo $this->Form->end();
?>