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

    <!-- Own JS -->
    <script type="text/javascript" src="public/js/tabsCollapse.js"></script>

    <link rel="icon" type="image/png" href="public/img/favicon.png">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="#">
            <img src="public/img/favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Problemath
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container-fluid text-center py-3 pt-md-5">
        <div class="row content">
            <div class="col-sm-3 sidenav">
            </div>
            <div class=" rounded col-sm-6 text-left">
                <h1>PROBLEMA 7</h1>
                <div class="shadow border border-danger rounded p-3">
                    <div class="flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h3 class="mb-2"> Información general</h3>
                        </div>
                        <hr class="mt-0 mb-3" />
                        <div class="d-flex w-100 justify-content-between mb-4">
                            <div class="col-sm-6 p-0">
                                <div class="d-flex w-100 mb-1">
                                    <h5 class="font-italic">Propuesto por: Oscar Ciaurri</h5>
                                </div>
                                <div class="d-flex w-100 mb-1">
                                    <h5 class="font-italic mr-2">Publicado en: Gaceta Matematica </h5>
                                </div>
                                <div class="d-flex w-100 mb-1">
                                    <span class="badge badge-danger mr-1">Análisis real</span>
                                    <span class="badge badge-danger mr-1">Desigualdades</span>
                                    <span class="badge badge-danger mr-1">Combinatoria</span>
                                </div>
                            </div>
                            <div class="col-sm-6 p-0">
                                <div class="d-flex w-100 flex-column justify-content-between">
                                    <div class="mb-2">
                                        <a href="#" class="btn btn-outline-danger btn-block" role="button" aria-pressed="true">
                                            Descargar enunciado <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                    </div>
                                    <div class="mb-2 ">
                                        <a href="#" class="btn btn-outline-danger btn-block" role="button" aria-pressed="true">
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
                                For a positive integer $n$, let $\mathcal{T}$ be the regular tetrahedron in $\mathbb{R}^3$ with vertices $O\:(0, 0, 0)$, $A\:(0, n, n)$, $B\:(n, 0, n)$ and $C\:(n, n, 0)$.
                                Show that the number $N$ of lattice points ($x$, $y$, $z$) (i.e., points with integer coordinates $x,y,z$) lying inside or on the boundary of $\mathcal{T}$ is
                                \[
                                N=\frac{1}{3}(n+1)(n^2+2n+3).
                                \]
                            </p>
                        </div>



                        <ul class="nav nav-tabs d-flex align-items-end mb-3">
                            <li class="nav-item mr-auto">
                                <h3 class="mb-2"> Soluciones</h3>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" data-toggle="tab" href="#solution1" data-target="#solution1">Solución 1 </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" data-toggle="tab" href="#solution2" data-target="#solution2">Solución 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" data-toggle="tab" href="#solution3" data-target="#solution3">Solución 3</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade" id="solution1">
                            <p class="mb-1 text-justify">
                                For a positive integer $n$, let $\mathcal{T}$ be the regular tetrahedron in $\mathbb{R}^3$ with vertices $O\:(0, 0, 0)$, $A\:(0, n, n)$, $B\:(n, 0, n)$ and $C\:(n, n, 0)$.
                                Show that the number $N$ of lattice points ($x$, $y$, $z$) (i.e., points with integer coordinates $x,y,z$) lying inside or on the boundary of $\mathcal{T}$ is
                                \[
                                N=\frac{1}{3}(n+1)(n^2+2n+3).
                                \]
                            </p>
                            </div>
                            <div class="tab-pane fade" id="solution2">
                            <p class="mb-1 text-justify">
                                For a positive integer $n$, let $\mathcal{T}$ be the regular tetrahedron in $\mathbb{R}^3$ with vertices $O\:(0, 0, 0)$, $A\:(0, n, n)$, $B\:(n, 0, n)$ and $C\:(n, n, 0)$.
                                Show that the number $N$ of lattice points ($x$, $y$, $z$) (i.e., points with integer coordinates $x,y,z$) lying inside or on the boundary of $\mathcal{T}$ is
                                \[
                                N=\frac{1}{3}(n+1)(n^2+2n+3).
                                \]
                            </p>
                            </div>
                            <div class="tab-pane fade" id="solution3">
                            <p class="mb-1 text-justify">
                                For a positive integer $n$, let $\mathcal{T}$ be the regular tetrahedron in $\mathbb{R}^3$ with vertices $O\:(0, 0, 0)$, $A\:(0, n, n)$, $B\:(n, 0, n)$ and $C\:(n, n, 0)$.
                                Show that the number $N$ of lattice points ($x$, $y$, $z$) (i.e., points with integer coordinates $x,y,z$) lying inside or on the boundary of $\mathcal{T}$ is
                                \[
                                N=\frac{1}{3}(n+1)(n^2+2n+3).
                                \]
                            </p>
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