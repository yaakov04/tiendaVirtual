<?php
require_once 'controllers/falla.php';
class App{
    function __construct(){

        //comprueba la url - hay que configurar el htacces para establecer el parametro por defecto
        $url=isset($_GET['url'])?$_GET['url']:null;

        $url = rtrim($url, '/');
        $url =explode('/', $url);

        //Si la url no tiene escrito nada manda llamar el index
        if(empty($url[0])){
            $archivoCrontroller = 'controllers/Main.php';

            require_once $archivoCrontroller;
            $controller = new Main();
            $controller->render();
            return false;

        }

        //manda llamar la pagina segun la url
        $archivoCrontroller = 'controllers/'. $url[0] .'.php';
        
        if (file_exists($archivoCrontroller)) {
            require_once $archivoCrontroller;
            $controller = new $url[0];

            if (isset($url[1])) {
                $controller->{$url[1]}();
            }else{
                $controller->render();
            }

        }else{
            $controller= new Falla();
            $controller->render();
        }

    }//__construct

}//Class