<?php

require_once (__DIR__.'/../Modelo/Contratos.php');
if(!empty($_GET['action'])){
    ContratosController::main($_GET['action']);
}else{
    // echo "No se encontro ninguna accion...";
}

class ContratosController
{
    static function main($action){
        if ($action == "crear"){
            ContratosController::crear();
                }else if ($action == "select"){
                    ContratosController::selectContratos();
                }else if ($action == "tablaContratos"){
                    ContratosController::tablaContratos();
                }else if ($action == "editar"){
                    ContratosController::editar();
                }else if ($action == "LiquidarContrato"){
                    ContratosController::LiquidarContrato();
                }else if ($action == "EjecucionContrato"){
                    ContratosController::EjecucionContrato();
                }else if ($action == "CancelarContrato"){
                    ContratosController::CancelarContrato();
                }else if($action == "editar"){
                    ContratosController::editar();
        }
            }


    static public function crear(){
        try{
            $arrayContratos = array();
            $arrayContratos['Tipo_Proceso'] = $_POST['Tipo_Proceso'];
            $arrayContratos['Estado'] = $_POST['Estado'];
            $arrayContratos['RC'] = $_POST['RC'];
            $arrayContratos['Descripcion_Objeto_Contratar'] = $_POST['Descripcion_Objeto_Contratar'];
            $arrayContratos['Cuantia'] = $_POST['Cuantia'];
            $arrayContratos['Tipo_Contrato']= $_POST['Tipo_Contrato'];
            $arrayContratos['departamento_Ejecucion']= $_POST['departamento_Ejecucion'];
            $arrayContratos['municipio_ejecucion']= $_POST['municipio_ejecucion'];
            $arrayContratos['Departamento_Obtenciondocumentos']= $_POST['Departamento_Obtenciondocumentos'];
            $arrayContratos['Municipio_Obtencion_Documentos']= $_POST['Municipio_Obtencion_Documentos'];
            $arrayContratos['Direccion_Entrega_Documentos']=$_POST['Direccion_Entrega_Documentos'];
            $arrayContratos['Fecha_Hora_Apertura_Proceso']=$_POST['Fecha_Hora_Apertura_Proceso'];
            $arrayContratos['idPersona']=$_POST['idPersona'];
            $Contratos = NEW Contratos($arrayContratos);
            $Contratos->insertar();
           header("Location: ../Vista/CreateContratos.php?respuesta=correcto");
        }catch (Exception $w){
            header("Location: ../Vista/CreateContratos.php?respuesta=error");

        }
    }

    static public function editar (){
        try {
            $arrayEmpresas = array();
            $arrayEmpresas['Tipo_Proceso']=$_POST['Tipo_Proceso'];
            $arrayEmpresas['Estado'] = $_POST['Estado'];
            $arrayEmpresas['RC'] = $_POST['RC'];
            $arrayEmpresas['Descripcion_Objeto_Contratar'] = $_POST['Descripcion_Objeto_Contratar'];
            $arrayEmpresas['Cuantia'] = $_POST['Cuantia'];
            $arrayEmpresas['Tipo_Contrato'] = $_POST['Tipo_Contrato'];
            $arrayEmpresas['departamento_Ejecucion'] = $_POST['departamento_Ejecucion'];
            $arrayEmpresas['municipio_ejecucion'] = $_POST['municipio_ejecucion'];
            $arrayEmpresas['Departamento_Obtenciondocumentos'] = $_POST['Departamento_Obtenciondocumentos'];
            $arrayEmpresas['Municipio_Obtencion_Documentos'] = $_POST['Municipio_Obtencion_Documentos'];
            $arrayEmpresas['Direccion_Entrega_Documentos'] = $_POST['Direccion_Entrega_Documentos'];
            $arrayEmpresas['Fecha_Hora_Apertura_Proceso'] = $_POST['Fecha_Hora_Apertura_Proceso'];
            $arrayEmpresas['idPersona'] = $_POST['idPersona'];
            $arrayEmpresas['idContatos_Publicos'] = $_POST['idContratos'];

            $especial = new Contratos($arrayEmpresas);
            $especial->editar();
            header("Location: ../Vista/UpdateContratos.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/UpdateContratos.php?respuesta=error");
        }
    }
    static public function LiquidarContrato(){
        try {
            $ObjEspecialidad =  Contratos::buscarForId($_GET['idContratos_publicos']);
            $ObjEspecialidad->setEstado("Liquidado");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/AdministrarContratos.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/AdministrarContratos.php?respuesta=error");
        }
    }

    static public function EjecucionContrato(){
        try {
            $ObjEspecialidad = Contratos::buscarForId($_GET['idContratos_publicos']);
            $ObjEspecialidad->setEstado("En ejecucion");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/AdministrarContratos.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/AdministrarContratos.php?respuesta=error");
        }
    }
    static public function CancelarContrato(){
        try {
            var_dump($_GET['idContratos_publicos']);
            $ObjEspecialidad = Contratos::buscarForId($_GET['idContratos_publicos']);
            $ObjEspecialidad->setEstado("Cancelado");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/AdministrarContratos.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/AdministrarContratos.php?respuesta=error");
        }
    }
    static public function tdContratro($id){
        $arrayContratos = Contratos::buscarForid($id);
        $htmlTD = "<td> Contrato : ".$arrayContratos->getRC()." -Tipo de Contrato:".$arrayContratos->getTipoContrato()."</td>";
        return $htmlTD;
    }
    static public function printInput($id){
        $arrayContratos = Contratos::buscarForId($id);
        $htmlInput ="<input  placeholder='idContatos_Publicos'  class='validate[required] form-control' type='text'
          readonly  name='idContatos_Publicos' id='idContatos_Publicos' value=' Estado: ".$arrayContratos->getEstado()." -Tipo de Contrato: ".$arrayContratos->getTipoContrato()."' >";
        return $htmlInput;
    }
    static public function selectContratos()
    {
        $arrayContratos = Contratos::getAllContratrosActivos();
        $htmlSelec  ="";
        $htmlSelec .="<select name='idContatos_Publicos' id='idContatos_Publicos'  class='form-control'>";
        $htmlSelec .="<option value=''>Seleccione</option>";
        foreach ($arrayContratos as $contratos){
            $htmlSelec .="<option value='".$contratos->getIdContatosPublicos()."' id='".$contratos->getIdContatosPublicos()."'>".$contratos->getEstado()."Estado:".$contratos->getTipoProceso()."</option>";
        }
        $htmlSelec .="</select>";
        return $htmlSelec;
    }
    static public function selectContratosSelected($id)
    {
        $arrayContratos = Contratos::getAll();
        $htmlSelect  ="";
        $htmlSelect .="<select name='idContatos_Publicos' id='idContatos_Publicos' class='form-control' >";

        foreach ($arrayContratos as $contratos){
            if ($contratos -> getIdContatosPublicos()==$id){
                $htmlSelect .="<option value='".$contratos->getIdContatosPublicos()."' selected>".$contratos->getEstado()."Estado:".$contratos->getTipoProceso()."</option>";

            } else{
                $htmlSelect .="<option value='".$contratos->getIdContatosPublicos()."'>".$contratos->getEstado()."Estado:".$contratos->getTipoProceso()."</option>";

            }
        }
        $htmlSelect .="</select>";
        return $htmlSelect;
    }
    public function tablacontratos (){
        $arrContratos = Contratos::getAll();
        $htmlSelect = "";
        foreach ($arrContratos as $contrato) {
            $htmlSelect .= "<tr>";
            $htmlSelect .= "<td hidden  >".$contrato->getIdContatosPublicos()."</td>";
            $htmlSelect .= "<td>" . $contrato->getTipoProceso() . "</td>";
            $htmlSelect .= "<td>".$contrato-> getMunicipioEjecucion() ."</td>";
            $htmlSelect .= "<td>".$contrato-> getRC()."</td>";
            $htmlSelect .= "<td>";
            $htmlSelect .= "<spam> </spam>".$contrato->getEstado()."</td>";
            $htmlSelect .= "<td>";
            $htmlSelect .= "<a href='ShowContratos.php?id=".$contrato->getIdContatosPublicos()."' type='button' data-toggle='tooltip' title='Ver Contratos' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-share'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='UpdateContratos.php?id=".$contrato->getIdContatosPublicos()."' type='button' data-toggle='tooltip' title='Actualizar' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
            $htmlSelect .= "<spam> </spam>";

            $htmlSelect .= "</td>";


        }
        $htmlSelect .= "</tr>";
        return  $htmlSelect;
    }
    static public function insertNameContrato($id){
        $arrayLicitacion =Licitacion::buscarForId($id);
        $arrayContratos = Contratos::buscarForid($arrayLicitacion->getIdContatosPublicos());
        $htmlTd ="";
        $htmlTd .="<td> Estado: ".$arrayContratos->getEstado()." Tipo de proceso: ".$arrayContratos->getTipoProceso()."</td>";
        return $htmlTd;
    }
    static public function insertInput($id){
        $arrayLicitacion =Licitacion::buscarForId($id);
        $arrayContratos = Contratos::buscarForid($arrayLicitacion->getIdContatosPublicos());
        $htmlTd ="";
        $htmlTd .=" <input  type='text' readonly value='Estado: ".$arrayContratos->getEstado()." Tipo de proceso: ".$arrayContratos->getTipoProceso()."'  class='validate[required] form-control' name='idEntregables' id='idLicitacion'>";
        return $htmlTd;
    }
    static public function buscarID ($id){
        try {
            return Contratos::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../UpdateContratos.php?respuesta=error");
        }
    }
    static public function printObjeto($id){
        $arrayContratos = Contratos::buscarForId($id);

        $htmlPrint =$arrayContratos->getDescripcionObjetoContratar();
        return $htmlPrint;
    }

    static public function printPlata($id){
        $arrayContratos = Contratos::buscarForId($id);
        $htmlPrint =$arrayContratos->getCuantia();
        return $htmlPrint;
    }

}
