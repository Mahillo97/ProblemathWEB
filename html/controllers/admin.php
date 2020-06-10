
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
                $pingUrl = "http://127.0.0.1:5000/v1/ping";
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
                //We must check if the statement and solution files have been send
                if (isset($_FILES['statement']) && isset($_FILES['solution1'])) {

                    //We get the session variables for the authentication
                    $user = $_SESSION['admin']['user'];
                    $password = $_SESSION['admin']['password'];
                    $auth = base64_encode("{$user}:{$password}");

                    //We get the variables that we might send and create the array we must send
                    $petitionArray = [];
                    $petitionArray['tags'] = isset($_POST['tags']) ? $_POST['tags'] : '';
                    $petitionArray['prop'] = isset($_POST['prop']) ? $_POST['prop'] : '';
                    $petitionArray['mag'] = isset($_POST['mag']) ? $_POST['mag'] : '';

                    //For the file we rename it and then save it with the new name
                    $oldName = $_FILES['statement']['name'];
                    $oldTmpName = $_FILES['statement']['tmp_name'];
                    $newName = pathinfo($_FILES['statement']['tmp_name'])['dirname'] . DIRECTORY_SEPARATOR . $oldName;
                    rename($oldTmpName, $newName);
                    $petitionArray['problem'] = new CURLFILE($newName);

                    //We get all the solutions
                    $i = 1;
                    while (isset($_FILES["solution{$i}"])) {
                        //For the file we rename it and then save it with the new name
                        $oldName = $_FILES["solution{$i}"]['name'];
                        $oldTmpName = $_FILES["solution{$i}"]['tmp_name'];
                        $newName = pathinfo($_FILES["solution{$i}"]['tmp_name'])['dirname'] . DIRECTORY_SEPARATOR . $oldName;
                        rename($oldTmpName, $newName);
                        $petitionArray["solution{$i}"] = new CURLFILE($newName);
                        $petitionArray["solver{$i}"] = isset($_POST["solver{$i}"]) ? $_POST["solver{$i}"] : '';
                        $i = $i + 1;
                    }

                    //We create the curl to make the petition to the API/REST
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "127.0.0.1:5000/v1/admin/uploadProblem",
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => $petitionArray,
                        CURLOPT_HTTPHEADER => array(
                            "Authorization: Basic $auth"
                        )
                    ));

                    $response = curl_exec($curl);
                    $error = curl_errno($curl);
                    curl_close($curl);
                    // Comprobar si ocurrió un error
                    if (!$error) {
                        $_REQUEST['success'] = "El problema se subio correctamente";
                        header("Location: uploadProblem");
                        die();
                    } else {
                        $_REQUEST['error'] = "El problema no se ha subido correctamente, verifique los documentos enviados.";
                        $this->view->render('admin/uploadProblem');
                    }
                } else {
                    $_REQUEST['error'] = "Incluya un enunciado y una solución";
                    $this->view->render('admin/uploadProblem');
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
        header("Location: /main");
        die();
    }
}



?>