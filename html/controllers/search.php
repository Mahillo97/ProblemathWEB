
<?php

class Search extends Controller
{

    function __construct()
    {

        parent::__construct();

        $tamPag = 7;

        if (isset($_GET['tags'])) {
            $tags = $_GET['tags'];
        } else {
            $tags = '';
        }

        if (isset($_GET['prop'])) {
            $prop = $_GET['prop'];
        } else {
            $prop = '';
        }

        if (isset($_GET['mag'])) {
            $mag = $_GET['mag'];
        } else {
            $mag = '';
        }

        $urlPeticionSize = "http://".constant('IP_API_REST').":5000/v1/users/problems/size?tags={$tags}&mag={$mag}&prop={$prop}";
        $newUrl = "search?tags={$tags}&prop={$prop}&mag={$mag}&pag=";
        $sizeJSON = file_get_contents($urlPeticionSize);
        $headersArray = parseHeaders($http_response_header);
        if ($headersArray['reponse_code'] == 200) {
            $size = json_decode($sizeJSON, true)['size'];
            $pages = ceil($size / $tamPag);
            $pag = 1;

            //We get the page that we want to show and if the value is not valid we forward the request to the correct URL
            if (!isset($_GET['pag'])) {
                header("Location: " . $newUrl . $pag);
                die();
            } else {
                try {
                    $pag = $_GET['pag'];
                    $pag = (int) $pag;
                    //Check if there is at least one page
                    if ($pages > 0) {
                        if ($pag >= 1 && $pag <= $pages) {
                            //The pag is a value parameter
                            $urlPeticionQuery = "http://".constant('IP_API_REST').":5000/v1/users/problems?tags={$tags}&mag={$mag}&prop={$prop}&tamPag={$tamPag}&pag={$pag}";
                            $problemsJSON = file_get_contents($urlPeticionQuery);
                            $headersArray = parseHeaders($http_response_header);
                            if ($headersArray['reponse_code'] == 200) {
                                $problemList = json_decode($problemsJSON, true)['problems'];
                                $_REQUEST['problemList'] = $problemList;
                                $_SESSION['pag'] = $pag;
                                $_SESSION['url'] = $newUrl;
                            } else {
                                header("Location: requestError?code=" . $headersArray['reponse_code']);
                                die();
                            }
                        } else {
                            $pag = 1;
                            header("Location: " . $newUrl . $pag);
                            die();
                        }
                    }

                    $_REQUEST['pages'] = $pages;
                    $this->view->render('search/index');
                    
                } catch (TypeError $e) {
                    header("Location: " . $newUrl . $pag);
                    die();
                }
            }
        } else {
            header("Location: requestError?code=" . $headersArray['reponse_code']);
            die();
        }
    }

    function saludo()
    {
        echo "<p>Ejecutaste el método Saludo</p>";
    }
}

?>