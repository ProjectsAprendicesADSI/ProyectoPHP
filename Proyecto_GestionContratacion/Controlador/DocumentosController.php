<?php
require_once (__DIR__.'/../Modelo/Documentos.php');

if(!empty($_GET['action'])){
    DocumentosController::main($_GET['action']);
}else{
    //echo "No se encontro ninguna accion...";
}

class DocumentosController
{
    static function main($action)
    {
        if ($action == "crear") {
            DocumentosController::crear();
        } else if ($action == "select") {
        DocumentosController::selectDocumentos();
        } else if ($action == "tablaEmpresa") {
            DocumentosController::tablaDocumentos();
        }else if ($action == "editar"){
            DocumentosController::editar();
        }
    }

    static public function crear()
    {
        try {
            $arrayDocumentos = array();
            $version=$_POST['Version'];
            if (is_uploaded_file($_FILES['Documento']['tmp_name']))
            {
                $nombreDirectorio = "../Documentos/";
                $nombreFichero = $_FILES['Documento']['name'];
                $nuevo_path="../Documentos/".$version.$nombreFichero;
                move_uploaded_file($_FILES['Documento']['tmp_name'], $nombreDirectorio.$version.$nombreFichero);
            } else{
                echo ("No se ha podido subir el fichero");
                header("Location: ../Vista/CreateDocumentos.php?respuesta=errorFoto");
            }
            $arrayDocumentos['Nombre'] = $_POST['Nombre'];
            $arrayDocumentos['Descripcion'] = $_POST['Descripcion'];
            $arrayDocumentos['Tipo'] = $_POST['Tipo'];
            $arrayDocumentos['Version'] = "v".$_POST['Version'];
            $arrayDocumentos['Documento'] = $nuevo_path;
            $arrayDocumentos['idLicitacion'] = $_POST['idLicitacion'];
            var_dump($arrayDocumentos);
            $documentos = new Documentos($arrayDocumentos);
            $documentos->insertar();

           header("Location: ../Vista/CreateDocumentos.php?respuesta=correcto");
        } catch (Exception $e) {
           header("Location: ../Vista/CreateDocumentos.php?respuesta=error");
        }
    }    static public function editar (){
    try {
        $arrayDocumentos = array();
        $version=$_POST['Version'];
        if (is_uploaded_file($_FILES['Documento']['tmp_name']))
        {
            $nombreDirectorio = "../Documentos/V";
            $nombreFichero = $_FILES['Documento']['name'];
            $nuevo_path="../Documentos/V".$version.$nombreFichero;
            move_uploaded_file($_FILES['Documento']['tmp_name'], $nombreDirectorio.$version.$nombreFichero);
        } else{
            echo ("No se ha podido subir el fichero");
            header("Location: ../Vista/UpdateDocumentos.php?respuesta=errorFoto");
        }
        $arrayDocumentos['Nombre']=$_POST['Nombre'];
        $arrayDocumentos['Descripcion'] = $_POST['Descripcion'];
        $arrayDocumentos['Tipo'] = $_POST['Tipo'];
        $arrayDocumentos['Version'] = $_POST['Version'];
        $arrayDocumentos['Documento'] = $nuevo_path;
        $arrayDocumentos['idLicitacion'] = $_POST['idLicitacion'];
        $arrayDocumentos['idDocumentos']=$_POST['idDocumentos'];
        $especial = new Documentos($arrayDocumentos);
        $especial->editar();
       header("Location: ../Vista/UpdateDocumentos.php?respuesta=correcto");
        //var_dump($arrayDocumentos);
    } catch (Exception $e) {
          header("Location: ../Vista/UpdateDocumentos.php?respuesta=error");
    }
}

    static public function buscarID($id)
    {
        try {
            return Documentos::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../updateDocumentos.php?respuesta=error");
        }
    }

    static public function selectDocumentos()
    {
        $arrayDocumentos = Documentos::getAll();
        $htmlSelect = "";
        $htmlSelect .= "<select name='idDocumentos' id='idDocumentos' class='form-control'>";
        $htmlSelect .= "<option>Seleccione</option>";
        foreach ($arrayDocumentos as $documento) {
            $htmlSelect .= "<option value='" . $documento->getIdDocumentos() . "' id='" . $documento->getIdDocumentos() . "'>" . $documento->getNombre() . " Nombre: " . $documento->getDescripcion() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    public function tablaDocumentos()
    {
        $arrDocumentos = Documentos::getAll();
        $htmlSelect = "";
        foreach ($arrDocumentos as $documento) {
            $htmlSelect .= "<tr>";
            $htmlSelect .= "<td hidden  >" . $documento->getIdDocumentos() . "</td>";
            $htmlSelect .= "<td>" . $documento->getNombre() . "</td>";
            $htmlSelect .= "<td>" . $documento->getDescripcion() . "</td>";
            $htmlSelect .= "<td>" . $documento->getFechaPublicacion() . "</td>";
            $htmlSelect .= "<td>" . $documento->getVersion() . "</td>";
            $htmlSelect .= "<td>";
            $htmlSelect .= "<a href='showDocumentos.php?id=" . ($_SESSION['documento'] = $documento->getIdDocumentos()) . "' type='button' data-toggle='tooltip' title='Ver Documento' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-share'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='UpdateDocumentos.php?id=" . $documento->getIdDocumentos() . "' type='button' data-toggle='tooltip' title='Actualizar' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
            $htmlSelect .= "<spam> </spam>";
            $htmlSelect .= "<a href='".$documento->getDocumento()."'  download='".$documento->getDocumento()."' type='button' data-toggle='tooltip' title='Descargar Archivo' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-save'></i></a>";

            $htmlSelect .= "</tr>";
        }

        return $htmlSelect;
    }
    static public function traersolodocumentos($id)
    {
        try {
            $arrDocumentos= Documentos::buscarForIdLicitacion($id);
            $htmlSelect = "";
            foreach ($arrDocumentos as $documento) {

                $htmlSelect .= "<tr>";
                $htmlSelect .= "<td hidden  >" . $documento->getIdDocumentos() . "</td>";
                $htmlSelect .= "<td>" . $documento->getNombre() . "</td>";
                $htmlSelect .= "<td>" . $documento->getDescripcion() . "</td>";
                $htmlSelect .= "<td>" . $documento->getFechaPublicacion() . "</td>";
                $htmlSelect .= "<td>" . $documento->getVersion() . "</td>";
                 $htmlSelect .= "<td>";
                $htmlSelect .= "<spam> </spam>";
                $htmlSelect .= "<a href='ShowDocumentos-Licitacion.php?id=" . ($_SESSION['documento'] = $documento->getIdDocumentos()) . "' type='button' data-toggle='tooltip' title='Ver Documento' class='btn docs-tooltip btn-info btn-xs'><i class='glyphicon glyphicon-share'></i></a>";
                $htmlSelect .= "<spam> </spam>";
                $htmlSelect .= "<a href='UpdateDocumentos-Licitacion.php?id=" . $documento->getIdDocumentos() . "' type='button' data-toggle='tooltip' title='Actualizar' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></a>";
                $htmlSelect .= "<spam> </spam>";
                $htmlSelect .= "<a href='".$documento->getDocumento()."'  download='".$documento->getDocumento()."' type='button' data-toggle='tooltip' title='Descargar Archivo' class='btn docs-tooltip btn-primary btn-xs'><i class='glyphicon glyphicon-save'></i></a>";
                $htmlSelect .= "<spam> </spam>";
                $htmlSelect .= "</tr>";
                $htmlSelect .= "<spam> </spam>";


            }

            return $htmlSelect;
        } catch (Exception $e) {
            //header("Location: ../updateDocumentos.php?respuesta=error");
        }
    }

}