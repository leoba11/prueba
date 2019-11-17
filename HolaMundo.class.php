<?php
  
/**
 * 
 * Copyright (c) 2005-2015, Braulio Jos� Solano Rojas
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
 * HolaMundo Clase que implementa el t�pico primer ejemplo de programaci�n en todo lenguaje.
 * 
 * @package SoapDiscovery
 * @author Braulio Jos� Solano Rojas
 * @copyright Copyright (c) 2005-2015 Braulio Jos� Solano Rojas
 * @version $Id$
 * @access public
 **/
class HolaMundo {
	private $nombre = '';
	private $ultimo_saludo = '';
	
	/**
	 * HolaMundo::__construct() Constructor de la clase HolaMundo.
	 * 
	 * @param string $nombre
	 * @return string
	 **/
	public function __construct($nombre = 'Mundo') {
		$this->nombre = $nombre;
	}
	
	/**
	 * HolaMundo::salude() Saluda al Mundo o a $this->nombre o saluda a $nombre si $nombre no es vac�o.
	 * 
	 * @param string $nombre
	 * @return string
	 **/
	public function salude($nombre = '') {
		$nombre = $nombre?$nombre:$this->nombre;
		$this->ultimo_saludo = 'Hola '.$nombre.'.';
		return $this->ultimo_saludo;
	}
	
	/**
	 * HolaMundo::servidorEstampillaDeTiempo() Devuelve el tiempo del servidor.
	 * 
	 * @return string 
	 **/
	public function servidorEstampillaDeTiempo() {
		return time();
	}
	
	/**
	 * HolaMundo::ultimoSaludo() Devuelve el saludo guardado en la propiedad ultimo_saludo.
	 * 
	 * @return string 
	 **/
	public function ultimoSaludo() {
		return 'Saludo guardado:  '.$this->ultimo_saludo;
	}
}

?>
