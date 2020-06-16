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
                inlineMath: [
                    ['$', '$'],
                    ['\\(', '\\)']
                ]
            }
        };
    </script>

    <!-- Own JS -->
    <script type="text/javascript" src="public/js/addProblem.js"></script>
    <script type="text/javascript" src="public/js/figuresLatex.js"></script>

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
                    <h1>RESULTADO BÚSQUEDA</h1>
                    <?php if ($_REQUEST['pages'] > 0) { ?>
                        <nav aria-label="..." class="d-flex align-items-end">
                            <ul class="pagination justify-content-end mb-2">
                                <?php
                                if ($_SESSION['pag'] > 1) { ?>
                                    <li class="page-item ">
                                        <a class="page-link text-danger" href="<?= $_SESSION['url'] . ($_SESSION['pag'] - 1) ?>">Anterior</a>
                                    </li>
                                <?php
                                }
                                ?>

                                <?php
                                if ($_SESSION['pag'] > 2) { ?>
                                    <li class="page-item">
                                        <a class="page-link text-danger" href="<?= $_SESSION['url'] . ($_SESSION['pag'] - 2) ?>"><?= $_SESSION['pag'] - 2 ?></a>
                                    </li>
                                <?php
                                }
                                ?>


                                <?php
                                if ($_SESSION['pag'] > 1) { ?>
                                    <li class="page-item">
                                        <a class="page-link text-danger" href="<?= $_SESSION['url'] . ($_SESSION['pag'] - 1) ?>"><?= $_SESSION['pag'] - 1 ?></a>
                                    </li>
                                <?php
                                }
                                ?>

                                <li class="page-item ">
                                    <a class="page-link bg-danger text-white" href="<?= $_SESSION['url'] . ($_SESSION['pag']) ?>"><?= $_SESSION['pag'] ?></a>
                                </li>

                                <?php
                                if ($_SESSION['pag'] < $_REQUEST['pages']) { ?>
                                    <li class="page-item">
                                        <a class="page-link text-danger" href="<?= $_SESSION['url'] . ($_SESSION['pag'] + 1) ?>"><?= $_SESSION['pag'] + 1 ?></a>
                                    </li>
                                <?php
                                }
                                ?>

                                <?php
                                if ($_SESSION['pag'] < $_REQUEST['pages'] - 1) { ?>
                                    <li class="page-item">
                                        <a class="page-link text-danger" href="<?= $_SESSION['url'] . ($_SESSION['pag'] + 2) ?>"><?= $_SESSION['pag'] + 2 ?></a>
                                    </li>
                                <?php
                                }
                                ?>

                                <?php
                                if ($_SESSION['pag'] < $_REQUEST['pages']) { ?>
                                    <li class="page-item">
                                        <a class="page-link text-danger" href="<?= $_SESSION['url'] . ($_SESSION['pag'] + 1) ?>">Siguiente</a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </nav>
                    <?php
                    }
                    ?>
                </div>
                <?php if ($_REQUEST['pages'] > 0) { ?>

                    <div class="list-group">
                        <?php
                        foreach ($_REQUEST['problemList'] as $problem) { ?>
                            <a href="/problemFile?idProblem=<?= urlencode($problem['id']) ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"> Problema <?= $problem['id'] ?> </h5>
                                    <?php if ((!isset($_SESSION['problemSheet'])) || (!in_array($problem['id'], array_column($_SESSION['problemSheet'], 'id')))) { ?>
                                        <button id="<?= $problem['id'] ?>" class="btn btn-outline-danger addProblem">
                                            Añadir a hoja de problemas <i class="fa fa-plus"></i>
                                        </button>
                                    <?php
                                    } else {
                                    ?>
                                        <button id="<?= $problem['id'] ?>" disabled class="btn btn-danger addedProblem">
                                            Problema ya añadido <i class="fa fa-file"></i>
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="d-flex w-100">
                                    <div class="font-italic mr-2">Propuesto por: <?= $problem['proposer'] ?></div>
                                    <div class="font-italic mr-2">Publicado en: <?= $problem['magazine'] ?> </div>
                                </div>
                                <p class="mb-1 tex">
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
                <?php
                } else {
                ?>

                    <div class="shadow border rounded p-4">
                        <p>No se encontró ningún problema para la búsqueda realizada.</p>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-sm-3 sidenav">
            </div>
        </div>
    </div>

</body>

</html>