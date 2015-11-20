<?php

include("../php/conexion.php");
$con = conectar();

$matricula = $_POST['matricula'];
$consulta = "SELECT * FROM vuelos v INNER JOIN datos_vuelo dv ON v.cod_vuelo = dv.cod_vuelo  WHERE v.cod_vuelo = '$matricula'";

$result = mysqli_query ($con, $consulta);
$datos = array();

while ($row = mysqli_fetch_array($result)){ 

	$cod_vuelo = $row['cod_vuelo'];
	$cod_avion = $row['cod_avion'];
	$valor = $row['valor'];
	$origen = $row['origen'];
	$destino = $row['destino'];
	$forigen = $row['fecha_origen'];
	$horigen = $row['hora_origen'];

}

$datos = array($cod_vuelo,$cod_avion,$valor,$origen,$destino,$forigen,$horigen); 


echo json_encode($datos);

?>

