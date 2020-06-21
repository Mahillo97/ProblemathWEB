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

    <!-- Own CSS-->
    <link href="/public/css/dashboard.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/public/img/portadaarriba.png">

    <!-- Own JS -->
    <script type="text/javascript" src="/public/js/showFilename.js"></script>
    <script type="text/javascript" src="/public/js/modifyFormSolutions.js"></script>

</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require 'views/admin/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Borrar problema</h1>
                    </div>
                    <?php if (isset($_REQUEST['success'])) { ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_REQUEST['success'] ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php if (isset($_REQUEST['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_REQUEST['error'] ?>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="border border-black rounded mx-auto p-4" style="width: 70%;">

                        <form name="fRemoveProblem" id="fRemoveProblem" action="removeProblem" method="POST">

                            <div class="row">
                                <h2 class="h3 px-3 text-gray-800">Datos problema</h2>
                            </div>
                            <hr class="mt-0 mb-3">

                            <div class="form-group row">
                                <label for="problemId" class="col-sm-2 col-form-label">ID del problema</label>
                                <div class="col-sm-10">
                                    <input type="text" name="problemId" class="form-control" id="problemId">
                                </div>
                            </div>

                            <div id="buttonsRow" class="form-group row d-flex justify-content-between">
                                <div class="px-3">
                                    <button type="submit" class="btn btn-primary btn-danger" value="Buscar">Borrar</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
</body>

</html>