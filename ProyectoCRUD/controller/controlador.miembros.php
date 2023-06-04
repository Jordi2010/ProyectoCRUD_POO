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
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[1]) &&
            preg_match('/^[0-9 ]+$/', $data[2]) &&
            preg_match('/^[0-9 ]+$/', $data[3])
        ) {
            $tabla = "tbl_miembros";
            $datos = array(
                "miembro" => $data[0],
                "password" => $data[1],
                "id_roles" => $data[2],
                "status" => $data[3]
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
            preg_match('/^[0-9 ]+$/', $data[3])
        ) {
            $tabla = "tbl_miembros";

            $datos = array(
                "miembro" => $data[0],
                "password" => $data[1],
                "id_roles" => $data[2],
                "status" => $data[3],
                "id" => $data[4]
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
