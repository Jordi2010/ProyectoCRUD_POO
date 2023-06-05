<?php
class ControladorAsistencia
{
    static public function ctrMostrarAsistencia($valor)
    {
        $tabla = "tbl_asistencias";
        $respuesta = ModeloAsistencia::mdlMostrarAsistencias($tabla, $valor);

        return $respuesta;
    }

    static public function crtCrearAsistencia($data)
    {
        if (
            $data[0] != null &&
            $data[1] != null &&
            preg_match('/^[0-9 ]+$/', $data[2]) 
        ) {
            $tabla = "tbl_asistencias";
            $datos = array(
                "checkin" => $data[0],
                "checkout" => $data[1],
                "id_miembro" => $data[2]
            );
            $respuesta = ModeloAsistencia::mdlIngresarAsistencias($tabla, $datos);

            return $respuesta;
        } else {
            $respuesta = "error controlador";
            return $respuesta;
        }
    }

  

}
