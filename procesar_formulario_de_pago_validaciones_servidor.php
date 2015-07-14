<?php

$Identificacion = $_POST["ci"];
$Tipo = $_POST["tipo"];
$Monto = $_POST["monto"];
$Referencia = $_POST["referencia"];

// Procedimientos para efectuar la transacciones  ...

// Procedimientos para efectuar las validaciones  ...
	
	# inicio - 
	$error='<br><b>Se encontraron los siguientes errores:</b><br>';
	// Inicializo la variable 'error' que contendra la lista de errores  ...
	
	$e=0;
	// Inicializo la variable 'e' que contendra el numero de errores  ...
	
	#validaciones de campos vacios
	
	if($Identificacion==''){ 
		$error.='- Debe indicar un numero de identificacion (CI)<br/>';
		++$e;
	}
	
	if($Tipo==''){ 
		$error.='- El campo Tipo no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	if($Monto==''){ 
		$error.='- El campo Monto no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	if($Referencia==''){
		$error.='- El campo Referencia no debe estar vac&iacute;o<br/>';
		++$e;
	}	
	
	# fin - validaciones 
	
	if(@$e>0) {
			echo "<P ALIGN='CENTER'>";
			echo $error;
			echo "<BR><FONT SIZE='4'> <P ALIGN='CENTER'>";
			echo "<a href='formulario_de_pago.html'>Intentar Nuevamente</a> | <a href='index.html'> Regresar al Inicio</a>"; 
			echo "</FONT>";
			echo "</P>";
		} 	else {
			
		$servidor	= 'localhost/XE';
		$usuario	= 'BD2014';
		$password	= 'bd2014';
		
		// Conecta al Sistema de Gestion de Bases de Datos
		$c = oci_connect($usuario, $password, $servidor);
		
		// Procedimiento para incluir datos en Base de Datos
		
		
	
	$sql = "INSERT INTO PAGOS VALUES 	(
											'$Identificacion',
											'$Tipo', 
											'$Monto', 
											'$Referencia'
										)";
		
	$s = oci_parse($c, $sql);
		
	oci_execute($s);
	
	// Respuesta al Usuario
			echo "<html>";
			echo 	"<head> <title>Respuesta</title> </head>";
			echo 	"<body>";
			echo 		"<hr>";
			echo 		"<hr>";
			echo 			"<h1>Confirmacion de Pago Validado</h1>";
			echo 		"<hr>"; 
			echo 		"<hr>"; 
			echo 			"Pago registrado con los siguientes datos:" . "<hr>";
			echo 				"ID Alumno: " .  $Identificacion . "<br>"; 
			echo 				"Tipo: " . $Tipo . "<br>"; 
			echo 				"Monto: " . $Monto . " Bolivares" . "<br>";
			echo 				"Referencia: " . $Referencia . "<br> <hr>";
			echo 				"Gracias..!" . "<br> <hr> <hr> <br>";
			echo 			"<a href='index.html'>Regresar al Menu Principal</a>";
			echo	 "</body>";
			echo "</html>"; 
		
		
			
		
	}	
// ...

?> 