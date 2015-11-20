<?php 

include("../../plantilla/php/conexion.php");
$con = conectar();


if($_GET['action'] == 'listar')
{
	// valores recibidos por POST
	$vnom   = $_POST['nom'];

	$sql = "";
	
	$sql = "SELECT * FROM vista_vuelos";
	

	$opc=$_POST['opc'];

	// Vericamos si hay algun filtro
	$sql .= ($vnom != '')      ? " where $opc LIKE '%$vnom%'" : "";

	// Ordenar por
	$vorder = $_POST['orderby'];

	if($vorder != ''){
		$sql .= " ORDER BY ".$vorder;
	}else if($vorder == ''){
		$sql .= " ORDER BY cod_vuelo asc";		
	}
	
	$result = mysqli_query($con, $sql);
	$datos = array();


	while ($row = mysqli_fetch_array($result))
	{
		$datos[] = array(
			'cod_vuelo'	=> $row[0],
			'nombre'      => $row[1],
			'origen'       => $row[2],
			'destino'  => $row[3],
			'fecha_origen'  => $row[4],
			'hora_origen'  => $row[5],
			'valor'  => $row[6]
			);

	}


	for ($i=0; $i < count($datos); $i++) { 
		$sql1 = "SELECT * from aeropuertos WHERE cod_aeropuerto = '". $datos[$i]['origen'] . "'";
		$result1 = mysqli_query($con, $sql1);
		while ($row1 = mysqli_fetch_array($result1))
		{
			$datos[$i]['origen'] = $row1[1];
			//echo $row1[1];
		}
	}

	for ($i=0; $i < count($datos); $i++) { 
		$sql1 = "SELECT * from aeropuertos WHERE cod_aeropuerto = '". $datos[$i]['destino'] . "'";
		$result1 = mysqli_query($con, $sql1);
		while ($row1 = mysqli_fetch_array($result1))
		{
			$datos[$i]['destino'] = $row1[1];
			//echo $row1[1];
		}
	}

	echo json_encode($datos);
}
?>

