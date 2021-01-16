<?php
class Controller{
    function __construct (){
        $this->view=new View();
        session_start();
        require_once 'functions.php';
    }
    function loadModel($model){
        $url = 'models/'.$model.'Model.php';
        if(file_exists($url)){
            require $url;

            $modelName = $model.'Model';

            $this->model= new $modelName();
        }
    }
}