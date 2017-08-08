<?php

require_once (__DIR__.'/../Modelo/Entregable.php');
if(!empty($_GET['action'])){
    EntregableController::main($_GET['action']);
}else{
   // echo "No se encontro ninguna accion...";
}

/**
 * Created by PhpStorm.
 * User: Equipo13
 * Date: 25/07/2017
 * Time: 1:22 PM
 */
class EntregableController
{
    static function main($action){
        if ($action == "crear"){
            EntregableController::crear();
        }else if ($action == "select"){
            EntregableController::selectEmpresas();
        }else if ($action == "tablaEntregable"){
            EntregableController::tablaEntregable();
        }else if ($action == "editar"){
            EntregableController::editar();
        }else if ($action == "ActivarEntregable"){
            EntregableController::ActivarEntregable();
        }else if ($action == "InactivarEntregable"){
            EntregableController::InactivarEntregable();
        }
    }
    static public function crear(){
        try{
            $arrayPersona = array();
            $arrayPersona['Entregables_Actividad'] = $_POST ['Entregables_Actividad'];
            $arrayPersona['Fecha_Cumplimiento']=$_POST['Fecha_Cumplimiento'];
            $arrayPersona['Fecha_Entrega'] = $_POST['Fecha_Entrega'];
            $arrayPersona['Porcentaje_Entregable']=$_POST['Porcentaje_Entregable'];
            $arrayPersona['Estado'] = $_POST['Estado'];
            $arrayPersona['idLicitacion'] = $_POST['idLicitacion'];
            $Persona = new Entregable($arrayPersona);
            $Persona->insertar();
           header("Location: ../Vista/CreateEntregables.php?respuesta=correcto");
        }catch(Exception $e){
            header("Location: ../Vista/CreateEntregables.php?respuesta=error");
        }
    }
    public function tablaEntregable(){
        $arrEntregable = Entregable::getAll();

        $htmlSelect = "";
        foreach ($arrEntregable as $Entregable) {
            $htmlSelect .= "<tr>";
            $htmlSelect .= "<td hidden  >".$Entregable->getIdEntregables()."</td>";
            $htmlSelect .= "<td>" . $Entregable->getEntregablesActividad() . "</td>";
            $htmlSelect .= "<td>".$Entregable->getFechaCumplimiento()."</td>";
            $htmlSelect .= "<td>".$Entregable->getFechaEntrega()."</td>";
            $htmlSelect .= LicitacionController::printEmpresaContrato($Entregable->getIdLicitacion());
            $htmlSelect .= "<td>".$Entregable->getEstado()."</td>";
            $htmlSelect .= "<td>";
            $htmlSelect .= "<a href='ShowEntregables.php?id=".($_POST['idEntregable']=$Entregable->getIdEntregables())."' type='button' data-toggle='tooltip' title='Ver entregable' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-share'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='UpdateEntregables.php?id=".$Entregable->getIdEntregables()."' type='button' data-toggle='tooltip' title='Actualizar' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            if ($Entregable->getEstado() != 'Activo') {
                $htmlSelect .= "<a href='../Controlador/EntregableController.php?action=ActivarEntregable&idEntregable=".$Entregable->getIdEntregables()."' type='button' data-toggle='tooltip' title='Activar' class='btn docs-tooltip btn-success btn-xs'><i class='glyphicon glyphicon-ok'></i></a>";
            } else {
                $htmlSelect .= "<a href='../Controlador/EntregableController.php?action=InactivarEntregable&idEntregable=".$Entregable->getIdEntregables()."'  type='button' data-toggle='tooltip' title='Inactivar' class='btn docs-tooltip btn-danger btn-xs'><i class='glyphicon glyphicon-remove'></i></a>";
            }
            $htmlSelect .= "</td>";
            $htmlSelect .= "</tr>";
        }

        return  $htmlSelect;
    }
    public function tablaEntregableLicitacion($id){
        $arrEntregable = Entregable::buscarForIdLicitacion($id);

        $htmlSelect = "";
        foreach ($arrEntregable as $arrEntregable) {
            $htmlSelect .= "<tr>";
            $htmlSelect .= "<td hidden  >".$arrEntregable->getIdEntregables()."</td>";
            $htmlSelect .= "<td>" . $arrEntregable->getEntregablesActividad() . "</td>";
            $htmlSelect .= "<td>".$arrEntregable->getFechaCumplimiento()."</td>";
            $htmlSelect .= "<td>".$arrEntregable->getFechaEntrega()."</td>";
            $htmlSelect .= LicitacionController::printEmpresaContrato($arrEntregable->getIdLicitacion());
            $htmlSelect .= "<td>".$arrEntregable->getEstado()."</td>";
            $htmlSelect .= "<td>";
            $htmlSelect .= "<a href='ShowEntregables-Licitacion.php?id=".($_POST['idEntregable']=$arrEntregable->getIdEntregables())."' type='button' data-toggle='tooltip' title='Ver entregable' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-share'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='UpdateEntregables-Licitacion.php?id=".$arrEntregable->getIdEntregables()."' type='button' data-toggle='tooltip' title='Actualizar' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
            $htmlSelect .= "</td>";
            $htmlSelect .= "</tr>";
        }

        return  $htmlSelect;
    }
    static public function buscarID ($id){
        try {
            return Entregable::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../UpdateContratos.php?respuesta=error");
        }
    }
     static public function showCountId($id)
    {
            $arrayEntregables= Entregable::countEntregablesid($id);
            $htmlInput ="<input  placeholder='idContatos_Publicos'  class='validate[required] form-control' type='text'
          readonly  name='idContatos_Publicos' id='idContatos_Publicos' value='".$arrayEntregables["CtnEntregables"]."' >";
            return $htmlInput;

    }
    static public function selectEntregableSeleccionable($id)
    {
        $arrayEntregable = Entregable::getAll();
        $htmlSelect  ="";
        $htmlSelect .="<select name='idEntregables' id='idEntregables' class='form-control' >";
        foreach ($arrayEntregable as $entregable){
            if ($id==$entregable -> getIdEntregables()){
                $htmlSelect .="<option value='".$entregable->getIdEntregables()."' selected>".$entregable->getEntregablesActividad()."</option>";

            } else{
                $htmlSelect .="<option value='".$entregable->getIdEntregables()."'>".$entregable->getEntregablesActividad()."</option>";

            }
        }
        $htmlSelect .="</select>";
        return $htmlSelect;
    }
    static public function selectEntregable()
    {
        $arrayEntregable = Entregable::getAll();
        $htmlSelect  ="";
        $htmlSelect .="<select name='idEntregables' id='idEntregables' class='form-control' >";
        $htmlSelect .="<option>Seleccione</option>";
        foreach ($arrayEntregable as $entregable){
                $htmlSelect .="<option value='".$entregable->getIdEntregables()."' >".$entregable->getEntregablesActividad()."</option>";
        }
        $htmlSelect .="</select>";
        return $htmlSelect;
    }
    static public function editar (){
        try {
            $arrayEntregable = array();
            $arrayEntregable['Entregables_Actividad']=$_POST['Entregables_Actividad'];
            $arrayEntregable['Fecha_Cumplimiento'] = $_POST['Fecha_Cumplimiento'];
            $arrayEntregable['Fecha_Entrega'] = $_POST['Fecha_Entrega'];
            $arrayEntregable['Porcentaje_Entregable'] = $_POST['Porcentaje_Entregable'];
            $arrayEntregable['Estado'] = $_POST['Estado'];
            $arrayEntregable['idLicitacion'] = $_POST['idLicitacion'];
            $arrayEntregable['idEntregables'] = $_POST['idEntregable'];
            $especial = new Entregable($arrayEntregable);
            var_dump($arrayEntregable);
            $especial->editar();
            header("Location: ../Vista/UpdateEntregables.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/UpdateEntregables.php?respuesta=error");
        }

    }
    static public function ActivarEntregable(){
        try {
            $ObjEntregable = Entregable::buscarForId($_GET['idEntregable']);
            $ObjEntregable->setEstado("Activo");
            $ObjEntregable->editar();
           header("Location: ../Vista/AdministrarEntregables.php?respuesta=correcto");
        } catch (Exception $e) {
           header("Location: ../Vista/AdministrarEntregables.php?respuesta=error");
        }
    }
    static public function InactivarEntregable(){
        try {
            $ObjEntregable = Entregable::buscarForId($_GET['idEntregable']);
            $ObjEntregable->setEstado("Inactivo");
            $ObjEntregable->editar();
           header("Location: ../Vista/AdministrarEntregables.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/AdministrarEntregables.php?respuesta=error");
        }
    }
    static public function insertNameEntregable($id){
        $arrayEntregable=Entregable::buscarForId($id);
        $html ="";
        $html .="<td>".$arrayEntregable->getEntregablesActividad()."</td> ";
        return $html;

    }

}