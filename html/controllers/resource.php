<?php

class Resource extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->urlbase = 'http://'.constant('IP_API_REST') .'/v1/users/resource/';
    }

    function problem()
    {
        //We get the id of the problem
        $idProblem = $_GET['idProblem'];
        $url = $this->urlbase . "html/problem/{$idProblem}";
        $html = file_get_contents($url);
        $headersArray = parseHeaders($http_response_header);
        if ($headersArray['reponse_code'] == 200) {
            die($html);
        } else {
            header("Location: /requestError?code=" . urlencode($headersArray['reponse_code']));
            die();
        }
    }

    function solution()
    {
        //We get the id of the solution
        $idSolution = $_GET['idSolution'];
        $url = $this->urlbase . "html/solution/{$idSolution}";
        $html = file_get_contents($url);
        $headersArray = parseHeaders($http_response_header);
        if ($headersArray['reponse_code'] == 200) {
            die($html);
        } else {
            header("Location: /requestError?code=" . urlencode($headersArray['reponse_code']));
            die();
        }
    }

    function css()
    {
        $url = $this->urlbase . "css";
        $css = file_get_contents($url);
        $headersArray = parseHeaders($http_response_header);
        if ($headersArray['reponse_code'] == 200) {
            header('Content-Type: text/css');
            die($css);
        } else {
            header("Location: /requestError?code=" . urlencode($headersArray['reponse_code']));
            die();
        }
    }

    function image()
    {
        //We get the id of the image
        $idImage = $_GET['idImage'];
        $url = $this->urlbase . "image/{$idImage}";
        $image = file_get_contents($url);
        $headersArray = parseHeaders($http_response_header);
        if ($headersArray['reponse_code'] == 200) {
            $imginfo = getimagesize($url);
            header("Content-type: {$imginfo['mime']}");
            header('Content-Length: ' . strlen($image));
            die($image);
        } else {
            header("Location: /requestError?code=" . urlencode($headersArray['reponse_code']));
            die();
        }
    }

}
?>


