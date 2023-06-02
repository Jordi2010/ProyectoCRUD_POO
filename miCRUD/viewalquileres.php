<?php
session_start();

if($_SESSION['usuario']=== null){
    header('Location:index.php');
}

include_once 'conexion.php';

$conexion = new ConexionPDO($host, $dbname, $usuario, $contrasena);
$conexion->conectar();

$query = "select membresia_miembro.id as id, fecha_fin, miembros.nombre as miembro, miembros.id as id_miembro ,membresias.nombre as membresias, fecha_inicio 
FROM membresia_miembro
inner join miembros on membresia_miembro.id_miembro	= miembros.id
inner join membresias on membresia_miembro.id_membresia	= mebresias.id";
$statement = $conexion->getConnection()->query($query);
$alquileres = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <title>Alquileres</title>
</head>
<body>
<section style="width:800px; margin:0 auto;">
<a href='agregaralquiler.php' class='btn btn-primary'>Nuevo miembro</a>
    <table class="table" >
        <tr>
            <th >ID</th>
            <th>Fin</th>
            <th>Miembro</th>
            <th>id_miembro</th>
            <th>Membresia</th>
            <th>Inicio</th>
            <th >opciones</th>
            <th></th>
        </tr>
        <tbody>
            <?php
        foreach ($membresias_miembros as $membresia_miembro) {
                echo "<tr>";
                echo "<td>".$$membresia_miembro['id']."</td>";
                echo "<td>".$$membresia_miembro['fecha_fin']."</td>";
                echo "<td>".$$membresia_miembro['miembro']."</td>";
                echo "<td>".$$membresia_miembro['id_miembro']."</td>";
                echo "<td>".$$membresia_miembro['membresia']."</td>";
                echo "<td>".$$membresia_miembro['inicio']."</td>";
                echo "<td><form action='editaralquileres.php' method='POST'>
                <input type='text' name='id' value='".$membresia_miembro['id']."' hidden >
               <input type='submit' class='btn btn-success' value='Modificar'>
               </form></td>";

                echo "<td><form action='eliminaralquiler.php' method='POST'>
                        <input type='text' name='id' value='".$alquiler['id']."' hidden >
                       <input type='submit' class='btn btn-danger' value='Eliminar'>
                       </form></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</section>
</body>
</html>