<?php
require "../Controlador/SecretariaController.php";
require "../Controlador/PersonaController.php";
if(isset($_SESSION['verificar'])&&$_SESSION['verificar']==true)
{
    if(($_SESSION['DataPersona']["Cargo"])=="General"|| ($_SESSION['DataPersona']["Cargo"])=="Subgeneral"|| ($_SESSION['DataPersona']["Cargo"])=="Administrador" ){

    }else{
        header("Location: 403.html");
    }

}else
{
    header("Location: index.php");

}?>

<!DOCTYPE html>
<html>
<head>
	<title>Pagina</title>
    <style>
        th{
            font-family: Arial;
            size: 12px;
        }
    </style>
</head>
 <body>
<header>
	<table border="2" width="863">
		<thead>
		<th><img src="assets/img/imagen.png"></th><th>MODELO ESTÀNDAR DE CONTROL INTERNO SISTEMA DE GESTION DOCUMENTAL</th><th>ALCALDIA <br> RECETOR</th></thead>
		</table>
		<table width="863" border="2">
		<thead><th>DEPENDENCIA</th><th><?php echo SecretariaController::inputSecretaria($_SESSION['DataPersona']["idSecretarias"]);?></th><th>CODIGO TRD 130</th><th>Fecha: <?php echo date("d")." de ".date("m")." del ".date("Y") ?></th></thead></table>
	
</header>
<?php if(!empty($_GET['respuesta'])){ ?>
    <?php if ($_GET['respuesta'] == "correcto"){ ?>
        <div class="correcto" id="correcto" title="Registro Exitoso" >
            <p> <i class="glyphicon glyphicon-ok-sign"></i>
                La Persona se ha creado correctamente</p>
        </div>
    <?php }else {?>
        <div class="error" id="error" title="Registro Fallido!" >
            <p><i class="glyphicon glyphicon-remove-sign"></i>&nbsp;Error! La Persona no se pudo crear correctamente intentalo nuevamente</p>
        </div>
    <?php } ?>
<?php } ?>

<?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
    <?php
    $DataPersona = PersonaController::buscarID($_GET["id"]);

    ?>
    <form class="form-horizontal" id="popup-validation"  enctype="multipart/form-data" action="../Controlador/PersonaController.php?action=buscarForId($id)" method="POST">
        <?php
        $htmlSelect ="<h1> esta es la id'".$_GET["id"]."'</h1>"?>
<table>
    <thead>
       <th> <div class="form-group">
            <label class="control-label col-lg-4">Nombre</label>
            <div class="col-lg-4">

                <h4 id="Nombres" class="form-control col-md-7 col-xs-12" name="Nombres" ><?php echo $DataPersona->getNombres(); ?></h4>
            </div>
        </div>
       </th>
    <td>
        <div class="form-group">
            <label class="control-label col-lg-4">Apellido</label>
            <div class="col-lg-4">
<h4><?php echo $DataPersona->getApellidos(); ?></h4>
            </div>
        </div>
    </td>
     <td>   <div class="form-group">
            <label class="control-label col-lg-4">Tipo Documento</label>
            <div class="col-lg-4">
                <h4><?php echo $DataPersona->getTipoDocumento(); ?></h4>
            </div>
        </div>
     </td>
    <td>
        <div class="form-group">
            <label class="control-label col-lg-4">N° Documento</label>
            <div class=" col-lg-4">
<h4><?php echo $DataPersona->getDocumento(); ?></h4>        </div>
        </div>
    </td>
    </thead>
    <tbody>

    <th>
        <div class="form-group">
            <label class="control-label col-lg-4">Fecha Nacimiento</label>
            <div class="col-lg-4">
<h4><?php echo $DataPersona->getFechaNacimiento(); ?></h4>            </div>
        </div>

</th>
      <th>
        <div class="form-group">
            <label class="control-label col-lg-4">Género</label>
            <div class="col-lg-4">
<h4><?php echo $DataPersona->getGenero(); ?></h4>            </div>
        </div>
      </th>
     <th>   <div class="form-group">
            <label class="control-label col-lg-4">Teléfono</label>

            <div class=" col-lg-4">
                <h4><?php echo $DataPersona->getTelefono(); ?></h4>
                <span class="help-block"></span>
            </div>
        </div>
     </th>
    <th>
        <div class="form-group">
            <label  class="control-label col-lg-4">Dirección</label>
            <div class="col-lg-4">
                <h4><?php echo $DataPersona->getDireccion(); ?></h4>
            </div>
        </div>
    </th>
<th>
        <div class="form-group">
            <label class="control-label col-lg-4">E-mail</label>

            <div class=" col-lg-4">
              <h4><?php echo $DataPersona->getCorreo(); ?></h4>
            </div>
        </div>
</th>

    </tbody>
    <tbody>
    <th>
        <div class="form-group">
            <label class="control-label col-lg-4">Usuario</label>
            <div class="col-lg-4">
               <h4><?php echo $DataPersona->getUsuario(); ?></h4>

            </div>
        </div>
    </th>
    <th>
    <div class="form-group">
            <label class="control-label col-lg-4">Número de Registro Profesional</label>

            <div class=" col-lg-4">
                <h4><?php echo $DataPersona->getNRP(); ?></h4>
                <span class="help-block"></span>
            </div>
        </div>
    </th>
    <th>
    <div class="form-group" name="Cargo1" id="Cargo1">
            <label class="control-label col-lg-4">Cargo</label>
            <div class="col-lg-4">
            <h4><?php echo $DataPersona->getCargo(); ?></h4>
                <span class="help-block"></span>

            </div>
        </div>
    </th>
    </tbody>
</table>
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


<footer>
	<img style="right: 100px" src="assets/img/imagen 2.png">
</footer>
</body>
</html>
