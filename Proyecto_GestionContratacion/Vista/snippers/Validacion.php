<?php

require_once (__DIR__.'/../../Modelo/Persona.php');
require_once (__DIR__.'/../../Modelo/Secretaria.php');
if(!empty($_GET['action'])){
    Validacion::main($_GET['action']);
}else{

}
class Validacion
{
    static function main($action){
        if ($action == "User"){
            Validacion::VerUs();
        } else if($action=="Secretaria")
        {
            Validacion::Secretaria();
        }

    }

   static public function VerUs(){
       $user = $_POST['Usuario'];
       if(!empty($user)) {
           Validacion::User($user);
       }
   }


    static public function User($Usuario) {

        $arrPersona = array();
        $tmp = new Persona();
        $getTempUser = $tmp->getRows("SELECT * FROM proyectophp.persona WHERE Usuario = '".$Usuario."'");

        if (empty($getTempUser)) {
            echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
        }else if(!empty($getTempUser)){
            echo "<span style='font-weight:bold;color:red;'>El nombre de usuario ya existe.</span>";
        }
        $tmp->Disconnect();
        return $arrPersona;
    }
    static public function Secretaria() {

        $nombre=$_POST['Nombre'];
        $arrPersona = array();
        $tmp = new Secretaria();
        $getTempUser = $tmp->getRows("SELECT * FROM proyectophp.secretarias WHERE Nombre = '".$nombre."'");

        if (empty($getTempUser)) {
            echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
        }else if(!empty($getTempUser)){
            echo "<span style='font-weight:bold;color:red;'>El nombre de la secretaria ya existe.</span>";
        }
        $tmp->Disconnect();
        return $arrPersona;
    }


}