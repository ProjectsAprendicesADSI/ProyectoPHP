<?php


require_once('db_abstract_class.php');
/**
 * Created by PhpStorm.
 * User: adsi
 * Date: 24/07/2017
 * Time: 03:41 PM
 */
class Documentos extends db_abstract_class
{
    private $idDocumentos;
    private $Nombre;
    private $Descripcion;
    private $Tipo;
    private $Version;
    private $Fecha_Publicacion;
    private $Documento;
    private $idContatos_Publicos;
    private $idEmpresas;
    private $idLicitacion;


    public function __construct($documentos_data = array())
    {
        parent::__construct(); //
        if (count($documentos_data) > 1) { //
            foreach ($documentos_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        } else {
            $this->idDocumentos = "";
            $this->Nombre = "";
            $this->Descripcion = "";
            $this->Tipo = "";
            $this->Version = "";
            $this->Fecha_Publicacion="";
            $this->Documento="";
            $this->idLicitacion = "";
        }
    }

    /**
     * @return string
     */
    public function getIdDocumentos()
    {
        return $this->idDocumentos;
    }

    /**
     * @param string $idDocumentos
     */
    public function setIdDocumentos($idDocumentos)
    {
        $this->idDocumentos = $idDocumentos;
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
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param string $Descripcion
     */
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->Tipo;
    }

    /**
     * @param string $Tipo
     */
    public function setTipo($Tipo)
    {
        $this->Tipo = $Tipo;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->Version;
    }

    /**
     * @param string $Version
     */
    public function setVersion($Version)
    {
        $this->Version = $Version;
    }

    /**
     * @return string
     */
    public function getFechaPublicacion()
    {
        return $this->Fecha_Publicacion;
    }

    /**
     * @param string $Fecha_Publicacion
     */
    public function setFechaPublicacion($Fecha_Publicacion)
    {
        $this->Fecha_Publicacion = $Fecha_Publicacion;
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
    public function getIdLicitacion()
    {
        return $this->idLicitacion;
    }

    /**
     * @param string $idLiquidacion_Contrato
     */
    public function setIdLicitacion($idLicitacion)
    {
        $this->idLicitacion = $idLicitacion;
    }

    /**
     * @return string
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param string $Documento
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
    }

    /**
     * @return string
     */



    public function insertar()
    {
        $this->insertRow("INSERT INTO proyectophp.documentos VALUES(NULL, ?, ?, ?, ?, ?, ?, ?)", array(
            $this->Nombre,
            $this->Descripcion,
            $this->Tipo,
            $this->Version,
            $this->Fecha_Publicacion,
            $this->Documento,
            $this->idLicitacion,
        ));
        $this->Disconnect();

    }

    public function editar()
    {
        $this->updateRow("UPDATE proyectophp.documentos SET Nombre = ?, Descripcion = ?, Tipo= ?, Version= ?, Documento= ?, idLicitacion= ?  WHERE idDocumentos = ?", array(
            $this->Nombre,
            $this->Descripcion,
            $this->Tipo,
            $this->Version,
            $this->Documento,
            $this->idLicitacion,
            $this->idDocumentos,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    public static function buscar($query)
    {
        $arrDocumentos = array();
        $tmp = new Documentos();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $tmp = new Documentos();
            $tmp->idDocumentos = $valor['idDocumentos'];
            $tmp->Nombre = $valor['Nombre'];
            $tmp->Descripcion = $valor['Descripcion'];
            $tmp->Tipo = $valor['Tipo'];
            $tmp->Version = $valor['Version'];
            $tmp->Fecha_Publicacion = $valor['Fecha_Publicacion'];
            $tmp->Documento= $valor['Documento'];
            $tmp->idLicitacion = $valor['idLicitacion'];
            array_push($arrDocumentos, $tmp);
        }
        $tmp->Disconnect();
        return $arrDocumentos;
    }

    public static function showCount()
    {
        $tmp = new Secretaria();
        $getRow = $tmp->getRow("SELECT COUNT(Documentos.idDocumentos) as NumSecretarias FROM proyectophp.documentos");
        $html = "";
        print_r($getRow['NumSecretarias']);
        $tmp->Disconnect();
        return $html;
    }

    public static function buscarForId($id)
    {
        $tmp = new Documentos();
        if ($id > 0) {
            $getrow = $tmp->getRow("SELECT * FROM proyectophp.documentos WHERE documentos.idDocumentos = ?", array($id));
            $tmp = new Documentos();
            $tmp->idDocumentos = $getrow['idDocumentos'];
            $tmp->Nombre = $getrow['Nombre'];
            $tmp->Descripcion = $getrow['Descripcion'];
            $tmp->Tipo= $getrow['Tipo'];
            $tmp->Version = $getrow['Version'];
            $tmp->Fecha_Publicacion = $getrow['Fecha_Publicacion'];
            $tmp->Documento = $getrow['Documento'];
            $tmp->idLicitacion = $getrow['idLicitacion'];
            $tmp->Disconnect();
            return $tmp;
        } else {
            return NULL;
        }

    }

    public static function getAll()
    {
        return Documentos::buscar("SELECT * FROM proyectophp.documentos");
    }

    public static function buscarForIdLicitacion($id){

        return Documentos::buscar("SELECT * FROM proyectophp.documentos WHERE documentos.idLicitacion ='$id'");

    }


}