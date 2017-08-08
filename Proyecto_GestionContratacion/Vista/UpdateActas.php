<?php
session_start();
require "../Controlador/ActasController.php";
require "../Controlador/SecretariaController.php";
if(isset($_SESSION['verificar'])&&$_SESSION['verificar']==true)
{
    if(($_SESSION['DataPersona']["Cargo"])=="General"|| ($_SESSION['DataPersona']["Cargo"])=="Subgeneral"|| ($_SESSION['DataPersona']["Cargo"])=="Secretari@" ){

    }else{
        header("Location: 403.html");
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
    <title>Actualizar Actas</title>

    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">

    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->

    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">
    <link rel="icon" href="assets/img/icono.png">


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
                                <h5>Actualizar  Actas</h5>
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
                                       <div class="alert alert-info"  title="Registro Exitoso" >
                                           <a href="AdministrarActas.php"  <p> <i class="glyphicon glyphicon-ok-sign"></i>
                                                   Acta se actualizo   correctamente</p>
                                        </a>
                                        </div>
                                    <?php }else {?>
                                        <div class="alert alert-danger" ititle="Registro Fallido!" >
                                            <p><i class="glyphicon glyphicon-remove-sign"></i>&nbsp;Error! Acta  no se pudo editar correctamente intentalo nuevamente</p>
                                        </div>
                                    <?php } ?>
                                <?php } ?>

                                <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                                    <?php

                                    $id2=$_GET["id"];
                                    $DataActas = ActasController::buscarID($id2);


                                    ?>
                                    <form class="form-horizontal" id="block-validate"  enctype="multipart/form-data" action="../Controlador/ActasController.php?action=editar" method="POST" novalidate>
                                        <?php
                                        $htmlSelect ="<h1> esta es la id'".$_GET["id"]."'</h1>"?>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Fecha</label>

                                            <div class=" col-lg-4">
                                                <input  class="form-control" type="date"  value="<?php echo $DataActas->getFecha(); ?>"
                                                        required  data-date-format="aaaa/mm/dd" name="Fecha" id="Fecha"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Hora</label>
                                            <div class=" col-lg-4">
                                                <input  type="time" required placeholder="Lugar" min="00" max="60" class="form-control" name="Hora" id="Hora" value="<?php echo $DataActas->getHora(); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label  class="control-label col-lg-4">Lugar Reunion</label>
                                            <div class="col-lg-4">
                                                <input  type="text" required placeholder="Lugar Reunion" class="form-control" name="Lugar_Reunion" id="Lugar_Reunion" value="<?php echo $DataActas->getLugarReunion(); ?>">
                                            </div>
                                        </div>


                                        <div id="div-1" class="body">
                                            <label class="control-label col-lg-4">Puntos Tratados</label>
                                            <textarea id="Puntos_Tratados" required name="Puntos_Tratados" class="form-control" rows="10" style="height: 100px;width: 330px;position: static "  ><?php echo $DataActas->getPuntosTratados(); ?></textarea>

                                        </div>
                                        <div id="div-1" class="body">
                                            <label class="control-label col-lg-4">Acuerdos Tomados</label>
                                            <textarea id="Acuerdos_Tomados" required  name="Acuerdos_Tomados" class="form-control" rows="10" style="height: 100px;width: 330px;position: static "  ><?php echo $DataActas->getAcuerdosTomados(); ?></textarea>

                                        </div>

                                        <div id="div-1" class="body">
                                            <label class="control-label col-lg-4">Observaciones</label>
                                            <textarea id="Observaciones" required  name="Observaciones" class=" form-control" rows="10" style="height: 100px;width: 330px;position: static "  ><?php echo $DataActas->getObservaciones(); ?></textarea>

                                        </div>
                                        <div hidden class="form-group" name="Cargo1" id="Cargo1">
                                            <label class="control-label col-lg-4">Persona a cargo</label>
                                            <div class="col-lg-4">

                                                <input  placeholder="idRegistro_Actas" class="form-control" type="text" name="idRegistro_Actas" id="idRegistro_Actas" value="<?php echo $DataActas->getIdRegistroActas(); ?>" />
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                        <div hidden class="form-group" name="Cargo1" id="Cargo1">
                                            <label class="control-label col-lg-4">Persona a cargo</label>
                                            <div class="col-lg-4">

                                                <input  placeholder="idPersona" class="form-control" type="text"
                                                       name="idPersona" id="idPersona" value="<?php echo $DataActas->getIdPersona(); ?>" />
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                        <div class="form-actions no-margin-bottom">
                                            <a href="AdministrarActas.php" class="btn btn-info ">Cancelar</a>
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
<script src="assets/js/Validacion.js"></script>

<!--Bootstrap -->
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