<?php

include("../php/conexion.php");
$con = conectar();

$matricula = $_POST['matricula'];
$consulta = "SELECT * FROM ciudad WHERE cod_ciudad = '$matricula'";

$result = mysqli_query ($con, $consulta);
$datos = array();

while ($row = mysqli_fetch_array($result)){ 

	$cod_ciudad = $row['cod_ciudad'];
	$nombre = $row['nombre'];
	$cod_dept = $row['cod_dept'];
}

$datos = array($cod_ciudad,$nombre,$cod_dept); 


echo json_encode($datos);

?>