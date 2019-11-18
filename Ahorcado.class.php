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
	private $turnosRestantes = 5;
	private $exitos = "TTTT";
	private $gano = 0;
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
	public function verificarLetra($letra = ''){
		$this->turnosRestantes =  $this->turnosRestantes - 1;
		$verificacion = "";
		
		$arrayPalabra = str_split($this->palabraSeleccionada);
		foreach($arrayPalabra as $char){
			if($letra == $char){
				$verificacion = $verificacion."T";
				$this->$exitos = $this->$exitos."T";
			}else{
				$verificacion = $verificacion."F";
				$this->exitos = $this->exitos."F";
			}
		}
		return $verificacion;
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
		$auxCont = 0;
		$arrayPalabra = str_split($this->exitos);

		for($i = 0; $i < count($arrayPalabra); $i++) {            
			if($arrayPalabra[$i] == "T"){
				$auxCont = $auxCont + 1;
			}	       
		}

		if( $auxCont == count($arrayPalabra) ){
			$this->gano = 1;
		}

		return $this->gano;
	}

	/**
	 * Ahorcado::getPalabras() Devuelve una palabra al azar.
	 * 
	 * @return string 
	 **/
	public function getPalabra(){
		return $this->palabraSeleccionada;
	}
}

?>
