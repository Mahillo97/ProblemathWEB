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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- JQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

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
    <script type="text/javascript" src="public/js/sortable.js"></script>

    <link rel="icon" type="image/png" href="public/img/favicon.png">

</head>

<body>

    <!-- JQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

    <?php require 'views/header.php'; ?>

    <div class="container-fluid text-center py-3 pt-md-5">
        <div class="row content">
            <div class="col-sm-3 sidenav">
            </div>
            <div class="col-sm-6 text-left">
                <div class="d-flex w-100 justify-content-between">
                    <h1>HOJA DE PROBLEMAS</h1>
                </div>
                <?php if (!empty($_SESSION['problemSheet'])) { ?>
                    <form name="fProblemSheet" id="fProblemSheet" action="problemSheet">
                        <ul id="sortable" class="list-group">
                            <?php
                            foreach ($_SESSION['problemSheet'] as $index => $problem) { ?>
                                <li id="<?= $index ?>" class="list-group-item flex-column align-items-start">
                                    <div class="row w-100">
                                        <div class="col-sm-1">
                                            <button type="submit" class="btn btn-outline-danger btn-block h-100" name="action" value="delete<?= $index ?>" form="fProblemSheet">
                                                <i class="fa fa-trash-o fa-1x"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-11">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1"> Problema <?= $problem['id'] ?> </h5>
                                            </div>
                                            <div class="d-flex w-100">
                                                <div class="font-italic mr-2">Propuesto por: <?= $problem['proposer'] ?></div>
                                                <div class="font-italic mr-2">Publicado en: <?= $problem['magazine'] ?> </div>
                                            </div>
                                            <?php
                                            foreach ($problem['tags'] as $tag) { ?>
                                                <span class="badge badge-pill badge-danger"><?= $tag ?></span>
                                            <?php
                                            }
                                            ?>
                                            <div class="d-flex w-100">
                                                <div class="font-italic mr-2">Añadir soluciones:</div>
                                            </div>
                                            <div class="d-flex w-100">
                                                <?php
                                                foreach ($problem['solutions'] as $index => $solution) { ?>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox<?= $problem['id'] . $index ?>" value="solution<?= $solution['id'] ?>">
                                                        <label class="form-check-label" for="inlineCheckbox1">Solución <?= $index ?></label>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <div class="d-flex w-100 justify-content-between pt-3 pr-2 pl-2">
                            <div class="w-100">
                                <a id="search" href="<?= $_SESSION['url'] . ($_SESSION['pag']) ?>" class="btn btn-outline-danger btn-block" role="button" aria-pressed="true">
                                    Buscar más problemas <i class="fa fa-search"></i>
                                </a>
                            </div>
                            <div class="w-100">
                                <button id="save" type="submit" class="btn btn-outline-danger btn-block h-100 disabled" name="action" value="save" form="fProblemSheet">
                                    Guardar cambios <i class="fa fa-save"></i>
                                </button>
                            </div>
                            <div class="w-100">
                                <button id="pdf" class="btn btn-outline-danger btn-block h-100" name="action" type="submit" value="pdf">
                                    Descargar hoja de problemas <i class="fa fa-file-pdf-o"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <div class="shadow border border-danger rounded p-4">
                        <p>Actualmente no dispones de ningún problema, prueba a buscar alguno y añádelo.</p>
                    </div>
                <?php
                }
                ?>
                <div class="col-sm-3 sidenav">
                </div>
            </div>
        </div>

</body>

</html>