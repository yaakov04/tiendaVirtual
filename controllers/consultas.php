<?php
class consultas extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->productos=[];
        $this->view->busqueda='';
    }//
    function render(){
        $controller= new Falla();
        $controller->render();
    }
    function novedades(){
        $consultaDB=$this->model->getNovedades();
        $this->view->productos=$consultaDB;
        $this->view->render('consultas/novedades');
    }
    function masVendidos(){
        $consultaDB=$this->model->getMasVendidos();
        $this->view->productos=$consultaDB;
        $this->view->render('consultas/masVendidos');
    }
    function ofertas(){
        $consultaDB=$this->model->getOfertas();
        $this->view->productos=$consultaDB;
        $this->view->render('consultas/ofertas');
    }

    function busqueda($param){
        $parametro_busqueda=filter_var($param[0], FILTER_SANITIZE_STRING);
        $this->view->busqueda=$parametro_busqueda;
        $consultaDB=$this->model->getbusqueda($parametro_busqueda);
        while($resultados= $consultaDB->fetch_assoc()){
            array_push($this->view->productos, $resultados);
            } //while
        $this->view->render('consultas/busqueda');
    }
}