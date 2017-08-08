<?php session_start();
require_once('tcpdf_include.php');

require "../../Controlador/CertificadosController.php";
require "../../Controlador/LicitacionController.php";
require "../../Controlador/EntregableController.php";
require "../../Controlador/EmpresaController.php";
require "../../Controlador/ContratosController.php";
require "../../Controlador/SecretariaController.php";

$DataCertificados = CertificadosController::buscarID($_GET["id"]);
$DataEntregable = EntregableController::buscarID($DataCertificados->getIdEntregables());
$DataLicitacion = LicitacionController::buscarID($DataEntregable->getIdLicitacion());

$nombreSecretaria= SecretariaController::inputSecretaria($_SESSION["DataPersona"]["idSecretarias"]);


$fecha= date("d")." de ".date("m")." del ".date("Y");
error_reporting(0);
var_dump($nombreSecretaria);
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('dejavusans', '', 9);
$pdf->AddPage();
$html='
<link rel="stylesheet" href="../../Vista/assets/lib/bootstrap/css/bootstrap.css">
    <link rel="icon" href="../../Vista/assets/img/icono.png">
<table   cellspacing="3" cellpadding="4" >
  <thead>
  <th  cellspacing="3"> <img src="images/imagen.png"></th>
  <th align="center"> <b><br><br>MODELO ESTÀNDAR DE CONTROL SISTEMA DE GESTION DOCUMENTAL </b></th>
  
  <th align="center"> <b> <br>ALCALDIA  RECETOR <br>Fecha:'.$fecha.' <br>'.SecretariaController::inputSecretaria($_SESSION["DataPersona"]["idSecretarias"]).' <br>CODIGO TRD 130</b></th>
  </thead><br>
       </table>  
       
  <p></p> <label class="control-label col-lg-4" style="font-weight: bold; font-size: 20px; text-align: center;" >CERTIFICADO</label>
    <br> <br> <br>
       <label style="text-align: left ; margin-left: 50px; font-size: 15px;">Contrato:</label>
    <label style="text-align: left ; margin-left: 20px; font-size: 15px;">'.$DataEntregable->getEntregablesActividad($DataCertificados->getIdEntregables()).'</label><label>         </label><label>         </label><label>         </label><label>         </label><label>         </label><label>         </label><label>         </label><label>         </label><label>         </label>
    <br><br>   
     <label style="text-align: left ; margin-left: 50px; font-size: 15px;">Contratista:</label>

     <label style="text-align: left ; margin-left: 20px; font-size: 15px;">'.LicitacionController::printLicitacionContrato($DataEntregable->getIdLicitacion()).'</label>
          <br> <br>
       <label style="text-align: left ; margin-left: 50px; font-size: 15px;">Contratante:</label>
       <label style="text-align: left ; margin-left: 20px; font-size: 15px;">Municipio Recetor</label>
       <br> <br>
         <label style="text-align: left ; margin-left: 50px; font-size: 15px;">Objeto:</label>
         <label style="text-align: left ; margin-left: 20px; font-size: 15px;">'.ContratosController::printObjeto($DataLicitacion->getIdContatosPublicos()).'</label><label>         </label><label>         </label><label>         </label>
         <br><br>
  <label>         </label><label style="text-align: left ; margin-left: 50px; font-size: 15px;">Valor Inicial:</label>
 <label style="text-align: left ; margin-left: 20px; font-size: 15px;">'.ContratosController::printPlata($DataLicitacion->getIdContatosPublicos()).'</label><label>         </label><label>         </label><label>         </label>

<label style="text-align: left ; margin-left: 50px; font-size: 15px;">Fecha Inicio:</label>
 <label style="text-align: left ; margin-left: 20px; font-size: 15px;">'.$DataEntregable->getFechaCumplimiento($DataCertificados->getIdEntregables()).'</label><label>         </label><label>         </label><label>         </label>

 <label style="text-align: left ; margin-left: 50px; font-size: 15px;">Fecha Entrega:</label>
 <label style="text-align: left ; margin-left: 20px; font-size: 15px;">'.$DataEntregable->getFechaEntrega($DataCertificados->getIdEntregables()).'</label><label>         </label><label>         </label><label>         </label>
<br> <br> <br>
  <label style="text-align: justify ; margin-left: 50px; font-size: 18px;">En el municipio de Recetor de Casanare se reunieron los señores <b>'.($_SESSION["DataPersona"]["Nombres"]).' '.($_SESSION["DataPersona"]["Apellidos"]).'</b> a cargo de la '.SecretariaController::inputSecretaria($_SESSION["DataPersona"]["idSecretarias"]).' y '.LicitacionController::printLicitacion($DataEntregable->getIdLicitacion()).'
   Con N° de identificacion '.LicitacionController::Documento($DataEntregable->getIdLicitacion()).' Titular del contrato '.$DataEntregable->getEntregablesActividad($DataCertificados->getIdEntregables()).' de
 '.$DataEntregable->getFechaCumplimiento($DataCertificados->getIdEntregables()).' con el fin de suscribir el acta de Terminacion del contrato cuyo objeto es: '.ContratosController::printObjeto($DataLicitacion->getIdContatosPublicos()).'.
<br><br> El contratista presento informe de avance en la ejecución de las actividades en el período comprendido entre '.$DataEntregable->getFechaCumplimiento($DataCertificados->getIdEntregables()).' al '.$DataEntregable->getFechaEntrega($DataCertificados->getIdEntregables()).' del contrato '.$DataEntregable->getEntregablesActividad($DataCertificados->getIdEntregables()).', en el cual evidencia un
 avance parcial que justifica la presente liquidación.
<br><br> El contratista ha cumplido parcialmente con las actividades contratadas mediante el contrato '.$DataEntregable->getEntregablesActividad($DataCertificados->getIdEntregables()).'
 de '.$DataEntregable->getFechaCumplimiento($DataCertificados->getIdEntregables()).'.
 La presente diligencia elevada en el acta se da por terminada; Para constancia firma y prueba
 se firmapor quienes en ella intervienen,en original, con destino a la Entidad Contratante
 y una copia para el/ella contratista.
  <br><br>
  <br>
<label hidden style="color: white;">fsf</label> _____________________           <label hidden style="color: white;">hola adasnasdfsddfunai</label>                                   ___________________<br>
   <label hidden style="color: white;">fs</label> <b>'.($_SESSION["DataPersona"]["Nombres"])." ".($_SESSION["DataPersona"]["Apellidos"]).'</b><label hidden style="color: white;">holda adasjdhnadfsfsdffsfsdfs nai</label> <b>'.LicitacionController::printLicitacionName($DataEntregable->getIdLicitacion()).' </b>
   <br><label hidden style="color: white;">d</label> '.SecretariaController::printSecretarias($_SESSION["DataPersona"]["idSecretarias"]).'<label hidden style="color: white;">hola adasjdhnadfsfsdffsfai</label> Contratista
  
<br><br><br><br><br>
  <label hidden style="color: white;">d</label>   <img src="images/imagen 2.png">     
  ';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();
ob_end_clean();
$pdf->Output('pdfcerticados.pdf', 'I');



?>