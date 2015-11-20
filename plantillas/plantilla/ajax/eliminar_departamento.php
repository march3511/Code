<?php
include("../../plantilla/php/conexion.php");
$con = conectar();


$id = $_POST['id'];



$sql="DELETE FROM departamento WHERE cod_dpto = '$id';";
$result = mysqli_query ($con, $sql);

if($result){
	echo "ok";
}else{
	echo "error";
}


?>