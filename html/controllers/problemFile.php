
<?php

use Pandoc\Pandoc;

require_once "vendor/autoload.php";


class ProblemFile extends Controller
{
    private static $pandoc;
    private static $optionsP;
    static function init()
    {
        self::$pandoc = new Pandoc();
        self::$optionsP = array(
            "from"  => "latex",
            "to"    => "html",
            "mathjax" => null
        );
    }

    function __construct()
    {
        parent::__construct();
        self::init();

        //We get the id of the problem
        $idProblem = $_GET['idProblem'];
        $url = "http://" . constant('IP_API_REST') . "/v1/users/problem/{$idProblem}";
        $problemJSON = file_get_contents($url);
        $headersArray = parseHeaders($http_response_header);
        if ($headersArray['reponse_code'] == 200) {
            $problem = json_decode($problemJSON, true);
            $_REQUEST['problem'] = $problem;
            $_REQUEST['pandoc'] = self::$pandoc;
            $_REQUEST['pandocOptions'] = self::$optionsP;
            $this->view->render('problemFile/index');
        } else {
            header("Location: requestError?code=" . urlencode($headersArray['reponse_code']));
            die();
        }
    }
}
?>