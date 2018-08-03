<?php
class ErrorsController extends AppController {
    public $name = 'Errors';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('error404');
    }

    public function error404() {
        $this->layout = 'layout_error';
    }

    public function error400() {
        $this->layout = 'layout_error';
    }
}