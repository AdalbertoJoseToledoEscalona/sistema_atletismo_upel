<?php 
/*****************************************************************************
 *
 * Filename: nuevo-alumno.php
 *
 * Propósito: Administración de Alumnos (Ingreso)
 *
 * Language: PHP 5.4.3
 *
 * Interprete: Apache 2.4.2 (WampServer Version 2.2)
 *
 * Autor:  Ing. Antonio Quintín Lemus Ruiz
 *
 * Date:07.05.2014     
 *
 ***************************************************************************/
//
/* =====================Programa Principal=================================*/

/*==========================================================================*
 * FUNCIONES
 *==========================================================================*/ 
function ValidarEmail($email){
  $x=0;
  if($email == '') ++$x;
  else if(substr_count($email, '@')!=1) ++$x;
  else if(substr_count($email, '.',5)==0) ++$x;
  else {
      $emailsec=explode(".", $email);
	  $contador=count($emailsec);
	  for($i=0;$i<$contador;$i++){
		  if(strlen($emailsec[$i])<2){
			  ++$x;
			  break;
			  }
		  }
      $emailsec2=explode("@",$email);
      $contador2=count($emailsec);
      if(strlen($emailsec[0])<1) ++$x;
      if(strlen($emailsec[1])<2) ++$x;
  }
return $x;
}
/*==========================================================================*/ 

/*==========================================================================*/ 

if(@$_POST['boton']=='Agregar'){
	
	# inicio - validaciones
	$ci=@$_POST['ci'];
	$nombre=@$_POST['nombre'];
	$apellido=@$_POST['apellido'];
	$fecha=@$_POST['fecha'];
	
	$estado=@$_POST['estado'];
	$sangre=@$_POST['sangre'];
	$genero=@$_POST['genero'];
	$lugar=@$_POST['lugar'];
	$direccion=@$_POST['direccion'];
	$email=@$_POST['email'];
	$telefono=@$_POST['telefono'];
	
	
	$sede=@$_POST['sede'];
	$ingreso=@$_POST['ingreso'];
	$semestre=@$_POST['semestre'];
	$promedio=@$_POST['promedio'];
	$estatus=@$_POST['estatus'];
	
	
	
	
	
	$error='Se encontraron los siguientes errores:<br/>';
	$e=0;
	
	#validaciones de campos vacios
	if($ci==''){ 
		$error.='- El campo CI no debe estar vac&iacute;o<br/>';
		++$e;
	}
	if($nombre==''){ 
		$error.='- El campo Nombre no debe estar vac&iacute;o<br/>';
		++$e;
	}
	if($apellido==''){ 
		$error.='- El campo Apellido no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	if($fecha==''){ 
		$error.='- El campo Fecha de Nacimiento no debe estar vac&iacute;o<br/>';
		++$e;
	}
	if($estado==''){ 
		$error.='- Debe elegir el Estado Civil del Alumno<br/>';
		++$e;
	}
	if($sangre==''){ 
		$error.='- Debe elegir un Tipo Sangre<br/>';
		++$e;
	}	
	if($genero==''){
		$error.='- El campo Genero no debe estar vac&iacute;o<br/>';
		++$e;
	}	
	if($lugar==''){
		$error.='- El campo Lugar no debe estar vac&iacute;o<br/>';
		++$e;
	}
	if($direccion==''){
		$error.='- El campo de Direccion no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	
	if($email==''){
		$error.='- El campo de Email no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	
	if($telefono==''){
		$error.='- El campo de Telefono no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	
	if($sede==''){
		$error.='- El campo de Sede no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	
	if($ingreso==''){
		$error.='- El campo de Ingreso no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	
	if($semestre==''){
		$error.='- El campo de Semestre no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	
	if($promedio==''){
		$error.='- El campo de Promedio no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	if($estatus==''){
		$error.='- El campo de Estatus no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	
	
	# validacion de contenido
	
	if(!is_numeric($ci)) {
       $error.='- El Campo CI debe ser un Numero<br/>';
		++$e;
    }

	$validacion = ValidarEmail($email);
	if($validacion >= 1) { $error .= '- Correo Invalido <br/>'; ++$e; }	
	
	# fin - validaciones 
	
	 $e=0;   # Trampa Quitar
	
	if($e==0){
		
		$servidor	= 'localhost/XE';
		$usuario	= 'BD2014';
		$password	= 'bd2014';
		
		// Conecta al Sistema de Gestion de Bases de Datos
		$c = oci_connect($usuario, $password, $servidor);
		
			// Procedimiento para incluir datos en Base de Datos	
			
			//$sql = "INSERT INTO ATLETAS VALUES 	('$ci', '$nombre', '$apellido', '$fecha', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1')";

				$sql = "INSERT INTO ATLETAS VALUES 	('$ci', '$nombre', '$apellido', '$fecha', '$estado', '$sangre', '$genero', '$lugar', '$direccion', '$email', '$telefono', '$ingreso', '$semestre', '$promedio', '$estatus', '$sede');";
			echo $sql;
			
			 // $sql = "INSERT INTO ATLETAS VALUES 	('$ci', '$nombre', '$direccion','$sexo','$pais', $musica, $deporte, $cine, '$email', '$clave')";		
			
			$s = oci_parse($c, $sql);	
			$exito = oci_execute($s);
				
			if(!$exito){ 
				$error.='Error de Conexion de Base de datos<br/>'.oci_error($c);
				++$e;
			}else{
				$mensaje = 'Registro Exitoso...<br/>';
				$ci='';
				$nombre='';
				$apellido='';
	$fecha='';
	
	$estado='';
	$sangre='';
	$genero='';
	$lugar='';
	$direccion='';
	$email='';
	$telefono='';
	
	
	$sede='';
	$ingreso='';
	$semestre='';
	$promedio='';
	$estatus='';
			}
		
	}	
}
?>
<html>
   <head>
      <title>
         ..:: AGREGAR ATLETAS ::..
      </title>
   </head>
	<body>
		<?php 
		if(@$e>0) echo $error;
		if(@$mensaje!='') echo $mensaje;
		?>
		<form name="nuevo_alumno" method="post" action="">
			<table>
				<tr><th colspan="2">Nuevo Atleta</th></tr>
				
				<tr>
					<th>CI:</th>
					<td><input type="text" name="ci" value="<?php echo @$ci; ?>"/></td>
				</tr>
				
				<tr>
					<th>Nombres:</th>
					<td><input type="text" name="nombre" value="<?php echo @$nombre; ?>"/></td>
				</tr>
				
				<tr>
					<th>Apellidos:</th>
					<td><input type="text" name="apellido" value="<?php echo @$apellido; ?>"/></td>
				</tr>
				
				<tr>
					<th>Fecha de Nacimiento:</th>
					<td><input type="text" name="fecha" value="<?php echo @$fecha; ?>"/></td>
				</tr>
				
				<tr>
					<th>Estado Civil:</th>
					<td><input type="text" name="estado" value="<?php echo @$estado; ?>"/></td>
				</tr>
				
				<tr>
					<th>Tipo de Sangre:</th>
					<td>
						<select name="sangre">
							<?php if (@$sangre!='') echo '<option value="'.@$sangre.'">'.@$sangre.'</option>'; ?>
							<option value="ORH-">O RH-</option>
							<option value="ORH+">O RH+</option>
							<option value="ARH-">A RH-</option>
							<option value="ARH+">A RH+</option>
							<option value="BRH-">B RH-</option>
							<option value="BRH+">B RH+</option>
							<option value="ABRH-">AB RH-</option>
							<option value="ABRH+">AB RH+</option>
							
						</select>
					</td>
				</tr>
				
				
				<tr>
					<th>Genero:</th>
					<td><input type="radio" name="genero" value="F" <?php if(@$genero=='F') echo 'checked'?> />Femenino
					<input type="radio" name="genero" value="M" <?php if(@$genero=='M') echo 'checked'?>>Masculino</td>
				</tr>
				
				<tr>
					<th>Lugar de Nacimiento:</th>
					<td>
						<textarea name="lugar"><?php echo @$lugar; ?></textarea>
					</td>
				</tr>
				
				
				<tr>
					<th>Direcci&oacute;n:</th>
					<td>
						<textarea name="direccion"><?php echo @$direccion; ?></textarea>
					</td>
				</tr>
				
				<tr>
					<th>Correo Electr&oacute;nico:</th>
					<td><input type="text" name="email"  value="<?php echo @$email; ?>"/></td>
				</tr>
				
				<tr>
					<th>Telefono:</th>
					<td><input type="text" name="telefono"  value="<?php echo @$telefono; ?>"/></td>
				</tr>
				
				<tr>
					<th>Instituto o Sede:</th>
					<td>
						<select name="sede">
							<?php if (@$sede!='') echo '<option value="'.@$sede.'">'.@$sede.'</option>'; ?>
							<option value="001">IPC</option>
							<option value="002">Mejoramiento</option>
							<option value="003">IP Maracay</option>
							
						</select>
					</td>
				</tr>
				
				<tr>
					<th>Ingreso:</th>
					<td>
						<input type="text" name="ingreso"><?php echo @$ingreso; ?></textarea>
					</td>
				</tr>
				
				<tr>
					<th>Semestre:</th>
					<td>
						<input type="text" name="semestre"><?php echo @$semestre; ?></textarea>
					</td>
				</tr>
				
				<tr>
					<th>Promedio:</th>
					<td>
						<input type="text" name="promedio"><?php echo @$promedio; ?></textarea>
					</td>
				</tr>
				
				<tr>
					<th>Estatus:</th>
					<td>
						<select name="estatus">
							<?php if (@$estatus!='') echo '<option value="'.@$estatus.'">'.@$estatus.'</option>'; ?>
							<option value="001">Activo</option>
							<option value="002">Retirado</option>
							<option value="003">Reposo</option>
							
						</select>
					</td>
				</tr>
				
				<tr><th></th><td></td></tr>
				<tr>
					<th>
						<input type="submit" name="boton" value="Agregar" />
						<input type="reset" name="boton" value="Limpiar" />
					</th>
				</tr>
				
			</table>
		</form>
        <a href="index.html">Regresar al Menu Principal</a>
	</body>
</html>