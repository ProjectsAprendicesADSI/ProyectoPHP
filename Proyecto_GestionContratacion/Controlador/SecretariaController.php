<?php


require_once (__DIR__.'/../Modelo/Secretaria.php');
require_once (__DIR__.'/../Modelo/Persona.php');

if(!empty($_GET['action'])){
    SecretariaController::main($_GET['action']);
}else{
   // echo "No se encontro ninguna accion...";
}
class SecretariaController
{
 static function main($action){
     if ($action == "crear"){
         SecretariaController::crear();
     } else if($action == "editar") {
        SecretariaController::editar();
     }
 }
static public function crear(){
try{
    $arraySecretaria = array();
    $arraySecretaria['Nombre'] = $_POST['Nombre'];
    $arraySecretaria['Mision'] = $_POST['Mision'];
    $arraySecretaria['Vision'] = $_POST['Vision'];
    $arraySecretaria['Objetivos'] = $_POST['Objetivos'];
    $arraySecretaria['Telefono'] = $_POST['Telefono'];
    $arraySecretaria['Direccion']= $_POST['Direccion'];
    $Secretaria = new Secretaria($arraySecretaria);
    $Secretaria->insertar();
   header("Location: ../Vista/CreateSecretaria.php?respuesta=correcto");
}catch (Exception $w){
    header("Location: ../Vista/CreateSecretaria.php?respuesta=error");

}
}
    static public function editar (){
        try {
            $arraySecretaria = array();
            $arraySecretaria['Nombre'] = $_POST['Nombre'];
            $arraySecretaria['Vision']=$_POST['Vision'];
            $arraySecretaria['Mision'] = $_POST['Mision'];
            $arraySecretaria['Objetivos'] = $_POST['Objetivos'];
            $arraySecretaria['Telefono'] = $_POST['Telefono'];
            $arraySecretaria['Direccion'] = $_POST['Direccion'];
            $arraySecretaria['idSecretarias'] =$_POST['idSecretarias'];
            $Secretaria = new Secretaria($arraySecretaria);
            $Secretaria->editar();
            header("Location: ../Vista/UpdateSecretaria.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/UpdateSecretaria.php?respuesta=error");
        }
    }

    static public function selectSecretaria ($isRequired=true, $class="")
    {
        $arrSecretaria = Secretaria::getAll();
        $htmlSelect = "";
        $htmlSelect = "<select  name='idSecretarias' id='idSecretarias' class='validate[required] form-control'>";
        $htmlSelect .= "<option>Seleccione</option>";
        foreach ($arrSecretaria as $Secretarias) {
            $htmlSelect .= "<option value='".$Secretarias->getIdSecretarias()."' id='".$Secretarias->getIdSecretarias()."'>".$Secretarias->getNombre()."</option>";

        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    public function tablaSecretaria (){
        $arrSecretaria = Secretaria::getAll();
        $htmlSelect = "";
        foreach ($arrSecretaria as $Secretaria) {
            $htmlSelect .= "<tr>";
            $htmlSelect .= "<td hidden  >".$Secretaria->getIdSecretarias()."</td>";
            $htmlSelect .= "<td>" . $Secretaria->getNombre() . "</td>";
            $htmlSelect .= "<td>".$Secretaria->getTelefono()."</td>";
            $htmlSelect .= "<td>".$Secretaria->getDireccion()."</td>";
            $htmlSelect .= "<td>";
            $htmlSelect .= "<a href='ShowSecretaria.php?id=".$Secretaria->getIdSecretarias()."' type='button' data-toggle='tooltip' title='Ver Secretariaa' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-share'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='UpdateSecretaria.php?id=".$Secretaria->getIdSecretarias()."' type='button' data-toggle='tooltip' title='Actualizar' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
            $htmlSelect .= "</td>";
        }
        $htmlSelect .= "</tr>";
        return  $htmlSelect;
    }
    static public function buscarID($id){


        try {
            return Secretaria::buscarForId($id);
        } catch (Exception $e) {
            echo "Error en Especialidad controller";
        }
    }
    static public function printSecretarias($id){
        $arraySecretarias=Secretaria::buscarForId($id);
        $htmlP =$arraySecretarias->getNombre();
        return $htmlP;
    }

    static public function inputSecretaria($id){
        $arraySecretarias=Secretaria::buscarForId($id);
        $htmlP =$arraySecretarias->getNombre();
        return $htmlP;
    }




}