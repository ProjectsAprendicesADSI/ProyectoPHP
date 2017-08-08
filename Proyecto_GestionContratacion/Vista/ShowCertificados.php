<?php session_start();

require "../Controlador/CertificadosController.php";
require "../Controlador/LicitacionController.php";
require "../Controlador/EntregableController.php";
require "../Controlador/EmpresaController.php";
require "../Controlador/ContratosController.php";
require "../Controlador/SecretariaController.php";
if(isset($_SESSION['verificar'])&&$_SESSION['verificar']==true)
{
    if(($_SESSION['DataPersona']["Cargo"])=="General" ){

    }else{
        header("Location: 403.html");
    }

}else
{$_SESSION['error']=true;
    header("Location: login.php");

}


?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ver Certificados</title>

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
    <!--link rel="stylesheet" href="assets/lib/animate.css/animate.css">
     <link rel="stylesheet" href="/assets/lib/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css">
    <link rel="stylesheet" href="/assets/lib/jquery.gritter/css/jquery.gritter.css">-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/themes/default/css/uniform.default.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css">

  

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
<body>
<header>
                            <table border="2" width="863">
                                <thead>
                                <th><img src="assets/img/imagen.png"></th><th>MODELO ESTÀNDAR DE CONTROL INTERNO SISTEMA DE GESTION DOCUMENTAL</th><th>ALCALDIA <br> RECETOR</th></thead>
                            </table>
                            <table width="863" border="2">
                                <thead><th>DEPENDENCIA</th><th><?php echo SecretariaController::inputSecretaria($_SESSION["DataPersona"]["idSecretarias"]);?></th><th>CODIGO TRD 130</th><th>Fecha: <?php echo date("d")." de ".date("m")." del ".date("Y") ?></th></thead>

                            </table>
                            </header>
                                    <?php if(!empty($_GET["respuesta"])){ ?>
                                        <?php if ($_GET["respuesta"] == "correcto"){ ?>
                                            <div class="alert alert-info"  title="Registro Exitoso" >
                                                <p> <i class="glyphicon glyphicon-ok-sign"></i>
                                                    La Persona se ha creado correctamente</p>
                                            </div>
                                        <?php }else {?>
                                            <div class="alert alert-danger"  title="Registro Fallido!" >
                                                <p><i class="glyphicon glyphicon-remove-sign"></i>&nbsp;Error! La Persona no se pudo crear correctamente intentalo nuevamente</p>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                                        <?php
                                        $DataCertificados = CertificadosController::buscarID($_GET["id"]);
                                        $DataEntregable = EntregableController::buscarID($DataCertificados->getIdEntregables());
                                      $DataLicitacion = LicitacionController::buscarID($DataEntregable->getIdLicitacion());

                                        $nombreSecretaria= SecretariaController::inputSecretaria($_SESSION["DataPersona"]["idSecretarias"]);
                                        ?>
                                        <form class="form-horizontal" id="popup-validation"  enctype="multipart/form-data" action="../Controlador/CertificadosController.php?action=buscarForId($id)" method="POST">

                                            <br>

                                            <div class="form-group">
                                                <label class="control-label col-lg-4" STYLE="font-weight: bold; font-size: 30px;padding-left: 300px;  " >CERTIFICADO</label>
                                            </div>
                                            <br> <br>

                                            <label style="text-align: left ; margin-left: 50px; font-size: 20px;">Contrato:</label>
                                            <label style="text-align: left ; margin-left: 20px; font-size: 15px;"><?php echo $DataEntregable->getEntregablesActividad($DataCertificados->getIdEntregables()); ?></label>


                                            <label style="text-align: left ; margin-left: 50px; font-size: 20px;">Contratista:</label>

                                            <label style="text-align: left ; margin-left: 20px; font-size: 15px;"><?php echo LicitacionController::printLicitacion($DataEntregable->getIdLicitacion());?></label>
                                            <br>


                                            <label style="text-align: left ; margin-left: 50px; font-size: 20px;">Contratante:</label>
                                            <label style="text-align: left ; margin-left: 20px; font-size: 15px;">Municipio Recetor</label>

                                            <br> <br>


                                            <label style="text-align: left ; margin-left: 50px; font-size: 20px;">Objeto:</label>
                                            <label style="text-align: left ; margin-left: 20px; font-size: 15px;"><?php echo ContratosController::printObjeto($DataLicitacion->getIdContatosPublicos());?></label>
                                            <br><br>


                                            <label style="text-align: left ; margin-left: 50px; font-size: 20px;">Valor Inicial:</label>
                                            <label style="text-align: left ; margin-left: 20px; font-size: 15px;"><?php echo ContratosController::printPlata($DataLicitacion->getIdContatosPublicos());?></label>

                                            <label style="text-align: left ; margin-left: 50px; font-size: 20px;">Fecha Inicio:</label>
                                            <label style="text-align: left ; margin-left: 20px; font-size: 15px;"><?php echo $DataEntregable->getFechaCumplimiento($DataCertificados->getIdEntregables()); ?></label>

                                            <label style="text-align: left ; margin-left: 50px; font-size: 20px;">Fecha Entrega:</label>
                                            <label style="text-align: left ; margin-left: 20px; font-size: 15px;"><?php echo $DataEntregable->getFechaEntrega($DataCertificados->getIdEntregables()); ?></label>
                                            <br> <br> <br>
                                            <label style="text-align: justify ; margin-left: 50px; font-size: 18px;">En el municipio de Recetor de Casanare se reunieron los señores <?php echo "<b>".($_SESSION['DataPersona']["Nombres"])." ".($_SESSION['DataPersona']["Apellidos"])."</b>"?> a cargo de la <br>
                                                <?php echo SecretariaController::printSecretarias($_SESSION['DataPersona']["idSecretarias"]);?> y <?php echo LicitacionController::printLicitacion($DataEntregable->getIdLicitacion());?> Con N° de identificacion <?php echo LicitacionController::Documento($DataEntregable->getIdLicitacion());?>
                                                 Titular del contrato <?php echo $DataEntregable->getEntregablesActividad($DataCertificados->getIdEntregables()); ?> de
                                                <br> <?php echo $DataEntregable->getFechaCumplimiento($DataCertificados->getIdEntregables()); ?> con el fin de suscribir el acta de Terminacion del contrato cuyo objeto es:
                                                <br> <?php echo ContratosController::printObjeto($DataLicitacion->getIdContatosPublicos());?>.
                                                <br> El contratista presento informe de avance en la ejecución de las actividades en el período
                                                <br> comprendido entre <?php echo $DataEntregable->getFechaCumplimiento($DataCertificados->getIdEntregables()); ?>  al  <?php echo $DataEntregable->getFechaEntrega($DataCertificados->getIdEntregables()); ?> del contrato <?php echo $DataEntregable->getEntregablesActividad($DataCertificados->getIdEntregables()); ?>, en el cual evidencia un
                                                <br> avance parcial que justifica la presente liquidación.
                                                <br> El contratista ha cumplido parcialmente con las actividades contratadas mediante el contrato <?php echo $DataEntregable->getEntregablesActividad($DataCertificados->getIdEntregables()); ?>
                                                <br> de  <?php echo $DataEntregable->getFechaCumplimiento($DataCertificados->getIdEntregables()); ?>.
                                                <br> La presente diligencia elevada en el acta se da por terminada; Para constancia firma y prueba
                                                <br> se firmapor quienes en ella intervienen,en original, con destino a la Entidad Contratante
                                                <br>  y una copia para el/ella contratista
                                                <br>
                                                <br> __________________________________________ <br> Firma
                                                <br> <?php echo "<b>".($_SESSION['DataPersona']["Nombres"])." ".($_SESSION['DataPersona']["Apellidos"])."</b>"?>
                                                <br>
                                                <?php echo SecretariaController::printSecretarias($_SESSION['DataPersona']["idSecretarias"]);?>
                                                <br> <?php echo "<b>".($_SESSION['DataPersona']["Cargo"]); ?>

                                                <br> <br> _________________________________________ <br> Firma
                                                <br> <?php echo LicitacionController::printLicitacion($DataEntregable->getIdLicitacion());?>

                                              </label>


                                        </form>

                                        <footer>
                                            <table border="2" width="863">
                                                <thead>
                                                <th><img src="assets/img/imagen 2.png" style="width: 870px; height: 100px"></th></thead>
                                            </table>

                                        </footer>
                                        <br>
                                        <div class="form-actions no-margin-bottom">
                                            <a href="../TCPDF/examples/ShowCertificados.php?id=<?php echo $_GET['id'];?>" type="submit" class="btn btn-success" style="float: right">Ver pdf</a>
                                        </div>
                                    <?php }else{ ?>
                                        <?php if (empty($_GET["respuesta"])){ ?>
                                            <div class="alert alert-danger" role="alert">
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






            <!-- /.modal -->
            <!-- /#helpModal -->
            <!--jQuery -->
            <script src="assets/lib/jquery/jquery.js"></script>
            <script >
                $(document).ready(function() {
                    $('#idSecretaria').hide();
                    $('#Cargo').change(function() {
                        if($(this).val() == 'General'){
                            $('#idSecretarias').show();
                        }else if($(this).val() == 'Subgeneral'){
                            $('#idSecretarias').show();
                        }else if($(this).val() == 'Secretari@'){
                            $('#idSecretarias').show();
                        } else {
                            $('#idSecretarias').hide();
                        }
                    });

                });
            </script>

                <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-en.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/holder/2.4.1/holder.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/jquery.uniform.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
           <script src="assets/lib/bootstrap/js/bootstrap.js"></script>
            <!-- MetisMenu -->
            <script src="assets/lib/metismenu/metisMenu.js"></script>
            <!-- onoffcanvas -->
            <script src="assets/lib/onoffcanvas/onoffcanvas.js"></script>
            <!-- Screenfull -->
            <script src="assets/lib/screenfull/screenfull.js"></script>

            <!-- script src="/assets/lib/plupload/js/plupload.full.min.js"></script>
            <script src="/assets/lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>
            <script src="/assets/lib/jquery.gritter/js/jquery.gritter.min.js"></script>
            <script src="/assets/lib/formwizard/js/jquery.form.wizard.js"></script> -->
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

            <script src="assets/lib/jquery/jquery.js"></script>
            <script>
                $(function() {
                    Metis.formWizard();
                });
            </script>



            <script >

            </script>

        </body>

</html>
