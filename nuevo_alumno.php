<?php 
session_start();


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
	$direccion=@$_POST['direccion'];
	$sexo=@$_POST['sexo'];
	$pais=@$_POST['pais'];
	$musica=@$_POST['musica'];
	$deporte=@$_POST['deporte'];
	$cine=@$_POST['cine'];
	$email=@$_POST['email'];
	$clave=@$_POST['clave'];
	$reclave=@$_POST['reclave'];
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
	if($direccion==''){ 
		$error.='- El campo Direcci&oacute;n no debe estar vac&iacute;o<br/>';
		++$e;
	}
	if($sexo==''){ 
		$error.='- Debe elegir el sexo del Alumno<br/>';
		++$e;
	}
	if($pais==''){ 
		$error.='- Debe elegir un país<br/>';
		++$e;
	}	
	if($email==''){
		$error.='- El campo Correo Electr&oacute;nico no debe estar vac&iacute;o<br/>';
		++$e;
	}	
	if($clave==''){
		$error.='- El campo Clave no debe estar vac&iacute;o<br/>';
		++$e;
	}
	if($reclave==''){
		$error.='- El campo de Repetir Clave no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	if($musica=='') $musica=0;
	if($deporte=='') $deporte=0;
	if($cine=='') $cine=0;
	
	# validacion de contenido
	
	if(!is_numeric($ci)) {
       $error.='- El Campo CI debe ser un Numero<br/>';
		++$e;
    }
	if($clave!=$reclave){
		$error.='- Los campos Clave y Repetir Clave no coinciden.<br/>';
		++$e;
	}
	$validacion = ValidarEmail($email);
	if($validacion >= 1) { $error .= '- Correo Invalido <br/>'; ++$e; }	
	
	# fin - validaciones 
	
	if($e==0){
		
		$servidor	= 'localhost/XE';
		$usuario	= 'BD2014';
		$password	= 'bd2014';
		
		// Conecta al Sistema de Gestion de Bases de Datos
		$c = oci_connect($usuario, $password, $servidor);
		
			// Procedimiento para incluir datos en Base de Datos	
			$sql = "INSERT INTO ALUMNOS VALUES 	('$ci', '$nombre', '$direccion','$sexo','$pais', $musica, $deporte, $cine, '$email', '$clave')";		
			$s = oci_parse($c, $sql);	
			$exito = oci_execute($s);
				
			if(!$exito){ 
				$error.='Error de Conexion de Base de datos<br/>';
				++$e;
			}else{
				$_SESSION["user"] = $ci;
				$mensaje = 'Registro Exitoso...<br/>';
				$ci='';
				$nombre='';
				$direccion='';
				$sexo='';
				$pais='';
				$musica='';
				$deporte='';
				$cine='';
				$email='';
				$clave='';
				$reclave='';
			}
		
	}	
}
?>
<html>
   <head>
      <title>
         ..:: AGREGAR ALUMNO ::..
      </title>
   </head>
	<body>
		<?php 
		if(@$e>0) echo $error;
		if(@$mensaje!='') echo $mensaje;
		?>
		<form name="nuevo_alumno" method="post" action="">
			<table>
				<tr><th colspan="2">Nuevo Alumno</th></tr>
				<tr>
					<th>CI:</th>
					<td><input type="text" name="ci" value="<?php echo @$ci; ?>"/></td>
				</tr>
				<tr>
					<th>Nombre:</th>
					<td><input type="text" name="nombre" value="<?php echo @$nombre; ?>"/></td>
				</tr>
				<tr>
					<th>Direcci&oacute;n:</th>
					<td>
						<textarea name="direccion"><?php echo @$direccion; ?></textarea>
					</td>
				</tr>
				<tr>
					<th>Sexo:</th>
					<td><input type="radio" name="sexo" value="F" <?php if(@$sexo=='F') echo 'checked'?> />Femenino
					<input type="radio" name="sexo" value="M" <?php if(@$sexo=='M') echo 'checked'?>>Masculino</td>
				</tr>
				<tr>
					<th>Pa&iacute;s:</th>
					<td>
						<select name="pais">
							<?php if (@$pais!='') echo '<option value="'.@$pais.'">'.@$pais.'</option>'; ?>
							<option value="Venezuela">Venezuela</option>
							<option value="Colombia">Colombia</option>
							<option value="Brasil">Brasil</option>
							<option value="Trinidad y Tobago">Trinidad y Tobago</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Hobbies:</th>
					<td>
						<input type="checkbox" name="musica" value="1" <?php if(@$musica==1) echo 'checked'?>/>M&uacute;sica<br/>
						<input type="checkbox" name="deporte" value="1" <?php if(@$deporte==1) echo 'checked'?> />Deporte<br/> 
						<input type="checkbox" name="cine" value="1" <?php if(@$cine==1) echo 'checked'?> />Cine
					</td>
				</tr>
				<tr>
					<th>Correo Electr&oacute;nico:</th>
					<td><input type="text" name="email"  value="<?php echo @$email; ?>"/></td>
				</tr>
				<tr>
					<th>Clave:</th>
					<td><input type="password" name="clave"  value="<?php echo @$clave; ?>"/></td>
				</tr>
				<tr>
					<th>Repita Clave:</th><td><input type="password" name="reclave"  value="<?php echo @$reclave; ?>"/></td>
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
        <a href="index.php">Regresar al Menu Principal</a>
	</body>
</html>