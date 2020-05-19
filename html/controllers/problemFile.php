
<?php

class ProblemFile extends Controller
{

    function __construct()
    {
        parent::__construct();

        //We get the id of the problem
        $idProblem = $_GET['idProblem'];
        $url = "http://192.168.56.101:5000/v1/users/problem/{$idProblem}";
        $problemJSON = file_get_contents($url);
        $headersArray = parseHeaders($http_response_header);
        if ($headersArray['reponse_code'] == 200) {
            $problem = json_decode($problemJSON, true);
            $_REQUEST['problem'] = $problem;
            $this->view->render('problemFile/index');
        } else {
            header("Location: requestError?code=" . $headersArray['reponse_code']);
            die();
        }
    }
}
?>