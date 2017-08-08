<?php
require_once('db_abstract_class.php');

/**
 * Created by PhpStorm.
 * User: Equipo13
 * Date: 24/07/2017
 * Time: 2:37 PM
 */
class Licitacion extends db_abstract_class
{
    private $idLicitacion;
    private $Fecha_firma_contrato;
    private $Ejecucion_Contrato;
    private $Plazo_Ejecucion_Contrato;
    private $Calificacion;
    private $Estado;
    private $idPersona;
    private $idEmpresas;
    private $idContatos_Publicos;

    /**
     * Licitacion constructor.
     * @param $idLicitacion
     * @param $Fecha_firma_contrato
     * @param $Ejecucion_Contrato
     * @param $Plazo_Ejecucion_Contrato
     * @param $Calificacion
     * @param $Estado
     * @param $idPersona
     * @param $idEmpresas
     * @param $idContratos_Publico
     */
    public function __construct($Licitacion_data = array())
    {
        parent::__construct(); //
        if (count($Licitacion_data) > 1) { //
            foreach ($Licitacion_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        } else {
            $this->idLicitacion = "";
            $this->Fecha_firma_contrato = "";
            $this->Ejecucion_Contrato = "";
            $this->Plazo_Ejecucion_Contrato = "";
            $this->Calificacion = "";
            $this->Estado = "";
            $this->idPersona = "";
            $this->idEmpresas = "";
            $this->idContatos_Publicos = "";

        }
    }

    /**
     * @return string
     */
    public function getIdLicitacion()
    {
        return $this->idLicitacion;
    }

    /**
     * @param string $idLicitacion
     */
    public function setIdLicitacion($idLicitacion)
    {
        $this->idLicitacion = $idLicitacion;
    }

    /**
     * @return string
     */
    public function getFechaFirmaContrato()
    {
        return $this->Fecha_firma_contrato;
    }

    /**
     * @param string $Fecha_firma_contrato
     */
    public function setFechaFirmaContrato($Fecha_firma_contrato)
    {
        $this->Fecha_firma_contrato = $Fecha_firma_contrato;
    }

    /**
     * @return string
     */
    public function getEjecucionContrato()
    {
        return $this->Ejecucion_Contrato;
    }

    /**
     * @param string $Ejecucion_Contrato
     */
    public function setEjecucionContrato($Ejecucion_Contrato)
    {
        $this->Ejecucion_Contrato = $Ejecucion_Contrato;
    }

    /**
     * @return string
     */
    public function getPlazoEjecucionContrato()
    {
        return $this->Plazo_Ejecucion_Contrato;
    }

    /**
     * @param string $Plazo_Ejecucion_Contrato
     */
    public function setPlazoEjecucionContrato($Plazo_Ejecucion_Contrato)
    {
        $this->Plazo_Ejecucion_Contrato = $Plazo_Ejecucion_Contrato;
    }

    /**
     * @return string
     */
    public function getCalificacion()
    {
        return $this->Calificacion;
    }

    /**
     * @param string $Calificacion
     */
    public function setCalificacion($Calificacion)
    {
        $this->Calificacion = $Calificacion;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param string $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
     * @return string
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @param string $idPersona
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    /**
     * @return string
     */
    public function getIdEmpresas()
    {
        return $this->idEmpresas;
    }

    /**
     * @param string $idEmpresas
     */
    public function setIdEmpresas($idEmpresas)
    {
        $this->idEmpresas = $idEmpresas;
    }

    /**
     * @return string
     */
    public function getIdContatosPublicos()
    {
        return $this->idContatos_Publicos;
    }

    /**
     * @param string $idContatos_Publicos
     */
    public function setIdContatosPublicos($idContatos_Publicos)
    {
        $this->idContatos_Publicos = $idContatos_Publicos;
    }



    public static function buscarForId($id)
    {
        $tmp = new Licitacion();
        if ($id > 0) {
            $getrow = $tmp->getRow("SELECT * FROM proyectophp.licitacion WHERE licitacion.idLicitacion = ?", array($id));
            $tmp = new Licitacion();
            $tmp->idLicitacion =$getrow['idLicitacion'];
            $tmp->Fecha_firma_contrato =$getrow['Fecha_firma_contrato'];
            $tmp->Ejecucion_Contrato =$getrow['Ejecucion_Contrato'];
            $tmp->Plazo_Ejecucion_Contrato = $getrow['Plazo_Ejecucion_Contrato'];
            $tmp->Calificacion = $getrow['Calificacion'];
            $tmp->Estado = $getrow['Estado'];
            $tmp->idPersona = $getrow['idPersona'];
            $tmp->idEmpresas = $getrow['idEmpresas'];
            $tmp->idContatos_Publicos =$getrow['idContatos_Publicos'];
            $tmp->Disconnect();
            return $tmp;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrLicitacion = array();
        $tmp = new Licitacion();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $tmp = new Licitacion();
            $tmp->idLicitacion = $valor['idLicitacion'];
            $tmp->Fecha_firma_contrato = $valor['Fecha_firma_contrato'];
            $tmp->Ejecucion_Contrato = $valor['Ejecucion_Contrato'];
            $tmp->Plazo_Ejecucion_Contrato = $valor['Plazo_Ejecucion_Contrato'];
            $tmp->Calificacion = $valor['Calificacion'];
            $tmp->Estado = $valor['Estado'];
            $tmp->idPersona = $valor['idPersona'];
            $tmp->idEmpresas = $valor['idEmpresas'];
            $tmp->idContatos_Publicos = $valor['idContatos_Publicos'];
            array_push($arrLicitacion, $tmp);
        } $tmp->Disconnect();
        return $arrLicitacion;
    }

    public static function getAll()
    {
        return Licitacion::buscar("SELECT * FROM proyectophp.licitacion");
    }
    public static function getAllActivos()
    {
        return Licitacion::buscar("SELECT * FROM proyectophp.licitacion WHERE Estado='Activo'");
    }

    public function editar()
    {
        $this->updateRow("UPDATE proyectophp.licitacion SET Fecha_firma_contrato = ?,Ejecucion_Contrato = ?, Plazo_Ejecucion_Contrato= ?, Calificacion= ?,Estado= ?, idPersona= ?, idEmpresas= ?, idContatos_Publicos= ? WHERE idLicitacion = ?", array(
            $this->Fecha_firma_contrato,
            $this->Ejecucion_Contrato,
            $this->Plazo_Ejecucion_Contrato,
            $this->Calificacion,
            $this->Estado,
            $this->idPersona,
            $this->idEmpresas,
            $this->idContatos_Publicos,
            $this->idLicitacion,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO proyectophp.licitacion VALUES(NULL,?,?,?,?,?,?,?,?)", array(
            $this->Fecha_firma_contrato,
            $this->Ejecucion_Contrato,
            $this->Plazo_Ejecucion_Contrato,
            $this->Calificacion,
            $this->Estado,
            $this->idPersona,
            $this->idEmpresas,
            $this->idContatos_Publicos,

        ));
        $this->Disconnect();

    }
}