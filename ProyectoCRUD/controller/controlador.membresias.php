<?php
class ControladorMembresia
{
    static public function ctrMostrarMembresia($valor)
    {
        $tabla = "tbl_membresias";
        $respuesta = ModeloMembresia::mdlMostrarMembresias($tabla, $valor);

        return $respuesta;
    }

    static public function crtCrearMembresia($data)
    {
        if (
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[0]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[1]) &&
            preg_match('/^[0-9 ]+$/', $data[2]) &&
            preg_match('/^[-+]?[0-9]+(\.[0-9]+)?$/', $data[3])
        ) {
            $tabla = "tbl_membresias";
            $datos = array(
                "nombre" => $data[0],
                "descripcion" => $data[1],
                "duracion" => $data[2],
                "costo" => $data[3]
            );
            $respuesta = ModeloMembresia::mdlIngresarMembresias($tabla, $datos);

            return $respuesta;
        } else {
            $respuesta = "error controlador";
            return $respuesta;
        }
    }

    static public function ctrEditarMembresia($data)
    {
        if (
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[0]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[1]) &&
            preg_match('/^[0-9 ]+$/', $data[2]) &&
            preg_match('/^[-+]?[0-9]+(\.[0-9]+)?$/', $data[3])
        ) {
            $tabla = "tbl_membresias";

            $datos = array(
                "nombre" => $data[0],
                "descripcion" => $data[1],
                "duracion" => $data[2],
                "costo" => $data[3],
                "id" => $data[4]
            );
            
            $respuesta = ModeloMembresia::mdlEditarMembresias($tabla, $datos);

            return $respuesta;
        } else {
            $respuesta = "error controlador";
            return $respuesta;
        }
    }

    static public function ctrBorrarMembresia($id)
    {
        $tabla = "tbl_membresias";
        $respuesta = ModeloMembresia::mdlBorrarMembresias($tabla, $id);
        return $respuesta;
    }
}
