<?php
require_once "../config.php";
class ModeloMiembro{

    static public function mdlMostrarMiembros($tabla, $valor){
        $conexion = new config();
        $conexion->conectar();
		if($valor != null){
            
			//$stmt = $conexion->getConnection()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt = $conexion->getConnection()->prepare("call obtenerMiembrosEdit(:id)");
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

		$stmt = $conexion->getConnection()->prepare("INSERT INTO $tabla(miembro, password, id_roles, status) VALUES (:miembro, :password, :id_roles, :status)");
		
        $stmt->bindParam(":miembro", $datos["miembro"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id_roles", $datos["id_roles"], PDO::PARAM_INT);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);

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

		$stmt = $conexion->getConnection()->prepare("UPDATE $tabla SET miembro = :miembro, password = :password, id_roles = :id_roles, status = :status WHERE id = :id");

		$stmt->bindParam(":miembro", $datos["miembro"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id_roles", $datos["id_roles"], PDO::PARAM_INT);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_INT);

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
