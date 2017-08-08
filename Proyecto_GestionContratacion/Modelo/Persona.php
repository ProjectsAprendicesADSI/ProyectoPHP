<?php


require_once('db_abstract_class.php');
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/07/2017
 * Time: 10:55 PM
 */
class Persona extends db_abstract_class
{
    private $idPersona;
    private $Tipo_Documento;
    private $Documento;
    private $Foto;
    private $Fecha_Nacimiento;
    private $Genero;
    private $Nombres;
    private $Apellidos;
    private $Telefono;
    private $Direccion;
    private $Correo;
    private $Contrato_PDF;
    private $NRP;
    private $Usuario;
    private $Contrasena;
    private $Estado;
    private $Cargo;
    private $idSecretarias;

    /**
     * @return mixed
     */


    /**
     * @param mixed $Secretarias_idSecretarias
     */


    /**
     * Persona constructor.
     * @param $idPersona
     * @param $Tipo_Documento
     * @param $Documento
     * @param $Foto
     * @param $Fecha_Nacimiento
     * @param $Genero
     * @param $Nombres
     * @param $Apellidos
     * @param $Telefono
     * @param $Direccion
     * @param $Correo
     * @param $Contrato_PDF
     * @param $NRP
     * @param $Usuario
     * @param $Contrasena
     * @param $Estado
     * @param $Tipo_Usuario
     */

    public function __construct($persona_data=array())
    {
        parent::__construct(); //
        if(count($persona_data)>1){ //
            foreach ($persona_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idPersona = "";
            $this->Tipo_Documento = "";
            $this->Documento = "";
            $this->Foto = "";
            $this->Fecha_Nacimiento = "";
            $this->Genero = "";
            $this->Nombres = "";
            $this->Apellidos = "";
            $this->Telefono =  "";
            $this->Direccion =  "";
            $this->Correo =  "";
            $this->Contrato_PDF =  "";
            $this->NRP =  "";
            $this->Usuario =  "";
            $this->Contrasena =  "";
            $this->Estado =  "";
            $this->Cargo =  "";
            $this->idSecretarias =  "";

        }
    }

    /**
     * @return mixed
     */


    public function getIdSecretarias()
    {
        return $this->idSecretarias;
    }

    /**
     * @param mixed $idSecretarias
     */
    public function setIdSecretarias($idSecretarias)
    {
        $this->idSecretarias = $idSecretarias;
    }


    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @param mixed $idPersona
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    /**
     * @return mixed
     */
    public function getTipoDocumento()
    {
        return $this->Tipo_Documento;
    }

    /**
     * @param mixed $Tipo_Documento
     */
    public function setTipoDocumento($Tipo_Documento)
    {
        $this->Tipo_Documento = $Tipo_Documento;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param mixed $Documento
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->Foto;
    }

    /**
     * @param mixed $Foto
     */
    public function setFoto($Foto)
    {
        $this->Foto = $Foto;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->Fecha_Nacimiento;
    }

    /**
     * @param mixed $Fecha_Nacimiento
     */
    public function setFechaNacimiento($Fecha_Nacimiento)
    {
        $this->Fecha_Nacimiento = $Fecha_Nacimiento;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->Genero;
    }

    /**
     * @param mixed $Genero
     */
    public function setGenero($Genero)
    {
        $this->Genero = $Genero;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * @param mixed $Nombres
     */
    public function setNombres($Nombres)
    {
        $this->Nombres = $Nombres;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->Apellidos;
    }

    /**
     * @param mixed $Apellidos
     */
    public function setApellidos($Apellidos)
    {
        $this->Apellidos = $Apellidos;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * @param mixed $Telefono
     */
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param mixed $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->Correo;
    }

    /**
     * @param mixed $Correo
     */
    public function setCorreo($Correo)
    {
        $this->Correo = $Correo;
    }

    /**
     * @return mixed
     */
    public function getContratoPDF()
    {
        return $this->Contrato_PDF;
    }

    /**
     * @param mixed $Contrato_PDF
     */
    public function setContratoPDF($Contrato_PDF)
    {
        $this->Contrato_PDF = $Contrato_PDF;
    }

    /**
     * @return mixed
     */
    public function getNRP()
    {
        return $this->NRP;
    }

    /**
     * @param mixed $NRP
     */
    public function setNRP($NRP)
    {
        $this->NRP = $NRP;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->Usuario;
    }

    /**
     * @param mixed $Usuario
     */
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->Contrasena;
    }

    /**
     * @param mixed $Contrasena
     */
    public function setContrasena($Contrasena)
    {
        $this->Contrasena = $Contrasena;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->Cargo;
    }

    /**
     * @param mixed $Cargo
     */
    public function setCargo($Cargo)
    {
        $this->Cargo = $Cargo;
    }




    public function insertar()
    {
        $this->insertRow("INSERT INTO persona VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array(
            $this->Tipo_Documento,
            $this->Documento,
            $this->Foto,
            $this->Fecha_Nacimiento,
            $this->Genero,
            $this->Nombres,
            $this->Apellidos,
            $this->Telefono,
            $this->Direccion,
            $this->Correo,
            $this->Contrato_PDF,
            $this->NRP,
            $this->Usuario,
            $this->Contrasena,
            $this->Estado,
            $this->Cargo,
            $this->idSecretarias,



    ));
        $this->Disconnect();

    }

    public function editar()
    {
        $this->updateRow("UPDATE proyectophp.persona SET Tipo_Documento = ?, Documento = ?, Foto = ?, Fecha_Nacimiento = ?, Genero = ?, Nombres = ?, Apellidos = ?, Telefono = ?, Direccion = ?, Correo = ?, Contrato_PDF = ?, NRP= ?, Usuario = ?, Contrasena = ?, Estado = ?, Cargo = ?, idSecretarias = ? WHERE idPersona = ?", array(
            $this->Tipo_Documento,
            $this->Documento,
            $this->Foto,
            $this->Fecha_Nacimiento,
            $this->Genero,
            $this->Nombres,
            $this->Apellidos,
            $this->Telefono,
            $this->Direccion,
            $this->Correo,
            $this->Contrato_PDF,
            $this->NRP,
            $this->Usuario,
            $this->Contrasena,
            $this->Estado,
            $this->Cargo,
            $this->idSecretarias,
            $this->idPersona,
        ));
        $this->Disconnect();
    }


    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    public static function buscarForId($id)
    {
        $tmp = new Persona();
        if ($id > 0) {
            $getrow = $tmp->getRow("SELECT * FROM proyectophp.persona WHERE idPersona =?", array($id));
            $tmp = new Persona();
            $tmp->idPersona = $getrow['idPersona'];
            $tmp->Tipo_Documento = $getrow['Tipo_Documento'];
            $tmp->Documento = $getrow['Documento'];
            $tmp->Foto = $getrow['Foto'];
            $tmp->Fecha_Nacimiento = $getrow['Fecha_Nacimiento'];
            $tmp->Genero = $getrow['Genero'];
            $tmp->Nombres = $getrow['Nombres'];
            $tmp->Apellidos = $getrow['Apellidos'];
            $tmp->Telefono = $getrow['Telefono'];
            $tmp->Direccion = $getrow['Direccion'];
            $tmp->Correo = $getrow['Correo'];
            $tmp->Contrato_PDF = $getrow['Contrato_PDF'];
            $tmp->NRP = $getrow['NRP'];
            $tmp->Usuario = $getrow['Usuario'];
            $tmp->Contrasena = $getrow['Contrasena'];
            $tmp->Estado = $getrow['Estado'];
            $tmp->Cargo = $getrow['Cargo'];
            $tmp->idSecretarias =$getrow['idSecretarias'];
            $tmp->Disconnect();
            return $tmp;
        }else{
            return NULL;
        }

    }

    public static function buscar($query)
    {
        $arrPacientes = array();
        $tmp = new Persona();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $persona = new Persona();
            $persona->idPersona =$valor['idPersona'];
            $persona->Tipo_Documento = $valor['Tipo_Documento'];
            $persona->Documento = $valor['Documento'];
            $persona->Foto = $valor['Foto'];
            $persona->Fecha_Nacimiento = $valor['Fecha_Nacimiento'];
            $persona->Genero = $valor['Genero'];
            $persona->Nombres = $valor['Nombres'];
            $persona->Apellidos = $valor['Apellidos'];
            $persona->Telefono = $valor['Telefono'];
            $persona->Direccion = $valor['Direccion'];
            $persona->Correo = $valor['Correo'];
            $persona->Contrato_PDF = $valor['Contrato_PDF'];
            $persona->NRP = $valor['NRP'];
            $persona->Usuario = $valor['Usuario'];
            $persona->Contrasena = $valor['Contrasena'];
            $persona->Estado = $valor['Estado'];
            $persona->Cargo=$valor['Cargo'];
            $persona->idSecretarias=$valor['idSecretarias'];
            array_push($arrPacientes, $persona);
    }
        $tmp->Disconnect();
        return $arrPacientes;
    }

    public static function showCount()
    {
        $tmp = new Secretaria();
        $getRow = $tmp->getRow("SELECT COUNT(persona.idPersona) as NumSecretarias FROM proyectophp.persona");
        $html ="";
        print_r($getRow['NumSecretarias']);
        $tmp->Disconnect();
        return $html;
    }
    public static function getAll()
    {
        return Persona::buscar("SELECT * FROM proyectophp.persona");
    }



}