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
		$cod_vuelo = strip_tags($_POST['cod_vuelo']);
		$cod_avion = strip_tags($_POST['cod_avion']);
		$valor = strip_tags($_POST['valor']);
		$origen = strip_tags($_POST['origen']);
		$forigen = strip_tags($_POST['forigen']);
		$date = date_create($forigen);       
		$forigen = date_format($date, 'Y-m-d');
		$horigen = strip_tags($_POST['horigen']);
		$destino = strip_tags($_POST['destino']);

		$consulta = "SELECT * FROM vuelos WHERE cod_vuelo = '$cod_vuelo'";

		$result = mysqli_query($con, $consulta);

		while ($row = mysqli_fetch_array($result))
		{
			if ($row['cod_vuelo'] == $cod_vuelo) {
				$meter=1;
			}
		}
//INSERT INTO vuelos(numero, cod_reserva, cod_avion, valor, fecha, hora)
		if ($meter == 1) {
			//echo "<script type=\"text/javascript\"> alert(\"!!modificar\");</script>";
			$modificar = "UPDATE vuelos SET cod_avion = '$cod_avion', valor = '$valor' WHERE cod_vuelo = '$cod_vuelo'";
			$metermod = mysqli_query($con, $modificar);

			$modificar2 = "UPDATE datos_vuelo SET origen='$origen',destino='$destino',fecha_origen='$forigen',hora_origen='$horigen' WHERE cod_vuelo = '$cod_vuelo'";
			$metermod2 = mysqli_query($con, $modificar2);

			
			if ($metermod) {    
				echo "<script type=\"text/javascript\"> alert(\"!!Datos Modificados Satisfactoriamente\");</script>";       
			} 
		}else if($meter == 0) {
			//echo "<script type=\"text/javascript\"> alert(\"!!Ingresar\");</script>";
			$ingresar = "INSERT INTO vuelos(cod_vuelo, cod_avion, valor) VALUES ('$cod_vuelo','$cod_avion','$valor')";
			$metering = mysqli_query($con, $ingresar);

			$ingresar2 = "INSERT INTO datos_vuelo(cod_vuelo, origen, destino, fecha_origen, hora_origen) VALUES ('$cod_vuelo','$origen','$destino','$forigen','$horigen')";
			$metering2 = mysqli_query($con, $ingresar2);

			echo mysql_error();
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
			$( "#forigen" ).datepicker();

			<?php
			$consulta = "SELECT AUTO_INCREMENT from information_schema.TABLES where TABLE_SCHEMA='vuelos2' and TABLE_NAME='vuelos';";
			$result = mysqli_query($con, $consulta);
			while ($row = mysqli_fetch_array($result))
			{
				$lic = $row[0];
			}
			?>

			$('#cod_vuelo').val(<?php echo $lic; ?>);

		});
	</script>   
</head>

<body>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Ingreso Vuelos</h1>

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
									<label>Codigo Vuelo</label>
									<input class="form-control" id="cod_vuelo" name="cod_vuelo">
									<!--<p class="help-block">Ej. AC123 o 12345</p>-->
								</div>
								<div class="form-group">
									<label>Avion</label><br>
									<select class="form-control" name="cod_avion" id="cod_avion" style="" >
										<option></option>
										<?php
										$sql="SELECT * FROM aviones inner join compañia on aviones.cod_compañia = compañia.cod_compañia;";

										$result = mysqli_query($con, $sql);
										$datos = array();

										while ($row = mysqli_fetch_array($result))
										{
											echo '<option value='.$row[0].'>'. $row[0] . ' - ' .$row[5]. ' - ' .$row[1].'</option>';
										}
										?>                                  
									</select>
								</div>
								<div class="form-group">
									<label>Valor</label>
									<input class="form-control" id="valor" name="valor">
									<!--<p class="help-block">Ej. AC123 o 12345</p>-->
								</div>
								<div class="form-group">
									<label>Informacion Del Vuelo</label><a data-toggle="modal" data-original-title="Vuelo" data-placement="bottom" ACTIVE href="#modalvuelo" class="btn btn-metis-6 btn-sm btn-grad"><i class="glyphicon glyphicon-eye-open"></i></a>
									<input readonly class="form-control" id="extra" name="extra">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default" name="registrar" id="registrar">Guardar</button>
									<button type="reset" class="btn btn-default">Cancelar</button>
								</div>

							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<!-- Page Content -->

		<!-- Modal -->
		<div class="modal fade" id="modalvuelo" >
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title" id="myModalLabel" style="color:Black;">Vuelo </h3>
					</div>
					<div class="modal-body" style="color:Black;">
						<div class="form-group">                    
							<label for="valor">Origen</label>
							<select class="form-control" name="origen" id="origen" style="" >
								<option></option>
								<?php
								$sql="SELECT * FROM aeropuertos inner join ciudad on aeropuertos.cod_ciudad = ciudad.cod_ciudad";

								$result = mysqli_query($con, $sql);
								$datos = array();

								while ($row = mysqli_fetch_array($result))
								{
									echo '<option value='.$row[0].'>'.$row[1]. ' - ' . $row[5] . '</option>';
								}
								?>                                  
							</select>
						</div>                               
					</div>
					<div class="modal-body" style="color:Black;">
						<div class="form-group">                    
							<label for="valor">Fecha Origen</label>
							<input value="" type="text" name="forigen" class="form-control" id="forigen" placeholder="" >
						</div>                               
					</div>
					<div class="modal-body" style="color:Black;">
						<div class="form-group">                    
							<label for="valor">Hora Origen</label>
							<input value="" type="time" name="horigen" class="form-control" id="horigen" placeholder="" >
						</div>                               
					</div>
					<div class="modal-body" style="color:Black;">
						<div class="form-group">                    
							<label for="valor">Destino</label>
							<select class="form-control" name="destino" id="destino" style="" >
								<option></option>
								<?php
								$sql="SELECT * FROM aeropuertos inner join ciudad on aeropuertos.cod_ciudad = ciudad.cod_ciudad";

								$result = mysqli_query($con, $sql);
								$datos = array();

								while ($row = mysqli_fetch_array($result))
								{
									echo '<option value='.$row[0].'>'.$row[1]. ' - ' . $row[5] . '</option>';
								}
								?>                                  
							</select>
						</div>                               
					</div>
					<div class="modal-footer" style="color:Black;">
						<button type="submit"  class="btn btn-primary" data-dismiss="modal" name="guardar" id="guardar" >Guardar</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>  
		<!--modal-->
	</form>

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
			$( "#cod_vuelo" ).autocomplete({
				source: "../../plantilla/ajax/buscar_vuelos.php",
				minLength: 1
			});

			$("#cod_vuelo").focusout(function(){
				$.ajax({
					url:'../../plantilla/ajax/vuelos.php',
					type:'POST',
					dataType:'json',
					data:{ matricula:$('#cod_vuelo').val()}
				}).done(function(respuesta){
					var json = eval(respuesta);
					//alert(json);

					document.getElementById("cod_avion").value = json[1];
					document.getElementById("valor").value = json[2];

					document.getElementById('origen').value = json[3];
					document.getElementById('forigen').value = json[5];
					document.getElementById('horigen').value = json[6];
					document.getElementById('destino').value = json[4];
				});
			});                         
		});
	</script> 
</body>

</html>
