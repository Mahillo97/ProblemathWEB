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

    <link rel="icon" type="image/png" href="/public/img/favicon.png">

    <!-- Own CSS -->
    <link href="/public/css/problemathSignIn.css" rel="stylesheet">

</head>

<body>

    <?php require 'views/header.php'; ?>
    <div class="text-center background">
        <div class="text-center container">
            <form class="form-signin" action="login" method="POST">
                <img class="mb-4" src="/public/img/admin.png" alt="">
                <h1 class="h3 mb-3 font-weight-normal">Ingrese sus credenciales</h1>
                <?php if (isset($_REQUEST['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$_REQUEST['error']?>
                    </div>
                <?php
                }
                ?>
                <label for="inputUser" class="sr-only">Usuario</label>
                <input type="text" id="inputUser" name="user" class="form-control" placeholder="Usuario" required autofocus>
                <label for="inputPassword" class="sr-only">Contraseña</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
            </form>
        </div>
    </div>

</body>

</html>