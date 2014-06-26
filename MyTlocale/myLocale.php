<?php
	/*
	<MyTLocale - Sistema de internalizacion>
    Copyright (C) <2014>  <Eduard Pinuaga>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    * */
class myLocale
{
	public 	$lang;
	private $soportados;
	public 	$IdiomaEntrada;
	

	public function __construct()
	{
		$this->setSoportados();	
		$this->getSoportados();
	}
	
	public function getLang()
	{
		return $this->lang;	
	}	



	public function setLang()
	{	
		if(!isset($_SESSION['lang']) && !isset($_GET['lang'])){
			
			$this->setIdiomaEntrada();
			$lang = $this->buscalang();
			$_SESSION['lang'] = $lang;
			return $this->lang = $lang;
				
			} elseif(isset($_SESSION['lang']) && !isset($_GET['lang'])) {
			
				return $this->lang = $_SESSION['lang'];
			
			} elseif(isset($_GET['lang'])) {
			
				$lang = $this->checklang($_GET['lang']);
				$_SESSION['lang'] = $lang;
				return $this->lang = $lang;
			}
			
	}
	

	
	
	public function setIdiomaEntrada()
	{
		// Recogemos el Lang del usuario.
		$idioma = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		$idioma = explode('-',$idioma[0]);
		return $this->IdiomaEntrada = $idioma[0];
	}


	
	public function buscalang()
	{
		// comprobamos si tiene lang, y si la tiene que esta este dentro de idiomas soportados
		if(!isset($this->IdiomaEntrada)){
			
			return $this->soportados[0];
			
			} else {
				
				// Comprobamos que exista el valor
				return $this->checklang($this->IdiomaEntrada);
			
			}
			
	}
	
	
	public function checklang($evalua)
	{
		if(in_array($evalua,$this->soportados)){	
					$key = array_search($evalua, $this->soportados);
					return 	$this->soportados[$key];
					} else {
					return $this->soportados[0];		
				}	
		
	}
	
	
	public function getSoportados()
	{
	 return $this->soportados;	
	}	
	
	
	public function setSoportados($soportados = array('es','en','ca'))
	{
		$this->soportados = $soportados;
		return $this;
		
	}
	

	

}

?>
