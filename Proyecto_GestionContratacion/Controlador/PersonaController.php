<?php
session_start();
error_reporting(0);
require_once (__DIR__.'/../Modelo/Persona.php');
if(!empty($_GET['action'])){
    PersonaController::main($_GET['action']);
}else{

}

class PersonaController{

    static function main($action){
        if ($action == "crear"){
            PersonaController::crear();
        }else if($action == "Login"){
            PersonaController::Login();
        }else if($action == "CerrarSession"){
            PersonaController::CerrarSession();
        }else if($action =="InactivarPersona"){
            PersonaController::InactivarPersona();
        }else if($action == "ActivarPersona"){
            PersonaController::ActivarPersoma();
        }else if($action == "editar"){
            PersonaController::editar();
        }else if($action == "recordarcontrasena"){
            PersonaController::recordarcontrasena();
        }else if($action == "CambiarFoto"){
            PersonaController::CambiarFoto();
        }

    }



    static public function crear(){
        try{
            $arrayPersona = array();
            $Documento=$_POST['Documento'];
            if (is_uploaded_file($_FILES['ContratoPDF']['tmp_name'])&& is_uploaded_file($_FILES['imagen']['tmp_name']))
            {
                $nombreDirectorio = "../Contratos-Fotos/";
                $nombreFichero = $_FILES['ContratoPDF']['name'];
                $nombrefoto=$_FILES['imagen']['name'];
                $nuevo_path="../Contratos-Fotos/".$Documento.$nombrefoto;
                $nuevo_path2="../Contratos-Fotos/".$Documento.$nombreFichero;

                move_uploaded_file($_FILES['ContratoPDF']['tmp_name'], $nombreDirectorio.$Documento.$nombreFichero);
                move_uploaded_file($_FILES['imagen']['tmp_name'], $nombreDirectorio.$Documento.$nombrefoto);

            } else{
                echo ("No se ha podido subir el fichero");
            //header("Location: ../Vista/createPersona.php?respuesta=errorFoto");

            }
            $arrayPersona['Tipo_Documento'] = $_POST['TipoDocumento'];
            $arrayPersona['Documento']=$Documento;
            $arrayPersona['Foto'] = $nuevo_path;
            $arrayPersona['Fecha_Nacimiento']=$_POST['Fecha_Nacimiento'];
            $arrayPersona['Genero'] = $_POST['Genero'];
            $arrayPersona['Nombres'] = $_POST['Nombres'];
            $arrayPersona['Apellidos'] = $_POST['Apellidos'];
            $arrayPersona['Telefono'] = $_POST['Telefono'];
            $arrayPersona['Direccion'] = $_POST['Direccion'];
            $arrayPersona['Correo'] = $_POST['Correo'];
            $arrayPersona['Contrato_PDF'] = $nuevo_path2;
            $arrayPersona['NRP'] = $_POST['NRP'];
            $arrayPersona['Usuario'] = $_POST['Usuario'];
            $arrayPersona['Contrasena'] = $_POST['Contrasena'];
            $arrayPersona['Estado'] = $_POST['Estado'];
            $arrayPersona['Cargo'] = $_POST['Cargo'];
            $arrayPersona['idSecretarias'] = $_POST['idSecretarias'];
            $Persona = new Persona($arrayPersona);
            $Persona->insertar();
           header("Location: ../Vista/createPersona.php?respuesta=correcto");



    }catch(Exception $e){
            header("Location: ../Vista/createPersona.php?respuesta=error");
        }
    }

    static public function Login (){
        try {
            $Usuario = $_POST['Usuario'];
            $Contrasena = $_POST['Contrasena'];
            $arrayPesona= array();
            if(!empty($Usuario) && !empty($Contrasena)){
                $respuesta = PersonaController::validLogin($Usuario, $Contrasena);
                if (is_array($respuesta)) {
                    $_SESSION['verificar']=true;
                    $_SESSION['DataPersona'] = $respuesta;
                    // var_dump($_SESSION['DataPersona']);
                    echo TRUE;
                }else if($respuesta == "Password Incorrecto"){
                    echo "<div class='alert alert-danger alert-dismissable'>";
                    echo "    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                    echo "    <strong>Error!</strong>. La Contraseña No Coincide Con El Usuario.";
                    echo "</div>";
                }else if($respuesta == "No existe el usuario"){
                    echo "<div class='alert alert-danger alert-dismissable'>";
                    echo "    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                    echo "    <strong>Error!</strong>. No Existe Un Usuario Con Estos Datos.";
                    echo "</div>";
                }
            }else{
                echo "<div class='alert alert-danger alert-dismissable'>";
                echo "    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                echo "    <strong>Error!</strong>.Datos Vacios.";
                echo "</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger alert-dismissable'>";
            echo "    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
            echo "    <strong>Error!</strong>".+$e->getMessage();
            echo "</div>";
        }
    }

    public function validLogin ($Usuario, $Contrasena) {

        $arrPersona = array();
        $tmp = new Persona();
        $getTempUser = $tmp->getRows("SELECT * FROM proyectophp.persona WHERE Usuario = '".$Usuario."'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM proyectophp.persona WHERE Usuario = '".$Usuario."' AND Contrasena = '".$Contrasena."'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    return $valor;
                }
            }else{
                return "Password Incorrecto";
            }
        }else{
            return "No existe el usuario";
        }
        $tmp->Disconnect();
        return $arrPersona;
    }


    static public function inputPerson($idpersona){

        $arrPerson = Persona::buscarForId($idpersona);
        $htmlInput ="";
        // var_dump($arrPerson);
        $htmlInput .="<input readonly class='validate[required] form-control' type='text'  value='".$arrPerson->getNombres()." ".$arrPerson->getApellidos()."' >";
        //var_dump($arrPerson->getNombres());
        foreach ($arrPerson as $persona){

            //

        }
        return $htmlInput;

    }


    public function CerrarSession (){
        header("Location: ../Vista/login.php");
        session_destroy();
    }

    public function tablaPersona (){
        $arrPerson = Persona::getAll();
        $htmlSelect = "";
        foreach ($arrPerson as $Persona) {
            $htmlSelect .= "<tr>";
            $htmlSelect .= "<td hidden  >".$Persona->getIdPersona()."</td>";
            $htmlSelect .= "<td>" . $Persona->getNombres() . "</td>";
            $htmlSelect .= "<td>".$Persona->getApellidos()."</td>";
            $htmlSelect .= "<td>".$Persona->getTipoDocumento()."</td>";
            $htmlSelect .= "<td>".$Persona->getDocumento()."</td>";
            $htmlSelect .= "<td>".$Persona->getEstado()."</td>";
            $htmlSelect .= "<td>";
            $htmlSelect .= "<a href='ShowPersona.php?id=".$Persona->getIdPersona()."' type='button' data-toggle='tooltip' title='Ver Persona' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-share'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='UpdatePersona.php?id=".$Persona->getIdPersona()."' type='button' data-toggle='tooltip' title='Actualizar' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            if ($Persona->getEstado() != 'Activo') {
                $htmlSelect .= "<a href='../Controlador/PersonaController.php?action=ActivarPersona&idPersona=".$Persona->getIdPersona()."' type='button' data-toggle='tooltip' title='Activar' class='btn docs-tooltip btn-success btn-xs'><i class='glyphicon glyphicon-ok'></i></a>";
            } else {
                $htmlSelect .= "<a type='button' href='../Controlador/PersonaController.php?action=InactivarPersona&idPersona=".$Persona->getIdPersona()."' data-toggle='tooltip' title='Inactivar' class='btn docs-tooltip btn-danger btn-xs'><i class='glyphicon glyphicon-remove'></i></a>";
            }
            $htmlSelect .= "</td>";
            $htmlSelect .= "</tr>";
        }

        return  $htmlSelect;
    }


       static public function buscarID($id){
           try {
               return Persona::buscarForId($id);
           } catch (Exception $e) {
               echo "Error en Especialidad controller";
           }

        }

    static public function editar (){
        try {
            $arrayPersona = array();
            $Documento=$_POST['Documento'];
            if (is_uploaded_file($_FILES['ContratoPDF']['tmp_name']))
            {
                $nombreDirectorio = "../Contratos-Fotos/";
                $nombreFichero = $_FILES['ContratoPDF']['name'];
                $nuevo_path2="../Contratos-Fotos/".$Documento.$nombreFichero;
                move_uploaded_file($_FILES['ContratoPDF']['tmp_name'], $nombreDirectorio.$Documento.$nombreFichero);
            } else{
                echo ("No se ha podido subir el fichero");
                header("Location: ../Vista/UpdatePersona.php?respuesta=errorFoto");

            }
            $arrayPersona['Tipo_Documento'] = $_POST['TipoDocumento'];
            $arrayPersona['Documento']=$Documento;
            $arrayPersona['Foto'] = $_POST['imagen'];
            $arrayPersona['Fecha_Nacimiento']=$_POST['Fecha_Nacimiento'];
            $arrayPersona['Genero'] = $_POST['Genero'];
            $arrayPersona['Nombres'] = $_POST['Nombres'];
            $arrayPersona['Apellidos'] = $_POST['Apellidos'];
            $arrayPersona['Telefono'] = $_POST['Telefono'];
            $arrayPersona['Direccion'] = $_POST['Direccion'];
            $arrayPersona['Correo'] = $_POST['Correo'];
            $arrayPersona['Contrato_PDF'] = $nuevo_path2;
            $arrayPersona['NRP'] = $_POST['NRP'];
            $arrayPersona['Usuario'] = $_POST['Usuario'];
            $arrayPersona['Contrasena'] = $_POST['Contrasena'];
            $arrayPersona['Estado'] = $_POST['Estado'];
            $arrayPersona['Cargo'] = $_POST['Cargo'];
            $arrayPersona['idSecretarias'] = $_POST['idSecretarias'];
            $arrayPersona['idPersona']=$_POST['idPersona'];
            $Persona = new Persona($arrayPersona);
            $Persona->editar();
            header("Location: ../Vista/UpdatePersona.php?respuesta=correcto");
        } catch (Exception $e) {
            //header("Location: ../Vista/UpdatePersona.php?respuesta=error");
        }
    }
    static public function CambiarFoto(){
            try{
                $Documento=$_POST['Documento'];
                if (is_uploaded_file($_FILES['imagen']['tmp_name']))
                {
                $nombreDirectorio = "../Contratos-Fotos/";
                $nombrefoto=$_FILES['imagen']['name'];
                $nuevo_path="../Contratos-Fotos/".$Documento.$nombrefoto;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $nombreDirectorio.$Documento.$nombrefoto);

            } else{
                echo ("No se ha podido subir el fichero");
                header("Location: ../Vista/Cambiarfoto.php?respuesta=errorFoto");

            }
                $ObjPersona = Persona::buscarForId($_GET['id']);
                $ObjPersona->setFoto($nuevo_path);
                var_dump($ObjPersona);
                $ObjPersona->editar();
                header("Location: ../Vista/Cambiarfoto.php?respuesta=correcto");
            }catch (Exception $e){
                header("Location: ../Vista/Cambiarfoto.php?respuesta=error");
            }
    }
    static public function ActivarPersoma (){
        try {
            $ObjEspecialidad = Persona::buscarForId($_GET['idPersona']);
            $ObjEspecialidad->setEstado("Activo");
            $ObjEspecialidad->editar();
           header("Location: ../Vista/AdministrarPersona.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/AdministrarPersona.php?respuesta=error");
        }
    }

    static public function InactivarPersona (){
        try {
            $ObjEspecialidad = Persona::buscarForId($_GET['idPersona']);
            $ObjEspecialidad->setEstado("Inactivo");
            $ObjEspecialidad->editar();
           header("Location: ../Vista/AdministrarPersona.php?respuesta=correcto");
        } catch (Exception $e) {
             header("Location: ../Vista/AdministrarPersona.php?respuesta=error");
        }
    }
}