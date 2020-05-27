<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
            <img src="/public/img/favicon.png" alt="" height="40">
            <div class="sidebar-brand-text mx-3">PM Admin </div>
        </a>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Problem Management
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="uploadProblem" aria-expanded="true">
            <i class="fa fa-fw fa-file-upload"></i>
            <span>Upload Problem</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Management
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="newAdmin" aria-expanded="true">
            <i class="fas fa-user-plus"></i>
            <span>New Admin</span>
        </a>
    </li>

    <div class="mt-auto">
        <!-- Heading -->
        <div class="sidebar-heading">
            Logout
        </div>

        <li class="nav-item">
            <a class="nav-link" href="exit" aria-expanded="true">
                <i class="fas fa-sign-out-alt"></i>
                <span>Exit</span>
            </a>
        </li>
    </div>



</ul>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>