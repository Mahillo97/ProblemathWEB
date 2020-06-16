
<?php

class Search extends Controller
{

    function __construct()
    {

        parent::__construct();

        $tamPag = 7;

        $tags = isset($_GET['auxTags']) ? preg_replace('/\s*,\s*/', ',',trim($_GET['auxTags'])) : '';
        $tags = isset($_GET['tags']) ? preg_replace('/\s*,\s*/', ',',trim($_GET['tags'])) . $tags : $tags . '';
        $prop = isset($_GET['prop']) ? trim($_GET['prop']) : '';
        $mag = isset($_POST['mag']) ? trim($_POST['mag']) : '';

        $urlPeticionSize = "http://".constant('IP_API_REST')."/v1/users/problems/size?tags=".urlencode($tags)."&mag=".urlencode($mag)."&prop=".urlencode($prop);
        $newUrl = "search?tags=".urlencode($tags)."&mag=".urlencode($mag)."&prop=".urlencode($prop)."&pag=";
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
                            $urlPeticionQuery = "http://".constant('IP_API_REST')."/v1/users/problems?tags=".urlencode($tags)."&mag=".urlencode($mag)."&prop=".urlencode($prop)."&tamPag=".urlencode($tamPag)."&pag=".urlencode($pag);
                            $problemsJSON = file_get_contents($urlPeticionQuery);
                            $headersArray = parseHeaders($http_response_header);
                            if ($headersArray['reponse_code'] == 200) {
                                $problemList = json_decode($problemsJSON, true)['problems'];
                                $_REQUEST['problemList'] = $problemList;
                                $_SESSION['pag'] = $pag;
                                $_SESSION['url'] = $newUrl;
                            } else {
                                header("Location: requestError?code=" . urlencode($headersArray['reponse_code']));
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
            header("Location: requestError?code=" . urlencode($headersArray['reponse_code']));
            die();
        }
    }

    function saludo()
    {
        echo "<p>Ejecutaste el método Saludo</p>";
    }
}

?>