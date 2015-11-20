<?php

include("../php/conexion.php");
$con = conectar();

$matricula = $_POST['matricula'];
$consulta = "SELECT * FROM departamento WHERE cod_dpto = '$matricula'";

$result = mysqli_query ($con, $consulta);
$datos = array();

while ($row = mysqli_fetch_array($result)){ 

	$cod_dpto = $row['cod_dpto'];
	$nombre = $row['nombre'];
}

$datos = array($cod_dpto,$nombre); 


echo json_encode($datos);

?>