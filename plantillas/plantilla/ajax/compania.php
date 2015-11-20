<?php

include("../php/conexion.php");
$con = conectar();

$matricula = $_POST['matricula'];
$consulta = "SELECT * FROM compañia WHERE cod_compañia = '$matricula'";

$result = mysqli_query ($con, $consulta);
$datos = array();

while ($row = mysqli_fetch_array($result)){ 

	$cod_compania = $row['cod_compañia'];
	$nombre = $row['nombre'];
	$tipo = $row['tipo'];
}

$datos = array($cod_compania,$nombre,$tipo); 


echo json_encode($datos);

?>