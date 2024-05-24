<?php


class PartidoFutbol extends Partido{

    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$coefMenores,$coefJuveniles,$coefMayores) {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coefMenores = 0.13;
        $this->coefJuveniles = 0.19;
        $this->coefMayores = 0.27;
    }


    public function coeficientePartido()
    {
        $coeficiente = parent::coeficientePartido();
        if ($this->getTipoPartido()->getObjCategoria() == "menores") {
            $coeficiente += 0.13;
        } elseif ($this->getTipoPartido() == "juveniles") {
            $coeficiente += 0.5;
        } elseif ($this->getTipoPartido() == "mayores") {
            $coeficiente +=  0.8;
        }
        return $coeficiente;
    }

    
}