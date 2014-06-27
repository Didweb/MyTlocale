MyTlocale
=========

Sistema Locale para mi framework MyT

## Qué es

Es parte de mi propio framework MyT basado en MVC.

## Objetivo

Para controlar el sistema de internacionalización del sitio.


### Instalar Mediante Composer

Dentro de tu archivo `composer.json` colocar ...

```
"require": {
	...
	"didweb/myt-local": "2.1.*"
	...
	}
```

Luego actualiza tu composer.


### Uso

El sistema te devuelve las iniciales del idioma según estos criterios.

- Si el usuario no tiene credenciales de idioma, por ejemplo un robot. 
	- Se ofrece el idioma por defecto.
- Si el usuario tiene unas credenciales de idioma no soportadas por tu aplicación.
	- Se ofrece el idioma por defecto.
- Si las credenciales de idioma de un usuario están dentro de los idiomas soportados.
	- Se devuelve las credenciales del usuario.


Para ejecutar el código:

```
	$lang 	= new myLocale($idiomasSoportados);
	$idioma = $lang->setLang($getLa);

```

Se le han de proporcionar los siguientes valores:

**$idiomasSoportados** :  Puede ser un string separado por comas, o bien un array.

```
 $idiomasSoportados = es,en,fr;
 
```

... o bien ... 

```
  $idiomasSoportados = array('es','en','fr');
  
```

**$getLa** :  Seria el parametro get para cuando se queira cambiar de idioma.

Pude ser por ejemplo...

```
$getLa = $_GET['lang'];

```

### Procedimiento

El proceso es el siguiente:
La clase comprueba  si no existe una variable de sesión, en el caso de no existir inicia la comprobación del idioma del usuario según `$_SERVER['HTTP_ACCEPT_LANGUAGE']` , dependiendo de lo que encuentre el retornara el idioma según los criterios mencionados anteriormente.

