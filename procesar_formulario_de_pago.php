<?php

$Identificacion = $_POST["ci"];
$Tipo = $_POST["tipo"];
$Monto = $_POST["monto"];
$Referencia = $_POST["referencia"];

// Procedimientos para efectuar la transacciones  ...
// ...
// Procedimiento para incluir datos en Base de Datos

	$servidor	= 'localhost/XE';
    $usuario	= 'BD2014';
    $password	= 'bd2014';
		
	$c = oci_connect($usuario, $password, $servidor);
	
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
echo 			"<h1>Confirmacion de Pago</h1>";
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

?> 