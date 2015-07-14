<?php

$codsede = $_POST["codsede"];
$nomsede = $_POST["nomsede"];
$ubisede = $_POST["ubisede"];


// Procedimientos para efectuar la transacciones  ...

// Procedimientos para efectuar las validaciones  ...
	
	# inicio - 
	$error='<br><b>Se encontraron los siguientes errores:</b><br>';
	// Inicializo la variable 'error' que contendra la lista de errores  ...
	
	$e=0;
	// Inicializo la variable 'e' que contendra el numero de errores  ...
	
	#validaciones de campos vacios
	
	if($codsede==''){ 
		$error.='- Debe indicar un Codigo para la Sede<br/>';
		++$e;
	}
	
	if($nomsede==''){ 
		$error.='- El campo Nombre de la Sede no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	if($ubisede==''){ 
		$error.='- El campo Ubicacion de la Sede no debe estar vac&iacute;o<br/>';
		++$e;
	}
		
	# fin - validaciones 
	
	if(@$e>0) {
			echo "<P ALIGN='CENTER'>";
			echo $error;
			echo "<BR><FONT SIZE='4'> <P ALIGN='CENTER'>";
			echo "<a href='formulario_de_sedes.html'>Intentar Nuevamente</a> | <a href='index.html'> Regresar al Inicio</a>"; 
			echo "</FONT>";
			echo "</P>";
		} 	else {
			
		$servidor	= 'localhost/XE';
		$usuario	= 'CND';
		$password	= 'Cnd';
		
		// Conecta al Sistema de Gestion de Bases de Datos
		$c = oci_connect($usuario, $password, $servidor);
		
		// Procedimiento para incluir datos en Base de Datos
		
		
	
	$sql = "INSERT INTO SEDES VALUES 	(
											'$codsede',
											'$nomsede', 
											'$ubisede'
										)";
		
	$s = oci_parse($c, $sql);
		
	oci_execute($s);
	
	// Respuesta al Usuario
			echo "<html>";
			echo 	"<head> <title>Respuesta</title> </head>";
			echo 	"<body>";
			echo 		"<hr>";
			echo 		"<hr>";
			echo 			"<h1>Confirmacion de Registro de Sede</h1>";
			echo 		"<hr>"; 
			echo 		"<hr>"; 
			echo 			"Sede registrada con los siguientes datos:" . "<hr>";
			echo 				"Codigo: " .  $codsede . "<br>"; 
			echo 				"Nombre: " . $nomsede . "<br>"; 
			echo 				"Ubicacion: " . $ubisede . "<br>";
			echo 				"Gracias..!" . "<br> <hr> <hr> <br>";
			echo 			"<a href='index.html'>Regresar al Menu Principal</a>";
			echo	 "</body>";
			echo "</html>"; 
		
		
			
		
	}	
// ...

?> 