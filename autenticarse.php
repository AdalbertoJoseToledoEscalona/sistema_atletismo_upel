<?php 
session_start();
// coge la librería recaptcha
require_once "recaptchalib.php";

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
	//print_r($_POST);
	
	# inicio - validaciones
	$ci=@$_POST['ci'];
	$clave=@$_POST['clave'];
	$error='Se encontraron los siguientes errores:<br/>';
	$e=0;
	
	#validaciones de campos vacios
	if($ci==''){ 
		$error.='- El campo CI no debe estar vac&iacute;o<br/>';
		++$e;
	}
		
	if($clave==''){
		$error.='- El campo Clave no debe estar vac&iacute;o<br/>';
		++$e;
	}
	
	 /*if(isset($_POST['g-recaptcha-response']))
          $captcha=$_POST['g-recaptcha-response'];

        if(!$captcha){
          //echo '<h2>Please check the the captcha form.</h2>';
		  $error.='- <h2>Please check the the captcha form.</h2>';
		++$e;
         // exit;
        }
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdNsgkTAAAAANC3TfzkxK5ct7N30Bv3-FJZLi_D&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['success'] == false)
        {
          //echo '<h2>You are spammer ! Get the @$%K out</h2>';
		  $error.='- <h2>You are spammer ! Get the @$%K out</h2>';
		++$e;
        }
        else
        {
          //echo '<h2>Thanks for posting comment.</h2>';
        }*/
	
	# fin - validaciones 
	
	if($e==0){
		
		$servidor	= 'localhost/XE';
		$usuario	= 'BD2014';
		$password	= 'bd2014';
		
		// Conecta al Sistema de Gestion de Bases de Datos
		$c = oci_connect($usuario, $password, $servidor);
		
			// Procedimiento para incluir datos en Base de Datos	
			//$sql = "INSERT INTO ALUMNOS VALUES 	('$ci', '$nombre', '$direccion','$sexo','$pais', $musica, $deporte, $cine, '$email', '$clave')";		
	$sql = "SELECT * FROM ALUMNOS WHERE CI = '$ci' AND \"clave\" = '$clave'";
			//echo $sql;
			$s = oci_parse($c, $sql);	
			$exito = oci_execute($s);
			
			// Recepción de Datos	
			oci_fetch_all($s, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
			
			$existe = false;
			
			foreach ($res as $row) {
$existe = true;				
	      						break;
							}
			
			if(!$exito){ 
				$error.='Error de Conexion de Base de datos<br/>';
				++$e;
			}else{
				if($existe){
					$_SESSION["user"] = $ci;
					header('location: index.php');
				}else{
					$error.='Error: CI o Clave Incorrecto<br/>';
				++$e;
				}
			}
		
	}	
}
?>
<html>
   <head>
      <title>
         ..:: AGREGAR ALUMNO ::..
      </title>
	  <script src='https://www.google.com/recaptcha/api.js'></script>
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
					<th>Clave:</th>
					<td><input type="password" name="clave"  value="<?php echo @$clave; ?>"/></td>
				</tr>
				
				<tr>
					<th>Captcha:</th>
					<td>
						<div class="g-recaptcha" data-sitekey="6LdNsgkTAAAAACNJsjcxokj3Yyc2VOAm-KPlATi8"></div>
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
        <a href="index.php">Regresar al Menu Principal</a>
	</body>
</html>