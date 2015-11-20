<?php
include("../../plantilla/php/conexion.php");
$con = conectar();


$id = $_POST['id'];





$sql1="DELETE FROM reserva_vuelos WHERE cod_reserva = '$id';";
$result1 = mysqli_query ($con, $sql1);

$sql="DELETE FROM reserva WHERE cod_reserva = '$id'";
$result = mysqli_query ($con, $sql);

if($result){
	echo "ok";
}else{
	echo "error";
}


?>