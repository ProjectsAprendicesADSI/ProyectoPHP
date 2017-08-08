<?php session_start();
require "../Controlador/SecretariaController.php";
if(isset($_SESSION['verificar'])&&$_SESSION['verificar']==true)
{
    if(($_SESSION['DataPersona']["Cargo"])=="General"||($_SESSION['DataPersona']["Cargo"])=="Administrador" ){

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
    <title>Registro Personas</title>

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
                                    <h5>Registro Personas</h5>
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
                                            <a href="AdministrarPersona.php"> <div class="alert alert-info" id="correcto" title="Registro Exitoso" >
                                                    <p> <i class="glyphicon glyphicon-ok-sign"></i>
                                                    La Persona se ha creado correctamente</p>
                                            </div></a>
                                        <?php }else {?>
                                            <div class="alert alert-danger" title="Registro Fallido!" >
                                                <p><i class="glyphicon glyphicon-remove-sign"></i>&nbsp;Error! La Persona no se pudo crear correctamente intentalo nuevamente</p>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <form class="form-horizontal" id="block-validate"  enctype="multipart/form-data" action="../Controlador/PersonaController.php?action=crear" method="POST">


                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Nombre</label>
                                             <div class="col-lg-4">
                                                <input type="text" placeholder="Nombres" required class="form-control" name="Nombres" id="Nombres">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Apellido</label>
                                            <div class="col-lg-4">
                                                <input type="text" placeholder="Apellidos" required class="form-control" name="Apellidos" id="Apellidos">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Tipo Documento</label>
                                            <div class="col-lg-4">
                                                <select required name="TipoDocumento" id="TipoDocumento" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <option value="C.C">Cedula Ciudadania</option>
                                                    <option value="T.I">Tarjeta Identidad</option>
                                                    <option value="R.C">Registro Civil</option>
                                                    <option value="C.E">Cedula Extranjera</option>
                                                    <option value="Otros">Otros</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">N° Documento</label>
                                            <div class=" col-lg-4">
                                                <input  placeholder="Documento" minlength="6" maxlength="15" required class="form-control" type="number" name="Documento" id="Documento"/>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Fecha Nacimiento</label>

                                            <div class=" col-lg-4">
                                                <input required class="form-control" type="date"
                                                  max="2009/01/01"    data-date-format="aaaa/mm/dd" name="Fecha_Nacimiento" id="Fecha_Nacimiento"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Genero</label>
                                            <div class="col-lg-4">
                                                <select required name="Genero" id="Genero" class="form-control">
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Telefono</label>

                                            <div class=" col-lg-4">
                                                <input required placeholder="Telefono" class="form-control" type="number"
                                                    minlength="6" maxlength="15"   name="Telefono" id="Telefono"/>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label  class="control-label col-lg-4">Dirección</label>
                                            <div class="col-lg-4">
                                                <input required type="text" placeholder="Direccion" class=" form-control" name="Direccion" id="Direccion">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-lg-4">E-mail</label>

                                            <div class=" col-lg-4">
                                                <input required placeholder="E-mail" class="form-control" type="email" name="Correo"
                                                       id="Correo"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Usuario</label>
                                            <div class="col-lg-4">
                                                <input required placeholder="Usuario" type="text" class="form-control" name="Usuario" id="Usuario">
                                                <div id="resultado"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Contraseña</label>

                                            <div class=" col-lg-4">
                                                <input required placeholder="Contraseña" class="form-control" type="password" name="Contrasena" id="Contrasena"/>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Numero de Registro Profesional</label>

                                            <div class=" col-lg-4">
                                                <input required placeholder="Numero Registro Profesional" class="form-control" type="text"
                                                       name="NRP" id="NRP"/>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group" name="Cargo1" id="Cargo1">
                                            <label class="control-label col-lg-4">Cargo</label>
                                            <div class="col-lg-4">
                                                <select required name="Cargo" id="Cargo" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <option value="General">General</option>
                                                    <option value="Subgeneral">Subgeneral</option>
                                                    <option value="Secretari@">Secretari@</option>
                                                    <option value="Administrador">Administrador</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group" name="idSecretarias" id="idSecretarias">

                                            <label class="control-label col-lg-4">Secretaria</label>
                                            <div class="col-lg-4">
                                                <?php echo SecretariaController::selectSecretaria(true,"form-group"); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Contrato</label>
                                            <div class="col-lg-8">
                                                <input  type="file" id="ContratoPDF" name="ContratoPDF" accept="application/pdf "/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Foto</label>
                                            <div class="col-lg-8">
                                                <input type="file" id="imagen" name="imagen">

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Estado</label>
                                            <div class="col-lg-4">
                                                <select  name="Estado" id="Estadp" class="validate[required] form-control" readonly="readonly">
                                                    <option>Activo</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-actions no-margin-bottom">
                                            <input id="enviar" type="submit" value="Enviar" class="btn btn-primary">
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
            <script >
                $(document).ready(function() {
                    $('#idSecretarias').hide();
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
            <script type="text/javascript">
                $(document).ready(function(){
                    var consulta;
                    $("#Usuario").focus();
                    $("#Usuario").keyup(function(e){
                        consulta = $("#Usuario").val();
                        $("#resultado").delay(1000).queue(function(n) {
                            $("#resultado").html('<img src="ajax-loader.gif" />');
                            $.ajax({
                                type: "POST",
                                url: "snippers/Validacion.php?action=User",
                                data: "Usuario="+consulta,
                                dataType: "html",
                                error: function(){
                                    alert("error petición ajax");
                                },
                                success: function(data){
                                    if(data == "<span style='font-weight:bold;color:red;'>El nombre de usuario ya existe.</span>"){
                                        $('#enviar').attr("disabled", true);
                                    } else if(data == "<span style='font-weight:bold;color:green;'>Disponible.</span>"){
                                        $('#enviar').attr("disabled", false);
                                    }
                                    $("#resultado").html(data);
                                    n();
                                }
                            });

                        });

                    });

                });
            </script>

                <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
            <script src="assets/js/Validacion2.js"></script>

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
