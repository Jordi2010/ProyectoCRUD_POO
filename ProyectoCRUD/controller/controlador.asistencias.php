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
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[0]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[1]) &&
            preg_match('/^[0-9 ]+$/', $data[2]) &&
            preg_match('/^[-+]?[0-9]+(\.[0-9]+)?$/', $data[3])
        ) {
            $tabla = "tbl_asistencias";
            $datos = array(
                "nombre" => $data[0],
                "descripcion" => $data[1],
                "duracion" => $data[2],
                "costo" => $data[3]
            );
            $respuesta = ModeloAsistencia::mdlIngresarAsistencias($tabla, $datos);

            return $respuesta;
        } else {
            $respuesta = "error controlador";
            return $respuesta;
        }
    }

  

}
