<?php

require_once 'libs/view.php';
require_once 'libs/phpUtils.php';

class Controller{

    function __construct(){
        $this->view = new View();
        session_start();
    }
}

?>