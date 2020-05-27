
<?php

class Admin extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['user']) && isset($_POST['password'])) {
                //We must ping the API REST with credentials
                $user = $_POST['user'];
                $password = $_POST['password'];
                $pingUrl = "http://192.168.56.101:5000/v1/ping";
                $auth = base64_encode("{$user}:{$password}");
                $header = array("Authorization: Basic $auth");
                $opts = array('http' => array(
                    'method' => 'GET',
                    'header' => $header
                ));
                $ctx = stream_context_create($opts);
                file_get_contents($pingUrl, false, $ctx);
                $headersArray = parseHeaders($http_response_header);
                if ($headersArray['reponse_code'] == 200) {
                    $_SESSION['admin']['user'] = $user;
                    $_SESSION['admin']['password'] = $password;
                    header("Location: index");
                    die();
                } else {
                    $_REQUEST['error'] = "Credenciales no válidas";
                    $this->view->render('admin/login');
                }
            } else {
                $_REQUEST['error'] = "Incluya las credenciales";
                $this->view->render('admin/login');
            }
        } else {
            $this->view->render('admin/login');
        }
    }

    function index()
    {
        if (isset($_SESSION['admin']['user']) && isset($_SESSION['admin']['password'])) {
            $this->view->render('admin/index');
        } else {
            header("Location: login");
            die();
        }
    }

    function uploadProblem()
    {
        if (isset($_SESSION['admin']['user']) && isset($_SESSION['admin']['password'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //We must ping the API REST with credentials
                $user = $_POST['user'];
                $password = $_POST['password'];
                $pingUrl = "http://192.168.56.101:5000/v1/ping";
                $auth = base64_encode("{$user}:{$password}");
                $header = array("Authorization: Basic $auth");
                $opts = array('http' => array(
                    'method' => 'GET',
                    'header' => $header
                ));
                $ctx = stream_context_create($opts);
                file_get_contents($pingUrl, false, $ctx);
                $headersArray = parseHeaders($http_response_header);
                if ($headersArray['reponse_code'] == 200) {
                    $_SESSION['admin']['user'] = $user;
                    $_SESSION['admin']['password'] = $password;
                    header("Location: index");
                    die();
                } else {
                    $_REQUEST['error'] = "Credenciales no válidas";
                    $this->view->render('admin/login');
                }
            } else {
                $this->view->render('admin/uploadProblem');
            }
        } else {
            header("Location: login");
            die();
        }
    }

    function exit()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
            unset($_SESSION['user']);
            unset($_SESSION['password']);
        }
        $this->view->render('main/index');
    }
}



?>