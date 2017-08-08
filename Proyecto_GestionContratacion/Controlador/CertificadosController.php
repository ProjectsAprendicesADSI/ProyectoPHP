<?php

require_once (__DIR__.'/../Modelo/Certificados.php');

if(!empty($_GET['action'])){
    CertificadosController::main($_GET['action']);
}else{
    // echo "No se encontro ninguna accion...";
}
class CertificadosController
{
    static function main($action){
        if ($action == "crear"){
            CertificadosController::crear();
        }else if($action == 'editar'){
            CertificadosController::editar();
        }
    }

                static public function crear(){
                    try{
                        $arrayCertificados = array();
                        $arrayCertificados['Titulo'] = $_POST['Titulo'];
                        $arrayCertificados['Fecha_Entrega'] = $_POST['Fecha_Entrega'];
                        $arrayCertificados['Hora_Entrega'] = $_POST['Hora_Entrega'];
                        $arrayCertificados['Estado'] = $_POST['Estado'];
                        $arrayCertificados['idEntregables'] = $_POST['idEntregables']; ;
                        $Certificados = new Certificados($arrayCertificados);
                        $Certificados->insertar();
                        header("Location: ../Vista/CreateCertificados.php?respuesta=correcto");
                    }catch (Exception $w){
                       header("Location: ../Vista/CreateCertificados.php?respuesta=error");

                    }
                }
    public function tablaCertificados (){
        $arrCertificados = Certificados::getAll();
        $htmlSelect = "";
        foreach ($arrCertificados as $certificado) {
            $htmlSelect .= "<tr>";
            $htmlSelect .= "<td hidden  >".$certificado->getIdCertificados()."</td>";
            $htmlSelect .= "<td>" . $certificado->getTitulo() . "</td>";
            $htmlSelect .= "<td>".$certificado->getFechaEntrega()."</td>";
            $htmlSelect .= "<td>".$certificado->getHoraEntrega()."</td>";
            $htmlSelect .= "<td>".$certificado->getEstado()."</td>";
            $htmlSelect .= EntregableController::insertNameEntregable($certificado->getIdEntregables());
            $htmlSelect .= "<td>";
            $htmlSelect .= "<a href='../TCPDF/examples/ShowCertificados.php?id=".$certificado->getIdCertificados()."' target='_blank'  type='button' data-toggle='tooltip' title='Ver Certificados' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-share'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='UpdateCertificados.php?id=".$certificado->getIdCertificados()."' type='button' data-toggle='tooltip' title='Actualizar' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
            $htmlSelect .= "<spam> </spam>";

            $htmlSelect .= "</td>";
            $htmlSelect .= "</tr>";
        }

        return  $htmlSelect;
    }

    static public function buscarID($id){
        try {
            return Certificados::buscarForId($id);
        } catch (Exception $e) {
            echo "Error en Certificados controller";
            header("Location: ../ShowCertificados.php?respuesta=error");
        }
    }

    static public function editar (){
        try {
            $arrayCertificado = array();

            $arrayCertificado['Titulo'] = $_POST['Titulo'];
            $arrayCertificado['Fecha_Entrega']=$_POST['Fecha_Entrega'];
            $arrayCertificado['Hora_Entrega'] = $_POST['Hora_Entrega'];
            $arrayCertificado['Estado'] = $_POST['Estado'];
            $arrayCertificado['idEntregables'] = $_POST['idEntregables'];
            $arrayCertificado['idCertificados'] = $_POST['idCertificados'];
            $Certificados = new Certificados($arrayCertificado);
            $Certificados->editar();
            header("Location: ../Vista/UpdateCertificados.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/UpdateCertificados.php?respuesta=error");
        }
    }


}