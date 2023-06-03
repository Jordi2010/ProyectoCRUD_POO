<?php
session_start();
include_once('config.php');
include_once('login.php');


$conexion = new config();
$conexion->conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = htmlentities(addslashes($_POST['username']));    
    $hash = md5($_POST["password"]);
    $login = new Login($conexion);
    echo $hash;
    if ($login->login($user, $hash)) {
        $_SESSION["usuario"] = $_POST["username"];
        header("location: view/principal.php");
        exit;
    } else {
        $error_message = "Nombre de usuario y/o contraseña incorrectos.";
    }
}
$conexion->desconectar();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="index.php" method="post">
                                <h3 class="mb-5">Inicio de sesión</h3>

                                <div class="form-outline mb-4">
                                    <input type="text" id="usuario" name="username" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX-2">Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Iniciar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>