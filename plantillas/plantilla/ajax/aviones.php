<?php

include("../php/conexion.php");
$con = conectar();

$matricula = $_POST['matricula'];
$consulta = "SELECT * FROM aviones WHERE cod_avion = '$matricula'";

$result = mysqli_query ($con, $consulta);
$datos = array();

while ($row = mysqli_fetch_array($result)){ 

	$cod_avion = $row['cod_avion'];
	$tipo = $row['tipo'];
	$modelo = $row['modelo'];
	$cod_compañia = $row['cod_compañia'];
}

$datos = array($cod_avion,$tipo,$modelo,$cod_compañia); 


echo json_encode($datos);

?>