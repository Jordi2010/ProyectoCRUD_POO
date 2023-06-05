<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?php
                                            echo "Hola " . $_SESSION["usuario"];
                                            ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto dropstart">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="principal.php">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link text-light" href="miembros.view.php">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Miembros
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-light" href="membresias.view.php">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Membresias
                        </a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link text-light" href="asistencias.view.php">
                            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                            Asistencia
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">
                            <span data-feather="layers" class="align-text-bottom"></span>
                            Asignar Membresia
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Administracion</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle" class="align-text-bottom"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                <li class="nav-item">
                        <a class="nav-link text-light" href="usuarios.view.php">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Usuarios
                        </a>
                    </li>
       
                </ul>
            </div>
        </nav>