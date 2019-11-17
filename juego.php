<?php
  
/**
 * 
 * Copyright (c) 2005-2015, Braulio José Solano Rojas
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
 * juego Clase que implementa el típico primer ejemplo de programación en todo lenguaje.
 * 
 * @package SoapDiscovery
 * @author Braulio José Solano Rojas
 * @copyright Copyright (c) 2005-2015 Braulio José Solano Rojas
 * @version $Id$
 * @access public
 **/
class juego {
	private $palabraSeleccionada = "";
	private $turnosRestantes;
	private $exitos;
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
	)
	
	public function __construct() {  //Tiene que generar la palabra y setear todo para poder jugar
		$this->palabraSeleccionada = $this->palabras[rand(1, 12)];
		$this->$exitos = "";
		$this->$turnosRestantes = 5;
		// $arrayExitos = array_fill(
		// 	0, strlen($this->palabraSeleccionada), 0
		// );

	}
	
	public function verificarLetra($letra = ''){
		$this->$turnosRestantes =  $this->$turnosRestantes - 1;
		$verificacion = "";
		// $arrayVerificar = array_fill(
		// 	0, strlen($this->palabraSeleccionada), 0
		// );
		// $contador = 0;
		$arrayPalabra = str_split($this->palabraSeleccionada);
		foreach($arrayPalabra as $char){
			if($letra == $char){
				//$arrayVerificar[$contador] = 1;
				$verificacion = $verificacion + "T";
				$this->$exitos = $this->$exitos + "T";
				//$this->arrayExitos[$contador] = 1;
			}else{
				$verificacion = $verificacion + "F";
				$this->$exitos = $this->$exitos + "F";
			}
			//$contador = $contador + 1;
		}

		//return $arrayVerificar;
		return $verificacion
	}

	public function getIntentosRestantes(){
		return $this->$turnosRestantes;
	}

	public function verificarSiGano(){
		$gano = 0;
		$auxCont = 0;
		foreach($this->$arrayExitos as $val){
			if($val == 1){
				$auxCont = $auxCont + 1;
			}
		}
		if($auxCont == $strlen($this->$arrayExitos)){
			$gano = 1;
		}

		return $gano;
	}

	public function getPalabra(){
		return $this->$palabraSeleccionada;
	}
}

?>
