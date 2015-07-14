<?php session_start();?>
<html>
    <head>
		<title>PROYECTO DE ANALISIS Y DISEÑO DE SISTEMAS</title>
		<!-- /*=================================================================*/ --> 		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<!-- /*=================================================================*/ --> 		
		<link href="css/styler.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/interface.js"></script>
		<!-- /*=================================================================*/ --> 
		
		<!-- /*=================================================================*/ --> 		
		<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-base.css" />
		<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-topbar.css" />
		<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-sidebar.css" />		
		<!-- /*=================================================================*/ --> 		<script type="text/javascript" src="ddlevelsfiles/ddlevelsmenu.js"></script>
		
		
		<!-- /*=================================================================*/ --> 		
		<script type="text/javascript" src="js/swfobject.js"></script>
		<script type="text/javascript">
			var flashvars = {};
			flashvars.xml_file = "photo_list.xml";
			var params = {};
			params.wmode = "transparent";
			var attributes = {};
			attributes.id = "slider";
			swfobject.embedSWF("flash_slider.swf", "flash_grid_slider", "900", "290", "9.0.0", false, flashvars, params, attributes);
		</script>  
		<!-- /*=================================================================*/ --> 		
		
    </head>
	
    <body>

	<!-- /*==================== Encabezado Principal =======================*/ --> 
		<table align="center" border="0" width="100%" >
			<tr align="left">
				<td width="125">
					<img border="0" src="images/logo.jpg" width="75" height="75">
				</td>
				<td width="500">
					<p>SISTEMA DE INFORMACIÓN CON UNA BASE DE DATOS</p>
					<p>
					* Ambito Educativo - Gestión de una Académia *</p>
				</td> 
				<td width="125">&nbsp;</td>
			</tr>
			<tr>
				<td  width="0" colspan="3" style="background-color:#7C94B6;">
				</td>
			</tr>
		</table>

	<!-- /*=================================================================*/ --> 	

	<!-- /*=================================================================*/ --> 		
		<div id="ddtopmenubar" class="mattblackmenu">
			<ul>
				<li><a href="index.html">Home</a></li>
				<?php if(isset($_SESSION["user"]) && !is_null($_SESSION["user"])){ ?>
				
				<li><a rel="ddsubmenu1">Sedes</a></li>
				<li><a rel="ddsubmenu2">Disiplinas</a></li>
				<li><a rel="ddsubmenu3">Entrenadores</a></li>
				<li><a rel="ddsubmenu4">Atletas</a></li>
				<li><a rel="ddsubmenu6">Alumnos</a></li>
				<li><a rel="ddsubmenu5">Pagos</a></li>
				<li><a href="salir.php">Salir</a></li>
				<?php }else{ ?>
				<li><a href="nuevo_alumno.php">Resgistrarse</a></li>
				<li><a href="autenticarse.php">Autenticarse</a></li>
				<?php } ?>
			</ul>
		</div>
	<!-- /*=================================================================*/ --> 
	
		<!-- /*=================================================================*/ --> 	
		<script type="text/javascript">
		ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")
		</script>
		<!-- /*=================================================================*/ --> 	
		<?php if(isset($_SESSION["user"]) && !is_null($_SESSION["user"])){ ?>
		<!--HTML for the Drop Down Menus associated with Side Menu Bar-->
		<!--They should be inserted OUTSIDE any element other than the BODY tag itself-->
		<!--A good location would be the end of the page (right above "</BODY>")-->
		<!-- /*=================================================================*/ --> 	
		<!--Side Drop Down Menues HTML-->

		<!--Side Drop Down Menu 1 HTML-->
		<!-- /*=================================================================*/ --> 	
		<ul id="ddsubmenu1" class="ddsubmenustyle blackwhite">
			<li><a href="consultar_sedes.php">Consultar Sedes</a></li>
			<li><a href="formulario_de_sedes.html">Agregar Sede</a></li>
			<li><a href="http://www.dynamicdrive.com/emailriddler/">Eliminar Sede</a></li>
			<li><a href="http://www.dynamicdrive.com/emailriddler/">Modificar Sede</a></li>
			<li><a href="reporte-sedes-xls.php">Reporte de Sedes</a></li>
		</ul>
		<!-- /*=================================================================*/ --> 	

		<!--Side Drop Down Menu 2 HTML-->
		<!-- /*=================================================================*/ --> 	
		<ul id="ddsubmenu2" class="ddsubmenustyle blackwhite">
		<li><a href="http://tools.dynamicdrive.com/imageoptimizer/">Consultar Disiplinas</a></li>
		<li><a href="http://tools.dynamicdrive.com/favicon/">Agregar Disiplina</a></li>
		<li><a href="http://tools.dynamicdrive.com/favicon/">Eliminar Disiplina</a></li>
		<li><a href="http://www.dynamicdrive.com/emailriddler/">Modificar Disiplina</a></li>
		<li><a href="http://tools.dynamicdrive.com/password/">Reporte de Disiplinas</a></li>
		</ul>
		<!-- /*=================================================================*/ --> 	

		<!-- /*=================================================================*/ --> 
		<!--Side Drop Down Menu 3 HTML-->
		<ul id="ddsubmenu3" class="ddsubmenustyle blackwhite">
		<li><a href="consultar_profesor.php">Ver Entrenadores</a></li>
		<li><a href="#">Item 2a</a></li>
		<li><a href="#">Item Folder 3a</a>
				  <ul>
				  <li><a href="#">Sub Item 3.1a</a></li>
				  <li><a href="#">Sub Item 3.2a</a></li>
				  <li><a href="#">Sub Item 3.3a</a></li>
						<ul>
						<li><a href="central.htm">Mi Pagina</a></li>
						<li><a href="#">Sub Item 3.3.2a</a></li>
						 </ul>
				  <li><a href="#">Sub Item 3.4a</a></li>
				  <li><a href="#">Sub Item 3.5a</a></li>
				  <li><a href="#">Sub Item 3.6a</a></li>
				  <li><a href="#">Sub Item 3.7a</a></li>
				  </ul>
		</li>
		<li><a href="#">Item 4a</a></li>
		<li><a href="#">Item Folder 5a</a>
					  <ul>
					  <li><a href="#">Sub Item 5.1a</a></li>
					  <li><a href="#">Item Folder 5.2a</a>
								<ul>
								<li><a href="#">Sub Item 5.2.1a</a></li>
								<li><a href="#">Sub Item 5.2.2a</a></li>
								<li><a href="#">Sub Item 5.2.3a</a></li>
								<li><a href="#">Sub Item 5.2.4a</a></li>
								</ul>
					  </li>
						</ul>
		</li>
		<li><a href="#">Item 6a</a></li>
		<li><a href="#">Item 7a</a></li>
		<li><a href="#">Item 8a</a></li>
		</ul>
		<!-- /*=================================================================*/ --> 

		<!--Side Drop Down Menu 4 HTML-->
		<!-- /*=================================================================*/ --> 
		<ul id="ddsubmenu4" class="ddsubmenustyle blackwhite">
		<li><a href="consultar_atletas.php">Ver Atletas</a></li>
		<li><a href="nuevo_atleta.php">Registrar Atleta</a></li>
		<li><a href="#">Item Folder 3b</a>
		  <ul>
		  <li><a href="#">Sub Item 3.1b</a></li>
		  <li><a href="#">Sub Item 3.2b</a></li>
		  <li><a href="#">Sub Item 3.3b</a></li>
		  <li><a href="#">Sub Item 3.4b</a></li>
		  <li><a href="#">Sub Item 3.5b</a></li>
		  </ul>
		</li>
		<li><a href="#">Item 4b</a></li>
		<li><a href="#">Item Folder 5b</a>
		  <ul>
		  <li><a href="#">Sub Item 5.1b</a></li>
		  <li><a href="#">Sub Item 5.2b</a></li>
		  <li><a href="#">Item Folder 5.3b</a>
			<ul>
			<li><a href="#">Sub Item 5.3.1b</a></li>
			<li><a href="#">Sub Item 5.3.2b</a></li>
			<li><a href="http://www.dynamicdrive.com/dynamicindex1/ddlevelsmenu/">Sub Item 5.3.3b</a></li>
			</ul>
		  </li>
			</ul>
		</li>
		<li><a href="#">Item 6b</a></li>
		</ul>
		<!-- /*=================================================================*/ --> 

		
		<!--Side Drop Down Menu 4 HTML-->
		<!-- /*=================================================================*/ --> 
		<ul id="ddsubmenu6" class="ddsubmenustyle blackwhite">
		<li><a href="consultar_alumnos.php">Ver Alumnos</a></li>
		<li><a href="nuevo_alumno.php">Registrar Alumno</a></li>
		<li><a href="#">Item Folder 3b</a>
		  <ul>
		  <li><a href="#">Sub Item 3.1b</a></li>
		  <li><a href="#">Sub Item 3.2b</a></li>
		  <li><a href="#">Sub Item 3.3b</a></li>
		  <li><a href="#">Sub Item 3.4b</a></li>
		  <li><a href="#">Sub Item 3.5b</a></li>
		  </ul>
		</li>
		<li><a href="#">Item 4b</a></li>
		<li><a href="#">Item Folder 5b</a>
		  <ul>
		  <li><a href="#">Sub Item 5.1b</a></li>
		  <li><a href="#">Sub Item 5.2b</a></li>
		  <li><a href="#">Item Folder 5.3b</a>
			<ul>
			<li><a href="#">Sub Item 5.3.1b</a></li>
			<li><a href="#">Sub Item 5.3.2b</a></li>
			<li><a href="http://www.dynamicdrive.com/dynamicindex1/ddlevelsmenu/">Sub Item 5.3.3b</a></li>
			</ul>
		  </li>
			</ul>
		</li>
		<li><a href="#">Item 6b</a></li>
		</ul>
		
		<!--Side Drop Down Menu 5 HTML-->
		<!-- /*=================================================================*/ --> 	
		<ul id="ddsubmenu5" class="ddsubmenustyle blackwhite">
		<li><a href="formulario_de_pago.html">Registrar Pago</a></li>
		<li><a href="ver_pagos_realizados.php">Ver Pagos Realizados</a></li>
		<li><a href="http://tools.dynamicdrive.com/favicon/">Eliminar Pago</a></li>
		<li><a href="http://www.dynamicdrive.com/emailriddler/">Modificar Pago</a></li>
		<li><a href="http://tools.dynamicdrive.com/password/">Generar Reporte de Pagos Realizados</a></li>
		</ul>
		<!-- /*=================================================================*/ --> 
		<?php } ?>
	<!-- /*=================================================================*/ --> 
	
		<!-- /*=================================================================*/ --> 
			<center>
			
				<h2> ..:: APLICACIÓN WEB PROTOTIPO ::..</h2>
				<!-- /*=================================================================*/ -->
				 <hr>
				<!-- /*=================================================================*/ -->
					<!--<div align="center">           
						<div id="flash_grid_slider">					
							<img src="flash_slider.swf" alt="Get Adobe Flash player" />					
						</div>
					</div>-->
					
					<div id="anvsoftJavaScriptSlideshow" style="width: 900px; height: 400px; position: relative;">
	<script src="anvsoftJavaScriptSlideshow-1.0.0.min.js?xml_path=slides.xml"></script>
	<script>anvsoftJavaScriptSlideshow.init("anvsoftJavaScriptSlideshow");</script>
  </div>
					
				<!-- /*=================================================================*/ -->
							
			</center>
		
		<!--bottom dock -->
		<div class="dock" id="dock2">
		  <div class="dock-container2">
		  <a class="dock-item2" href="http://www.dynamicdrive.com/dynamicindex1/ddlevelsmenu/"><span>Home</span><img src="images/home.png" alt="home" /></a> 
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
