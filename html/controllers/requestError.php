<?php

require_once 'libs/controller.php';

class RequestError extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje = "Error genérico";
        $this->view->render('requestError/index');
        //echo "<p>Error al cargar recurso</p>";
    }
}

?>