
<?php

class Search extends Controller{

    function __construct(){

        parent::__construct();

        $tamPag = 2;

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

        $urlPeticion = "http://192.168.56.101:5000/v1/users/problems?tags={$tags}&mag={$mag}&prop={$prop}";
        $url = "search?tags={$tags}&prop={$prop}&mag={$mag}&pag=";
        $problemsJSON = file_get_contents($urlPeticion);
        $problemList = json_decode($problemsJSON,true)['problems'];
        $pages = ceil(count($problemList)/$tamPag);

        //We get the page that we want to show
        $pag = $_GET['pag'];

        //If the value is not value we set pag as 1
        if ($pag===null) {
            $pag=1;
        }else{
            try {
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