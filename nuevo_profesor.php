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
	$ci=@$_POST['id'];
	$nombre=@$_POST['nombre'];
	$apellido=@$_POST['apellido'];

	$salario=@$_POST['salario'];
	$email=@$_POST['email'];
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

	if($salario==''){ 
		$error.='- Debe elegir un salario<br/>';
		++$e;
	}	
	if($email==''){
		$error.='- El campo Correo Electr&oacute;nico no debe estar vac&iacute;o<br/>';
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
	
	if($e==0){
		
		$servidor	= 'localhost/XE';
		$usuario	= 'BD2014';
		$password	= 'bd2014';
		
		// Conecta al Sistema de Gestion de Bases de Datos
		$c = oci_connect($usuario, $password, $servidor);
		
			// Procedimiento para incluir datos en Base de Datos	
			$sql = "INSERT INTO ENTRENADORES VALUES 	('$ci', '$nombre', '$apellido','$salario', '$email')";		
			$s = oci_parse($c, $sql);	
			$exito = oci_execute($s);
			
			//echo $sql;
				
			if(!$exito){ 
				$error.='Error de Conexion de Base de datos<br/>';
				++$e;
			}else{
				$mensaje = 'Registro Exitoso...<br/>';
				$ci='';
				$nombre='';
				$apellido='';

	$salario='';
	$email='';
			}
		
	}	
}
?>
<html>
   <head>
      <title>
         ..:: AGREGAR ENTRENADOR ::..
      </title>
   </head>
	<body>
		<?php 
		if(@$e>0) echo $error;
		if(@$mensaje!='') echo $mensaje;
		?>
		<form name="nuevo_alumno" method="post" action="">
			<table>
				<tr><th colspan="2">Nuevo Entrenador</th></tr>
				<tr>
					<th>CI:</th>
					<td><input type="text" name="id" value="<?php echo @$ci; ?>"/></td>
				</tr>
				<tr>
					<th>Nombre:</th>
					<td><input type="text" name="nombre" value="<?php echo @$nombre; ?>"/></td>
				</tr>
				<tr>
					<th>Apellido:</th>
					<td><input type="text" name="apellido" value="<?php echo @$apellido; ?>"/></td>
				</tr>
				
				<tr>
					<th>Salario:</th>
					<td><input type="text" name="salario"  value="<?php echo @$salario; ?>"/></td>
				</tr>
				<tr>
					<th>Correo Electr&oacute;nico:</th>
					<td><input type="text" name="email"  value="<?php echo @$email; ?>"/></td>
				</tr>
				
			</table>
			<input type="submit" name="boton" value="Agregar">
		</form>
        <a href="index.html">Regresar al Menu Principal</a>
	</body>
</html>