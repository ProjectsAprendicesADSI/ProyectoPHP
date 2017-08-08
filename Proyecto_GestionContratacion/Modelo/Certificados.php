<?php
require_once('db_abstract_class.php');
/**
 * Created by PhpStorm.
 * User: New
 * Date: 26/07/2017
 * Time: 09:41 AM
 */
class Certificados extends db_abstract_class
{
    private $idCertificados;
    private $Titulo;
    private $Fecha_Entrega;
    private $Hora_Entrega;
    private $Estado;
    private $idEntregables;

    /**
     * @return string
     */
    public function getIdCertificados()
    {
        return $this->idCertificados;
    }

    /**
     * @param string $idCertificados
     */
    public function setIdCertificados($idCertificados)
    {
        $this->idCertificados = $idCertificados;
    }

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->Titulo;
    }

    /**
     * @param string $Titulo
     */
    public function setTitulo($Titulo)
    {
        $this->Titulo = $Titulo;
    }

    /**
     * @return string
     */
    public function getFechaEntrega()
    {
        return $this->Fecha_Entrega;
    }

    /**
     * @param string $Fecha_Entrega
     */
    public function setFechaEntrega($Fecha_Entrega)
    {
        $this->Fecha_Entrega = $Fecha_Entrega;
    }

    /**
     * @return string
     */
    public function getHoraEntrega()
    {
        return $this->Hora_Entrega;
    }

    /**
     * @param string $Hora_Entrega
     */
    public function setHoraEntrega($Hora_Entrega)
    {
        $this->Hora_Entrega = $Hora_Entrega;
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

    /**
     * @return string
     */
    public function getIdEntregables()
    {
        return $this->idEntregables;
    }

    /**
     * @param string $idEntregables
     */
    public function setIdEntregables($idEntregables)
    {
        $this->idEntregables = $idEntregables;
    }

    /**
     * Certificados constructor.
     * @param $idCertificados
     * @param $Fecha
     * @param $Dependencia
     * @param $N_Acta
     * @param $Fecha_Entrega
     * @param $Hora_Entrega
     * @param $Empresa
     * @param $Estado
     * @param $Contrato
     * @param $idEntregables
     *
     *
     *
     */


    public function __construct($certificado_data=array())
    {
        parent::__construct(); //
        if(count($certificado_data)>1){ //
            foreach ($certificado_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idCertificados = "";
            $this->Titulo = "";
            $this->Fecha_Entrega = "";
            $this->Hora_Entrega = "";
            $this->Estado = "";
            $this->idEntregables =  "";


        }
    }

    public static function buscarForId($id)
    {
        $tmp = new Certificados();
        if ($id > 0) {
            $getrow = $tmp->getRow("SELECT * FROM proyectophp.certificados WHERE idCertificados =?", array($id));
            $tmp = new Certificados();
            $tmp->idCertificados = $getrow['idCertificados'];
            $tmp->Titulo = $getrow['Titulo'];
            $tmp->Fecha_Entrega = $getrow['Fecha_Entrega'];
            $tmp->Hora_Entrega = $getrow['Hora_Entrega'];
            $tmp->Estado = $getrow['Estado'];
            $tmp->idEntregables = $getrow['idEntregables'];

            return $tmp;
        }else{
            return NULL;
        }
    }

    protected static function buscar($query)
    {
        $arrCertificados = array();
        $tmp = new Certificados();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $certificado = new Certificados();
            $certificado->idCertificados =$valor['idCertificados'];
            $certificado->Titulo = $valor['Titulo'];
            $certificado->Fecha_Entrega = $valor['Fecha_Entrega'];
            $certificado->Hora_Entrega = $valor['Hora_Entrega'];
            $certificado->Estado = $valor['Estado'];
            $certificado->idEntregables = $valor['idEntregables'];
            array_push($arrCertificados, $certificado);
        }
        $tmp->Disconnect();
        return $arrCertificados;
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO proyectophp.certificados VALUES(NULL, ?, ?, ?, ?, ?)", array(
            $this->Titulo,
            $this->Fecha_Entrega,
            $this->Hora_Entrega,
            $this->Estado,
            $this->idEntregables,
        ));
        $this->Disconnect();
    }



    public static function getAll()
    {
        return Certificados::buscar("SELECT * FROM proyectophp.certificados");
    }


    public function editar()
    {
        $this->updateRow("UPDATE proyectophp.certificados SET Titulo = ?, Fecha_Entrega = ?, Hora_Entrega = ?, Estado = ?, idEntregables = ? WHERE idCertificados = ?", array(
            $this->Titulo,
            $this->Fecha_Entrega,
            $this->Hora_Entrega,
            $this->Estado,
            $this->idEntregables,
            $this->idCertificados,

        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }


}