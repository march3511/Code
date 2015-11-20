<?php 

include("../../plantilla/php/conexion.php");
$con = conectar();


if($_GET['action'] == 'listar')
{
	// valores recibidos por POST
	$vnom   = $_POST['nom'];

	
	$sql = "SELECT a.cod_aeropuerto, a.nombre, c.cod_ciudad, c.nombre FROM aeropuertos a inner join ciudad c on a.cod_ciudad = c.cod_ciudad";
	
	//$sql = "SELECT * FROM aeropuertos";
	$opc=$_POST['opc'];

	// Vericamos si hay algun filtro
	$sql .= ($vnom != '')      ? " where $opc LIKE '%$vnom%'" : "";

	// Ordenar por
	$vorder = $_POST['orderby'];

	if($vorder != ''){
		//$sql .= " ORDER BY ".$vorder;
	}else if($vorder == ''){
		//$sql .= " ORDER BY aeropuertos.cod_aeropuerto asc";		
	}
	//$sql = "SELECT * FROM aeropuertos inner join ciudad on aeropuertos.cod_ciudad = ciudad.cod_ciudad";
	$result = mysqli_query($con, $sql);
	$datos = array();


	while ($row = mysqli_fetch_array($result))
	{
		$datos[] = array(
			'cod_aeropuerto'	=> $row[0],
			'nombre'      => $row[1],
			'cod_ciudad'       => $row[2]
			//'nombre_ciudad'  => $row[3]
			);

	}

	echo json_encode($datos);
}
?>

