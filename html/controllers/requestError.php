<?php

require_once 'libs/controller.php';

class RequestError extends Controller{

    function __construct($codeError){
        parent::__construct();
        $this->view->code = $codeError;
        $this->view->render('requestError/index');
        
    }
}

?>