<?php

require_once (__DIR__.'/../Modelo/Licitacion.php');

if(!empty($_GET['action'])){
    LicitacionController::main($_GET['action']);
}else{
   // echo "No se encontro ninguna accion...";
}
class LicitacionController
{
    static function main($action)
    {
        if ($action == "crear") {
            LicitacionController::crear();
        }else if ($action == "tablaEmpresa"){
            LicitacionController::tablaLicitacion();
        }else if ($action == "editar"){
            LicitacionController::editar();
        }else if ($action == "ActivarLicitacion"){
            LicitacionController::ActivarLicitacion();
        }else if ($action == "InactivarLicitacion"){
            LicitacionController::InactivarLicitacion();
        }

    }


    static public function crear(){
        try{
            $arrayPersona = array();
            $arrayPersona['Fecha_firma_contrato'] = $_POST ['Fecha_firma_contrato'];
            $arrayPersona['Ejecucion_Contrato']=$_POST['Ejecucion_Contrato'];
            $arrayPersona['Plazo_Ejecucion_Contrato'] = $_POST['Plazo_Ejecucion_Contrato'];
            $arrayPersona['Calificacion']=$_POST['Calificacion'];
            $arrayPersona['Estado'] = $_POST['Estado'];
            $arrayPersona['idPersona'] = $_POST['idPersona'];
            $arrayPersona['idEmpresas'] = $_POST['idEmpresas'];
            $arrayPersona['idContatos_Publicos'] = $_POST['idContatos_Publicos'];
            $Persona = new Licitacion($arrayPersona);
            $Persona->insertar();
            var_dump($arrayPersona);
           header("Location: ../Vista/CreateLicitacion.php?respuesta=correcto");

        }catch(Exception $e){
            header("Location: ../Vista/CreateLicitacion.php?respuesta=error");
        }
    }

    static public function selectLicitacion(){

        $arrayLicitacion = Licitacion::getAll();
        $htmlSelect  ="";
        $htmlSelect .="<select name='idLicitacion' id='idLicitacion' class='validate[required] form-control'>";
        $htmlSelect .="<option value=''>Seleccione</option>";
        foreach ($arrayLicitacion as $contratos){
            $htmlSelect .="<option value='".$contratos->getIdLicitacion()."' id='".$contratos->getIdLicitacion()."'>".$contratos->getIdLicitacion()."</option>";
        }
        $htmlSelect .="</select>";
        return $htmlSelect;
        

    }
    static public function selectEmpresaContrato(){
            $arrayLicitacion = Licitacion::getAllActivos();
            $htmlSelect  ="";
            $htmlSelect .="<select name='idLicitacion' id='idLicitacion' class='form-control'>";
            $htmlSelect .="<option value=''>Seleccione</option>";
            foreach ($arrayLicitacion as $contratos) {
                $arrayEmpresas = EmpresaController::buscarID($contratos->getIdEmpresas());
                $arrayContratos = ContratosController::buscarID($contratos->getIdContatosPublicos());
                $htmlSelect .= "<option value='" . $contratos->getIdLicitacion() . "' id='" . $contratos->getIdLicitacion() . "'>Estado Contrato: " . $arrayContratos->getEstado() . " Empresa: " . $arrayEmpresas->getRazonsocialContratista() . "</option>";
            }
            $htmlSelect .="</select>";
            return $htmlSelect;
    }
    static public function printLicitacion($id){
    $arrarLicitacion = Licitacion::buscarForId($id);

    $htmlPrint =EmpresaController::printEmpresaNombre($arrarLicitacion->getIdEmpresas());

    return $htmlPrint;
}
    static public function printLicitacionName($id){
        $arrarLicitacion = Licitacion::buscarForId($id);

        $htmlPrint =EmpresaController::printEmpresaNombre($arrarLicitacion->getIdEmpresas());

        return $htmlPrint;
    }

    static public function printLicitacionContrato($id){
        $arrarLicitacion = Licitacion::buscarForId($id);

        $htmlPrint =EmpresaController::printEmpresa($arrarLicitacion->getIdEmpresas());

        return $htmlPrint;
    }

    static public function Documento($id){
        $arrarLicitacion = Licitacion::buscarForId($id);
        // var_dump($arrarLicitacion);
        $htmlPrint =EmpresaController::printDocumetno($arrarLicitacion->getIdEmpresas());
        return $htmlPrint;
    }

    static public function printObjeto($id){
        $arrarLicitacion = Licitacion::buscarForId($id);
        // var_dump($arrarLicitacion);
        $htmlPrint =ContratosController::printObjeto($arrarLicitacion->getIdContatosPublicos());
        return $htmlPrint;
    }


    static public function printPlata($id){
        $arrarLicitacion = Licitacion::buscarForId($id);
        // var_dump($arrarLicitacion);
        $htmlPrint =ContratosController::printPlata($arrarLicitacion->getIdContatosPublicos());
        return $htmlPrint;
    }
    static public function printEmpresaContrato($id){
        $arrayLicitacion = Licitacion::buscarForId($id);
        $htmlSelect  ="";
            $arrayEmpresas = EmpresaController::buscarID($arrayLicitacion->getIdEmpresas());
            $arrayContratos = ContratosController::buscarID($arrayLicitacion->getIdContatosPublicos());
            $htmlSelect .= "<td> Estado Contrato: " . $arrayContratos->getEstado() . " Empresa: " . $arrayEmpresas->getRazonsocialContratista() . "</td>";

        return $htmlSelect;
    }
    static public function selectEmpresaSeleted($id){
        $arrayLicitacion = Licitacion::getAllActivos();
        $htmlSelect  ="";
        $htmlSelect .="<select name='idLicitacion' id='idLicitacion' class='form-control'>";
        $htmlSelect .="<option value=''>Seleccione</option>";
        foreach ($arrayLicitacion as $contratos) {
            $arrayEmpresas = EmpresaController::buscarID($contratos->getIdEmpresas());
            $arrayContratos = ContratosController::buscarID($contratos->getIdContatosPublicos());
            if ($arrayEmpresas->getIdEmpresas()==$contratos->getIdEmpresas() && $arrayContratos->getIdContatosPublicos()==$contratos->getIdContatosPublicos()){
                $htmlSelect .= "<option   value='" . $contratos->getIdLicitacion() . "' id='" . $contratos->getIdLicitacion()."' selected >Estado Contrato: " . $arrayContratos->getEstado() . " Empresa: " . $arrayEmpresas->getRazonsocialContratista() . "</option>";
        }else{
            $htmlSelect .= "<option  value='" . $contratos->getIdLicitacion() . "' id='" . $contratos->getIdLicitacion() . "'>Estado Contrato: " . $arrayContratos->getEstado() . " Empresa: " . $arrayEmpresas->getRazonsocialContratista() . "</option>";
        }}
        $htmlSelect .="</select>";
        return $htmlSelect;
    }
    static public function buscarID ($id){
        try {
            return Licitacion::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../UpdateLicitacion.php?respuesta=error");
        }
    }
    static public function editar (){
        try {
            $arrayLicitacion = array();
            $arrayLicitacion['Fecha_firma_contrato']=$_POST['Fecha_firma_contrato'];
            $arrayLicitacion['Ejecucion_Contrato'] = $_POST['Ejecucion_Contrato'];
            $arrayLicitacion['Plazo_Ejecucion_Contrato'] = $_POST['Plazo_Ejecucion_Contrato'];
            $arrayLicitacion['Calificacion'] = $_POST['Calificacion'];
            $arrayLicitacion['Estado'] = $_POST['Estado'];
            $arrayLicitacion['idPersona'] = $_POST['idPersona'];
            $arrayLicitacion['idEmpresas'] = $_POST['idEmpresas'];
            $arrayLicitacion['idContatos_Publicos']= $_POST['idContatos_Publicos'];
            $arrayLicitacion['idLicitacion'] = $_POST['idLicitacion'];
            $licitacion = new Licitacion($arrayLicitacion);
            $licitacion->editar();
          header("Location: ../Vista/UpdateLicitacion.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/UpdateLicitacion.php?respuesta=error");
        }
    }
    static public function ActivarLicitacion(){
        try {
            $ObjLicitacion = Licitacion::buscarForId($_GET['idLicitacion']);
            $ObjLicitacion->setEstado("Activo");
            $ObjLicitacion->editar();
            header("Location: ../Vista/AdministrarLicitacion.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/AdministrarLicitacion.php?respuesta=error");
        }
    }

    static public function InactivarLicitacion(){
        try {
            $ObjLicitacion = Licitacion::buscarForId($_GET['idLicitacion']);
            $ObjLicitacion->setEstado("Inactivo");
            $ObjLicitacion->editar();
            header("Location: ../Vista/AdministrarLicitacion.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/AdministrarLicitacion.php?respuesta=error");
        }
    }

    public function tablaLicitacion (){
        $arrLicitacion = Licitacion::getAll();
        $htmlSelect = "";
        foreach ($arrLicitacion as $Licitacion) {
            $htmlSelect .= "<tr>";
            $htmlSelect .= "<td hidden  >".$Licitacion->getIdLicitacion()."</td>";
            $htmlSelect .= "<td>".$Licitacion->getFechaFirmaContrato()."</td>";
            $htmlSelect .= "<td>".$Licitacion->getEjecucionContrato()."</td>";
            $htmlSelect .= ContratosController::tdContratro($Licitacion->getIdContatosPublicos());
            $htmlSelect .= EmpresaController::tdEmpresa($Licitacion->getIdEmpresas());
            $htmlSelect .= "<td>".$Licitacion->getEstado()."</td>";
            $htmlSelect .= "<td>";
            $htmlSelect .= "<a href='ShowLicitacion.php?id=".($_SESSION['Licitacion']=$Licitacion->getIdLicitacion())."' type='button' data-toggle='tooltip' title='Ver Licitacion' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='UpdateLicitacion.php?id=".$Licitacion->getIdLicitacion()."' type='button' data-toggle='tooltip' title='Actualizar' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-share'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='AdministrarDocumentosLicitacion.php?id=".($_SESSION['Licitacion']=$Licitacion->getIdLicitacion())."' type='button' data-toggle='tooltip' title='Ver Documentos' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            if ($Licitacion->getEstado() != 'Activo') {
                $htmlSelect .= "<a href='../Controlador/LicitacionController.php?action=ActivarLicitacion&idLicitacion=".$Licitacion->getIdLicitacion()."' type='button' data-toggle='tooltip' title='Activar' class='btn docs-tooltip btn-success btn-xs'><i class='glyphicon glyphicon-ok'></i></a>";
            } else {
                $htmlSelect .= "<a  href='../Controlador/LicitacionController.php?action=InactivarLicitacion&idLicitacion=".$Licitacion->getIdLicitacion()."' type='button' data-toggle='tooltip' title='Inactivar' class='btn docs-tooltip btn-danger btn-xs'><i class='glyphicon glyphicon-remove'></i></a>";
            }
            $htmlSelect .= "</td>";

        }
        $htmlSelect .= "</tr>";

        return  $htmlSelect;
    }


}



