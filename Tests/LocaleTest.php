<?php
require_once('./MyTlocale/myLocale.php');

class LocaleTest extends PHPUnit_Framework_TestCase
{

	public function testSoportadosNoPuedeEstarVacio()
	{
		// Nos aseguramos de que este valor nunca este vacio. 
		$sop = new myLocale();
		$sop->setSoportados();
		$contar = count($sop->getSoportados()); 
		$this->assertGreaterThan(0, $contar);
		$this->assertEquals(2,$contar);
	}
	
	public function testLangNoPuedeSerVacio()
	{
		//nos aseguramso de que siempre tenga un valor el getLang()
		$lang = new myLocale();
		$lang->setSoportados();
		$soportados = $lang->getSoportados();
		$lang->lang = 'es';
		$lang = $lang->getLang();
		
		$this->assertContains($lang,$soportados);
	}	

	public function testDarIdiomaSoportado()
	{
		//nos asegurmos de devolver un idioma soportado
		$lang = new myLocale();
		$lang->setSoportados();
		
		// Es un robot damos idioma por defecto.
		$idioma_entregado = $lang->buscalang();
		$this->assertEquals('es',$idioma_entregado);
		

		// Un usuario con el idioma soportado en Español.
		$lang->IdiomaEntrada = 'es';
		$idioma_entregado = $lang->buscalang();
		$this->assertEquals('es',$idioma_entregado);


		// Un usuario sin el idioma soportado.
		$lang->IdiomaEntrada = 'ru';
		$idioma_entregado = $lang->buscalang();
		$this->assertEquals('es',$idioma_entregado);		


		// Un usuario con el idioma soportado, pero no es el principal
		$lang->IdiomaEntrada = 'en';
		$idioma_entregado = $lang->buscalang();
		$this->assertEquals('en',$idioma_entregado);
		
	}


	public function testCheckLang()
	{
		$lang = new myLocale();
		$lang->setSoportados();
		
		// Pasamos un idioma no valido
		$idioma_entregado = $lang->checklang('xx');
		$this->assertEquals('es',$idioma_entregado);
		
		// Pasamos un el idioma por defecto
		$idioma_entregado = $lang->checklang('es');
		$this->assertEquals('es',$idioma_entregado);
		
		// Pasamos un el idioma soportado
		$idioma_entregado = $lang->checklang('en');
		$this->assertEquals('en',$idioma_entregado);
		
	}
}
?>
