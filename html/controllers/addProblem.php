
<?php

class AddProblem extends Controller
{

    function __construct()
    {
        parent::__construct();

        //We get the id of the problem
        if (isset($_GET['idProblem'])) {
            $idProblem = $_GET['idProblem'];
            $url = "http://".constant('IP_API_REST')."/v1/users/problem/{$idProblem}";
            $problemJSON = file_get_contents($url);
            $headersArray = parseHeaders($http_response_header);
            if ($headersArray['reponse_code'] == 200) {
                $problem = json_decode($problemJSON, true);
                foreach ($problem['solutions'] as $index => $solution) {
                    $problem['solutions'][$index]['selected']=false;
                }
                if (isset($_SESSION['problemSheet'])) {
                    $problemSheet = $_SESSION['problemSheet'];
                } else {
                    $problemSheet = array();
                }
                array_push($problemSheet, $problem);
                $_SESSION['problemSheet'] = $problemSheet;
                header("Location: problemSheet");
                die();
            } else {
                header("Location: requestError?code=" . urlencode($headersArray['reponse_code']));
                die();
            }
        } else {
            header("Location: problemSheet");
            die();
        }
    }
}
?>