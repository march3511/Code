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
		
		$con = conectar();
		$meter = 0;
		$cod_aeropuerto = strip_tags($_POST['cod_aeropuerto']);
		$nombre = strip_tags($_POST['nombre']);
		$ciudad = strip_tags($_POST['ciudad']);


		$consulta = "SELECT * FROM aeropuertos WHERE cod_aeropuerto = '$cod_aeropuerto'";

		$result = mysqli_query($con, $consulta);

		while ($row = mysqli_fetch_array($result))
		{
			if ($row['cod_aeropuerto'] == $cod_aeropuerto) {
				$meter=1;
			}
		}

		if ($meter == 1) {
			//echo "<script type=\"text/javascript\"> alert(\"!!modificar\");</script>";
			$modificar = "UPDATE aeropuertos SET nombre = '$nombre',cod_ciudad = '$ciudad' WHERE cod_aeropuerto = '$cod_aeropuerto'";
			$metermod = mysqli_query($con, $modificar);

			if ($metermod) {    
				echo "<script type=\"text/javascript\"> alert(\"!!Datos Modificados Satisfactoriamente\");</script>";       
			} 
		}else if($meter == 0) {
			//echo "<script type=\"text/javascript\"> alert(\"!!Ingresar\");</script>";
			$ingresar = "INSERT INTO aeropuertos(cod_aeropuerto, nombre, cod_ciudad) VALUES ('$cod_aeropuerto','$nombre','$ciudad')";
			$metering = mysqli_query($con, $ingresar);

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
		});
	</script>   
</head>

<body>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Ingreso Aeropuertos</h1>

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
									<label>Identifiacion Aeropuerto</label>
									<input class="form-control" id="cod_aeropuerto" name="cod_aeropuerto">
									<!--<p class="help-block">Ej. AC123 o 12345</p>-->
								</div>
								<div class="form-group">
									<label>Nombre Aeropuerto</label>
									<input class="form-control" placeholder="" id="nombre" name="nombre">
								</div>
								<div class="form-group">
									<label>Ciudad</label><br>
									<select class="form-control" name="ciudad" id="ciudad" style="width:140px;display:inline;" >
										<option></option>
										<?php
										$sql="SELECT * from ciudad";

										$result = mysqli_query($con, $sql);
										$datos = array();

										while ($row = mysqli_fetch_array($result))
										{
											echo '<option value='.$row["cod_ciudad"].' >'.$row["nombre"].'</option>';
										}
										?>                                  
									</select>
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
			$( "#cod_aeropuerto" ).autocomplete({
				source: "../../plantilla/ajax/buscar_aeropuerto.php",
				minLength: 1
			});

			$("#cod_aeropuerto").focusout(function(){
				$.ajax({
					url:'../../plantilla/ajax/aeropuertos.php',
					type:'POST',
					dataType:'json',
					data:{ matricula:$('#cod_aeropuerto').val()}
				}).done(function(respuesta){
					var json = eval(respuesta);
							//alert(json);

							document.getElementById("nombre").value = json[1];
							document.getElementById("ciudad").value = json[2];
						});
			});                         
		});
	</script> 
</body>

</html>
