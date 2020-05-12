
<?php

class ProblemFile extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('problemFile/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo</p>";
    }
}

?>