<?php

/*Implementar la clase Torneo que contiene la colección de partidos y 
un importe que será parte del premio. Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía. */

class Torneo {

    private $colPartidos;
    private $importePremio;

	public function __constructor($colPartidos, $importePremio) {

		$this->colPartidos = $colPartidos;
		$this->importePremio = $importePremio;
	}

	public function getColPartidos() {
		return $this->colPartidos;
	}

	public function setColPartidos($colPartidos) {
		$this->colPartidos = $colPartidos;
	}

	public function getImportePremio() {
		return $this->importePremio;
	}

	public function setImportePremio($importePremio) {
		$this->importePremio = $importePremio;
	}

    public function retornarCadena($coleccion){
		$cadena= "";

		foreach($coleccion as $elemento){

			$cadena = $cadena . " ". $elemento ."\n";

			
		}

		return $cadena;


	}

    public function __toString(){

        

        $cadena ="Partidos " . $this->retornarCadena($this->getColPartidos())."\n";
        $cadena .="Premio " . $this->getImportePremio()."\n";

        return $cadena;
    }


    /**Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) 
     * en la  clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido
     *  y si se trata de un partido de futbol o basquetbol . El método debe crear y 
     * retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo. 
     * Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, 
     * caso contrario no podrá ser registrado ese partido en el torneo.   */

     public function ingresarPartido($objEquipo1,$objEquipo2, $fecha, $tipoPartido){

        $sePudo = false;

        $partido = null;

        $idpartido = null;

        $colPartidos = $this->getColPartidos();


        if ($objEquipo1->getCategoria() != $objEquipo2->getCategoria() || $OBJEquipo1->getCantidadJugadores() != $OBJEquipo2->getCantidadJugadores()){

            $sePudo = false;

            if ($tipoPartido == "Futbol"){

                $partido = new PartidoFutbol($idpartido, $fecha,$objEquipo1,null,$objEquipo2,null);

            }elseif ($tipoPartido == "Basquet"){

                $partido = new PartidoBasquet($objEquipo1, $objEquipo2, $fecha, null, $golesEquipo2, $infracciones);

            }

            $colPartidos[] = $partido;

            return $partido;


        }


     }



    /**Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se trata de un 
     * partido de fútbol o de básquetbol y en  base  al parámetro busca entre esos partidos los equipos ganadores 
     * ( equipo con mayor cantidad de goles). El método retorna una colección con los objetos de los equipos encontrados.
    */


    public function darGanadores($deporte){

        $partidos = $this->getColPartidos();

        $ganadores = [];
        foreach ($partidos as $partido) {
            if (($deporte === 'futbol' && $partido instanceof PartidoFutbol) || ($deporte === 'basquet' && $partido instanceof PartidoBasquet)) {
                $ganadores[] = $partido->darEquipoGanador();
            }
        }
        return $ganadores;
    }


    /**Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un 
     * arreglo asociativo donde una de sus claves es ‘equipoGanador’  y 
     * contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ 
     * que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo. 
       (premioPartido = Coef_partido * ImportePremio)
     */


     public function  calcularPremioPartido($OBJPartido){

        $equipoGanador = $OBJPartido->darEquipoGanador();
        $coefPartido = $OBJPartido->coeficientePartido();
        $premioPartido = $coefPartido * $this->getImportePremio();
        return [
            'equipoGanador' => $equipoGanador,
            'premioPartido' => $premioPartido
        ];

     }







}