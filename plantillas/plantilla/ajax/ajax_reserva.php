<?php 

include("../../plantilla/php/conexion.php");
$con = conectar();


if($_GET['action'] == 'listar')
{
	$sql = "SELECT * from vista_reservas";

	$vnom   = $_POST['nom'];

	$opc=$_POST['opc'];

	// Vericamos si hay algun filtro
	$sql .= ($vnom != '')      ? " where $opc LIKE '%$vnom%'" : "";

	// Ordenar por
	$vorder = $_POST['orderby'];

	if($vorder != ''){
		$sql .= " ORDER BY ".$vorder;
	}else if($vorder == ''){
		$sql .= " ORDER BY cod_reserva asc";		
	}
	
	$result = mysqli_query($con, $sql);
	$datos = array();
	//r.cod_reserva, r.cedula, p.nombres, p.apellidos, r.num_pasajeros, d.origen, d.destino, v.valor
	while ($row = mysqli_fetch_array($result))
	{
		$datos[] = array(
			'cod_reserva'	=> $row[0],
			'cedula'      => $row[1],
			'nombres'      => $row[2],
			'apellidos'  => $row[3],
			'num_pasajeros'  => $row[4],
			'origen'  => $row[5],
			'destino'  => $row[6],
			'valor'  => $row[7]
			);

	}
	//echo count($datos);

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
	//echo mysql_error();
}
?>

