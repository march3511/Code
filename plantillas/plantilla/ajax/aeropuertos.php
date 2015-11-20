<?php

include("../php/conexion.php");
$con = conectar();

$matricula = $_POST['matricula'];
$consulta = "SELECT * FROM aeropuertos WHERE cod_aeropuerto = '$matricula'";

$result = mysqli_query ($con, $consulta);
$datos = array();

while ($row = mysqli_fetch_array($result)){ 

	$cod_aeropuerto = $row['cod_aeropuerto'];
	$nombre = $row['nombre'];
	$cod_ciudad = $row['cod_ciudad'];
}

$datos = array($cod_aeropuerto,$nombre,$cod_ciudad); 


echo json_encode($datos);

?>