<?php 

header('Content-Type: text/html; charset=UTF-8'); 
header('Content-Type: text/html; charset=ISO-8859-1');

include("../../plantilla/php/conexion.php");
$con = conectar();


if($_GET['action'] == 'listar')
{
	// valores recibidos por POST
	$vnom   = $_POST['nom'];
	
	$sql = "SELECT * FROM ciudad c inner join departamento d on d.cod_dpto = c.cod_dept ";
	

	$opc=$_POST['opc'];

	// Vericamos si hay algun filtro
	$sql .= ($vnom != '')      ? " where $opc LIKE '%$vnom%'" : "";

	// Ordenar por
	$vorder = $_POST['orderby'];

	if($vorder != ''){
		//$sql .= " ORDER BY ".$vorder;
	}else if($vorder == ''){
		//$sql .= " ORDER BY ciudad.cod_ciudad asc";		
	}

	$result = mysqli_query($con, $sql);
	$datos = array();

	while ($row = mysqli_fetch_array($result))
	{
		$datos[] = array(
			'cod_ciudad'	=> $row[0],
			'nombre'      => $row[2],
			'cod_dept'       => $row[1],
			'nombre_dept'  => $row[4]
			);

	}

	echo json_encode($datos);
}
?>

