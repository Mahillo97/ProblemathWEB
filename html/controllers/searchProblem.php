
<?php

class SearchProblems extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('searchProblems/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo</p>";
    }
}

?>