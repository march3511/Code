<?php  

session_start(); 

include("../../plantilla/php/conexion.php");
conectar();

if (isset($_POST['registrar'])) {
	//echo "<script type=\"text/javascript\"> alert(\"!!modificar\");</script>";
	$regis = new registrar();
	$regis->ingresar();
}

class registrar {  

	function ingresar() {

		$cod_reserva = strip_tags($_POST['cod_reserva']);
		$cedula = strip_tags($_POST['cedula']);
		$tipo = strip_tags($_POST['tipo']);
		$pasajeros = strip_tags($_POST['pasajeros']);
		$valor = strip_tags($_POST['valor']);
		$fecha = strip_tags($_POST['fecha']);
		$date = date_create($fecha);       
		$fecha = date_format($date, 'Y-m-d');
		$hora = strip_tags($_POST['hora']);

		$cod_vuelo = strip_tags($_POST['cod_vuelo']);
		$origen = strip_tags($_POST['origen']);
		$forigen = strip_tags($_POST['forigen']);
		$date = date_create($forigen);       
		$forigen = date_format($date, 'Y-m-d');
		$horigen = strip_tags($_POST['horigen']);
		$destino = strip_tags($_POST['destino']);
		$meter = 0;


		//echo $avion . " | " . $origen . ' | ' . $forigen . " | " . $horigen . ' | ' . $destino . " | ";

		$consulta = "SELECT * FROM reserva WHERE cod_reserva = '$cod_reserva'";

		$result = mysql_query($consulta);

		while ($row = mysql_fetch_array($result))
		{
			if ($row['cod_reserva'] == $cod_reserva) {
				$meter=1;
			}
		}

		if ($meter == 1) {
			//echo "<script type=\"text/javascript\"> alert(\"!!modificar\");</script>";
			$modificar = "UPDATE reserva SET cedula = '$cedula', tipo = '$tipo', num_pasajeros = '$pasajeros', fecha = '$fecha', hora = '$hora' WHERE cod_reserva = '$cod_reserva'";
			$metermod = mysql_query($modificar);

			$modificar2 = "UPDATE reserva_vuelos SET cod_vuelo = '$cod_vuelo', valor = '$valor' WHERE cod_reserva = '$cod_reserva'";
			$metermod2 = mysql_query($modificar2);

			if ($metermod) {    
				echo "<script type=\"text/javascript\"> alert(\"!!Datos Modificados Satisfactoriamente\");</script>";       
			} 
		}else if($meter == 0) {
			//echo "<script type=\"text/javascript\"> alert(\"!!Ingresar\");</script>";

			echo "<script type=\"text/javascript\"> alert(\"$hora\");</script>"; 
			$ingresar = "INSERT INTO reserva(cod_reserva, cedula, tipo, num_pasajeros, fecha, hora) VALUES ('$cod_reserva','$cedula','$tipo','$pasajeros', '$fecha','$hora')";
			$metering = mysql_query($ingresar);

			//echo mysql_error();

			$ingresar2 = "INSERT INTO reserva_vuelos(cod_reserva, cod_vuelo, valor) VALUES ('$cod_reserva','$cod_vuelo','$valor')";
			$metering2 = mysql_query($ingresar2);

			//echo mysql_error();
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
			$( "#fecha" ).datepicker();
			$( "#forigen" ).datepicker();
			$( "#fdestino" ).datepicker();

			<?php
			$consulta = "SELECT AUTO_INCREMENT from information_schema.TABLES where TABLE_SCHEMA='vuelos2' and TABLE_NAME='reserva';";
			$result = mysql_query($consulta);
			while ($row = mysql_fetch_array($result))
			{
				$lic = $row[0];
			}
			?>

			$('#cod_reserva').val(<?php echo $lic; ?>);

			$( "#cod_vuelo" ).change(function() {
				$.ajax({
					url:'../../plantilla/ajax/datos_vuelo.php',
					type:'POST',
					dataType:'json',
					data:{ matricula:$('#cod_vuelo').val()}
				}).done(function(respuesta){
					var json = eval(respuesta);
					//alert(json);

				//document.getElementById('cod_vuelo').value = json[0];
				document.getElementById('origen').value = json[1];
				document.getElementById('forigen').value = json[3];
				document.getElementById('horigen').value = json[4];
				document.getElementById('destino').value = json[2];

			});
			});
		});
	</script>   
</head>

<body>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Ingreso Reserva</h1>

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
									<label>Codigo Reserva</label>
									<input class="form-control" id="cod_reserva" name="cod_reserva">
									<!--<p class="help-block">Ej. AC123 o 12345</p>-->
								</div>
								<div class="form-group">
									<label>Pasajero</label><br>
									<select class="form-control" name="cedula" id="cedula" style="" >
										<option></option>
										<?php
										$sql="SELECT * FROM pasajero";

										$result = mysql_query($sql);
										$datos = array();

										while ($row = mysql_fetch_array($result))
										{
											echo '<option value='.$row['cedula'].'>'. $row['cedula'] . ' - ' .$row['apellidos']. ' ' .$row['nombres']. '</option>';
										}
										?>                                  
									</select>
								</div>
								<div class="form-group">
									<label>Vuelo</label><a data-toggle="modal" data-original-title="Vuelo" data-placement="bottom" ACTIVE href="#modalvuelo" class="btn btn-metis-6 btn-sm btn-grad"><i class="glyphicon glyphicon-eye-open"></i></a>
									<input readonly class="form-control" id="vuelos" name="vuelos">
									<!--<p class="help-block">Ej. AC123 o 12345</p>-->
								</div>
								<div class="form-group">
									<label>Tipo</label><br>
									<select class="form-control" name="tipo" id="tipo" style="" >
										<option id="Normal">Normal</option>     
										<option id="Ejecutivo">Ejecutivo</option>                              
									</select>
								</div>
								<div class="form-group">
									<label>No Pasajeros</label>
									<input type="number" class="form-control" id="pasajeros" name="pasajeros">
									<!--<p class="help-block">Ej. AC123 o 12345</p>-->
								</div>
								<div class="form-group">
									<label>Valor</label>
									<input class="form-control" id="valor" name="valor">
									<!--<p class="help-block">Ej. AC123 o 12345</p>-->
								</div>
								<div class="form-group">
									<label>Fecha</label>
									<input class="form-control" id="fecha" name="fecha">
									<!--<p class="help-block">Ej. AC123 o 12345</p>-->
								</div>
								<div class="form-group">
									<label>Hora</label>
									<input type="time" class="form-control" id="hora" name="hora">
									<!--<p class="help-block">Ej. AC123 o 12345</p>-->
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

	<!--modvuelo

INSERT INTO `datos_vuelo`(`numero`, `origen`, `destino`, `fecha_origen`, `hora_origen`, `fecha_destino`, `hora_destino`)
-->
<div class="modal fade" id="modalvuelo" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="myModalLabel" style="color:Black;">Vuelo </h3>
			</div>
			<div class="modal-body" style="color:Black;">
				<div class="form-group">                    
					<label for="valor">Vuelos</label>
					<select class="form-control" name="cod_vuelo" id="cod_vuelo" style="" >
						<option></option>
						<?php
						//$sql="SELECT * FROM vuelos inner join aviones on aviones.cod_avion = vuelos.cod_avion";
						$sql="SELECT * FROM vista_select_vuelos";

						$result = mysql_query($sql);
						$datos = array();

						while ($row = mysql_fetch_array($result))
						{
							echo '<option value='.$row[0].'>'. $row[1] . ' - ' .$row[2].'</option>';
						}
						?>                                  
					</select>
				</div>                               
			</div>
			<div class="modal-body" style="color:Black;">
				<div class="form-group">                    
					<label for="valor">Origen</label>
					<select class="form-control" readonly name="origen" id="origen" style="" >
						<option></option>
						<?php
						$sql="SELECT * FROM aeropuertos inner join ciudad on aeropuertos.cod_ciudad = ciudad.cod_ciudad";

						$result = mysql_query($sql);
						$datos = array();

						while ($row = mysql_fetch_array($result))
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
					<input readonly value="" type="text" name="forigen" class="form-control" id="forigen" placeholder="" >
				</div>                               
			</div>
			<div class="modal-body" style="color:Black;">
				<div class="form-group">                    
					<label for="valor">Hora Origen</label>
					<input readonly value="" type="time" name="horigen" class="form-control" id="horigen" placeholder="" >
				</div>                               
			</div>
			<div class="modal-body" style="color:Black;">
				<div class="form-group">                    
					<label for="valor">Destino</label>
					<select readonly class="form-control" name="destino" id="destino" style="" >
						<option></option>
						<?php
						$sql="SELECT * FROM aeropuertos inner join ciudad on aeropuertos.cod_ciudad = ciudad.cod_ciudad";

						$result = mysql_query($sql);
						$datos = array();

						while ($row = mysql_fetch_array($result))
						{
							echo '<option value='.$row[0].'>'.$row[1]. ' - ' . $row[5] . '</option>';
						}
						?>                                  
					</select>
				</div>                               
			</div>
			<!-- <div class="modal-body" style="color:Black;">
				<div class="form-group">                    
					<label for="valor">Fecha Destino</label>
					<input value="" type="text" name="fdestino" class="form-control" id="fdestino" placeholder="" >
				</div>                               
			</div>
			<div class="modal-body" style="color:Black;">
				<div class="form-group">                    
					<label for="valor">Hora Destino</label>
					<input value="" type="time" name="hdestino" class="form-control" id="hdestino" placeholder="" >
				</div>                               
			</div>-->
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
		$( "#cod_reserva" ).autocomplete({
			source: "../../plantilla/ajax/buscar_reserva.php",
			minLength: 1
		});

		$("#cod_reserva").focusout(function(){
			$.ajax({
				url:'../../plantilla/ajax/reserva.php',
				type:'POST',
				dataType:'json',
				data:{ matricula:$('#cod_reserva').val()}
			}).done(function(respuesta){
				var json = eval(respuesta);
				//alert(json);

				document.getElementById('cod_reserva').value = json[0];
				document.getElementById('vuelos').value = json[2];
				document.getElementById('cedula').value = json[1];
				document.getElementById('tipo').value = json[3];
				document.getElementById('pasajeros').value = json[4];
				document.getElementById('valor').value = json[5];
				document.getElementById('fecha').value = json[6];
				document.getElementById('hora').value = json[7];

				
				document.getElementById('cod_vuelo').value = json[2];
				document.getElementById('origen').value = json[8];
				document.getElementById('forigen').value = json[10];
				document.getElementById('horigen').value = json[11];
				document.getElementById('destino').value = json[9];

			});
		});                         
	});
</script> 
</body>

</html>
