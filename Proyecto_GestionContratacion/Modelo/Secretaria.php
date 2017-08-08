<?php
require_once('db_abstract_class.php');

class Secretaria extends db_abstract_class
{
 private $idSecretarias;
 private $Nombre;
 private $Mision;
 private $Vision;
 private $Objetivos;
 private $Telefono;
 private $Direccion;

    /**
     * Secretaria constructor.
     * @param $idSecretarias
     * @param $Nombre
     * @param $Mision
     * @param $Vision
     * @param $Objetivos
     * @param $Telefono
     * @param $Direccion
     */
    public function __construct($Secretaria_data = array())
    {

        parent::__construct();
        if(count($Secretaria_data)>1){
            foreach ($Secretaria_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else{
            $this->idSecretarias = "";
            $this->Nombre = "";
            $this->Mision = "";
            $this->Vision = "";
            $this->Objetivos = "";
            $this->Telefono = "";
            $this->Direccion = "";
        }


    }

    /**
     * @return string
     */
    public function getIdSecretarias()
    {
        return $this->idSecretarias;
    }

    /**
     * @param string $idSecretarias
     */
    public function setIdSecretarias($idSecretarias)
    {
        $this->idSecretarias = $idSecretarias;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param string $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return string
     */
    public function getMision()
    {
        return $this->Mision;
    }

    /**
     * @param string $Mision
     */
    public function setMision($Mision)
    {
        $this->Mision = $Mision;
    }

    /**
     * @return string
     */
    public function getVision()
    {
        return $this->Vision;
    }

    /**
     * @param string $Vision
     */
    public function setVision($Vision)
    {
        $this->Vision = $Vision;
    }

    /**
     * @return string
     */
    public function getObjetivos()
    {
        return $this->Objetivos;
    }

    /**
     * @param string $Objetivos
     */
    public function setObjetivos($Objetivos)
    {
        $this->Objetivos = $Objetivos;
    }

    /**
     * @return string
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * @param string $Telefono
     */
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
    }

    /**
     * @return string
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param string $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }



    public static function buscarForId($id)
    {
        $tmp = new Persona();
        if ($id > 0) {
            $getrow = $tmp->getRow("SELECT * FROM secretarias WHERE idSecretarias =?", array($id));
            $tmp = new Secretaria();
            $tmp->idSecretarias = $getrow['idSecretarias'];
            $tmp->Nombre = $getrow['Nombre'];
            $tmp->Mision = $getrow['Mision'];
            $tmp->Vision = $getrow['Vision'];
            $tmp->Objetivos = $getrow['Objetivos'];
            $tmp->Telefono = $getrow['Telefono'];
            $tmp->Direccion = $getrow['Direccion'];
            $tmp->Disconnect();
            return $tmp;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrSecretaria = array();
        $tmp = new Secretaria();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Secretaria = new Secretaria();
            $Secretaria->idSecretarias = $valor["idSecretarias"];
            $Secretaria->Nombre = $valor["Nombre"];
            $Secretaria->Mision = $valor["Mision"];
            $Secretaria->Vision = $valor["Vision"];
            $Secretaria->Objetivos = $valor["Objetivos"];
            $Secretaria->Telefono = $valor["Telefono"];
            $Secretaria->Direccion= $valor["Direccion"];
            $Secretaria->Direccion= $valor["Direccion"];
            array_push($arrSecretaria, $Secretaria);
        }
        $tmp->Disconnect();
        return $arrSecretaria;
    }

    public static function getAll()
    {
        return Secretaria::buscar("SELECT * FROM Secretarias");
    }

    public static function showCount()
    {
        $tmp = new Secretaria();
        $getRow = $tmp->getRow("SELECT COUNT(secretarias.idSecretarias) as NumSecretarias FROM proyectophp.secretarias");
        $html ="";

        print_r($getRow['NumSecretarias']);
        $tmp->Disconnect();
        return $html;
    }
    public  function insertar()
    {
        $this->insertRow("INSERT INTO proyectophp.secretarias VALUES (NULL, ?, ?, ?, ?, ?, ?)",array(
            $this->Nombre,
            $this->Mision,
            $this->Vision,
            $this->Objetivos,
            $this->Telefono,
            $this->Direccion,
        )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE proyectophp.secretarias SET Nombre = ?, Mision = ?, Vision = ?, Objetivos = ?, Telefono = ?, Direccion = ? WHERE idSecretarias = ?", array(
            $this->Nombre,
            $this->Mision,
            $this->Vision,
            $this->Objetivos,
            $this->Telefono,
            $this->Direccion,
            $this->idSecretarias,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }


}