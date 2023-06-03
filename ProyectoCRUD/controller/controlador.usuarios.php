<?php
class ControladorUsuario
{
    static public function ctrMostrarUsuario($valor)
    {
        $tabla = "tbl_usuarios";
        $respuesta = ModeloUsuario::mdlMostrarUsuarios($tabla, $valor);

        return $respuesta;
    }

    static public function crtCrearUsuario($data)
    {
        if (
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[0]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[1]) &&
            preg_match('/^[0-9 ]+$/', $data[2]) &&
            preg_match('/^[0-9 ]+$/', $data[3])
        ) {
            $tabla = "tbl_usuarios";
            $datos = array(
                "usuario" => $data[0],
                "password" => $data[1],
                "id_roles" => $data[2],
                "status" => $data[3]
            );
            $respuesta = ModeloUsuario::mdlIngresarUsuarios($tabla, $datos);

            return $respuesta;
        } else {
            $respuesta = "error controlador";
            return $respuesta;
        }
    }

    static public function ctrEditarUsuario($data)
    {
        if (
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $data[0]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/', $data[1]) &&
            preg_match('/^[0-9 ]+$/', $data[2]) &&
            preg_match('/^[0-9 ]+$/', $data[3])
        ) {
            $tabla = "tbl_usuarios";

            $datos = array(
                "usuario" => $data[0],
                "password" => $data[1],
                "id_roles" => $data[2],
                "status" => $data[3],
                "id" => $data[4]
            );
            
            $respuesta = ModeloUsuario::mdlEditarUsuarios($tabla, $datos);

            return $respuesta;
        } else {
            $respuesta = "error controlador";
            return $respuesta;
        }
    }

    static public function ctrBorrarUsuario($id)
    {
        $tabla = "tbl_usuarios";
        $respuesta = ModeloUsuario::mdlBorrarUsuarios($tabla, $id);
        return $respuesta;
    }
}
