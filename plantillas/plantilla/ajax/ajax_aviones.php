<?php 

include("../../plantilla/php/conexion.php");
$con = conectar();


if($_GET['action'] == 'listar')
{
	// valores recibidos por POST
	$vnom   = $_POST['nom'];

	$sql = "";
	
	$sql = "SELECT * FROM aviones a inner join compañia c on c.cod_compañia = a.cod_compañia ";
	

	$opc=$_POST['opc'];

	// Vericamos si hay algun filtro
	$sql .= ($vnom != '')      ? " where $opc LIKE '%$vnom%'" : "";

	// Ordenar por
	$vorder = $_POST['orderby'];

	if($vorder != ''){
		$sql .= " ORDER BY ".$vorder;
	}else if($vorder == ''){
		$sql .= " ORDER BY a.cod_avion asc";		
	}

	$result = mysqli_query($con, $sql);
	$datos = array();


	while ($row = mysqli_fetch_array($result))
	{
		$datos[] = array(
			'cod_avion'	=> $row[0],
			'tipo'      => $row[1],
			'modelo'      => $row[2],
			'cod_compania'       => $row[3],
			'nombre_compania'  => $row[5]
			);

	}

	echo json_encode($datos);
}
?>

