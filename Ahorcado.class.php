<?php
  
/**
 * 
 * Copyright (c) 2005-2015, Braulio Jos  Solano Rojas
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 * 
 * 	Redistributions of source code must retain the above copyright notice, this list of
 * 	conditions and the following disclaimer. 
 * 	Redistributions in binary form must reproduce the above copyright notice, this list of
 * 	conditions and the following disclaimer in the documentation and/or other materials
 * 	provided with the distribution. 
 * 	Neither the name of the Solsoft de Costa Rica S.A. nor the names of its contributors may
 * 	be used to endorse or promote products derived from this software without specific
 * 	prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND
 * CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT
 * NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)
 * HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
 * EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * 
 *
 * @version $Id$
 * @copyright 2005-2015
 */


/**
 * HolaMundo Clase que implementa el t pico primer ejemplo de programaci n en todo lenguaje.
 * 
 * @package SoapDiscovery
 * @author Braulio Jos  Solano Rojas
 * @copyright Copyright (c) 2005-2015 Braulio Jos  Solano Rojas
 * @version $Id$
 * @access public
 **/
class Ahorcado {
	private $palabraSeleccionada = "";
	private $nombreJugador = "";
	private $palabraOculta = "";
	private $turnosRestantes = 5;
	private $exitos = "";
	private $gano = 0;
	private $arraytiempos = [];
	private $arrayNombreTiempo = [];
	private $palabras = array(
		1 => "perro",
		2 => "gato",
		3 => "elefante",
		4 => "lobo",
		5 => "perico",
		6 => "serpiente",
		7 => "garrapata",
		8 => "oso",
		9 => "tigre",
		10 => "pantera",
		11 => "zorro",
		12 => "vaca"
	);
	
	/**
	 * Ahorcado::__construct() Constructor de la clase Ahorcado.
	 * 
	 * @return string
	 **/
	public function __construct() {
		$this->palabraSeleccionada =  $this->palabras[rand(1, 12)];
	}

	/**
	 * Ahorcado::verificarLetra() verifica si la letra se encuentra en la palabra.
	 * 
	 * @param string $letra
	 * @return string 
	 **/
	public function verificarLetra($letra = ""){
		
		$arrayPalabra = str_split($this->palabraSeleccionada);
		$aux = FALSE;		

		for($i = 0; $i < strlen($this->palabraSeleccionada); $i++)
		{
			if($arrayPalabra[$i] == $letra){
				$this->palabraOculta[$i] = $letra;
				$aux = TRUE;				
			}
		}
		if($aux == FALSE){
			$this->turnosRestantes -= 1; 
		}
		return $this->palabraOculta;
	}


	/**
	 * Ahorcado::getIntentosRestantes() Devuelve cantidad de intentos que faltan.
	 * 
	 * @return int 
	 **/
	public function getIntentosRestantes(){
		return $this->turnosRestantes;
	}


	/**
	 * Ahorcado::verificarSiGano() Devuelve 1 si gano, 0 si no.
	 * 
	 * @return int 
	 **/
	public function verificarSiGano(){
		if($this->palabraOculta === $this->palabraSeleccionada){
			return 1;
		}else{
			return 0;
		}
	}

	/**
	 * Ahorcado::getPalabraOculta() Devuelve una palabra al azar oculta con _.
	 * 
	 * @return string 
	 **/
	public function getPalabraOculta(){
		for($i=0; $i < strlen($this->palabraSeleccionada); $i++)
		{
			$this->palabraOculta .= "*";
		}
		return $this->palabraOculta ;
	}

	/**
	 * Ahorcado::getPalabras() Devuelve una palabra al azar.
	 * 
	 * @return string 
	 **/
	public function getPalabra(){
		return $this->palabraSeleccionada;
	}

	/**
	 * Ahorcado::guardarNombre() Guarda el nombre del jugador.
	 * 
	 **/
	public function guardarNombre($nombre = ""){
		$this->nombreJugador = $nombre;
	}

	/**
	 * Ahorcado::getNombre() Devuelve el nombre del jugador.
	 * 
	 * @return string 
	 **/
	public function getNombre(){
		return $this->nombreJugador;
	}

	/**
	 * Ahorcado::guardarTiempo() guarda el tiempo del jugador si es de los mejores 10.
	 *  
	 **/
	public function guardarTiempo($nombre = "", $tiempo = 0)
	{
		$nombreTiempo = $nombre.":".$tiempo;
		$archivo = fopen("mejoresTiempos.csv", "r+");
		while (($this->arrayNombreTiempo = fgetcsv($archivo)) !== FALSE) {
			for($i = 0; $i < count($this->arrayNombreTiempo); $i++){
				$aux = explode(":", $this->arrayNombreTiempo);
				$this->arraytiempos[$i]= $aux[1];
			}

			if($tiempo < $this->arraytiempos[$this->menorTiempo($this->arraytiempos)])
			{
				$this->arrayNombreTiempo[$this->menorTiempo($this->arraytiempos)] = $nombreTiempo;
				ftruncate($archivo, 0);
				fputcsv($archivo, $this->arrayNombreTiempo, ',');
			}
		}
		fclose($archivo);
	}

	/**
	 * Ahorcado::menorTiempo() Devuelve indice del menor tiempo en el array.
	 * 
	 * @return int 
	 **/
	public function menorTiempo(){
		$menorTiempo = $this->$arraytiempos[0];
		$index = 0;
		for($i = 1; $i < count($arraytiempos); $i++){
			if($menorTiempo > $arraytiempos[$i]){
				$menorTiempo = $arraytiempos[$i];
				$index = $i;
			}
		}
		return $index;
	}
}

?>
