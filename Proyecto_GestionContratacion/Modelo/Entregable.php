<?php
require_once('db_abstract_class.php');

/**
 * Created by PhpStorm.
 * User: New
 * Date: 25/07/2017
 * Time: 03:23 AM
 */
class Entregable extends db_abstract_class
{
    private $idEntregables;
    private $Entregables_Actividad;
    private $Fecha_Cumplimiento;
    private $Fecha_Entrega;
    private $Porcentaje_Entregable;
    private $idLicitacion;
    private $Estado;

    /**
     * Entregable constructor.
     * @param $idEntregables
     * @param $Entregables_Actividad
     * @param $Fecha_Cumplimiento
     * @param $Porcentaje_Entregable
     * @param $Contrato
     * @param $Estado
     */
    public function __construct($Entregable_data = array())
    {
        parent::__construct(); //
        if (count($Entregable_data) > 1) { //
            foreach ($Entregable_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        } else {
            $this->idEntregables = "";
            $this->Entregables_Actividad = "";
            $this->Fecha_Entrega = "";
            $this->Fecha_Cumplimiento = "";
            $this->Porcentaje_Entregable = "";
            $this->Estado = "";
            $this->idLicitacion = "";

        }
    }

    /**
     * Licitacion constructor.
     * @param $idEntregables
     * @param $$Entregables_Actividad;
     * @param $$Fecha_Cumplimiento
     * @param $$Porcentaje_Entregable
     * @param $Contrato
     * @param $Estado
     */


    public function getIdEntregables()
    {
        return $this->idEntregables;
    }

    /**
     * @param mixed $idEntregables
     */
    public function setIdEntregables($idEntregables)
    {
        $this->idEntregables = $idEntregables;
    }

    /**
     * @return mixed
     */
    public function getEntregablesActividad()
    {
        return $this->Entregables_Actividad;
    }

    /**
     * @param mixed $Entregables_Actividad
     */
    public function setEntregablesActividad($Entregables_Actividad)
    {
        $this->Entregables_Actividad = $Entregables_Actividad;
    }

    /**
     * @return mixed
     */
    public function getFechaCumplimiento()
    {
        return $this->Fecha_Cumplimiento;
    }

    /**
     * @param mixed $Fecha_Cumplimiento
     */
    public function setFechaCumplimiento($Fecha_Cumplimiento)
    {
        $this->Fecha_Cumplimiento = $Fecha_Cumplimiento;
    }

    public function getFechaEntrega()
    {
        return $this->Fecha_Entrega;
    }

    /**
     * @param mixed $Fecha_Entrega
     */
    public function setFechaEntrega($Fecha_Entrega)
    {
        $this->Fecha_Entrega = $Fecha_Entrega;
    }

    /**
     * @return mixed
     */
    public function getPorcentajeEntregable()
    {
        return $this->Porcentaje_Entregable;
    }

    /**
     * @param mixed $Porcentaje_Entregable
     */
    public function setPorcentajeEntregable($Porcentaje_Entregable)
    {
        $this->Porcentaje_Entregable = $Porcentaje_Entregable;
    }

    /**
     * @return mixed
     */
    public function getIdLicitacion()
    {
        return $this->idLicitacion;
    }

    /**
     * @param mixed $Contrato
     */
    public function setIdLicitacion($idLicitacion)
    {
        $this->Contrato = $idLicitacion;
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
     * @param mixed $idPersona
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }



    public function editar()
    {
        $this->updateRow("UPDATE proyectophp.entregables SET Entregables_Actividad = ?, Fecha_Cumplimiento = ?,Fecha_Entrega = ?, Porcentaje_Entregable = ?, Estado = ?, idLicitacion= ? WHERE idEntregables = ?", array(
            $this->	Entregables_Actividad,
            $this->	Fecha_Cumplimiento,
            $this-> Fecha_Entrega,
            $this-> Porcentaje_Entregable,
            $this-> Estado,
            $this->	idLicitacion,
            $this-> idEntregables,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }


    public function insertar()
    {
            $this->insertRow("INSERT INTO proyectophp.entregables VALUES (null, ?, ?, ?, ?, ?, ?)", array(
            $this->	Entregables_Actividad,
            $this->	Fecha_Cumplimiento,
            $this-> Fecha_Entrega,
            $this-> Porcentaje_Entregable,
                $this-> Estado,
                $this->	idLicitacion,
        ));
        $this->Disconnect();
    }

    /**
     * @param $query
     * @return array
     */
    public static function buscar($query)
    {
        $arrEmpresas = array();
        $tmp = new Entregable();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $tmp = new Entregable();
            $tmp->idEntregables = $valor['idEntregables'];
            $tmp->Entregables_Actividad = $valor['Entregables_Actividad'];
            $tmp->Fecha_Cumplimiento = $valor['Fecha_Cumplimiento'];
            $tmp->Fecha_Entrega = $valor['Fecha_Entrega'];
            $tmp->Porcentaje_Entregable = $valor['Porcentaje_Entregable'];
            $tmp->Estado = $valor['Estado'];
            $tmp->idLicitacion = $valor['idLicitacion'];
            array_push($arrEmpresas, $tmp);
        } $tmp->Disconnect();
        return $arrEmpresas;
    }
      public static function buscarForId($id)
    {
        $tmp = new Entregable();
        if ($id > 0) {
            $getrow = $tmp->getRow("SELECT * FROM proyectophp.entregables WHERE entregables.idEntregables = ?", array($id));
            $tmp = new Entregable();
            $tmp->idEntregables =$getrow['idEntregables'];
            $tmp->Entregables_Actividad =$getrow['Entregables_Actividad'];
            $tmp->Fecha_Cumplimiento =$getrow['Fecha_Cumplimiento'];
            $tmp->Fecha_Entrega = $getrow['Fecha_Entrega'];
            $tmp->Porcentaje_Entregable = $getrow['Porcentaje_Entregable'];
            $tmp->Estado = $getrow['Estado'];
            $tmp->idLicitacion = $getrow['idLicitacion'];
            $tmp->Disconnect();
            return $tmp;
        }else{
            return NULL;
        }

    }
    public static function buscarForIdLicitacion($id)
    {
        return  Entregable::buscar("SELECT * FROM proyectophp.entregables WHERE entregables.idLicitacion = '$id'");

    }

    public static function countEntregablesid($id)
    {
        $tmp = new Entregable();
        if ($id > 0) {
            $getRow = $tmp->getRow("SELECT COUNT(proyectophp.entregables.idEntregables) as CtnEntregables FROM proyectophp.entregables WHERE idLicitacion=?",array($id));
            return $getRow;
        }else{
            return NULL;
        }
    }
    public static function getAll()
    {
        return Entregable::buscar("SELECT * FROM proyectophp.entregables");
    }

    /**
     * @return mixed
     */


}

