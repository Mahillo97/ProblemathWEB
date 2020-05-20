
<?php

class ProblemSheet extends Controller
{

    function __construct()
    {
        parent::__construct();
        //We check if we have the problemSheet
        if (
            isset($_SESSION['problemSheet'])
        ) {
            $problemSheet = $_SESSION['problemSheet'];
            //First we try to reorder the problem
            if (
                isset($_POST['index'])
            ) {
                $index = explode(",", $_POST['index']);
                reorder($problemSheet, $index);
            }

            //Next, we must check the solutions values to save them
            foreach ($problemSheet as $index => $problem) {
                $nameCheckBox = 'solutions' . $problem['id'];
                if (isset($_POST[$nameCheckBox])) {
                    $valuesCheckBox = $_POST[$nameCheckBox];
                    if ($valuesCheckBox[0] == -1) {      
                        foreach ($problem['solutions'] as $key1 => $solution1) {
                            $problem['solutions'][$key1]['selected'] = false;
                        }
                    } else { 
                        foreach ($problem['solutions'] as $key2 => $solution2) {
                            if ((in_array($key2, $valuesCheckBox))) {
                                $problem['solutions'][$key2]['selected'] = true;
                            } else {
                                $problem['solutions'][$key2]['selected'] = false;
                            }
                        }
                    }
                }
                $problemSheet[$index] = $problem;
            }

            //We check the action
            if (isset($_POST['action'])) {
                if (
                    substr($_POST['action'], 0, 6)  == "delete" && is_numeric(substr($_POST['action'], 6, strlen($_POST['action']) - 6))
                ) {
                    $index = intval(substr($_POST['action'], 6, strlen($_POST['action']) - 6));

                    if ($index >= 0 && $index < count($problemSheet)) {
                        array_splice($problemSheet, $index, 1);
                    }
                }
                if ($_POST['action'] == "pdf") {
                    // $urlbase = "http://192.168.56.101:5000/v1/users/getProblemSheet?";
                    // $urlQueryString = "";

                    // foreach($problem['solutions'] as $index => $solution) {

                    // }
                    // $index = intval(substr($_POST['action'], 6, strlen($_POST['action']) - 6));
                    // $problemSheet = $_SESSION['problemSheet'];

                    // if ($index >= 0 && $index < count($problemSheet)) {
                    //     array_splice($problemSheet, $index, 1);
                    //     $_SESSION['problemSheet'] = $problemSheet;
                    // }
                }
                $_SESSION['problemSheet'] = $problemSheet;
                header("Location: problemSheet");
                die();
            }
            $_SESSION['problemSheet'] = $problemSheet;
        }
        $this->view->render('problemSheet/index');
    }
}
?>