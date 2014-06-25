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
	private $lang;
	private $soportados;
	
	public function getLang()
	{
	 return $this->lang;	
	}	
	
	public function setLang()
	{
		
	}
	
	
	public function getSoportados()
	{
	 return $this->soportados;	
	}	
	
	
	public function setSoportados($soportados = array('es','en'))
	{
		$this->soportados = $soportados;
		return $this;
		
	}
	

	

}

?>
