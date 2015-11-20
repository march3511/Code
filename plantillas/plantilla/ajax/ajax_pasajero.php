<?php 

include("../../plantilla/php/conexion.php");
$con = conectar();


if($_GET['action'] == 'listar')
{
	// valores recibidos por POST
	$vnom   = $_POST['nom'];

	$sql = "";
	
	$sql = "SELECT * FROM pasajero";
	

	$opc=$_POST['opc'];

	// Vericamos si hay algun filtro
	$sql .= ($vnom != '')      ? " where $opc LIKE '%$vnom%'" : "";

	// Ordenar por
	$vorder = $_POST['orderby'];

	if($vorder != ''){
		$sql .= " ORDER BY ".$vorder;
	}else if($vorder == ''){
		$sql .= " ORDER BY cedula asc";		
	}

	$result = mysqli_query($con, $sql);
	$datos = array();


	while ($row = mysqli_fetch_array($result))
	{
		$datos[] = array(
			'cedula'	=>	$row[0],
			'nombres'	=>	$row[1],
			'apellidos'	=>	$row[2],
			'direccion'	=>	$row[3],
			'telefono'	=>	$row[4],
			'email'	=>	$row[5],
			'sexo'	=>	$row[6],
			'usuario'	=>	$row[7]
			);

	}

	echo json_encode($datos);
}
?>

