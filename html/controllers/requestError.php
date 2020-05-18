<?php

require_once 'libs/controller.php';

class RequestError extends Controller{

    function __construct(){
        parent::__construct();
        if (isset($_GET['code'])) {
            $problemCode = $_GET['code'];
        } else {
            $problemCode = 400;
        }
        $_REQUEST['code'] = $problemCode;     
        $this->view->render('requestError/index');
        
    }
}

?>