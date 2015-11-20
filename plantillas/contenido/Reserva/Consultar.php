<?php  

session_start(); 

include("../../plantilla/php/conexion.php");
conectar();

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Bootstrap Admin Theme</title>

	<!-- Bootstrap Core CSS -->
	<link href="../../plantilla/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../../plantilla/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../../plantilla/dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../../plantilla/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="../../plantilla/js/jquery-compat-git.js"></script>
	<script src="../../plantilla/js/jquery-git.js"></script>

	<script src="../../plantilla/js/jquery.js"></script>
	<script src="../../plantilla/js/Jqueryvalidation.js"></script>   
	<script src="../../plantilla/js/autocompletar.js"></script>

	<link href="../../plantilla/css/jquery.ui.css" type="text/css" rel="stylesheet"/>
	
	<style type="text/css">
		/* CSS demo */

		#content{
			padding:50px 0 0 10px
		}
		#content .filtro{
			overflow:hidden;
			padding-bottom:15px
		}
		#content .filtro select{
			width:100px
		}
		#content .filtro ul{
			list-style:none;
			padding:0
		}
		#content .filtro li{
			float:left;
			display:block;
			margin:0 5px
		}
		#content .filtro li a{
			color:#006;
			position:relative;
			top:5px;
			text-decoration:underline
		}
		#content .filtro li label{
			float:left;
			padding:4px 5px 0 0
		}
		#content table{
			border-collapse:collapse;
			width:100%;
		}
		#content table th{
			border:1px solid #EFFBF2;
			padding:8px;
			background:#EFFBF2;
			text-align: center;
		}
		#content table th span{
			cursor:pointer;
			padding-right:12px
		}
		#content table th span.asc{
			background:url(assets_propietarios/imgs/sorta.gif) no-repeat right center;
		}
		#content table th span.desc{
			background:url(assets_propietarios/imgs/sortd.gif) no-repeat right center;
		}
		#content table td{
			border:1px solid #EFFBF2;
			padding:6px
		}
		div.tableContainer {
			width: 100%;       /* table width will be 99% of this*/
			height: 320px;    /* must be greater than tbody*/
			overflow: auto;
			margin: 0 auto;
		}

		table {
			width: 95%;  /*100% of container produces horiz. scroll in Mozilla*/
			border: none;
			border-spacing: 0px;
			background-color: transparent;
		}

		table>tbody {
			overflow: auto;
			/*height: 260px;*/
			overflow-x: hidden;
		}

/*table>tbody tr {
  height: auto;
}*/

table>thead tr {
	position:relative;
	top: 0px;/*expression(offsetParent.scrollTop); IE5+ only*/
	text-align: center;
}

</style>
<script type="text/javascript" src="../../plantilla/assets_propietarios/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../../plantilla/assets_propietarios/jqueryui/js/jquery-ui-1.8.16.custom.min2.js"></script>
<script type="text/javascript" src="../../plantilla/assets_propietarios/js/js-reserva.js"></script>


<script type="text/javascript">

	$(document).ready(function(){   
			//alert("Hola");
		});
</script>   
</head>

<body>	

	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Consulta Reservas</h1>

				</div>
				<!-- /.col-lg-12 -->
			</div>
			<div class="panel panel-default">

				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">

							<div class="filtro content">
								<form id="frm_filtro" method="post" action="">
									<input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here" id="nom" name="nom" style="width:140px;display:inline;">
									<select name="opc" id="" class="form-control" style="width:140px;display:inline;" >
										<option value="">Buscar por</option>                     
									</select>
									<button type="button" id="btnfiltrar" class="btn btn-metis-6 btn-sm btn-grad" ><i class="glyphicon glyphicon-search"></i></button>
									<button type="button" class="btn btn-success btn-sm btn-grad"  id="btncancel"><i class="glyphicon glyphicon-list"></i></button>
								</form>   
							</div><!--/.filtro-->
							<br>
							<div class="row">
								<div class="col-md-18 col-lg-6">
									<div class="blog-item">
										<div class="row">       
											<div class="col-xs-12 col-sm-32">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4>Reservas</h4>
													</div>
													<div class="table-responsive">
														<div class="tableContainer">
															<table cellpadding="0" cellspacing="0" id="data" class="table table-bordered table-hover table-striped">
																<thead>
																	<tr>
																		<!-- <th width="4%"><span title="ver">Ver</span></th> -->                                   
																		<th width="15%"><span title="cod_reserva">Reserva</span></th>
																		<th width="20%"><span title="cedula">Cedula</span></th>
																		<th width="20%"><span title="nombres">Nombre</span></th>
																		<th width="15%"><span title="num_pasajeros">No Pasajeros</span></th>
																		<th width="15%"><span title="origen">Origen</span></th>
																		<th width="20%"><span title="destino">Destino</span></th>
																		<th width="20%"><span title="valor">Valor</span></th>
																		<th width="20%"><span class="glyphicon glyphicon-wrench"></span></th>

																	</tr>
																</thead>
																<tbody>
																</tbody>
															</table>
														</div>
													</div>
												</div> 
											</div>
										</div>    
									</div><!--/.blog-item-->
									<div class="blog-item">
									</div><!--/.blog-item-->
								</div><!--/.col-md-8-->
							</div><!--/.row-->
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>	
</div>
<!-- Page Content -->
</div>

<!-- /#vista lquidaciones-->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:600px;" >
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="myModalLabel">Usuarios</h3>
			</div>
			<div class="modal-body">

				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-1"></div>
						<div class="col-lg-10">

							<h1 class="bg-primary">Editar Usuario</h1>                                                               
							<form class="form-horizontal" role="form" action="" method="post">



								<div class="form-group">
									<label for="" class="col-lg-2 control-label text-primary">ID </label>
									<div class="col-lg-10">
										<input type="text" class="form-control" id="iduserR" name="iduserR" 
										placeholder="Id" value="dfdfd">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-lg-2 control-label text-primary">usuario</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" id="userR" name="userR" 
										placeholder="user">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-lg-2 control-label text-primary">Rol</label>
									<div class="col-lg-10">
										<select name="rolR">
											<option value="1">Aministrador</option>
											<option value="2">Usuario</option>

										</select>
									</div>
								</div>                                                  
								<div class="form-group">
									<label for="" class="col-lg-2 control-label text-primary">Desea Editar Contraseña</label>
									<div class="">
										<div class="checkbox" >
											<label>
												<input type="radio" name="gro" value="1" id="editpass">Si<br>
												<input type="radio" name="gro" value="2" id="editpassR"  checked>No




											</label>
											<div class="col-lg-10">
												<input type="password" class="form-control" id="passnueva" name="pass" 
												placeholder="contrasena nueva">
											</div>
										</div>
									</div>
								</div>

								<input  id="idant" name="idant" value="hola"> </label> 
								<input  id="estadopass" name="nuevapass" value="2"> </label> 


								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button type="submit"  name="actualizar" class="btn  btn-success">Actualizar</button>
										<button type="submit" class="btn  btn-danger">cancelar</button>
									</div>
								</div>
							</form>

						</div>
					</div>




				</div>
			</div>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->   
<!-- /#vista lquidaciones-->

<!-- jQuery -->
<script src="../../plantilla/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../../plantilla/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../../plantilla/dist/js/sb-admin-2.js"></script>

<script src="../../plantilla/js/jquery.js"></script>

<script src="../../plantilla/js/bootstrap.min.js"></script>
<script src="../../plantilla/js/jquery.prettyPhoto.js"></script>
<script src="../../plantilla/js/jquery.isotope.min.js"></script>
<script src="../../plantilla/js/main.js"></script>
<script src="../../plantilla/js/wow.min.js"></script>
<script src="../../plantilla/assets/lib/jquery/jquery.min.js"></script>

<!--Bootstrap -->
<script src="../../plantilla/assets/lib/bootstrap/js/bootstrap.min.js"></script>

<!-- Screenfull -->
<script src="../../plantilla/assets/lib/screenfull/screenfull.js"></script>

<!-- Metis core scripts -->
<script src="../../plantilla/assets/js/core.js"></script>

<!-- Metis demo scripts -->
<script src="../../plantilla/assets/js/app.min.js"></script>
<script src="../../plantilla/assets/js/style-switcher.js"></script>

<script type="text/javascript" src="../../plantilla/lib/jquery.1.7.1.js"></script>
<script type="text/javascript" src="../../plantilla/lib/jquery.ui.1.8.16.js"></script>

</body>

</html>
