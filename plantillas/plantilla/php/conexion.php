<?php

function conectar(){
	$con=mysqli_connect("localhost:3306","root","");
	if(!$con){
		die(mysqli_error());
	}
	//mysqli_select_db("vuelos2");

	mysqli_select_db($con, 'vuelos2') or die(mysqli_error($con));
	mysqli_query($con, "SET NAMES 'utf8'");
	return $con;
}
?>