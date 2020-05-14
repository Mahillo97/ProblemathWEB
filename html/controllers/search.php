
<?php

class Search extends Controller{

    function __construct(){

        parent::__construct();

        //We get the values of the search
        $tags= $_GET['tags'];
        $prop = $_GET['prop'];
        $mag = $_GET['mag'];

        //If some of them are empty we set them as an empty string
        if ($tags===null) {
            $tags='';
        }
        if ($prop===null) {
            $prop='';
        }
        if ($mag===null) {
            $mag='';
        }

        $url = "http://192.168.56.101:5000/v1/users/problems?tags={$tags}&mag={$mag}&prop={$prop}";
        $problemsJSON = file_get_contents($url);
        $problemList = json_decode($problemsJSON,true)['problems'];
        
        $_REQUEST['url'] = $problemList;
        $this->view->render('search/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo</p>";
    }
}

?>