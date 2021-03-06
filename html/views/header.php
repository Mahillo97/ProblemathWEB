<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="/">
        <img src="/public/img/portadaarriba.png" class="d-inline-block align-top" alt="">
        Problemath
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="<?= $_SESSION['url'] . ($_SESSION['pag']) ?>"> Búsqueda <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/problemSheet">Hoja de problemas</a>
            </li>
        </ul>
        <div>
            <a href="/admin/login" class="btn btn-outline-dark" role="button" aria-pressed="true">
                Admin <i class="fas fa-user-shield"></i>
            </a>
        </div>
    </div>
</nav>