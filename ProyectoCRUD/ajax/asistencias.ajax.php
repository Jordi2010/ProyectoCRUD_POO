<?php
require_once "../controller/controlador.asistencias.php";
require_once "../model/model.asistencias.php";

class AjaxAsistencias{
    


    public function ajaxMostrarAsistencia(){
        $valor = null;
        $respuesta = ControladorAsistencia::ctrMostrarAsistencia($valor);   
        echo json_encode($respuesta);
    }



    public function ajaxNuevoAsistencia(){
        $data = array($_POST["nuevocheckin"],
                      $_POST["nuevocheckout"],
                      $_POST["nuevoid_miembro"]
                    );
        $respuesta = ControladorAsistencia::crtCrearAsistencia($data);
        echo json_encode($respuesta);
    }



}

if (isset($_GET["metodo"])) {
    switch ($_GET["metodo"]) {
        case 'mostrar':
                $Asistencia = new AjaxAsistencias();
                $Asistencia->ajaxMostrarAsistencia();
            break;  
    }
    
}

if (isset($_POST["metodo"])) {
    switch($_POST["metodo"]){
        case 'nuevo':
            $Asistencia = new AjaxAsistencias();
            $Asistencia->ajaxNuevoAsistencia();
        break;
       
    } 
}
