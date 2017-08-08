<?php
require_once (__DIR__.'/../Modelo/Empresas.php');

if(!empty($_GET['action'])){
    EmpresaController::main($_GET['action']);
}else{

}

class EmpresaController
{
    static function main($action){
        if ($action == "crear"){
            EmpresaController::crear();
        }else if ($action == "select"){
            EmpresaController::selectEmpresas();
        }else if ($action == "tablaEmpresa"){
            EmpresaController::tablaEmpresas();
        }else if ($action == "editar"){
            EmpresaController::editar();
        }else if ($action == "ActivarEmpresa"){
            EmpresaController::ActivarEmpresa();
        }else if ($action == "InactivarEmpresa"){
            EmpresaController::InactivarEmpresa();
        }else if ($action == "Confirmar"){
            EmpresaController::Confirmar();
    }
    }
    static public function crear(){
        try{
            $arrayEmpresas = array();
            $arrayEmpresas['Razonsocial_contratista']=$_POST['Razonsocial_contratista'];
            $arrayEmpresas['Identificacion_Contatista'] = $_POST['Identificacion_Contatista'];
            $arrayEmpresas['Pais_Contatrista'] = $_POST['Pais_Contatrista'];
            $arrayEmpresas['Departamento_Contatista'] = $_POST['Departamento_Contatista'];
            $arrayEmpresas['Provincia_Contratista'] = $_POST['Provincia_Contratista'];
            $arrayEmpresas['Direccion_Contratista'] = $_POST['Direccion_Contratista'];
            $arrayEmpresas['Correo'] = $_POST['Correo'];
            $arrayEmpresas['Representante_Contaratista'] = $_POST['Representante_Contaratista'];
            $arrayEmpresas['Identificacion_Representante'] = $_POST['Identificacion_Representante'];
            $arrayEmpresas['Respuesta']="No";
            $arrayEmpresas['Estado'] = $_POST['Estado'];
            $arrayEmpresas['idPersona'] = $_POST['idPersona'];
            $empresas = new Empresas($arrayEmpresas);
            $empresas->insertar();
            header("Location: ../Vista/CreateEmpresas.php?respuesta=correcto");
        }catch(Exception $e){
            header("Location: ../Vista/CreateEmpresas.php?respuesta=error");
        }
    }
    static public function ActivarEmpresa (){
        try {

            $ObjEspecialidad = Empresas::buscarForId($_GET['idEmpresa']);
            $ObjEspecialidad->setEstado("Activo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/AdministrarEmpresas.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/AdministrarEmpresas.php?respuesta=error");
        }
    }

    static public function InactivarEmpresa (){
        try {
            $ObjEspecialidad = Empresas::buscarForId($_GET['idEmpresa']);
            $ObjEspecialidad->setEstado("Inactivo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/AdministrarEmpresas.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/AdministrarEmpresas.php?respuesta=error");
        }
    }

    static public function Confirmar(){
        try {
            $ObjEspecialidad = Empresas::buscarForId($_GET['idEmpresa']);
            $ObjEspecialidad->setRespuesta("Si");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/AdministrarEmpresas.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/AdministrarEmpresas.php?respuesta=error");
        }
    }

    static public function printInput($id){
        $arrayEmpresas = Empresas::buscarForId($id);
        $htmlInput ="<input  placeholder='Estado'  class='validate[required] form-control' type='text'
          readonly  name='idEmpresas' id='idEmpresas' value='".$arrayEmpresas->getRazonsocialContratista()." Nit: ".$arrayEmpresas->getIdentificacionContatista()."' >";
        return $htmlInput;
    }
    static public function buscarID ($id){
        try {
            return Empresas::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../UpdateEmpresa.php?respuesta=error");
        }
    }
    static public function tdEmpresa($id){
        $arrayEmpresas = Empresas::buscarForId($id);
        $htmlTD ="<td>".$arrayEmpresas->getRazonsocialContratista()." Nit:  ".$arrayEmpresas->getIdentificacionContatista()."</td>";
        return $htmlTD;
    }
    static public function editar (){
        try {
            $arrayEmpresas = array();
            $arrayEmpresas['Razonsocial_contratista']=$_POST['Razonsocial_contratista'];
            $arrayEmpresas['Identificacion_Contatista'] = $_POST['Identificacion_Contatista'];
            $arrayEmpresas['Pais_Contatrista'] = $_POST['Pais_Contatrista'];
            $arrayEmpresas['Departamento_Contatista'] = $_POST['Departamento_Contatista'];
            $arrayEmpresas['Provincia_Contratista'] = $_POST['Provincia_Contratista'];
            $arrayEmpresas['Direccion_Contratista'] = $_POST['Direccion_Contratista'];
            $arrayEmpresas['Correo'] = $_POST['Correo'];
            $arrayEmpresas['Representante_Contaratista'] = $_POST['Representante_Contaratista'];
            $arrayEmpresas['Identificacion_Representante'] = $_POST['Identificacion_Representante'];
            $arrayEmpresas['Respuesta']="No";
            $arrayEmpresas['Estado'] = $_POST['Estado'];
            $arrayEmpresas['idPersona'] = $_POST['idPersona'];
            $arrayEmpresas['idEmpresas'] = $_POST['idEmpresas'];
            $especial = new Empresas($arrayEmpresas);
            $especial->editar();
           header("Location: ../Vista/UpdateEmpresa.php?respuesta=correcto");
        } catch (Exception $e) {
              header("Location: ../Vista/UpdateEmpresa.php?respuesta=error");
        }
    }
    static public function selectEmpresas()
    {
        $arrayEmpresas = Empresas::getAll();
        $htmlSelect  ="";
        $htmlSelect .="<select name='idEmpresas' id='idEmpresas' class='form-control'>";
        $htmlSelect .="<option value='0'>Seleccione</option>";
        foreach ($arrayEmpresas as $empresas){
            $htmlSelect .="<option value='".$empresas->getIdEmpresas()."' id='".$empresas->getIdEmpresas()."'>".$empresas->getRazonsocialContratista()." Nit: ".$empresas->getIdentificacionContatista()."</option>";
        }
        $htmlSelect .="</select>";
        return $htmlSelect;
    }

    static public function selectEmpresasSelected($id)
    {
        $arrayEmpresas = Empresas::getAll();
        $htmlSelect  ="";
        $htmlSelect .="<select name='idEmpresas' id='idEmpresas' class='form-control' >";

        foreach ($arrayEmpresas as $empresas){
            if ($empresas -> getIdEmpresas()==$id){
                $htmlSelect .="<option value='".$empresas->getIdEmpresas()."' selected>".$empresas->getRazonsocialContratista()." Nit: ".$empresas->getIdentificacionContatista()."</option>";
            } else{
                $htmlSelect .="<option value='".$empresas->getIdEmpresas()."'>".$empresas->getRazonsocialContratista()." Nit: ".$empresas->getIdentificacionContatista()."</option>";

            }
        }
        $htmlSelect .="</select>";
        return $htmlSelect;
    }

    public function tablaEmpresas (){
        $arrEmpresas = Empresas::getAll();
        $htmlSelect = "";
        foreach ($arrEmpresas as $empresa) {
            $htmlSelect .= "<tr>";
            $htmlSelect .= "<td hidden  >".$empresa->getIdEmpresas()."</td>";
            $htmlSelect .= "<td>" . $empresa->getRazonsocialContratista() . "</td>";
            $htmlSelect .= "<td>".$empresa->getRepresentanteContaratista()."</td>";
            $htmlSelect .= "<td>".$empresa->getCorreo()."</td>";
            $htmlSelect .= "<td>".$empresa->getRespuesta()."</td>";
            $htmlSelect .= "<td>".$empresa->getEstado()."</td>";
            $htmlSelect .= "<td>";
            $htmlSelect .= "<a href='showEmpresas.php?id=".($_SESSION['empresa']=$empresa->getIdEmpresas())."' type='button' data-toggle='tooltip' title='Ver empresa' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-share'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='UpdateEmpresa.php?id=".$empresa->getIdEmpresas()."' type='button' data-toggle='tooltip' title='Actualizar' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            if ($empresa->getEstado() != 'Activo') {
                $htmlSelect .= "<a href='../Controlador/EmpresaController.php?action=ActivarEmpresa&idEmpresa=".$empresa->getIdEmpresas()."' type='button' data-toggle='tooltip' title='Activar' class='btn docs-tooltip btn-success btn-xs'><i class='glyphicon glyphicon-ok'></i></a>";
            } else {
                $htmlSelect .= "<a type='button' href='../Controlador/EmpresaController.php?action=InactivarEmpresa&idEmpresa=".$empresa->getIdEmpresas()."' data-toggle='tooltip' title='Inactivar' class='btn docs-tooltip btn-danger btn-xs'><i class='glyphicon glyphicon-remove'></i></a>";
            }
            $htmlSelect .= "<spam> </spam>";
            if ($empresa->getRespuesta() == 'No') {
                $htmlSelect .= "<a href='../Controlador/EmpresaController.php?action=Confirmar&idEmpresa=".$empresa->getIdEmpresas()."' type='button' data-toggle='tooltip' title='Confirmar correo' class='btn docs-tooltip btn-metis-5 btn-xs'><i class='glyphicon glyphicon-ok'></i></a>";
            }
            $htmlSelect .= "</td>";
            $htmlSelect .= "</tr>";
        }

        return  $htmlSelect;
    }
    static public function printEmpresa($id){
        $arrayEmpresa = Empresas::buscarForId($id);
        $htmlPrint ="".$arrayEmpresa->getRazonsocialContratista()." Representante legal ".$arrayEmpresa->getRepresentanteContaratista();
        return $htmlPrint;
    }
    static public function printEmpresaNombre($id){
        $arrayEmpresa = Empresas::buscarForId($id);
        $htmlPrint =$arrayEmpresa->getRepresentanteContaratista();

        return $htmlPrint;
    }
    static public function printDocumetno($id){
        $arrayEmpresa = Empresas::buscarForId($id);
        $htmlPrint =$arrayEmpresa->getIdentificacionContatista();
        return $htmlPrint;
    }



}