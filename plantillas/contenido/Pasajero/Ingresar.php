<?php  

session_start(); 

include("../../plantilla/php/conexion.php");
$con = conectar();

if (isset($_POST['registrar'])) {
	//echo "<script type=\"text/javascript\"> alert(\"!!modificar\");</script>";
	$regis = new registrar();
	$regis->ingresar();
}

class registrar {  

	function ingresar() {
		//INSERT INTO pasajero(cedula, nombres, apellidos, direccion, telefono, email, sexo, usuario, contrasena) 

		$con = conectar();
		$cedula = strip_tags($_POST['cedula']);
		$nombres = strip_tags($_POST['nombres']);
		$apellidos = strip_tags($_POST['apellidos']);
		$direccion = strip_tags($_POST['direccion']);
		$telefono = strip_tags($_POST['telefono']);
		$email = strip_tags($_POST['email']);
		$sexo = strip_tags($_POST['sexo']);
		$usuario = strip_tags($_POST['usuario']);
		$contrasena = strip_tags($_POST['contrasena']);

		$usuario=sha1($usuario,false);
		$contrasena=sha1($contrasena,false);

		$meter = 0;

		$consulta = "SELECT * FROM pasajero WHERE cedula = '$cedula'";

		$result = mysqli_query($con, $consulta);

		while ($row = mysqli_fetch_array($result))
		{
			if ($row['cedula'] == $cedula) {
				$meter=1;
			}
		}

		if ($meter == 1) {
			//echo "<script type=\"text/javascript\"> alert(\"!!modificar\");</script>";
			$modificar = "UPDATE pasajero SET nombres='$nombres',apellidos='$apellidos',direccion='$direccion',telefono='$telefono',
			email='$email',sexo='$sexo',usuario='$usuario',contrasena='$contrasena' WHERE cedula = '$cedula'";

			$metermod = mysqli_query($con, $modificar);

			$nombre = $nombres . ' ' . $apellidos;

			$modificar2 = "UPDATE ususariosadmin SET usuario='$usuario',pass='$contrasena',nombre='$nombre',correo='$email',
			rol='2' WHERE cedula = '$cedula'";

			$metermod2 = mysqli_query($con, $modificar2);

			if ($metermod) {    
				echo "<script type=\"text/javascript\"> alert(\"!!Datos Modificados Satisfactoriamente\");</script>";       
			} 
		}else if($meter == 0) {
			//echo "<script type=\"text/javascript\"> alert(\"!!Ingresar\");</script>";
			$ingresar = "INSERT INTO pasajero(cedula, nombres, apellidos, direccion, telefono, email, sexo, usuario, contrasena) 
			VALUES ('$cedula','$nombres','$apellidos','$direccion','$telefono','$email','$sexo','$usuario','$contrasena')";

			$metering = mysqli_query($con, $ingresar);

			$nombre = $nombres . ' ' . $apellidos;

			$ingresar2 = "INSERT INTO ususariosadmin(cedula, usuario, pass, nombre, correo, rol) 
			VALUES ('$cedula','$usuario','$contrasena','$nombre','$email','2')";

			$metering2 = mysqli_query($con, $ingresar2);
			if ($metering) {    
				echo "<script type=\"text/javascript\"> alert(\"!!Datos Registrados Satisfactoriamente\");</script>";        
			} 
		}   
	}
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Bootstrap Admin Theme</title>

	<!-- Bootstrap Core CSS -->
	<link href="../../plantilla/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../../plantilla/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../../plantilla/dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../../plantilla/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="../../plantilla/js/jquery-compat-git.js"></script>
	<script src="../../plantilla/js/jquery-git.js"></script>

	<script src="../../plantilla/js/jquery.js"></script>
	<script src="../../plantilla/js/Jqueryvalidation.js"></script>   
	<script src="../../plantilla/js/autocompletar.js"></script>

	<link href="../../plantilla/css/jquery.ui.css" type="text/css" rel="stylesheet"/>

	<script type="text/javascript">

		$(document).ready(function(){   
			//alert("Hola");
			$( "#fecha_nacimiento" ).datepicker();
		});
	</script>   
</head>

<body>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Ingreso Pasajero</h1>

				</div>
				<!-- /.col-lg-12 -->
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Datos Basicos
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<form role="form" method="post" action="Ingresar.php">
								<div class="form-group">
									<label>Cedula</label>
									<input class="form-control" id="cedula" name="cedula">
								</div>
								<div class="form-group">
									<label>Nombres</label>
									<input class="form-control" placeholder="" id="nombres" name="nombres">
								</div>
								<div class="form-group">
									<label>Apellidos</label>
									<input class="form-control" placeholder="" id="apellidos" name="apellidos">
								</div>
								<div class="form-group">
									<label>Direccion</label>
									<input class="form-control" placeholder="" id="direccion" name="direccion">
								</div>
								<div class="form-group">
									<label>Telefono</label>
									<input class="form-control" placeholder="" id="telefono" name="telefono">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" placeholder="" id="email" name="email">
								</div>
								<div class="form-group">
									<label>Sexo</label>
									<select class="form-control" name="sexo" id="sexo" style="" >
										<option id=""></option>	
										<option id="Masculino">Masculino</option>
										<option id="Femenino">Femenino</option>
									</select>
								</div>
								<div class="form-group">
									<label>Usuario</label>
									<input class="form-control" placeholder="" id="usuario" name="usuario">
								</div>
								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" class="form-control" placeholder="" id="contrasena" name="contrasena">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default" name="registrar" id="registrar">Guardar</button>
									<button type="reset" class="btn btn-default">Cancelar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<!-- Page Content -->

	<!-- jQuery -->
	<script src="../../plantilla/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../../plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../../plantilla/bower_components/metisMenu/dist/metisMenu.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../../plantilla/dist/js/sb-admin-2.js"></script>

	<script src="../../plantilla/js/jquery.js"></script>

	<script src="../../plantilla/js/bootstrap.min.js"></script>
	<script src="../../plantilla/js/jquery.prettyPhoto.js"></script>
	<script src="../../plantilla/js/jquery.isotope.min.js"></script>
	<script src="../../plantilla/js/main.js"></script>
	<script src="../../plantilla/js/wow.min.js"></script>
	<script src="../../plantilla/assets/lib/jquery/jquery.min.js"></script>

	<!--Bootstrap -->
	<script src="../../plantilla/assets/lib/bootstrap/js/bootstrap.min.js"></script>

	<!-- Screenfull -->
	<script src="../../plantilla/assets/lib/screenfull/screenfull.js"></script>

	<!-- Metis core scripts -->
	<script src="../../plantilla/assets/js/core.js"></script>

	<!-- Metis demo scripts -->
	<script src="../../plantilla/assets/js/app.min.js"></script>
	<script src="../../plantilla/assets/js/style-switcher.js"></script>

	<script type="text/javascript" src="../../plantilla/lib/jquery.1.7.1.js"></script>
	<script type="text/javascript" src="../../plantilla/lib/jquery.ui.1.8.16.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){   
			$( "#cedula" ).autocomplete({
				source: "../../plantilla/ajax/buscar_pasajero.php",
				minLength: 1
			});

			$("#cedula").focusout(function(){
				$.ajax({
					url:'../../plantilla/ajax/pasajero.php',
					type:'POST',
					dataType:'json',
					data:{ matricula:$('#cedula').val()}
				}).done(function(respuesta){
					var json = eval(respuesta);
							//alert(json);

							document.getElementById("nombres").value = json[1];
							document.getElementById("apellidos").value = json[2];
							document.getElementById("direccion").value = json[3];
							document.getElementById("telefono").value = json[4];
							document.getElementById("email").value = json[5];
							document.getElementById("sexo").value = json[6];
							document.getElementById("usuario").value = json[7];
							document.getElementById("contrasena").value = json[8];

						});
			});                         
		});
	</script> 
</body>

</html>
