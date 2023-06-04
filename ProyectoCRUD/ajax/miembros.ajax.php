<?php
require_once "../controller/controlador.miembros.php";
require_once "../model/model.miembros.php";

class AjaxMiembros{
    
    public function ajaxObtenerMiembro(){
        $valor = $_GET["id"];
        $respuesta = ControladorMiembro::ctrMostrarMiembro($valor);
        echo json_encode($respuesta);
    }

    public function ajaxMostrarMiembro(){
        $valor = null;
        $respuesta = ControladorMiembro::ctrMostrarMiembro($valor);   
        echo json_encode($respuesta);
    }

    public function ajaxEliminarMiembro(){
        $id = $_GET["id"];
        $respuesta = ControladorMiembro::ctrBorrarMiembro($id);
        echo json_encode($respuesta);
    }

    public function ajaxNuevoMiembro(){
        $data = array($_POST["nuevonombre"],
                      $_POST["nuevopassword"],
                      $_POST["nuevoid_roles"],
                      $_POST["nuevoid_status"]
                    );
        $respuesta = ControladorMiembro::crtCrearMiembro($data);
        echo json_encode($respuesta);
    }

    public function ajaxEditarMiembro(){
        $data = array($_POST["editarnombre"],
        $_POST["editarpassword"],
        $_POST["editarid_roles"],
        $_POST["editarid_status"],
        $_POST["id"]
      );
       
        $respuesta = ControladorMiembro::ctrEditarMiembro($data);
        echo json_encode($respuesta);
    }

}

if (isset($_GET["metodo"])) {
    switch ($_GET["metodo"]) {
        case 'mostrar':
                $Miembro = new AjaxMiembros();
                $Miembro->ajaxMostrarMiembro();
            break;
        case 'obtener':
                $Miembro = new AjaxMiembros();
                $Miembro->ajaxObtenerMiembro();
            break;
        case 'eliminar':
                $Miembro = new AjaxMiembros();
                $Miembro->ajaxEliminarMiembro();
            break;    
    }
    
}

if (isset($_POST["metodo"])) {
    switch($_POST["metodo"]){
        case 'nuevo':
            $Miembro = new AjaxMiembros();
            $Miembro->ajaxNuevoMiembro();
        break;
        case 'editar':
            $Miembro = new AjaxMiembros();
            $Miembro->ajaxEditarMiembro();
        break;        
    } 
}
