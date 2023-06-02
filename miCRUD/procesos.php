<?php
session_start();

if($_SESSION['usuario']=== null){
    header('Location:index.php');
}

include_once 'conexion.php';

$conexion = new ConexionPDO($host, $dbname, $usuario, $contrasena);
$conexion->conectar();

$opcion= $_POST['opcion'];
$fecha= $_POST['fecha'];
$cliente= $_POST['cliente'];
$pelicula= $_POST['pelicula'];
$costo= $_POST['costo'];
$id= $_POST['id'];

if( $opcion== 1)
{
    try {
        $query = "INSERT INTO alquiler (fechaEntrega, id_cliente, id_pelicula,costo) 
        VALUES (:fecha, :cliente, :pelicula, :costo)";
        $statement = $conexion->getConnection()->prepare($query);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':cliente', $cliente);
        $statement->bindParam(':pelicula', $pelicula);
        $statement->bindParam(':costo', $costo);
        $statement->execute();

        // Redireccionar o mostrar un mensaje de éxito
        header("Location: viewalquileres.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al insertar los datos: " . $e->getMessage();
    }

$conexion->desconectar();
}else {
    try {
        $query = "UPDATE membresia_miembro 
        SET fecha_fin=:fin, id_miembro=:miembro, id_membresia=:membresia,fecha_inicio=:inicio 
        WHERE id=:id";
        $statement = $conexion->getConnection()->prepare($query);
        $statement->bindParam(':fin', $fin);
        $statement->bindParam(':cliente', $miembro);
        $statement->bindParam(':pelicula', $membresia);
        $statement->bindParam(':inicio', $inicio);
        $statement->bindParam(':id', $id);
        $statement->execute();

        // Redireccionar o mostrar un mensaje de éxito
        header("Location: viewalquileres.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al insertar los datos: " . $e->getMessage();
    }

$conexion->desconectar();
}
?>
