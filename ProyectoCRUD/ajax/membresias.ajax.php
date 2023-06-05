<?php
require_once "../controller/controlador.membresias.php";
require_once "../model/model.membresias.php";

class AjaxMembresias{
    
    public function ajaxObtenerMembresia(){
        $valor = $_GET["id"];
        $respuesta = ControladorMembresia::ctrMostrarMembresia($valor);
        echo json_encode($respuesta);
    }

    public function ajaxMostrarMembresia(){
        $valor = null;
        $respuesta = ControladorMembresia::ctrMostrarMembresia($valor);   
        echo json_encode($respuesta);
    }

    public function ajaxEliminarMembresia(){
        $id = $_GET["id"];
        $respuesta = ControladorMembresia::ctrBorrarMembresia($id);
        echo json_encode($respuesta);
    }

    public function ajaxNuevoMembresia(){
        $data = array($_POST["nuevonombre"],
                      $_POST["nuevodescripcion"],
                      $_POST["nuevoduracion"],
                      $_POST["nuevocosto"]
                    );
        $respuesta = ControladorMembresia::crtCrearMembresia($data);
        echo json_encode($respuesta);
    }

    public function ajaxEditarMembresia(){
        $data = array($_POST["editarnombre"],
        $_POST["editardescripcion"],
        $_POST["editarduracion"],
        $_POST["editarcosto"],
        $_POST["id"]
      );
       
        $respuesta = ControladorMembresia::ctrEditarMembresia($data);
        echo json_encode($respuesta);
    }

}

if (isset($_GET["metodo"])) {
    switch ($_GET["metodo"]) {
        case 'mostrar':
                $Miembro = new AjaxMembresias();
                $Miembro->ajaxMostrarMembresia();
            break;
        case 'obtener':
                $Miembro = new AjaxMembresias();
                $Miembro->ajaxObtenerMembresia();
            break;
        case 'eliminar':
                $Miembro = new AjaxMembresias();
                $Miembro->ajaxEliminarMembresia();
            break;    
    }
    
}

if (isset($_POST["metodo"])) {
    switch($_POST["metodo"]){
        case 'nuevo':
            $Miembro = new AjaxMembresias();
            $Miembro->ajaxNuevoMembresia();
        break;
        case 'editar':
            $Miembro = new AjaxMembresias();
            $Miembro->ajaxEditarMembresia();
        break;        
    } 
}
