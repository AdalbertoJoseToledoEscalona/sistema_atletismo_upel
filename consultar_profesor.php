<?php
	
	// Crear Objeto de Conección:	
	$servidor	= 'localhost/XE';
	$usuario	= 'BD2014';
	$password	= 'bd2014';
	$c = oci_connect($usuario, $password, $servidor);
	
	// Ejecución de Orden de Consulta:	
	$sql = "SELECT * FROM ENTRENADORES";
	$s = oci_parse($c, $sql);
	oci_execute($s);
	
	// Recepción de Datos	
	oci_fetch_all($s, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
//echo $nrows;
//print_r($res);
	// Salida de Datos (Respuesta)
	echo "<html>";
		echo "<head> <title>CONSULTA</title> </head>";
			echo "<body>";
				echo "<center>"; 
					echo "<h1>..:: Consulta de Profesores ::..</h1><br>";
						echo "<table border='1' cellpadding='2' cellspacing='0' BGCOLOR='yellow'>\n";
							echo "<tr>";
								echo "<th bgcolor='lightblue' >Nombre</th>";
								echo "<th bgcolor='lightblue' >Apellido</th>";
								//echo "<th bgcolor='lightblue' >Cargo</th>";
								echo "<th bgcolor='lightblue' >Salario</th>";
								echo "<th bgcolor='lightblue' >e-mail</th>";
							echo "</tr>";
							//
							foreach ($res as $row) {			
	      						echo "<tr>";
								   echo "<td>" 	. 	$row['FIRST_NAME'] 	. 	"</td>";
								   echo "<td>" 	. 	$row['LAST_NAME'] 	. 	"</td>";
								   //echo "<td>" 	. 	$row['JOB_ID']		. 	"</td>";
								   echo "<td>" 	. 	$row['SALARY']		. 	"</td>";
								   echo "<td>" 	. 	$row['EMAIL']		. 	"</td>";
								echo "</tr>";
							}
							//
						echo "</table> <br>";
					echo "<a href='index.html'>Regresar al Menu Principal</a>";
				echo "</center>"; 			
			echo "</body>";
	echo "</html>"; 
	//
?>