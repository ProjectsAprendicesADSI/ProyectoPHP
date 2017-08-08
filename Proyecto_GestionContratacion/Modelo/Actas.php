<?php
require_once('db_abstract_class.php');

class Actas extends db_abstract_class
{
    private $idRegistro_Actas;
private $Fecha;
private $Hora;
private $Lugar_Reunion;
private $Puntos_Tratados;
private $Acuerdos_Tomados;
private $Observaciones;
private $idPersona;

    /**
     * Actas constructor.
     * @param $Fecha
     * @param $Hora
     * @param $Lugar_Reunion
     * @param $Lista_Asistencia
     * @param $Puntos_Tratados
     * @param $Acuerdos_Tomados
     * @param $Observaciones
     * @param $Persona_idPersona
     */
    public function __construct($Acta_data = array())
    {
        parent::__construct();
        if(count($Acta_data)>1){
            foreach ($Acta_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else{
            $this->idRegistro_Actas="";
            $this->Fecha = "";
            $this->Hora = "";
            $this->Lugar_Reunion = "";
            $this->Puntos_Tratados = "";
            $this->Acuerdos_Tomados = "";
            $this->Observaciones = "";
            $this->idPersona = "";
        }

    }

    /**
     * @return mixed
     */
    public function getIdRegistroActas()
    {
        return $this->idRegistro_Actas;
    }

    /**
     * @param mixed $idRegistro_Actas
     */
    public function setIdRegistroActas($idRegistro_Actas)
    {
        $this->idRegistro_Actas = $idRegistro_Actas;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * @param mixed $Fecha
     */
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->Hora;
    }

    /**
     * @param mixed $Hora
     */
    public function setHora($Hora)
    {
        $this->Hora = $Hora;
    }

    /**
     * @return mixed
     */
    public function getLugarReunion()
    {
        return $this->Lugar_Reunion;
    }

    /**
     * @param mixed $Lugar_Reunion
     */
    public function setLugarReunion($Lugar_Reunion)
    {
        $this->Lugar_Reunion = $Lugar_Reunion;
    }

    /**
     * @return mixed
     */


    /**
     * @return mixed
     */
    public function getPuntosTratados()
    {
        return $this->Puntos_Tratados;
    }

    /**
     * @param mixed $Puntos_Tratados
     */
    public function setPuntosTratados($Puntos_Tratados)
    {
        $this->Puntos_Tratados = $Puntos_Tratados;
    }

    /**
     * @return mixed
     */
    public function getAcuerdosTomados()
    {
        return $this->Acuerdos_Tomados;
    }

    /**
     * @param mixed $Acuerdos_Tomados
     */
    public function setAcuerdosTomados($Acuerdos_Tomados)
    {
        $this->Acuerdos_Tomados = $Acuerdos_Tomados;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->Observaciones;
    }

    /**
     * @param mixed $Observaciones
     */
    public function setObservaciones($Observaciones)
    {
        $this->Observaciones = $Observaciones;
    }

    /**
     * @return mixed
     */
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

    public static function buscarForId($id)
    {
        $tmp = new Actas();
        if ($id > 0) {
            $getrow = $tmp->getRow("SELECT * FROM proyectophp.registro_actas WHERE idRegistro_Actas =?", array($id));
            $tmp = new Actas();
            $tmp->idRegistro_Actas = $getrow['idRegistro_Actas'];
            $tmp->Fecha = $getrow['Fecha'];
            $tmp->Hora = $getrow['Hora'];
            $tmp->Lugar_Reunion = $getrow['Lugar_Reunion'];
            $tmp->Puntos_Tratados = $getrow['Puntos_Tratados'];
            $tmp->Acuerdos_Tomados = $getrow['Acuerdos_Tomados'];
            $tmp->Observaciones = $getrow['Observaciones'];
            $tmp->idPersona = $getrow['idPersona'];
            $tmp->Disconnect();
            return $tmp;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrActas = array();
        $tmp = new Actas();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Actas = new Actas();
            $Actas->idRegistro_Actas = $valor["idRegistro_Actas"];
            $Actas->Fecha = $valor["Fecha"];
            $Actas->Hora = $valor["Hora"];
            $Actas->Lugar_Reunion = $valor["Lugar_Reunion"];
            $Actas->Puntos_Tratados = $valor["Puntos_Tratados"];
            $Actas->Acuerdos_Tomados = $valor["Acuerdos_Tomados"];
            $Actas->Observaciones= $valor["Observaciones"];
            $Actas->idPersona= $valor["idPersona"];
            array_push($arrActas, $Actas);
        }
        $tmp->Disconnect();
        return $arrActas;
    }

    public static function getAll()
    {
        return Actas::buscar("SELECT * FROM registro_actas");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO proyectophp.registro_actas VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)",array(
            $this->Fecha,
            $this->Hora,
            $this->Lugar_Reunion,
            $this->Puntos_Tratados,
            $this->Acuerdos_Tomados,
            $this->Observaciones,
            $this->idPersona,
            )
        );
        $this->Disconnect();

    }

    public function editar()
    {
        $this->updateRow("UPDATE proyectophp.registro_actas SET Fecha = ?, Hora = ?, Lugar_Reunion= ?, Puntos_Tratados= ?, Acuerdos_Tomados= ?, Observaciones= ?, idPersona= ? WHERE idRegistro_Actas = ?", array(
            $this->Fecha,
            $this->Hora,
            $this->Lugar_Reunion,
            $this->Puntos_Tratados,
            $this->Acuerdos_Tomados,
            $this->Observaciones,
            $this->idPersona,
            $this->idRegistro_Actas,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        $this->deleteRow("DELETE FROM proyectophp.registro_actas WHERE idRegistro_Actas ='$id'");
        $this->Disconnect();
    }


}