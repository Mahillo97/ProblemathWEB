
<?php

class ProblemSheetPDF extends Controller
{

    function __construct()
    {
        parent::__construct();
        //We check if we have the problemSheet
        if (
            isset($_SESSION['problemSheet']) &&
            !empty($_SESSION['problemSheet'])
        ) {
            $problemSheet = $_SESSION['problemSheet'];
            //First we try to reorder the problem sheet
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

            $urlbase = "http://192.168.56.101:5000/v1/users/getProblemSheet?";
            $urlQueryString = "";
            $multipleProblems = false;

            foreach ($problemSheet as $index => $problem) {
                if (!$multipleProblems) {
                    $urlQueryString = $urlQueryString . "problem" . ($index + 1) . "=" . urlencode($problem['id']) . "&solution" . ($index + 1) . "=";
                    $multipleProblems = true;
                } else {
                    $urlQueryString = $urlQueryString . "&problem" . ($index + 1) . "=" . urlencode($problem['id']) . "&solution" . ($index + 1) . "=";
                }

                $multipleSolutions = false;
                foreach ($problem['solutions'] as $solution) {
                    if ($solution['selected']) {
                        if (!$multipleSolutions) {
                            $urlQueryString = $urlQueryString . urlencode($solution['id']);
                            $multipleSolutions = true;
                        } else {
                            $urlQueryString = $urlQueryString . urlencode("," . $solution['id']);
                        }
                    }
                }
            }

            $url = $urlbase . $urlQueryString;
            $pdf = file_get_contents($url);
            $headersArray = parseHeaders($http_response_header);
            if ($headersArray['reponse_code'] == 200) {
                header('Content-Type: application/pdf');
                header('Content-Length: ' . strlen($pdf));
                header("Content-Disposition: inline; filename=\"problemSheet.pdf\"");
                header('Cache-Control: private, max-age=0, must-revalidate');
                header('Pragma: public');
                ini_set('zlib.output_compression', '0');
                die($pdf);
            } else {
                header("Location: requestError?code=" . $headersArray['reponse_code']);
                die();
            }
        }
        header("Location: problemSheet");
        die();
    }
}
?>