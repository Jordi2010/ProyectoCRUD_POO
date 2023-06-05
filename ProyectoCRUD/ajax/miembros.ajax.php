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
                      $_POST["nuevodireccion"],
                      $_POST["nuevotelefono"],
                      $_POST["nuevocorreo"],
                      $_POST["nuevofecha"]
                    );
        $respuesta = ControladorMiembro::crtCrearMiembro($data);
        echo json_encode($respuesta);
    }

    public function ajaxEditarMiembro(){
        $data = array($_POST["editarnombre"],
                      $_POST["editardireccion"],
                      $_POST["editartelefono"],
                      $_POST["editarcorreo"],
                      $_POST["editarfecha"],
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
