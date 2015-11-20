<?php 

session_start(); 
include "plantillas/plantilla/php/conexion.php";
$con = conectar();
limpiarseccion();

if (isset($_POST['iniciar'])) {


	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$userant=$user;
	$user=sha1($user,false);
	$pass=sha1($pass,false);


	$consulta = "select * from ususariosadmin where usuario ='$user' and pass='$pass'";

	$result = mysqli_query($con, $consulta);
	$num = mysqli_num_rows ($result);


	if ($num==1) {
		while ($row = mysqli_fetch_array($result)){ 

			$id=$row['cedula'];
			$name=$row['nombre'];
			$email=$row['correo'];
			$roll=$row['rol'];
		}

		if (!empty($name) && !empty($id) && !empty($email)  ) {

			$_SESSION["name"]=$name;
			$_SESSION["id"]=$id;
			$_SESSION["user"]=$userant;
			$_SESSION["email"]=$email;
			$_SESSION["login"]=1;
			$_SESSION["rol"]=$roll;


			header('Location: inicio.php');

		}


	}else{
		echo "<script type=\"text/javascript\"> alert(\"!!ERROR AL INICIAR sesion  DIGITE NUEVAMENTE LA CONTRASEÑA Y USUARIO\");</script>";
	}

}


if (isset($_POST['recu'])) {


    /////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////


	$psswd = substr( md5(microtime()), 1, 8);

	$pass=sha1($psswd,false);


	$mailrecu=$_POST['mailrecu'];


	$consulta = "UPDATE ususariosadmin SET pass = '$pass' WHERE correo='$mailrecu'";

	$result = mysql_query($consulta);
	$num=mysql_num_rows ( $result );

	include("class.phpmailer.php"); 
	include("class.smtp.php");

	$asunto="Recuperar Contraseña Software Tarjetas De Propiedad";

	$body = "Se ha renovado su contraseña de usuario por"+$psswd;
   /// $para="robertocastillo6m@gmail.com";
	$para=$mailrecu;
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = "ssl"; 
	$mail->Host = "smtp.gmail.com"; 
	$mail->Port = 465; 
///$mail->Username = "fredyvega43@gmail.com"; 
///$mail->Password = "3203128358";

	$mail->Username = "zerokas07@gmail.com"; 
	$mail->Password = "Rata+wukong/6?.";

	$mail->From = $para; 
	$mail->FromName = "Software Tarjetas De Propiedad"; 
	$mail->Subject = $asunto; 
	$mail->AltBody = "Software Tarjetas De Propiedad"; 
	$mail->MsgHTML($body); 
///$mail->AddAttachment("Informe.pdf", "CV");

//$body = $mail->getFile('informe_propietario.php?cedula=39620215'); 
// or $body = "<p>Nombre</p> <br />"

	$mail->AddAddress($para, "jaime quevedo"); 
	$mail->IsHTML(true); 
	if(!$mail->Send()) { 
		echo "Error: " . $mail->ErrorInfo; 
	} else { 
   /// echo "Mensaje enviado correctamente"; 

		echo "<script type=\"text/javascript\"> alert(\" Mensaje enviado correctamente \");</script>";

	}

}

function limpiarseccion()
{
	$_SESSION["rol"]="";
	$_SESSION["id"]="";
	$_SESSION["user"]="";
	$_SESSION["login"]=0;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>TarjetasVehiculos | Login</title>

	<!-- Bootstrap Core CSS -->
	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/sb-admin-2.css" rel="stylesheet">

	<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body style="background-image: url('img/fondo.png');">


	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4" >
				<div class="login-panel panel panel-default">

					<div class="">
						<div class="panel-heading">
							<h1 class="panel-title">Iniciar sesion</h1>
						</div>
						<hr>
						<fieldset>
							<div class="tab-content panel-body">
								<div id="login" class="tab-pane active form-group">
									<form action="" method="post" role="form">
										<p class="text-muted text-center">
											Digite su nombre y su contraseña
										</p>
										<input type="text" placeholder="Username" name="user" class="form-control top">
										<input type="password" placeholder="Password" name="pass" class="form-control bottom">
										<div class="checkbox">
											<label>
												<input type="checkbox">Remember Me
											</label>
										</div>
										<button class="btn btn-lg btn-primary btn-block" name="iniciar" type="submit">Sign in</button>
									</form>
								</div>
								<div id="forgot" class="tab-pane">
									<form action="" method="post">
										<p class="text-muted text-center">Enter your valid e-mail</p>
										<input type="email" placeholder="mail@domain.com" name="mailrecu" class="form-control">
										<br>
										<button class="btn btn-lg btn-danger btn-block" name="recu" type="submit">Recover Password</button>
									</form>
								</div>
								<div id="signup" class="tab-pane">
									<form action="" method="post">
										<input type="text" placeholder="username" class="form-control top">
										<input type="email" placeholder="mail@domain.com" class="form-control middle">
										<input type="password" placeholder="password" class="form-control middle">
										<input type="password" placeholder="re-password" class="form-control bottom">
										<button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
									</form>
								</div>
							</div>
							<hr>
							<div class="text-center">
								<ul class="list-inline">
									<li> <a class="text-muted" href="#login" data-toggle="tab">Login</a> </li>
									<li> <a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a> </li>

								</ul>
							</div>
						</fieldset>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="dist/js/sb-admin-2.js"></script>

	<script src="paginas/js/jquery.js"></script>
	<script src="paginas/js/bootstrap.min.js"></script>
	<script src="paginas/js/jquery.prettyPhoto.js"></script>
	<script src="paginas/js/jquery.isotope.min.js"></script>
	<script src="paginas/js/main.js"></script>
	<script src="paginas/js/wow.min.js"></script>

</body>

</html>
