<?php
include("../../plantilla/php/conexion.php");
$con = conectar();


$id = $_POST['id'];

$sql="DELETE FROM pasajero WHERE cedula = '$id';";
$result = mysqli_query ($con, $sql);

if($result){
	echo "ok";
}else{
	echo "error";
}

?>