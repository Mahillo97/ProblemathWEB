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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="public/css/problemath.css" > -->

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
            <div class="col-sm-6 text-left">
                <div class="d-flex w-100 justify-content-between">
                    <h1>PROBLEM LIST</h1>
                    <nav aria-label="..." class="d-flex align-items-end">
                        <ul class="pagination justify-content-end mb-2">
                            <?php
                            if ($_REQUEST['pag'] > 1) { ?>
                                <li class="page-item ">
                                    <a class="page-link text-danger" href="<?= $_REQUEST['url'] . ($_REQUEST['pag'] - 1) ?>">Anterior</a>
                                </li>
                            <?php
                            }
                            ?>

                            <?php
                            if ($_REQUEST['pag'] > 2) { ?>
                                <li class="page-item">
                                    <a class="page-link text-danger" href="<?= $_REQUEST['url'] . ($_REQUEST['pag'] - 2) ?>"><?= $_REQUEST['pag'] - 2 ?></a>
                                </li>
                            <?php
                            }
                            ?>


                            <?php
                            if ($_REQUEST['pag'] > 1) { ?>
                                <li class="page-item">
                                    <a class="page-link text-danger" href="<?= $_REQUEST['url'] . ($_REQUEST['pag'] - 1) ?>"><?= $_REQUEST['pag'] - 1 ?></a>
                                </li>
                            <?php
                            }
                            ?>

                            <li class="page-item ">
                                <a class="page-link bg-danger text-white" href="<?= $_REQUEST['url'] . ($_REQUEST['pag']) ?>"><?= $_REQUEST['pag'] ?></a>
                            </li>

                            <?php
                            if ($_REQUEST['pag'] < $_REQUEST['pages']) { ?>
                                <li class="page-item">
                                    <a class="page-link text-danger" href="<?= $_REQUEST['url'] . ($_REQUEST['pag'] + 1) ?>"><?= $_REQUEST['pag'] + 1 ?></a>
                                </li>
                            <?php
                            }
                            ?>

                            <?php
                            if ($_REQUEST['pag'] < $_REQUEST['pages'] - 1) { ?>
                                <li class="page-item">
                                    <a class="page-link text-danger" href="<?= $_REQUEST['url'] . ($_REQUEST['pag'] + 2) ?>"><?= $_REQUEST['pag'] + 2 ?></a>
                                </li>
                            <?php
                            }
                            ?>

                            <?php
                            if ($_REQUEST['pag'] < $_REQUEST['pages']) { ?>
                                <li class="page-item">
                                    <a class="page-link text-danger" href="<?= $_REQUEST['url'] . ($_REQUEST['pag'] + 1) ?>">Siguiente</a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="list-group">
                    <?php
                    foreach ($_REQUEST['problemList'] as $problem) { ?>

                        <a href="/problemFile?idProblem=<?= $problem['id'] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"> Problema <?= $problem['id'] ?> </h5>
                            </div>
                            <div class="d-flex w-100">
                                <div class="font-italic mr-2">Propuesto por: <?= $problem['proposer'] ?></div>
                                <div class="font-italic mr-2">Publicado en: <?= $problem['magazine'] ?> </div>
                            </div>
                            <p class="mb-1">
                                <?= $problem['tex'] ?>
                            </p>
                            <?php
                            foreach ($problem['tags'] as $tag) { ?>
                                <span class="badge badge-pill badge-danger"><?= $tag ?></span>
                            <?php
                            }
                            ?>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-3 sidenav">
            </div>
        </div>
    </div>

</body>

</html>