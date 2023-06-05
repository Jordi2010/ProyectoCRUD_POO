<?php
require_once "../config.php";
class ModeloAsistencia{

    static public function mdlMostrarAsistencias($tabla, $valor){
        $conexion = new config();
        $conexion->conectar();
	
            $stmt = $conexion->getConnection()->prepare("SELECT a.checkin, a.checkout, m.nombre FROM tbl_asistencias AS a 
            INNER JOIN tbl_miembros AS m ON a.id_miembro = m.id");
			$stmt -> execute();
			return $stmt -> fetchAll();
			$stmt->close();
			$stmt = null;
		
	}

    static public function mdlIngresarAsistencias($tabla, $datos){
		$conexion = new config();
        $conexion->conectar();

		$stmt = $conexion->getConnection()->prepare("INSERT INTO $tabla(checkin, checkout, id_miembro) VALUES (:checkin, :checkout, :id_miembro)");
		
        $stmt->bindParam(":checkin", $datos["checkin"], PDO::PARAM_STR);
        $stmt->bindParam(":checkout", $datos["checkout"], PDO::PARAM_STR);
		$stmt->bindParam(":id_miembro", $datos["id_miembro"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error modelo";
		}

		$stmt->close();
		$stmt = null;

	}

}
