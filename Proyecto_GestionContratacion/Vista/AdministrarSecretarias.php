<?php
require "../Controlador/SecretariaController.php";
require "../Controlador/PersonaController.php";
if(isset($_SESSION['verificar'])&&$_SESSION['verificar']==true)
{
    if(($_SESSION['DataPersona']["Cargo"])=="General"||  ($_SESSION['DataPersona']["Cargo"])=="Administrador" ){

    }else{
        header("Location: 503.html");
    }
}else
{    $_SESSION['error']=true;
    header("Location: login.php");

}?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Administrar Secretarias</title>

    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">

    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->


    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- metisMenu stylesheet -->

    <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">
    <!-- onoffcanvas stylesheet -->
    <link rel="icon" href="assets/img/icono.png">
    <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">
    <link rel="stylesheet" href="assets/lib/animate.css/animate.css">

    <!-- animate.css stylesheet -->
    <!--link rel="stylesheet" href="assets/lib/animate.css/animate.css">
     <link rel="stylesheet" href="/assets/lib/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css">

    <link rel="stylesheet" href="/assets/lib/jquery.gritter/css/jquery.gritter.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">

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

                                <div id="collapse2" class="body">

                                    <form class="form-horizontal" id="popup-validation"  enctype="multipart/form-data" action="" method="POST">
                                        <!--Begin Datatables-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="box">
                                                    <header>
                                                        <div class="icons"><i class="fa fa-table"></i></div>
                                                        <h5>Administrar Secretarias</h5>
                                                    </header>
                                                    <div id="collapse4" class="body">
                                                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th hidden >idPersona</th>
                                                                <th>Nombre</th>
                                                                <th>Telefono</th>
                                                                <th>Direccion</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                            </thead>
                                                            <?php echo SecretariaController::tablaSecretaria(); ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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

            <!-- /#wrap -->
            <footer class="Footer bg-dark dker">
                <p>2017 &copy; SIC-Sistema Integrado de Contratacion. v1.0</p>
            </footer>
            <!-- /#footer -->
            <!-- #helpModal -->

            <!-- /.modal -->
            <!-- /#helpModal -->
            <!--jQuery -->
            <script src="assets/lib/jquery/jquery.js"></script>


                <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.26.6/js/jquery.tablesorter.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
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
            <script>
                $(function() {
                    Metis.MetisTable();
                    Metis.metisSortable();
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
