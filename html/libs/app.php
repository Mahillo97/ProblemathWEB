<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'controllers/requestError.php';

class App
{

    function __construct()
    {
        if (!isset($_GET['url'])) {
            
            $archivoController = 'controllers/main.php';
            require_once $archivoController;
            $controller = new Main;
            
        }else{
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            $archivoController = 'controllers/' . $url[0] . '.php';

            if (file_exists($archivoController)) {
                require_once $archivoController;
                $controller = new $url[0];
                if (isset($url[1])) {
                    $controller->{$url[1]}();
                }
            } else {
                $controller = new RequestError(404);
            }
        }
    }
}
