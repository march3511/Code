<?php
include("../../plantilla/php/conexion.php");
$con = conectar();


$id = $_POST['id'];

$sql1="DELETE FROM ciudad WHERE cod_ciudad = '$id';";
$result1 = mysqli_query ($con, $sql1);

if($result1){
	echo "ok";
}else{
	echo "error";
}


?>