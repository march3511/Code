<?php

include("../php/conexion.php");
$con = conectar();

$matricula = $_POST['matricula'];
$consulta = "SELECT * FROM reserva r INNER JOIN reserva_vuelos rv ON r.cod_reserva = rv.cod_reserva 
INNER JOIN datos_vuelo d ON rv.cod_vuelo = d.cod_vuelo WHERE r.cod_reserva = '$matricula'";

$result = mysqli_query ($con, $consulta);
$datos = array();

while ($row = mysqli_fetch_array($result)){ 

	$cod_reserva = $row['cod_reserva'];
	$cedula = $row['cedula'];
	$cod_vuelo = $row['cod_vuelo'];
	$tipo = $row['tipo'];
	$num_pasajeros = $row['num_pasajeros'];
	$valor = $row['valor'];
	$fecha = $row['fecha'];
	$hora = $row['hora'];
	$origen = $row['origen'];
	$destino = $row['destino'];
	$fecha_origen = $row['fecha_origen'];
	$hora_origen = $row['hora_origen'];
}

$datos = array($cod_reserva,$cedula,$cod_vuelo,$tipo,$num_pasajeros,$valor,$fecha,$hora,$origen,$destino,$fecha_origen,$hora_origen); 

echo json_encode($datos);
//echo $datos[0];

?>