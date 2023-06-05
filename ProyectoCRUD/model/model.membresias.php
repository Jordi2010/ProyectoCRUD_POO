<?php
require_once "../config.php";
class ModeloMembresia{

    static public function mdlMostrarMembresias($tabla, $valor){
        $conexion = new config();
        $conexion->conectar();
		if($valor != null){
            
			//$stmt = $conexion->getConnection()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt = $conexion->getConnection()->prepare("call obtenerMembresiaEdit(:id)");
			$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
			$stmt->close();
			$stmt = null;
		}else{
            $stmt = $conexion->getConnection()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();
			$stmt->close();
			$stmt = null;

		}
	}

    static public function mdlIngresarMembresias($tabla, $datos){
		$conexion = new config();
        $conexion->conectar();

		$stmt = $conexion->getConnection()->prepare("INSERT INTO $tabla(nombre, descripcion, duracion, costo) VALUES (:nombre, :descripcion, :duracion, :costo)");
		
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_INT);
		$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error modelo";
		}

		$stmt->close();
		$stmt = null;

	}


    static public function mdlEditarMembresias($tabla, $datos){

		$conexion = new config();
        $conexion->conectar();

		$stmt = $conexion->getConnection()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, duracion = :duracion, costo = :costo WHERE id = :id");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_INT);
		$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_INT);

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

    static public function mdlBorrarMembresias($tabla, $id){
		$conexion = new config();
        $conexion->conectar();
		$stmt = $conexion->getConnection()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
			
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}

		$stmt -> close();
		$stmt = null;

	}
}
