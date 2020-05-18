
<?php

class Search extends Controller{

    function __construct(){

        parent::__construct();

        $tamPag = 2;

        //Check the params if they are set
        if (isset($_GET['tags'])) {
            $tags= $_GET['tags'];
        }else{
            $tags='';
        }

        if (isset($_GET['prop'])) {
            $prop= $_GET['prop'];
        }else{
            $prop='';
        }

        if (isset($_GET['mag'])) {
            $mag= $_GET['mag'];
        }else{
            $mag='';
        }

        $urlPeticion = "http://192.168.56.101:5000/v1/users/problems?tags={$tags}&mag={$mag}&prop={$prop}";
        $url = "search?tags={$tags}&prop={$prop}&mag={$mag}&pag=";
        $problemsJSON = file_get_contents($urlPeticion);
        $problemList = json_decode($problemsJSON,true)['problems'];
        $pages = ceil(count($problemList)/$tamPag);

        //We get the page that we want to show and if the value is not valid we set pag as 1
        if (!isset($_GET['pag'])) {
            $pag=1;
        }else{
            try {
                $pag = $_GET['pag'];
                $pag = (int)$pag;
                if($pag<1 || $pag>$pages){
                    $pag=1;
                }
            } catch (TypeError $e) {$pag=1;}
        }

        $problemList = array_slice($problemList, ($pag-1)*$tamPag , $tamPag);
        
        $_REQUEST['problemList'] = $problemList;
        $_REQUEST['pages'] = $pages;
        $_REQUEST['pag'] = $pag;
        $_REQUEST['url'] = $url;

        $this->view->render('search/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo</p>";
    }
}

?>