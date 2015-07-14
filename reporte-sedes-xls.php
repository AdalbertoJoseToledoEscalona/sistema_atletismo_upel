<?php
/*****************************************************************************
 *
 * Filename:  reporte-nominas-xls.
 * 			  
 *
 * Propósito: Generar Reporte de Alumnos en archivo .xls
 * 			  
 *
 * Language: PHP 5.4.3
 *
 * Interprete: Apache 2.4.2 (WampServer Version 2.2)
 *
 * Autor:  Ing. Antonio Quintín Lemus Ruiz
 *
 * Date:07.05.2014     
 *         
 * Copyright (C) UNEXPO. Vicerrectorado Caracas LCM. Oficina Regional de TSI. 
 *
 ***************************************************************************/
//
/* =====================Programa Principal=================================*/
session_start();
/*==========================================================================*
 * PROCEDURES
 *==========================================================================*/ 

header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=SEDES.xls");
// ------------------------------------------------------------------------------------//	

// ------------------------------------------------------------------------------------//	
	// Crear Objeto de Conección:	
	$servidor	= 'localhost/XE';
	$usuario	= 'CND';
	$password	= 'Cnd';
	$c = oci_connect($usuario, $password, $servidor);
	
	// Ejecución de Orden de Consulta:	
	$sql = "SELECT * FROM SEDES";
	$s = oci_parse($c, $sql);
	$exito = oci_execute($s);
	if ($exito) {
	// Recepción de Datos	
	oci_fetch_all($s, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW); 
// ------------------------------------------------------------------------------------//	
	// Salida de Datos (Respuesta)	
		echo "<head> <title> SEDES </title> </head>";
			echo "<body>";
				echo "<center>"; 
					echo "<h3> SEDES REGISTRADAS</h3>";
						echo "<table border='1' cellpadding='2' cellspacing='0' BGCOLOR='white'>\n";
							echo "<tr>";
								echo "<th bgcolor='lightblue' >CODIGO DE LA SEDE</th>";
								echo "<th bgcolor='lightblue' >NOMBRE DE LA SEDE</th>";
								echo "<th bgcolor='lightblue' >UBICACION DE LA SEDE</th>";
							echo "</tr>";
							//
							foreach ($res as $row) {			
	      						echo "<tr>";
								   echo "<td>" 	. 	$row['CODSEDE'] 		. 	"</td>";
								   echo "<td>" 	. 	$row['NOMSEDE'] 		. 	"</td>";
								   echo "<td>" 	. 	$row['UBISEDE']			. 	"</td>";							   
								echo "</tr>";
							}
							//
						echo "</table> <br>";
				echo "</center>"; 			
			echo "</body>";	
	//
	}
	//
	else { echo "Verificar Conexión..."; }
// ------------------------------------------------------------------------------------//	
?>