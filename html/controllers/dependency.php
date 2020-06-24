<?php

class Dependency extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->urlbase = 'http://'.constant('IP_API_REST') .'/v1/users/dependency/';

        //We get the id of the dependency
        $idImage = $_GET['idImage'];
        $url = $this->urlbase . "{$idImage}";
        $image = file_get_contents($url);
        $headersArray = parseHeaders($http_response_header);
        if ($headersArray['reponse_code'] == 200) {
            header("Content-type: {$headersArray['Content-Type']}");
            die($image);
        } else {
            header("Location: /requestError?code=" . urlencode($headersArray['reponse_code']));
            die();
        }
    }
}
?>