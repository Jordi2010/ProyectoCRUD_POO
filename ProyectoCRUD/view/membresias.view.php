<?php
session_start();
require("header.php");
?>
<title>Membresias</title>
</head>
<body>
    <?php
    require("navbar.php");
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-3 vh-100 bg-light">
        <?php
        require("../modales/membresias.modal.php")
        ?>
        
            <div class="col-auto col-md-4 py-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalNuevo" id="nuevo">
                    <i class="bi bi-plus-circle-fill"> Nueva Membresia</i>
                </button>
            </div>
            <div class="container-fluid bg-light rounded">
                <div class="container mt-3 p-2 ">
                    <table id="tabla-membresias" class="table table-striped table-bordered table-hover table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Membresia</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Duracion</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- aquí se llenarán los datos de la consulta -->
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Importa DataTables -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script src="../js/membresias.js"></script>
    <?php
    require_once("footer.php")
    ?>
