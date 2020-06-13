
<?php

class ProblemPDF extends Controller
{

    function __construct()
    {
        parent::__construct();

        //We get the id of the problem
        $idProblem = $_GET['idProblem'];
        $type = $_GET['type'];
        $url = "http://".constant('IP_API_REST')."/v1/users/problem/{$idProblem}/pdf{$type}";
        $pdf = file_get_contents($url);
        $headersArray = parseHeaders($http_response_header);
        if ($headersArray['reponse_code'] == 200) {
            header('Content-Type: application/pdf');
            header('Content-Length: ' . strlen($pdf));
            header("Content-Disposition: inline; filename=\"problem{$idProblem}{$type}.pdf\"");
            header('Cache-Control: private, max-age=0, must-revalidate');
            header('Pragma: public');
            ini_set('zlib.output_compression', '0');
            die($pdf);
        } else {
            header("Location: requestError?code=" . $headersArray['reponse_code']);
            die();
        }
    }
}

?>