
<?php

require_once 'libs/phpUtils.php';

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
            $controller = new RequestError();
        }
    }

    function saludo()
    {
        echo "<p>Ejecutaste el método Saludo</p>";
    }
}

?>