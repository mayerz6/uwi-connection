<?php

class Controller{
    public function model($model){
        require_once 'app/models/' . $model . '.php';
            return new $model();
    }

    protected function view($view, $data = array()){
        if(file_exists('app/views/' . $view . '.php')){
            require_once 'app/views/' . $view . '.php';
        }   else {
          //  echo "No view exists for this request...";
            require_once 'app/views/pages/404.php';
        }
    }
}