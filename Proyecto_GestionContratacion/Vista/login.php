<?php require ("snippers/verificarSession.php");
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Page</title>

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
    <!-- <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login"  >

<div class="form-signin">
    <div class="text-center">
        <img src="assets/img/logosic.png" alt="SIC Logo">
    </div>
    <hr>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form  data-toggle="validator" role="form" id="frmLogin" name="frmLogin" >
                <p class="text-muted text-center">
                    Ingrese su Usuario y Contraseña
                </p>
                <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" class="form-control top">
                <input type="password" id="Contrasena" name="Contrasena" placeholder="Contraseña" class="form-control bottom">
                <div class="checkbox">
                    <label>

                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesion</button>
            </form>
            <p id="results" name="results">
                    <?php if ($_SESSION['error']==true){
                    echo "<div class='alert alert-danger alert-dismissable'>";
                    echo "    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                    echo "    <strong>Error!</strong>. Por Favor Inicie Sesion.";
                    echo "</div>";
                        session_destroy();
             } ?>
            </p>

        </div>

        <hr>

    </div>

    <!--jQuery -->
    <script src="assets/lib/jquery/jquery.js"></script>

    <!--Bootstrap -->

    <script src="assets/lib/bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#frmLogin').on('submit', function (e) {
                if (!e.isDefaultPrevented()) {
                    var formData = $(this).serialize(); //Serializamos los campos del formulario
                    $.ajax({
                        type        : 'POST', // Metodo de Envio
                        url         : '../Controlador/PersonaController.php?action=Login', // Ruta del envio
                        data        : formData, // our data object
                        //dataType    : 'json', // what type of data do we expect back from the server
                        encode      : true
                    })
                        .done(function(data) {
                            //console.log(data);
                            if (data == true){
                                window.location.href = "index.php";
                            }else{
                                $('#results').html(data);
                            }
                        });
                    event.preventDefault();
                }
            })
        });
    </script>
    <script>

        </script>
</body>

</html>
