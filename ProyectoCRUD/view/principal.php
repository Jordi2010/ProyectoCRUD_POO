<?php
session_start();
require("header.php");
?>
  <title>Document</title>
</head>

<body>

<?php
require("navbar.php");

?>

 

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 vh-100">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="container-fluid shadow p-2 mb-2 mt-3 bg-body rounded">
                    <p class="text-center fs-2 w-light">Estadisticas</p>
                    <div class="row row-cols-1 row-cols-md-4 g-3">

                        <div class="col-3">
                            <div class="card text-white bg-primary">
                                <div class="card-header">Miembros Registrados</div>
                                <div class="card-body">
                                    <div class="row">
                                        <i class="bi bi-people-fill fs-1 col-2"></i>
                                        <h5 class="card-title fs-1 col-5">+320</h5>
                                    </div>
                                    <p class="card-text fs-2">Totales</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="col card text-white bg-secondary">
                                <div class="card-header">Miembros Activos</div>
                                <div class="card-body">
                                    <div class="row">
                                        <i class="bi bi-people-fill fs-1 col-2"></i>
                                        <h5 class="card-title fs-1 col-5">+89</h5>
                                    </div>
                                    <p class="card-text fs-2">Del año anterior.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="col card text-white bg-success">
                                <div class="card-header">Recaudado</div>
                                <div class="card-body">
                                    <div class="row">
                                        <i class="bi bi-people-fill fs-1 col-2"></i>
                                        <h5 class="card-title fs-1 col-5">+10</h5>
                                    </div>
                                    <p class="card-text fs-2">Del mes anterior.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="col card text-white bg-success">
                                <div class="card-header">Asistencias Registradas</div>
                                <div class="card-body">
                                    <div class="row">
                                        <i class="bi bi-people-fill fs-1 col-2"></i>
                                        <h5 class="card-title fs-1 col-5">+10</h5>
                                    </div>
                                    <p class="card-text fs-2">Del mes anterior.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>


        <div class="col-md-12">
            <div class="container-fluid shadow p-2 mb-2 mt-3 bg-body rounded">
            <p class="text-center fs-2 w-light">Graficos</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Membresias Vendidas por mes</h5>
                        </div>
                        <div class="card-body">
                        <canvas id="myChart1"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Membresias populares</h5>
                        </div>
                        <div class="card-body">
                        <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>
      
            <div class="col-md-12">
            <div class="container-fluid shadow p-2 mb-2 mt-3 bg-body rounded">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Tabla de datos</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Columna 1</th>
                                        <th>Columna 2</th>
                                        <th>Columna 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Dato 1</td>
                                        <td>Dato 2</td>
                                        <td>Dato 3</td>
                                    </tr>
                                    <tr>
                                        <td>Dato 4</td>
                                        <td>Dato 5</td>
                                        <td>Dato 6</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </main>


<?php
require_once("footer.php")
?>
