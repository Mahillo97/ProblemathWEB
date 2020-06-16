
<?php

class Admin extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function login()
    {
        if (!isset($_SESSION['admin']['user']) || !isset($_SESSION['admin']['password'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['user']) && isset($_POST['password'])) {
                    //We must ping the API REST with credentials
                    $user = $_POST['user'];
                    $password = $_POST['password'];
                    $pingUrl = "http://" . constant('IP_API_REST') . "/v1/ping";
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
        }else{
            header("Location: index");
            die();

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
                        CURLOPT_URL => "" . constant('IP_API_REST') . "/v1/admin/uploadProblem",
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

                    curl_exec($curl);
                    // Comprueba el código de estado HTTP
                    if (!curl_errno($curl)) {
                        switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                            case 200:  # OK
                                $_REQUEST['success'] = "El problema se subio correctamente";
                                $this->view->render('admin/uploadProblem');
                                break;
                            default:
                                $_REQUEST['error'] = "El problema no se ha subido correctamente, verifique los documentos enviados.";
                                $this->view->render('admin/uploadProblem');
                        }
                    }
                    curl_close($curl);
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

    function removeProblem()
    {
        if (isset($_SESSION['admin']['user']) && isset($_SESSION['admin']['password'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //We must check if the problem id has been set
                if (isset($_POST['problemId'])) {

                    $problemID = intval($_POST['problemId']);

                    //We check if the id is a positive value
                    if ($problemID > 0) {

                        //We get the session variables for the authentication
                        $user = $_SESSION['admin']['user'];
                        $password = $_SESSION['admin']['password'];
                        $auth = base64_encode("{$user}:{$password}");

                        //We create the petition to the API/REST
                        $url = "http://" . constant('IP_API_REST') . "/v1/admin/removeProblem/$problemID";
                        $header = array("Content-Type: application/x-www-form-urlencoded", "Authorization: Basic $auth");

                        $opts = array('http' => array(
                            'method' => 'POST',
                            'header' => $header,
                        ));

                        $ctx = stream_context_create($opts);
                        file_get_contents($url, false, $ctx);
                        $headersArray = parseHeaders($http_response_header);

                        if ($headersArray['reponse_code'] == 200) {
                            $_REQUEST['success'] = "Se ha borrado correctamente el problema de la base de datos";
                            $this->view->render('admin/removeProblem');
                        } elseif ($headersArray['reponse_code'] == 404) {
                            $_REQUEST['error'] = "No existe un problema con ese ID";
                            $this->view->render('admin/removeProblem');
                        } else {
                            $_REQUEST['error'] = "Ha surgido un error inesperado";
                            $this->view->render('admin/removeProblem');
                        }
                    } else {
                        $_REQUEST['error'] = "El id del problema debe de ser un entero mayor que 0";
                        $this->view->render('admin/removeProblem');
                    }
                } else {
                    $_REQUEST['error'] = "Debe rellenar los campos obligatorios";
                    $this->view->render('admin/removeProblem');
                }
            } else {
                $this->view->render('admin/removeProblem');
            }
        } else {
            header("Location: login");
            die();
        }
    }

    function newAdmin()
    {
        if (isset($_SESSION['admin']['user']) && isset($_SESSION['admin']['password'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //We must check if the username, password and repeat password have been written
                if (isset($_POST['user']) && isset($_POST['pwd']) && isset($_POST['rpwd'])) {

                    $newUsername = $_POST['user'];
                    $newPwd = $_POST['pwd'];
                    $newRpwd = $_POST['rpwd'];

                    //We check if the passwords match
                    if ($newPwd === $newRpwd) {

                        //We get the session variables for the authentication
                        $user = $_SESSION['admin']['user'];
                        $password = $_SESSION['admin']['password'];
                        $auth = base64_encode("{$user}:{$password}");

                        //We create the petition to the API/REST
                        $url = "http://" . constant('IP_API_REST') . "/v1/admin/addUser";
                        $header = array("Content-Type: application/x-www-form-urlencoded", "Authorization: Basic $auth");

                        $data = array('user' => $newUsername, 'pwd' => $newPwd);
                        $data = http_build_query($data);

                        $opts = array('http' => array(
                            'method' => 'POST',
                            'header' => $header,
                            'content' => $data
                        ));

                        $ctx = stream_context_create($opts);
                        file_get_contents($url, false, $ctx);
                        $headersArray = parseHeaders($http_response_header);

                        if ($headersArray['reponse_code'] == 200) {
                            $_REQUEST['success'] = "Se ha añadido correctamente el administrador en la base de datos";
                            $this->view->render('admin/newAdmin');
                        } else {
                            $_REQUEST['error'] = "Ya existe un usuario en la base de datos con ese nombre";
                            $this->view->render('admin/newAdmin');
                        }
                    } else {
                        $_REQUEST['error'] = "Las contraseñas no coinciden";
                        $this->view->render('admin/newAdmin');
                    }
                } else {
                    $_REQUEST['error'] = "Debe rellenar los campos obligatorios";
                    $this->view->render('admin/newAdmin');
                }
            } else {
                $this->view->render('admin/newAdmin');
            }
        } else {
            header("Location: login");
            die();
        }
    }

    function changePassword()
    {
        if (isset($_SESSION['admin']['user']) && isset($_SESSION['admin']['password'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //We must check if the password, new password and repeat password have been written
                if (isset($_POST['pwd']) && isset($_POST['npwd']) && isset($_POST['rpwd'])) {

                    $oldPwd = $_POST['pwd'];
                    $newPwd = $_POST['npwd'];
                    $newRpwd = $_POST['rpwd'];

                    //We check if the old password match
                    if ($oldPwd === $_SESSION['admin']['password']) {
                        if ($newPwd === $newRpwd) {

                            //We get the session variables for the authentication
                            $user = $_SESSION['admin']['user'];
                            $password = $_SESSION['admin']['password'];
                            $auth = base64_encode("{$user}:{$password}");

                            //We create the petition to the API/REST
                            $url = "http://" . constant('IP_API_REST') . "/v1/admin/changePassword";
                            $header = array("Content-Type: application/x-www-form-urlencoded", "Authorization: Basic $auth");

                            $data = array('user' => $user, 'pwd' => $newPwd);
                            $data = http_build_query($data);

                            $opts = array('http' => array(
                                'method' => 'POST',
                                'header' => $header,
                                'content' => $data
                            ));

                            $ctx = stream_context_create($opts);
                            file_get_contents($url, false, $ctx);
                            $headersArray = parseHeaders($http_response_header);

                            if ($headersArray['reponse_code'] == 200) {
                                $_REQUEST['success'] = "Se ha modificado correctamente su contraseña";
                                $_SESSION['admin']['password'] = $newPwd;
                            } else {
                                $_REQUEST['error'] = "No se ha podido cambiar su contraseña.";
                            }
                        } else {
                            $_REQUEST['error'] = 'Las nuevas contraseñas no coinciden.';
                        }
                    } else {
                        $_REQUEST['error'] = 'La antigua contraseña es incorrecta.';
                    }
                } else {
                    $_REQUEST['error'] = "Debe rellenar los campos obligatorios";
                }
            }
            $this->view->render('admin/changePassword');
        } else {
            header("Location: login");
            die();
        }
    }

    function exit()
    {
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header("Location: /main");
        die();
    }
}



?>