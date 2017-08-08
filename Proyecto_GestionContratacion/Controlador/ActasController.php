<?php

require_once (__DIR__.'/../Modelo/Actas.php');
if(!empty($_GET['action'])){
    ActasController::main($_GET['action']);
}else{

}
class ActasController
{
    static function main($action){
        if ($action == "crear"){
            ActasController::crear();
        }else if($action == "editar"){
            ActasController::editar();
        }else if($action == "EiminarActas"){
            ActasController::eliminar();
        }
    }

    static public function crear(){
        try{
            $arrayActas = array();
            $arrayActas['Fecha'] = $_POST['Fecha'];
            $arrayActas['Hora'] = $_POST['Hora'];
            $arrayActas['Lugar_Reunion'] = $_POST['Lugar_Reunion'];
            $arrayActas['Puntos_Tratados'] = $_POST['Puntos_Tratados'];
            $arrayActas['Acuerdos_Tomados'] = $_POST['Acuerdos_Tomados'];
            $arrayActas['Observaciones']= $_POST['Observaciones'];
            $arrayActas['idPersona'] = $_POST['idPersona'];
            $Actas = new Actas($arrayActas);
            $Actas->insertar();
            header("Location: ../Vista/CreateActas.php?respuesta=correcto");
        }catch (Exception $w){
            header("Location: ../Vista/CreateActas.php?respuesta=error");

        }
    }
    static public function eliminar($id){
        try {
            $id = $_GET['idActas'];
            $Actas = new Actas();
            $Actas->eliminar($id);
            header("Location: ../Vista/AdministrarActas.php?=correcto");
        }catch (Exception $e){
            header("Location: ../Vista/AdministrarActas.php?=error");

        }
    }
    static  public function tablaActas(){
        $arrActas = Actas::getAll();
        $htmlSelect = "";
        foreach ($arrActas as $Actas) {
            $htmlSelect .= "<tr>";
            $htmlSelect .= "<td  hidden  >".$Actas->getIdRegistroActas()."</td>";
            $htmlSelect .= "<td>" . $Actas->getFecha() . "</td>";
            $htmlSelect .= "<td>".$Actas->getHora()."</td>";
            $htmlSelect .= "<td>".$Actas->getLugarReunion()."</td>";
            $htmlSelect .= "<td>";
            $htmlSelect .= "<a href='ShowActas.php?id=".$Actas->getIdRegistroActas()."' type='button' data-toggle='tooltip' title='Ver Actas' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-share'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='UpdateActas.php?id=".$Actas->getIdRegistroActas()."' type='button' data-toggle='tooltip' title='Actualizar' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='../Controlador/ActasController.php?action=EiminarActas&idActas=".$Actas->getIdRegistroActas()."' type='button' data-toggle='tooltip' title='EliminarActas' class='btn docs-tooltip btn-danger   btn-xs'><i class='glyphicon glyphicon-trash'></i></a>";
            $htmlSelect .= "</td>";
        }
        $htmlSelect .= "</tr>";
        return  $htmlSelect;
    }

    static public function buscarID($id){
        try {
            return Actas::buscarForId($id);
        } catch (Exception $e) {
            echo "Error en Actas controller";
        }
    }

    static public function editar (){
        try {
            $arrayActas = array();
            $arrayActas['Fecha']=$_POST['Fecha'];
            $arrayActas['Hora'] = $_POST['Hora'];
            $arrayActas['Lugar_Reunion'] = $_POST['Lugar_Reunion'];
            $arrayActas['Puntos_Tratados'] = $_POST['Puntos_Tratados'];
            $arrayActas['Acuerdos_Tomados'] = $_POST['Acuerdos_Tomados'];
            $arrayActas['Observaciones'] = $_POST['Observaciones'];
            $arrayActas['idPersona'] = $_POST['idPersona'];
            $arrayActas['idRegistro_Actas'] =$_POST['idRegistro_Actas'];
            $Actas = new Actas($arrayActas);
            $Actas->editar();
            header("Location: ../Vista/UpdateActas.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/UpdateActas.php?respuesta=error");
        }
    }

}