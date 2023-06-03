<?php
require_once "../controller/controlador.usuarios.php";
require_once "../model/model.usuarios.php";

class AjaxUsuarios{
    

    public function ajaxObtenerUsuario(){
        $valor = $_GET["id"];
        $respuesta = ControladorUsuario::ctrMostrarUsuario($valor);
        echo json_encode($respuesta);
    }

    public function ajaxMostrarUsuario(){
        $valor = null;
        $respuesta = ControladorUsuario::ctrMostrarUsuario($valor);   
        echo json_encode($respuesta);
    }

    public function ajaxEliminarUsuario(){
        $id = $_GET["id"];
        $respuesta = ControladorUsuario::ctrBorrarUsuario($id);
        echo json_encode($respuesta);
    }

    public function ajaxNuevoUsuario(){
        $data = array($_POST["nuevonombre"],
                      $_POST["nuevopassword"],
                      $_POST["nuevoid_roles"],
                      $_POST["nuevoid_status"]
                    );
        $respuesta = ControladorUsuario::crtCrearUsuario($data);
        echo json_encode($respuesta);
    }

    public function ajaxEditarUsuario(){
        $data = array($_POST["editarnombre"],
        $_POST["editarpassword"],
        $_POST["editarid_roles"],
        $_POST["editarid_status"],
        $_POST["id"]
      );
       
        $respuesta = ControladorUsuario::ctrEditarUsuario($data);
        echo json_encode($respuesta);
    }

}

if (isset($_GET["metodo"])) {
    switch ($_GET["metodo"]) {
        case 'mostrar':
                $Usuario = new AjaxUsuarios();
                $Usuario->ajaxMostrarUsuario();
            break;
        case 'obtener':
                $Usuario = new AjaxUsuarios();
                $Usuario->ajaxObtenerUsuario();
            break;
        case 'eliminar':
                $Usuario = new AjaxUsuarios();
                $Usuario->ajaxEliminarUsuario();
            break;    
    }
    
}

if (isset($_POST["metodo"])) {
    switch($_POST["metodo"]){
        case 'nuevo':
            $Usuario = new AjaxUsuarios();
            $Usuario->ajaxNuevoUsuario();
        break;
        case 'editar':
            $Usuario = new AjaxUsuarios();
            $Usuario->ajaxEditarUsuario();
        break;        
    } 
}


