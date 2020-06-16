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

    <!-- FontAwesome CSS -->
    <script src="https://kit.fontawesome.com/af677276eb.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- MathJax Scripts -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script>
    <script>
        window.MathJax = {
            tex: {
                tags: 'ams',
                inlineMath: [
                    ['$', '$'],
                    ['\\(', '\\)']
                ]
            }
        };
    </script>

    <!--TikzScripts -->

    <link rel="stylesheet" type="text/css" href="http://tikzjax.com/v1/fonts.css">
    <script src="http://tikzjax.com/v1/tikzjax.js"></script>

    <!-- Own CSS -->
    <link rel="stylesheet" href="public/css/problemath.css">

    <!-- Own JS -->
    <script type="text/javascript" src="public/js/tabsCollapse.js"></script>
    <script type="text/javascript" src="public/js/figuresLatex.js"></script>

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
                            <?php if ((!isset($_SESSION['problemSheet'])) || (!in_array($_REQUEST['problem']['id'], array_column($_SESSION['problemSheet'], 'id')))) { ?>
                                <a href="/addProblem?idProblem=<?= urlencode($_REQUEST['problem']['id']) ?>" class="btn btn-outline-danger mb-2" role="button" aria-pressed="true">
                                    Añadir a hoja de problemas <i class="fa fa-plus"></i>
                                </a>
                            <?php
                            } else {
                            ?>
                                <button id="<?= $_REQUEST['problem']['id'] ?>" disabled class="btn btn-danger mb-2 btn-no-pointer">
                                    Problema ya añadido <i class="fa fa-file"></i>
                                </button>
                            <?php
                            }
                            ?>
                        </div>
                        <hr class="mt-0 mb-3" />
                        <div class="d-flex w-100 justify-content-between mb-4">
                            <div class="col-sm-6 p-0">
                                <div class="d-flex w-100 mb-1">
                                    <h5 class="font-italic"> Propuesto por: <?= isset($_REQUEST['problem']['proposer']) ? $_REQUEST['problem']['proposer'] : '-'?></h5>
                                </div>
                                <div class="d-flex w-100 mb-1">
                                    <h5 class="font-italic mr-2">Publicado en: <?= isset($_REQUEST['problem']['magazine']) ? $_REQUEST['problem']['magazine'] : '-'?> </h5>
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
                                        <a target="_blank" rel="noopener noreferrer" href="/problemPDF?idProblem=<?= urlencode($_REQUEST['problem']['id']) ?>&type=State" class="btn btn-outline-danger btn-block" role="button" aria-pressed="true">
                                            Descargar enunciado <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                    </div>
                                    <div class="mb-2 ">
                                        <a target="_blank" rel="noopener noreferrer" href="/problemPDF?idProblem=<?= urlencode($_REQUEST['problem']['id']) ?>&type=Full" class="btn btn-outline-danger btn-block" role="button" aria-pressed="true">
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
                            <p class="mb-1 w-100 tex">
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
                                    <div class="d-flex w-100 mb-1">
                                        <h5 class="font-italic">  Solución enviada por: <?= isset($solution['solver']) ? $solution['solver'] : '-' ?></h5>
                                    </div>
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