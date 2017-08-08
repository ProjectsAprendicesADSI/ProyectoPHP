    <?php


require_once('db_abstract_class.php');
/**
 * Created by PhpStorm.
 * User: adsi
 * Date: 24/07/2017
 * Time: 03:41 PM
 */
class Empresas extends db_abstract_class
{
    private $idEmpresas;
    private $Razonsocial_contratista;
    private $Identificacion_Contatista;
    private $Pais_Contatrista;
    private $Departamento_Contatista;
    private $Provincia_Contratista;
    private $Direccion_Contratista;
    private $Correo;
    private $Representante_Contaratista;
    private $Identificacion_Representante;
    private $Respuesta;
    private $Estado;
    private $idPersona;



    public function __construct($empresas_data=array())
    {
        parent::__construct(); //
        if(count($empresas_data)>1){ //
            foreach ($empresas_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idEmpresas = "";
            $this->Razonsocial_contratista = "";
            $this->Identificacion_Contatista = "";
            $this->Pais_Contatrista = "";
            $this->Departamento_Contatista = "";
            $this->Provincia_Contratista = "";
            $this->Direccion_Contratista = "";
            $this->Correo="";
            $this->Representante_Contaratista = "";
            $this->Identificacion_Representante =  "";
            $this->Respuesta="";
            $this->Estado =  "";
            $this->idPersona = "";

        }
    }

    /**
     * @return string
     */
    public function getIdEmpresas()
    {
        return $this->idEmpresas;
    }

    /**
     * @return string
     */
    public function getCorreo()
    {
        return $this->Correo;
    }

    /**
     * @param string $Correo
     */
    public function setCorreo($Correo)
    {
        $this->Correo = $Correo;
    }

    /**
     * @return string
     */
    public function getRespuesta()
    {
        return $this->Respuesta;
    }

    /**
     * @param string $Respuesta
     */
    public function setRespuesta($Respuesta)
    {
        $this->Respuesta = $Respuesta;
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
    public function getRazonsocialContratista()
    {
        return $this->Razonsocial_contratista;
    }

    /**
     * @param string $Razonsocial_contratista
     */
    public function setRazonsocialContratista($Razonsocial_contratista)
    {
        $this->Razonsocial_contratista = $Razonsocial_contratista;
    }

    /**
     * @return string
     */
    public function getIdentificacionContatista()
    {
        return $this->Identificacion_Contatista;
    }

    /**
     * @param string $Identificacion_Contatista
     */
    public function setIdentificacionContatista($Identificacion_Contatista)
    {
        $this->Identificacion_Contatista = $Identificacion_Contatista;
    }

    /**
     * @return string
     */
    public function getPaisContatrista()
    {
        return $this->Pais_Contatrista;
    }

    /**
     * @param string $Pais_Contatrista
     */
    public function setPaisContatrista($Pais_Contatrista)
    {
        $this->Pais_Contatrista = $Pais_Contatrista;
    }

    /**
     * @return string
     */
    public function getDepartamentoContatista()
    {
        return $this->Departamento_Contatista;
    }

    /**
     * @param string $Departamento_Contatista
     */
    public function setDepartamentoContatista($Departamento_Contatista)
    {
        $this->Departamento_Contatista = $Departamento_Contatista;
    }

    /**
     * @return string
     */
    public function getProvinciaContratista()
    {
        return $this->Provincia_Contratista;
    }

    /**
     * @param string $Provincia_Contratista
     */
    public function setProvinciaContratista($Provincia_Contratista)
    {
        $this->Provincia_Contratista = $Provincia_Contratista;
    }

    /**
     * @return string
     */
    public function getDireccionContratista()
    {
        return $this->Direccion_Contratista;
    }

    /**
     * @param string $Direccion_Contratista
     */
    public function setDireccionContratista($Direccion_Contratista)
    {
        $this->Direccion_Contratista = $Direccion_Contratista;
    }

    /**
     * @return string
     */
    public function getRepresentanteContaratista()
    {
        return $this->Representante_Contaratista;
    }

    /**
     * @param string $Representante_Contaratista
     */
    public function setRepresentanteContaratista($Representante_Contaratista)
    {
        $this->Representante_Contaratista = $Representante_Contaratista;
    }

    /**
     * @return string
     */
    public function getIdentificacionRepresentante()
    {
        return $this->Identificacion_Representante;
    }

    /**
     * @param string $Identificacion_Representante
     */
    public function setIdentificacionRepresentante($Identificacion_Representante)
    {
        $this->Identificacion_Representante = $Identificacion_Representante;
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


    public function insertar()
    {
        $this->insertRow("INSERT INTO proyectophp.empresas VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?,?)",array(
            $this->Razonsocial_contratista,
            $this->Identificacion_Contatista,
            $this->Pais_Contatrista,
            $this->Departamento_Contatista,
            $this->Provincia_Contratista,
            $this->Direccion_Contratista,
            $this->Correo,
            $this->Representante_Contaratista,
            $this->Identificacion_Representante,
            $this->Respuesta,
            $this->Estado,
            $this->idPersona,

        ));
        $this->Disconnect();

    }
        public function editar()
        {
            $this->updateRow("UPDATE proyectophp.empresas SET Razonsocial_contratista = ?, Identificacion_Contatista = ?, Pais_Contatrista= ?, Departamento_Contatista= ?, Provincia_Contratista= ?, Direccion_Contratista= ?, Correo=?, Representante_Contaratista= ?, Identificacion_Representante= ?, Respuesta=? ,Estado= ?,idPersona= ? WHERE idEmpresas = ?", array(
                $this->Razonsocial_contratista,
                $this->Identificacion_Contatista,
                $this->Pais_Contatrista,
                $this->Departamento_Contatista,
                $this->Provincia_Contratista,
                $this->Direccion_Contratista,
                $this->Correo,
                $this->Representante_Contaratista,
                $this->Identificacion_Representante,
                $this->Respuesta,
                $this->Estado,
                $this->idPersona,
                $this->idEmpresas,
            ));
            $this->Disconnect();
        }



    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
    public static function buscar($query)
    {
        $arrEmpresas = array();
        $tmp = new Empresas();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $tmp = new Empresas();
            $tmp->idEmpresas =$valor['idEmpresas'];
            $tmp->Razonsocial_contratista =$valor['Razonsocial_contratista'];
            $tmp->Identificacion_Contatista =$valor['Identificacion_Contatista'];
            $tmp->Pais_Contatrista = $valor['Pais_Contatrista'];
            $tmp->Departamento_Contatista = $valor['Departamento_Contatista'];
            $tmp->Provincia_Contratista = $valor['Provincia_Contratista'];
            $tmp->Direccion_Contratista = $valor['Direccion_Contratista'];
            $tmp->Correo=$valor['Correo'];
            $tmp->Representante_Contaratista =$valor['Representante_Contaratista'];
            $tmp->Identificacion_Representante =  $valor['Identificacion_Representante'];
            $tmp->Respuesta =  $valor['Respuesta'];
            $tmp->Estado =  $valor['Estado'];
            $tmp->idPersona = $valor['idPersona'];
            array_push($arrEmpresas, $tmp);
        }
        $tmp->Disconnect();
        return $arrEmpresas;
    }
    public static function showCount()
    {
        $tmp = new Secretaria();
        $getRow = $tmp->getRow("SELECT COUNT(empresas.idEmpresas) as NumSecretarias FROM proyectophp.empresas");
        $html ="";
        print_r($getRow['NumSecretarias']);
        $tmp->Disconnect();
        return $html;
    }

    public static function buscarForId($id)
    {
        $tmp = new Empresas();
        if ($id > 0) {
            $getrow = $tmp->getRow("SELECT * FROM proyectophp.empresas WHERE empresas.idEmpresas = ?", array($id));
            $tmp = new Empresas();
            $tmp->idEmpresas =$getrow['idEmpresas'];
            $tmp->Razonsocial_contratista =$getrow['Razonsocial_contratista'];
            $tmp->Identificacion_Contatista =$getrow['Identificacion_Contatista'];
            $tmp->Pais_Contatrista = $getrow['Pais_Contatrista'];
            $tmp->Departamento_Contatista = $getrow['Departamento_Contatista'];
            $tmp->Provincia_Contratista = $getrow['Provincia_Contratista'];
            $tmp->Direccion_Contratista = $getrow['Direccion_Contratista'];
            $tmp->Correo=$getrow['Correo'];
            $tmp->Representante_Contaratista =$getrow['Representante_Contaratista'];
            $tmp->Identificacion_Representante =  $getrow['Identificacion_Representante'];
            $tmp->Respuesta =  $getrow['Respuesta'];
            $tmp->Estado =  $getrow['Estado'];
            $tmp->idPersona = $getrow['idPersona'];
            $tmp->Disconnect();
            return $tmp;
        }else{
            return NULL;
        }


    }

    public static function getAll()
    {
        return Empresas::buscar("SELECT * FROM proyectophp.empresas");
    }



}