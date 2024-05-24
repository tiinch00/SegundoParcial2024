<?php


class PartidoBasquet extends Partido {

    private $infracciones;
    private $coefPenalizacion;


    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$infracciones,$coefPenalizacion) {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->infracciones = $infracciones;
        $this->coefPenalizacion = $coefPenalizacion ?? 0.75;
    }

	public function getInfracciones() {
		return $this->infracciones;
	}

	public function setInfracciones($infracciones) {
		$this->infracciones = $infracciones;
	}

	public function getCoefPenalizacion() {
		return $this->coefPenalizacion;
	}

	public function setCoefPenalizacion($coefPenalizacion) {
		$this->coefPenalizacion = $coefPenalizacion;
	}

    public function __toString(){

        $cadena = paren :: __toString()."\n";
        
        $cadena .= "Cantidad Infracciones " . $this->getInfracciones()."\n";

        $cadena .= "Penalizacion " . $this->getCoefPenalizacion()."\n";

        return $cadena;
    }


    public function coeficientePartido() {

        $baseCoef = parent::coeficientePartido();
        $resultado = $baseCoef - ($this->getCoefPenalizacion() * $this->getInfracciones());
        return $resultado;
    }
}