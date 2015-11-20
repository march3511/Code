<?php
include("../php/conexion.php");
$con = conectar();

$matricula = $_GET['term'];
$consulta = "SELECT * FROM ciudad WHERE cod_ciudad LIKE '%$matricula%'";


$result = mysqli_query($con, $consulta);
$datos = array();

while ($row = mysqli_fetch_array($result)) //mysql_fetch_assoc(result)
{
	$datos[] = $row['cod_ciudad'];
}

//echo mysql_error();
echo json_encode($datos);
?>