
<?php

require_once 'libs/phpUtils.php';

class ProblemSheet extends Controller
{

    function __construct()
    {
        parent::__construct();
        //We get the action
        if (
            isset($_GET['action']) &&
            substr($_GET['action'], 0, 6)  == "delete" &&
            is_numeric(substr($_GET['action'], 6, strlen($_GET['action']) - 6)) &&
            isset($_SESSION['problemSheet'])
        ) {
            echo
            $index = intval(substr($_GET['action'], 7, count($_GET['action']) - 6));
            $problemSheet = $_SESSION['problemSheet'];

            if ($index >= 0 && $index < count($problemSheet)) {
                array_splice($problemSheet, $index, 1);
                $_SESSION['problemSheet'] = $problemSheet;
                header("Location: problemSheet");
            } else {
                $this->view->render('problemSheet/index');
            }
        } else {
            $this->view->render('problemSheet/index');
        }
    }
}
?>