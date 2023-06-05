<?php
class ControladorMiembro
{
    static public function ctrMostrarMiembro($valor)
    {
        $tabla = "tbl_miembros";
        $respuesta = ModeloMiembro::mdlMostrarMiembros($tabla, $valor);

        return $respuesta;
    }

    static public function crtCrearMiembro($data)
    {
        if (
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[0]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/', $data[1]) &&
            preg_match('/^[0-9 ]+$/', $data[2]) &&
            filter_var($data[3], FILTER_VALIDATE_EMAIL) &&
            $data[4] != null
        ) {
            $tabla = "tbl_miembros";
            $datos = array(
                "nombre" => $data[0],
                "direccion" => $data[1],
                "telefono" => $data[2],
                "correo" => $data[3],
                "fecha_registro" => $data[4],
            );
            $respuesta = ModeloMiembro::mdlIngresarMiembros($tabla, $datos);

            return $respuesta;
        } else {
            $respuesta = "error controlador";
            return $respuesta;
        }
    }

    static public function ctrEditarMiembro($data)
    {
        if (
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[0]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/', $data[1]) &&
            preg_match('/^[0-9 ]+$/', $data[2]) &&
            filter_var($data[3], FILTER_VALIDATE_EMAIL) &&
            $data[4] != null
        ) {
            $tabla = "tbl_miembros";

            $datos = array(
                "nombre" => $data[0],
                "direccion" => $data[1],
                "telefono" => $data[2],
                "correo" => $data[3],
                "fecha_registro" => $data[4],
                "id" => $data[5]
            );
            
            $respuesta = ModeloMiembro::mdlEditarMiembros($tabla, $datos);

            return $respuesta;
        } else {
            $respuesta = "error controlador";
            return $respuesta;
        }
    }

    static public function ctrBorrarMiembro($id)
    {
        $tabla = "tbl_miembros";
        $respuesta = ModeloMiembro::mdlBorrarMiembros($tabla, $id);
        return $respuesta;
    }
}
