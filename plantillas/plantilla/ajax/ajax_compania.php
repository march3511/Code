<?php 

include("../../plantilla/php/conexion.php");
$con = conectar();


if($_GET['action'] == 'listar')
{
	// valores recibidos por POST
	$vnom   = $_POST['nom'];
	
	$sql = "SELECT * FROM compañia";
	

	$opc=$_POST['opc'];

	// Vericamos si hay algun filtro
	$sql .= ($vnom != '')      ? " where $opc LIKE '%$vnom%'" : "";

	// Ordenar por
	$vorder = $_POST['orderby'];

	if($vorder != ''){
		$sql .= " ORDER BY ".$vorder;
	}else if($vorder == ''){
		$sql .= " ORDER BY cod_compañia asc";		
	}

	$result = mysqli_query($con, $sql);
	$datos = array();


	while ($row = mysqli_fetch_array($result))
	{
		$datos[] = array(
			'cod_compañia'	=> $row[0],
			'nombre'      => $row[1],
			'tipo'      => $row[2]
			);

	}

	echo json_encode($datos);
}
?>

