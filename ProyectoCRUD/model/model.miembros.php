<?php
require_once "../config.php";
class ModeloMiembro{

    static public function mdlMostrarMiembros($tabla, $valor){
        $conexion = new config();
        $conexion->conectar();
		if($valor != null){
            
			//$stmt = $conexion->getConnection()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt = $conexion->getConnection()->prepare("SELECT * FROM $tabla WHERE id = :id");
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

    static public function mdlIngresarMiembros($tabla, $datos){
		$conexion = new config();
        $conexion->conectar();

		$stmt = $conexion->getConnection()->prepare("INSERT INTO $tabla(nombre, direccion, telefono, correo, fecha_registro) VALUES (:nombre, :direccion, :telefono, :correo, :fecha_registro)");
		
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error modelo";
		}

		$stmt->close();
		$stmt = null;
	}

    static public function mdlEditarMiembros($tabla, $datos){

		$conexion = new config();
        $conexion->conectar();

		$stmt = $conexion->getConnection()->prepare("UPDATE $tabla SET nombre = :nombre, direccion = :direccion, telefono = :telefono, correo = :correo, fecha_registro = :fecha_registro WHERE id = :id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

    static public function mdlBorrarMiembros($tabla, $id){
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
