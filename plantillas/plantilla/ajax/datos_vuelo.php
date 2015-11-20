<?php

include("../php/conexion.php");
$con = conectar();

$matricula = $_POST['matricula'];
$consulta = "SELECT * FROM datos_vuelo WHERE cod_vuelo = '$matricula'";

$result = mysqli_query ($con, $consulta);
$datos = array();

while ($row = mysqli_fetch_array($result)){ 

	$cod_vuelo = $row['cod_vuelo'];
	$origen = $row['origen'];
	$destino = $row['destino'];
	$fecha_origen = $row['fecha_origen'];
	$hora_origen = $row['hora_origen'];
}

$datos = array($cod_vuelo,$origen,$destino,$fecha_origen,$hora_origen); 

echo json_encode($datos);
//echo $datos[0];

?>