<?php
	
	// Crear Objeto de Conección:	
	$servidor	= 'localhost/XE';
	$usuario	= 'BD2014';
	$password	= 'bd2014';
	$c = oci_connect($usuario, $password, $servidor);
	
	// Ejecución de Orden de Consulta:	
	$sql = "SELECT * FROM PAGOS";
	$s = oci_parse($c, $sql);
	oci_execute($s);
	
	// Recepción de Datos	
	oci_fetch_all($s, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW); 

	// Salida de Datos (Respuesta)
	echo "<html>";
		echo "<head> <title>PAGOS</title> </head>";
			echo "<body>";
				echo "<center>"; 
					echo "<h1>..:: Consulta de Pagos Realizados ::..</h1><br>";
						echo "<table border='1' cellpadding='2' cellspacing='0' BGCOLOR='yellow'>\n";
							echo "<tr>";
								echo "<th bgcolor='lightblue' >Identificacion</th>";
								echo "<th bgcolor='lightblue' >Tipo de Pago</th>";
								echo "<th bgcolor='lightblue' >Monto Pagado</th>";
								echo "<th bgcolor='lightblue' >Referencia de Pago</th>";
							echo "</tr>";
							//
							foreach ($res as $row) {			
	      						echo "<tr>";
								   echo "<td>" 	. 	$row['CI'] 			. 	"</td>";
								   echo "<td>" 	. 	$row['TIPO'] 		. 	"</td>";
								   echo "<td>" 	. 	$row['MONTO']		. 	"</td>";
								   echo "<td>" 	. 	$row['REFERENCIA']	. 	"</td>";
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