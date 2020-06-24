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

    <!-- Own JS -->
    <script type="text/javascript" src="public/js/addTags.js"></script>

    <link rel="icon" type="image/png" href="public/img/favicon.png">

</head>

<body>

    <?php require 'views/header.php'; ?>

    <div class="container-fluid text-center py-3 pt-md-5">
        <div class="row content">
            <div class="col-sm-3 sidenav">
            </div>
            <div class=" rounded col-sm-6 text-left">
                <img class="mx-auto d-block mb-4" src="/public/img/portadamedio.png" alt="">
                <div class="shadow border border-primary rounded p-4">

                    <form name="fProblems" id="fProblems" action="search">
                        <div class="form-group row">
                            <label for="auxTags" class="col-sm-2 col-form-label">Etiquetas</label>
                            <div class="col-sm-10">
                                <input type="text" name="auxTags" class="form-control" id="auxTags">
                                <input type="hidden" name="tags" class="form-control">
                                <div class="d-flex w-100 container">
                                    <div id="tagList" class="row">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prop" class="col-sm-2 col-form-label">Proponente</label>
                            <div class="col-sm-10">
                                <input type="text" name="prop" class="form-control" id="prop">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mag" class="col-sm-2 col-form-label">Revista</label>
                            <div class="col-sm-10">
                                <input type="text" name="mag" class="form-control" id="mag">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" value="Buscar">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3 sidenav">
            </div>
        </div>
    </div>

</body>

</html>