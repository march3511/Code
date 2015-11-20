<?php
include("../../plantilla/php/conexion.php");
$con = conectar();


$id = $_POST['id'];





$sql1="DELETE FROM datos_vuelo WHERE cod_vuelo = '$id';";
$result1 = mysqli_query ($con, $sql1);

$sql="DELETE FROM vuelos WHERE cod_vuelo = '$id';";
$result = mysqli_query ($con, $sql);

if($result){
	echo "ok";
}else{
	echo "error";
}


?>