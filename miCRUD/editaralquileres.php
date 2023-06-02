<?php
session_start();

if($_SESSION['usuario']=== null){
    header('Location:index.php');
}

include_once 'conexion.php';

$conexion = new ConexionPDO($host, $dbname, $usuario, $contrasena);
$conexion->conectar();

$id= $_POST['id'];
//$query = "SELECT * FROM cliente";
$query = "SELECT * FROM miembros";
$statement = $conexion->getConnection()->query($query);
$cliente = $statement->fetchAll(PDO::FETCH_ASSOC);

//$query = "SELECT * FROM peliculas";
$query = "SELECT * FROM membresias";
$statement = $conexion->getConnection()->query($query);
$pelicula = $statement->fetchAll(PDO::FETCH_ASSOC);

//$query = "SELECT * FROM alquiler  WHERE id=:id";
$query = "SELECT * FROM membresia_miembro  WHERE id=:id";
$statement = $conexion->getConnection()->prepare($query);
$statement->bindParam(':id', $id);
$statement->execute();
$alquiler = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <!--<title>Editar Alquileres</title>-->
    <title>Editar miembros</title>
</head>
<body>
<form  action="procesos.php" method="POST">
    <input type="text" name="id"  value="<?php echo $membresia_miembro['id'];?>" hidden >
    <label>Fecha de fin</label>
<input class="form-control form-control-sm" style="width:800px;" type="date" name="fecha" value="<?php echo $membresia_miembro['fecha_fin'];?>">
<br>
<select class="form-control form-control-sm" style="width:800px;" name="miembros">

<?php
     /*foreach($cliente as $clientes){
        if($clientes['id']== $alquiler['id_cliente']){
            echo "<option value='".$clientes['id']."' selected>".$clientes['nombre']."</option>";
        }else{
            echo "<option value='".$clientes['id']."' >".$clientes['nombre']."</option>";
        } 
     }*/

     foreach($miembro as $miembros){
        if($miembros['id']== $membresia_miembro['id_miembro']){
            echo "<option value='".$miembros['id']."' selected>".$miembros['nombre']."</option>";
        }else{
            echo "<option value='".$miembros['id']."' >".$miembros['nombre']."</option>";
        } 
     }
?>
</select>
<br>
<select class="form-control form-control-sm" style="width:800px;" name="pelicula">
<?php
     foreach($membresia as $membresias){
        if($membresias['id']== $membresia_miembro['id_membresia']){
            echo "<option value='".$membresias['id']."' selected>".$membresias['nombre']."</option>";
        }else{
            echo "<option value='".$membresias['id']."' >".$mebresias['nombre']."</option>";
        }
        
     }
?>

</select>
<br>
<input class="form-control form-control-sm" style="width:800px;" type="text" name="fecha_inicio" value="<?php echo $membresia_miembro['fecha_inicio'];?>">
<br>
<input type="submit" value="Editar" class="btn btn-primary">
    </form>
</body>
</html>