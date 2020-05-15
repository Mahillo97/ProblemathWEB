<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" lang="es-ES">
    <title>Problemath</title>
    <meta name="description" content="Aplicación de búsqueda de problemas de matemáticas; Universidad de La Rioja." lang="es-ES">
    <meta name="keywords" content="problemas" lang="es-ES">
    <meta name="language" content="es-ES">
    <meta name="robots" content="index,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Own JS -->
    <script type="text/javascript" src="public/js/tabsCollapse.js"></script>
    <script type="text/javascript" src="public/js/figuresLatex.js"></script>

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- MathJax Scripts -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>
    <script>
        window.MathJax = {
            tex: {
                inlineMath: [
                    ['$', '$'],
                    ['\\(', '\\)']
                ]
            }
        };
    </script>

    <link rel="icon" type="image/png" href="public/img/favicon.png">

</head>

<body>

    <?php require 'views/header.php'; ?>

    <div class="container-fluid text-center py-3 pt-md-5">
        <div class="row content">
            <div class="col-sm-3 sidenav">
            </div>
            <div class=" rounded col-sm-6 text-left">
                <h1>PROBLEMA <?= $_REQUEST['problem']['id'] ?></h1>
                <div class="shadow border border-danger rounded p-3">
                    <div class="flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h3 class="mb-2"> Información general</h3>
                        </div>
                        <hr class="mt-0 mb-3" />
                        <div class="d-flex w-100 justify-content-between mb-4">
                            <div class="col-sm-6 p-0">
                                <div class="d-flex w-100 mb-1">
                                    <h5 class="font-italic"> Propuesto por: <?= $_REQUEST['problem']['proposer'] ?></h5>
                                </div>
                                <div class="d-flex w-100 mb-1">
                                    <h5 class="font-italic mr-2">Publicado en: <?= $_REQUEST['problem']['magazine'] ?> </h5>
                                </div>
                                <div class="d-flex w-100 mb-1">
                                    <?php
                                    foreach ($_REQUEST['problem']['tags'] as $tag) { ?>
                                        <span class="badge badge-danger mr-1"><?= $tag ?></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-6 p-0">
                                <div class="d-flex w-100 flex-column justify-content-between">
                                    <div class="mb-2">
                                        <a target="_blank" rel="noopener noreferrer" href="/problemPDF?idProblem=<?= $_REQUEST['problem']['id'] ?>&type=State" class="btn btn-outline-danger btn-block" role="button" aria-pressed="true">
                                            Descargar enunciado <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                    </div>
                                    <div class="mb-2 ">
                                        <a target="_blank" rel="noopener noreferrer" href="/problemPDF?idProblem=<?= $_REQUEST['problem']['id'] ?>&type=Full" class="btn btn-outline-danger btn-block" role="button" aria-pressed="true">
                                            Descargar enunciado y soluciones <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex w-100 justify-content-between">
                            <h3 class="mb-2"> Enunciado</h3>
                        </div>
                        <hr class="mt-0 mb-3" />
                        <div class="d-flex w-100 justify-content-between mb-4">
                            <p class="mb-1 text-justify">
                                <?= $_REQUEST['problem']['tex'] ?>
                            </p>
                        </div>
                        <ul class="nav nav-tabs d-flex align-items-end mb-3">
                            <li class="nav-item mr-auto">
                                <h3 class="mb-2"> Soluciones</h3>
                            </li>

                            <?php
                            foreach ($_REQUEST['problem']['solutions'] as $index => $solution) { ?>
                                <li class="nav-item">
                                    <a class="nav-link text-danger" data-toggle="tab" href="#solution<?= $index + 1 ?>" data-target="#solution<?= $index + 1 ?>">Solución <?= $index + 1 ?> </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>

                        <div class="tab-content">
                            <?php
                            foreach ($_REQUEST['problem']['solutions'] as $index => $solution) { ?>
                                <div class="tab-pane fade" id="solution<?= $index + 1 ?>">
                                    <p class="mb-1 text-justify tex">
                                        <?= $solution['tex'] ?>
                                    </p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 sidenav">
        </div>
    </div>
    </div>

</body>

</html>