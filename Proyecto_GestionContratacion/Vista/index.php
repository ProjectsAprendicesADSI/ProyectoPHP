<?php session_start();
require "../Controlador/SecretariaController.php";
require "../Controlador/ContratosController.php";
require "../Controlador/EmpresaController.php";
if(isset($_SESSION['verificar'])&&$_SESSION['verificar']==true){
    if (($_SESSION['DataPersona']["Estado"])=="Activo")
    {

    }else{
        header("location: 403.html");
    }
}else{

    $_SESSION['error']=true;
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
    <title>Inicio</title>

    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">

    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    <link rel="icon" href="assets/img/icono.png">
    <!-- Bootstrap -->
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Registros <small>Todos los usuarios</small> </h2>

                                    <ul class="pricing-table"  id="light">
                                        <li class="col-lg-3">
                                            <h3>Secretarias</h3>
                                            <div class="price-body">
                                                <div class="price" >
                                                <?php Secretaria::showCount(); ?>
                                                </div>
                                            </div>

                                            <div class="footer">
                                                <a href="AdministrarSecretarias.php" class="btn btn-info ">Ver Secretarias</a>
                                            </div>
                                        </li>
                                        <!-- Active/Hover styles -->
                                        <li class="col-lg-3">
                                            <h3>Personas</h3>
                                            <div class="price-body">
                                                <div class="price" >
                                                    <?php Persona::showCount(); ?>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                <a href="AdministrarPersona.php" class="btn btn-info ">Ver Personas</a>
                                            </div>
                                        </li>
                                        <li class="col-lg-3">
                                            <h3>Contratos</h3>
                                            <div class="price-body">
                                                <div class="price">
                                                    <?php Contratos::showCount(); ?>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                <a href="AdministrarContratos.php" class="btn btn-info ">Ver Contratos</a>
                                            </div>
                                        </li>
                                        <li class="col-lg-3">
                                            <h3>Empresas</h3>
                                            <div class="price-body">
                                                <div class="price" >
                                                    <?php Empresas::showCount(); ?>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                <a href="AdministrarEmpresas.php" class="btn btn-info ">Ver Empresas</a>
                                            </div>
                                        </li>
                                        <div class="clearfix"></div>
                                    </ul>

                                </div>
                                <!-- /.col-lg-12 -->
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


            <!--Bootstrap -->
            <script src="assets/lib/bootstrap/js/bootstrap.js"></script>
            <!-- MetisMenu -->
            <script src="assets/lib/metismenu/metisMenu.js"></script>
            <!-- onoffcanvas -->
            <script src="assets/lib/onoffcanvas/onoffcanvas.js"></script>
            <!-- Screenfull -->
            <script src="assets/lib/screenfull/screenfull.js"></script>


            <!-- Metis core scripts -->
            <script src="assets/js/core.js"></script>
            <!-- Metis demo scripts -->
            <script src="assets/js/app.js"></script>


            <script src="assets/js/style-switcher.js"></script>
        </body>

</html>
