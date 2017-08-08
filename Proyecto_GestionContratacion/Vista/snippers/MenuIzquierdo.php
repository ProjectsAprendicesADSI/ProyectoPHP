
<div id="left">
    <div class="media user-media bg-dark dker">
        <div class="user-media-toggleHover">
            <span class="fa fa-user"></span>
        </div>
        <div class="user-wrapper bg-dark">
            <a class="user-link" href="../Vista/Cambiarfoto.php">
                    <img class="media-object img-thumbnail user-img" alt="Imagen usuario" src="<?= $_SESSION["DataPersona"]["Foto"]; ?>" width="64" height="64">
            </a>

            <div class="media-body">
                        <?php echo "<h5>".($_SESSION['DataPersona']["Nombres"])." ".($_SESSION['DataPersona']["Apellidos"])."</h5>";
                              echo "<ul class='list-unstyled user-info'>";
                        echo "<li>".SecretariaController::printSecretarias(($_SESSION['DataPersona']["idSecretarias"]))." <br>";
                              echo "<li>Cargo: ".($_SESSION['DataPersona']["Cargo"])."</li>";
                              echo "<small><i class='glyphicon glyphicon-calendar'></i>"; echo date("d")." de ",date("F")." del ".date("Y")."</small>";
                              ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #menu -->
    <ul id="menu" class="bg-blue dker">
        <li class="nav-header">Menu</li>
        <li class="nav-divider"></li>
        <li class="">
            <a href="javascript:;">
                <i class="glyphicon  glyphicon-home "></i>
                <span class="link-title">Inicio</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="collapse">
                <li>
                    <a href="index.php">
                        <i class="glyphicon  glyphicon-home"></i> Volver al inicio </a>
                </li>
            </ul>
        </li>
        <?php if (($_SESSION['DataPersona']["Cargo"])=="General" || ($_SESSION['DataPersona']["Cargo"])=="Administrador"){ ?>


        <li class="">
            <a href="javascript:;">
                <i class="glyphicon glyphicon-user"></i>
                <span class="link-title">Personas</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="collapse">
                <li>
                    <a href="CreatePersona.php">
                        <i class="glyphicon  glyphicon-saved"></i>&nbsp; Registrar </a>
                </li>
                <li>
                    <a href="AdministrarPersona.php">
                        <i class="glyphicon  glyphicon-list"></i>&nbsp; Administrar </a>
                </li>
            </ul>
        </li>
          <?php    } ?>
        <?php if (($_SESSION['DataPersona']["Cargo"])=="General" || ($_SESSION['DataPersona']["Cargo"])=="Administrador"){ ?>
        <li class="">
            <a href="javascript:;">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span class="link-title">Secretaria</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="collapse">
                <li>
                    <a href="CreateSecretaria.php">
                        <i class="glyphicon  glyphicon-saved"></i>&nbsp; Registrar </a>
                </li>
                <li>
                    <a href="AdministrarSecretarias.php">
                        <i class="glyphicon  glyphicon-list"></i>&nbsp; Administrar  </a>
                </li>
            </ul>
        </li>
        <?php    } ?>
        <?php if (($_SESSION['DataPersona']["Cargo"])=="General" || ($_SESSION['DataPersona']["Cargo"])=="Secretari@"  || ($_SESSION['DataPersona']["Cargo"])=="Subgeneral"){ ?>
        <li class="">
            <a href="javascript:;">
                <i class="glyphicon glyphicon-book "></i>
                <span class="link-title">Contratos</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="collapse">
                <li>
                    <a href="CreateContratos.php">
                        <i class="glyphicon  glyphicon-saved"></i>&nbsp; Registrar  </a>
                </li>
                <li>
                    <a href="AdministrarContratos.php">
                        <i class="glyphicon  glyphicon-list"></i>&nbsp; Administrar  </a>
                </li>
            </ul>
        </li>
        <?php    } ?>
        <?php if (($_SESSION['DataPersona']["Cargo"])=="General" || ($_SESSION['DataPersona']["Cargo"])=="Secretari@"  || ($_SESSION['DataPersona']["Cargo"])=="Subgeneral"){ ?>
        <li class="">
            <a href="javascript:;">
                <i class="glyphicon glyphicon-briefcase "></i>
                <span class="link-title">Empresas</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="collapse">
                <li>
                    <a href="CreateEmpresas.php">
                        <i class="glyphicon  glyphicon-saved"></i>&nbsp; Registrar       </a>
                </li>
                <li>
                    <a href="AdministrarEmpresas.php">
                        <i class="glyphicon  glyphicon-list"></i>&nbsp; Administrar  </a>
                </li>
            </ul>
        </li>
        <?php    } ?>
        <?php if (($_SESSION['DataPersona']["Cargo"])=="General" || ($_SESSION['DataPersona']["Cargo"])=="Secretari@"  || ($_SESSION['DataPersona']["Cargo"])=="Subgeneral"){ ?>
        <li class="">
            <a href="javascript:;">
                <i class="glyphicon glyphicon-check "></i>
                <span class="link-title">Licitacion</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="collapse">
                <li>
                    <a href="CreateLicitacion.php">
                        <i class="glyphicon  glyphicon-saved"></i>&nbsp; Registrar     </a>
                </li>
                <li>
                    <a href="AdministrarLicitacion.php">
                        <i class="glyphicon  glyphicon-list"></i>&nbsp; Administrar     </a>
                </li>
            </ul>
        </li>
        <?php    } ?>
        <?php if (($_SESSION['DataPersona']["Cargo"])=="General" || ($_SESSION['DataPersona']["Cargo"])=="Secretari@"  || ($_SESSION['DataPersona']["Cargo"])=="Subgeneral"){ ?>
        <li class="">
            <a href="javascript:;">
                <i class="glyphicon glyphicon-file"></i>
                <span class="link-title">Entregables</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="collapse">
                <li>
                    <a href="CreateEntregables.php">
                        <i class="glyphicon  glyphicon-saved"></i>&nbsp; Registrar </a>
                </li>
                <li>
                    <a href="AdministrarEntregables.php">
                        <i class="glyphicon  glyphicon-list"></i>&nbsp; Administrar </a>
                </li>
            </ul>
        </li>
        <?php    } ?>
        <?php if (($_SESSION['DataPersona']["Cargo"])=="General" || ($_SESSION['DataPersona']["Cargo"])=="Secretari@"  || ($_SESSION['DataPersona']["Cargo"])=="Subgeneral"){ ?>
        <li class="">
            <a href="javascript:;">
                <i class="glyphicon glyphicon-folder-open"></i>
                <span class="link-title">Documentos</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="collapse">
                <li>
                    <a href="CreateDocumentos.php">
                        <i class="glyphicon  glyphicon-saved"></i>&nbsp; Registrar  </a>
                </li>
                <li>
                    <a href="AdministrarDocumentos.php">
                        <i class="glyphicon  glyphicon-list"></i>&nbsp; Administrar  </a>
                </li>
            </ul>
        </li>
        <?php    } ?>
        <?php if (($_SESSION['DataPersona']["Cargo"])=="General" || ($_SESSION['DataPersona']["Cargo"])=="Secretari@"  || ($_SESSION['DataPersona']["Cargo"])=="Subgeneral"){ ?>
        <li class="">
            <a href="javascript:;">
                <i class="glyphicon glyphicon-file"></i>
                <span class="link-title">Actas</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="collapse">
                <li>
                    <a href="CreateActas.php">
                        <i class="glyphicon  glyphicon-saved"></i>&nbsp; Registrar  </a>
                </li>
                <li>
                    <a href="AdministrarActas.php">
                        <i class="glyphicon  glyphicon-list"></i>&nbsp; Administrar  </a>
                </li>
            </ul>
        </li>
        <?php    } ?>
        <?php if (($_SESSION['DataPersona']["Cargo"])=="General" || ($_SESSION['DataPersona']["Cargo"])=="Subgeneral"){ ?>
        <li class="">
            <a href="javascript:;">
                <i class="glyphicon glyphicon-file"></i>
                <span class="link-title">Certificados</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="collapse">
                <li>
                    <a href="CreateCertificados.php">
                        <i class="glyphicon  glyphicon-saved"></i>&nbsp; Registrar  </a>
                </li>
                <li>
                    <a href="AdministrarCertificados.php">
                        <i class="glyphicon  glyphicon-list"></i>&nbsp; Administrar  </a>
                </li>
            </ul>
        </li>
        <?php    } ?>
    </ul>
    <!-- /#menu -->
</div>
