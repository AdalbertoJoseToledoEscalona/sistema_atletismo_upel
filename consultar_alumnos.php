<?php
	
	// Crear Objeto de Conección:	
	$servidor	= 'localhost/XE';
	$usuario	= 'bd2014';
	$password	= 'bd2014';
	$c = oci_connect($usuario, $password, $servidor);
	
	// Ejecución de Orden de Consulta:	
	$sql = "SELECT * FROM alumnos";
	$s = oci_parse($c, $sql);
	oci_execute($s);
	
	// Recepción de Datos	
	oci_fetch_all($s, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW); 

	// Salida de Datos (Respuesta)
	echo "<html>";
		echo "<head> <title>CONSULTA</title> </head>";
			echo "<body>";
				echo "<center>"; 
					echo "<h1>..:: CONSULTAR ALUMNOS  ::..</h1><br>";
						echo "<table border='1' cellpadding='2' cellspacing='0' BGCOLOR='yellow'>\n";
							echo "<tr>";
								echo "<th bgcolor='lightblue' >CI</th>";
								echo "<th bgcolor='lightblue' >NOMBRE Y APELLIDO</th>";
								echo "<th bgcolor='lightblue' >DIRECCION</th>";
								echo "<th bgcolor='lightblue' >EMAIL</th>";
								echo "<th bgcolor='lightblue' >CLAVE</th>";
							echo "</tr>";
							//
							foreach ($res as $row) {			
	      						echo "<tr>";
								   echo "<td>" 	. 	$row['CI'] 	. 	"</td>";
								   echo "<td>" 	. 	$row['nombre'] 	. 	"</td>";
								   echo "<td>" 	. 	$row['direccion']		. 	"</td>";
								   echo "<td>" 	. 	$row['email']		. 	"</td>";
								   echo "<td>" 	. 	$row['clave']		. 	"</td>";
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
<html>
    <head>
		<title>PROYECTO DE BASES DE DATOS </title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="css/styler.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/interface.js"></script>
    </head>
	
    <body>

	<!--bottom dock -->
		<div class="dock" id="dock2">
		  <div class="dock-container2">
		  <a class="dock-item2" href="index.html"><span>Home</span><img src="images/home.png" alt="home" /></a> 
		  <a class="dock-item2" href="consultar_profesor.php"><span>Contact</span><img src="images/email.png" alt="contact" /></a> 
		  <a class="dock-item2" href="#"><span>Portfolio</span><img src="images/portfolio.png" alt="portfolio" /></a> 
		  <a class="dock-item2" href="#"><span>Music</span><img src="images/music.png" alt="music" /></a> 
		  <a class="dock-item2" href="#"><span>Video</span><img src="images/video.png" alt="video" /></a> 
		  <a class="dock-item2" href="ver_pagos_realizados.php"><span>History</span><img src="images/history.png" alt="history" /></a> 
		  <a class="dock-item2" href="#"><span>Calendar</span><img src="images/calendar.png" alt="calendar" /></a> 
		  <a class="dock-item2" href="#"><span>Links</span><img src="images/link.png" alt="links" /></a> 
		  <a class="dock-item2" href="#"><span>RSS</span><img src="images/rss.png" alt="rss" /></a> 
		  <a class="dock-item2" href="formulario_de_pago.html"><span>RSS2</span><img src="images/rss2.png" alt="rss" /></a> 
		  </div>
		</div>

		<!--dock menu JS options -->
		<script type="text/javascript">			
			$(document).ready(
				function()
				{
					$('#dock2').Fisheye(
						{
							maxWidth: 60,
							items: 'a',
							itemsText: 'span',
							container: '.dock-container2',
							itemWidth: 40,
							proximity: 80,
							alignment : 'left',
							valign: 'bottom',
							halign : 'center'
						}
					)
				}
			);
		</script>
		
    </body>	
</html>

	