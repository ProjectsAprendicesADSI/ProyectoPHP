<?php
session_start();
require "../Controlador/ContratosController.php";
require "../Controlador/SecretariaController.php";

if(isset($_SESSION['verificar'])&&$_SESSION['verificar']==true)
{
    if(($_SESSION['DataPersona']["Cargo"])=="General"|| ($_SESSION['DataPersona']["Cargo"])=="Subgeneral" || ($_SESSION['DataPersona']["Cargo"])=="Secretari@"   ){

    }else{
        header("Location: 503.html");
    }

}else
{   $_SESSION['error']=true;
    header("Location: login.php");

}?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registro Contratos</title>

    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">

    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="icon" href="assets/img/icono.png">
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">

    <!-- onoffcanvas stylesheet -->
    <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">

    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="assets/lib/animate.css/animate.css">

    <link rel="stylesheet" href="/assets/lib/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css">
    <link rel="stylesheet" href="/assets/lib/jquery.gritter/css/jquery.gritter.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/themes/default/css/uniform.default.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--For Development Only. Not required -->
    <script>
        less = {
            env: "development",
            relativeUrls: false,
            rootpath: "/assets/"
        };
    </script>

    <link rel="stylesheet" href="assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>

</head>

<body class="  ">
<div class="bg-dark dk" id="wrap">
    <?php require("snippers/MenuSuperior.php");?>
    <!-- /#top -->
    <?php require ("snippers/MenuIzquierdo.php");?>
    <!-- /#left -->
    <div id="content">
        <div class="outer">
            <div class="inner bg-light lter">
                <style>
                    .form-control.col-lg-6 {
                        width: 50% !important;
                    }

                </style>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <header class="dark">
                                <div class="icons"><i class="fa glyphicon-user"></i></div>
                                <h5>Actualizar Contratos</h5>
                                <!-- .toolbar -->
                                <div class="toolbar">
                                    <nav style="padding: 8px;">
                                        <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-default btn-xs full-box">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </nav>
                                </div>            <!-- /.toolbar -->

                            </header>
                            <div id="collapse2" class="body">

                                <?php if(!empty($_GET['respuesta'])){ ?>
                                    <?php if ($_GET['respuesta'] == "correcto"){ ?>
                                        <div class="alert alert-info" id="correcto" title="Registro Exitoso" >
                                            <a href="AdministrarContratos.php" <p> <i class="glyphicon glyphicon-ok-sign"></i>
                                                La Actualización se ha creado correctamente</p>

                                        </div>
                                    <?php }else {?>
                                        <div class="alert alert-danger" id="error" title="Registro Fallido!" >
                                            <p><i class="glyphicon glyphicon-remove-sign"></i>&nbsp;Error! el Contrato no se pudo crear correctamente intentalo nuevamente</p>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                                    <?php

                                    $id2=$_GET["id"];
                                    $DataPersona = ContratosController::buscarID($id2);
                                    ?>
                                    <form class="form-horizontal" id="popup-validation"  enctype="multipart/form-data" action="../Controlador/ContratosController.php?action=editar" method="POST">


                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Tipo de Proceso</label>
                                            <div class="col-lg-4">
                                                <input type="text" value="<?php echo $DataPersona->getTipoProceso(); ?>"   required class="validate[required] form-control" name="Tipo_Proceso" id="Tipo_Proceso">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Estado</label>
                                            <div class="col-lg-4">
                                                <select id="Estado" name="Estado" class="form-control">
                                                    <option  <?php if($DataPersona->getEstado() == ""){ echo "selected"; } ?>></option>
                                                    <option <?php if($DataPersona->getEstado() == "Cancelado"){ echo "selected"; } ?>>Cancelado</option>
                                                    <option <?php if($DataPersona->getEstado() == "En ejecucion"){ echo "selected"; } ?>>En ejecucion</option>
                                                    <option <?php if($DataPersona->getEstado() == "Liquidado"){ echo "selected"; } ?>>Liquidado</option>
                                                     </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Regimen de contratacion</label>
                                            <div class="col-lg-4">
                                                <input type="text" placeholder="RC" required  value="<?php echo $DataPersona->getRC(); ?>" class="validate[required] form-control" name="RC" id="RC">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label  class="control-label col-lg-4">Descripcion</label>
                                            <div class="col-lg-4">
                                                <textarea required type="text" placeholder="Descripcion Objeto Contratar"  class="validate[required] form-control" name="Descripcion_Objeto_Contratar" id="Descripcion_Objeto_Contratar">
                                                 <?php echo $DataPersona->getDescripcionObjetoContratar(); ?></textarea></div>
                                        </div>

                                        <div class="form-group">
                                            <label  class="control-label col-lg-4">Cuantia</label>
                                            <div class="col-lg-4">
                                                <input required type="text" placeholder="Cuantia"  value="<?php echo $DataPersona->getCuantia(); ?>" class="validate[required] form-control" name="Cuantia" id="Cuantia">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label  class="control-label col-lg-4">Tipo de Contrato</label>
                                            <div class="col-lg-4">
                                                <input required type="text" placeholder="Tipo de Contrato"  value="<?php echo $DataPersona->getTipoContrato(); ?>" class="validate[required] form-control" name="Tipo_Contrato" id="Tipo_Contratro">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label  class="control-label col-lg-4">Departamento Ejecucion</label>
                                            <div class="col-lg-4">
                                                <input required type="text" placeholder="Departamento Ejecucion"  value="<?php echo $DataPersona->getDepartamentoEjecucion(); ?>" class="validate[required] form-control" name="departamento_Ejecucion" id="departamento_Ejecucion">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label  class="control-label col-lg-4">  Municipio Ejecucion</label>
                                            <div class="col-lg-4">
                                                <input required type="text" placeholder="Municipio Ejecucion"  value="<?php echo $DataPersona->getMunicipioEjecucion(); ?>"  class="validate[required] form-control" name="municipio_ejecucion" id="municipio_ejecucion">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label col-lg-4">Departamento de Obtencion de documentos</label>
                                            <div class="col-lg-4">
                                                <input required type="text" placeholder="Departamento Obtencion documentos"  value="<?php echo $DataPersona->getDepartamentoObtenciondocumentos(); ?>" class="validate[required] form-control" name="Departamento_Obtenciondocumentos" id="Departamento_Obtenciondocumentos">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label col-lg-4">  Municipio Obtencion de Documentos</label>
                                            <div class="col-lg-4">
                                                <input required type="text" placeholder="Municipio Obtencion Documentos"  value="<?php echo $DataPersona->getMunicipioObtencionDocumentos(); ?>"  class="validate[required] form-control" name="Municipio_Obtencion_Documentos" id="Municipio_Obtencion_Documentos">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label col-lg-4"> Direccion Entrega de Documentos</label>
                                            <div class="col-lg-4">
                                                <input required type="text" placeholder="Direccion entrega de documentos"  value="<?php echo $DataPersona->getDireccionEntregaDocumentos(); ?>"  class="validate[required] form-control" name="Direccion_Entrega_Documentos" id="Direccion_Entrega_Documentos">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Fecha de apertura de el procesoo</label>
                                            <div class="col-lg-4">
                                                <input  required class="validate[required] form-control"  type="text" name="Fecha_Hora_Apertura_Proceso" id="Fecha_Hora_Apertura_Proceso" value="<?php echo $DataPersona->getFechaHoraAperturaProceso(); ?>" >
                                            </div>
                                        </div>
                                        <div hidden class="form-group">
                                            <label  class="control-label col-lg-4">idpersona</label>
                                            <div class="col-lg-4">
                                                <input required type="text" value="<?php echo ($_SESSION['DataPersona']["idPersona"]);?>"  class="validate[required] form-control" name="idPersona" id="idPersona">
                                            </div>
                                        </div>
                                        <div hidden class="form-group">
                                            <label  class="control-label col-lg-4">idpersona</label>
                                            <div class="col-lg-4">
                                                <input required type="text" value="<?php echo $DataPersona->getIdContatosPublicos();?>"  class="validate[required] form-control" name="idContratos" id="idContratos">
                                            </div>
                                        </div>

                                            <div class="form-actions no-margin-bottom">
                                                <a href="AdministrarContratos.php" class="btn btn-info ">Cancelar</a>
                                                <button id="send" type="submit" class="btn btn-success" style="float: right">Enviar</button>
                                            </div>
                                    </form>
                                <?php }else{ ?>
                                    <?php if (empty($_GET["respuesta"])){ ?>
                                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Error!</strong> No se encontró ninguna Persona con el parámetro de búsqueda.
                                            <!--       <//?php $htmlSelect = "";
                                                   $htmlSelect .="<h1> esta es la id'".$_GET["id"]."'</h1>"?>
                                               --></div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.inner -->
        </div>
        <!-- /.outer -->
    </div>
    <!-- /#content -->

    <!-- /#right -->

</div>


<!-- /#right -->

</div>

<!-- /#wrap -->
<footer class="Footer bg-dark dker">
    <p>2017 &copy; SIC-Sistema Integrado de Contratacion. v1.0</p>
</footer>
<!-- /#footer -->
<!-- #helpModal -->
<div id="helpModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.modal -->
<!-- /#helpModal -->
<!--jQuery -->
<script src="assets/lib/jquery/jquery.js"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-en.min.js"></script>
<script src="assets/lib/bootstrap/js/bootstrap.js"></script>
<!-- MetisMenu -->
<script src="assets/lib/metismenu/metisMenu.js"></script>
<!-- onoffcanvas -->
<script src="assets/lib/onoffcanvas/onoffcanvas.js"></script>
<!-- Screenfull -->
<script src="assets/lib/screenfull/screenfull.js"></script>

<script src="assets/lib/jquery-validation/jquery.validate.js"></script>

<!-- Metis core scripts -->
<script src="assets/js/core.js"></script>

<!-- Metis demo scripts -->
<script src="assets/js/app.js"></script>
<script>
    $(function() {
        Metis.formValidation();
    });
</script>

<script src="assets/js/style-switcher.js"></script>

</body>

</html>
