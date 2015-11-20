<?php

include("../php/conexion.php");
$con = conectar();

$matricula = $_POST['matricula'];
$consulta = "SELECT * FROM pasajero WHERE cedula = '$matricula'";

$result = mysqli_query ($con, $consulta);
$datos = array();

while ($row = mysqli_fetch_array($result)){ 

	$cedula = $row['cedula'];
	$nombres = $row['nombres'];
	$apellidos = $row['apellidos'];
	$direccion = $row['direccion'];
	$telefono = $row['telefono'];
	$email = $row['email'];
	$sexo = $row['sexo'];
	$usuario = $row['usuario'];
	$contrasena = $row['contrasena'];
}

$datos = array($cedula,	$nombres, $apellidos, $direccion, $telefono, $email, $sexo, $usuario, $contrasena); 

echo json_encode($datos);

?>