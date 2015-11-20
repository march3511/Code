<?php
header('Content-Type: text/html; charset=UTF-8'); 
session_start(); 

$cedula = $_SESSION['cedula'];
$nombres = $_SESSION['nombres'];
$apellidos = $_SESSION['apellidos'];
$email = $_SESSION['email'];
$tipo = $_SESSION['tipo'];


include "../php/conexion.php";
$con = conectar();

if (isset($_POST['editarmedico'])){

    $cedula = strip_tags($_POST['cedula']);
    $nombres = strip_tags($_POST['nombres']);
    $apellidos = strip_tags($_POST['apellidos']);
    $direccion = strip_tags($_POST['direccion']);
    $telefono = strip_tags($_POST['telefono']);
    $email = strip_tags($_POST['email']);
    $usuario = strip_tags($_POST['usuario']);
    $contrasena = base64_encode(strip_tags($_POST['contrasena']));
    
    $sql="UPDATE medico SET nombres='$nombres', apellidos='$apellidos', direccion='$direccion',
    telefono='$telefono', email='$email', usuario='$usuario', contrasena='$contrasena' WHERE cedula = '$cedula'";
    $meter=mysqli_query($con, $sql); 

    if ($meter) {
       echo "<script type=\"text/javascript\"> alert(\"Modificacion Satisfactoria\");
       window.location='consultar-medicos-detalles.php?cedula=$cedula';
   </script>"; 
}   
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

    <title>Rapi-Health | Consulta Medicos</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <script type="text/javascript">
        /**
*
*  Base64 encode / decode
*  http://www.webtoolkit.info/
*
**/

var Base64 = {

    // private property
    _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

    // public method for encoding
    encode : function (input) {
        var output = "";
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        var i = 0;

        input = Base64._utf8_encode(input);

        while (i < input.length) {

            chr1 = input.charCodeAt(i++);
            chr2 = input.charCodeAt(i++);
            chr3 = input.charCodeAt(i++);

            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;

            if (isNaN(chr2)) {
                enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {
                enc4 = 64;
            }

            output = output +
            this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
            this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

        }

        return output;
    },

    // public method for decoding
    decode : function (input) {
        var output = "";
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;

        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

        while (i < input.length) {

            enc1 = this._keyStr.indexOf(input.charAt(i++));
            enc2 = this._keyStr.indexOf(input.charAt(i++));
            enc3 = this._keyStr.indexOf(input.charAt(i++));
            enc4 = this._keyStr.indexOf(input.charAt(i++));

            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;

            output = output + String.fromCharCode(chr1);

            if (enc3 != 64) {
                output = output + String.fromCharCode(chr2);
            }
            if (enc4 != 64) {
                output = output + String.fromCharCode(chr3);
            }

        }

        output = Base64._utf8_decode(output);

        return output;

    },

    // private method for UTF-8 encoding
    _utf8_encode : function (string) {
        string = string.replace(/\r\n/g,"\n");
        var utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }

        return utftext;
    },

    // private method for UTF-8 decoding
    _utf8_decode : function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while ( i < utftext.length ) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    }

}
</script>
<script src="js/jquery-compat-git.js"></script>
<script src="js/jquery-git.js"></script>
<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery.ui.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="assets/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="assets/jqueryui/js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="js/jquery-compat-git.js"></script>
<script src="js/jquery-git.js"></script>
<link href="css/jquery.ui.css" type="text/css" rel="stylesheet"/>

<script>
    $(document).ready(function(){

        var parts = window.location.search.substr(1).split("&");
        var $_GET = {};
        for (var i = 0; i < parts.length; i++) {
            var temp = parts[i].split("=");
            $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        }
    //alert($_GET['ced']); // 1

    $.ajax({  
        type: "POST",
        dataType: "json",
        url: "ajax/ajax_datos_medico.php?action=listar",
        data: "ced="+$_GET['cedula'],
        success: function(data){
            var html = '';
            if(data.length > 0){
              $.each(data, function(i,item){
                var raa='';
                if (item.sexo=='M') { raa='Masculino';} else{ raa='Femenino';};

                //html += '<form method="post" action="consultar_propietarios.php">'
                html += '<tr>'
                  //html += '<td><input style="border:none" readonly="readonly" type="text" id="cedula" name="cedula" size="40" value="'+item.cedula+'"/></td>'
                  
                  html += '<td><div class="control-group"><div class="controls"><input id="cedula" name="cedula" placeholder="cedula" class="input-medium mostrar" type="text" value="'+item.cedula+'"></div></div></td>'
                  html += '<td><div class="control-group"><div class="controls"><input id="nombres" name="nombres" placeholder="nombre" class="input-medium mostrar" type="text" value="'+item.nombres+'"></div></div></td>'
                  html += '<td><div class="control-group"><div class="controls"><input id="apellidos" name="apellidos" placeholder="apellido" class="input-medium mostrar" type="text" value="'+item.apellidos+'"></div></div></td>'
                  html += '<td><div class="control-group"><div class="controls"><input id="direccion" name="direccion" placeholder="direccion" class="input-medium mostrar" type="text" value="'+item.direccion+'"></div></div></td>'
                  html += '</tr>'
                  html += '<tr>'
                  html += '<th width="15%"><span title="sexo">Telefono</span></th>'
                  html += '<th width="25%"><span title="Nombres">Email</span></th>'
                  html += '<th width="20%"><span title="apellido">Usuario</span></th>'
                  html += '<th width="20%"><span title="Apellido">Contraseña</span></th>'
                  html += ' <th width="25%"><span title="apellido">Editar</span></th>'
                  html += '</tr>'
                  html += '<tr>'
                  html += '<td><div class="control-group"><div class="controls"><input id="telefono" name="telefono" placeholder="Telefono" class="input-medium mostrar" type="text" value="'+item.telefono+'"></div></div></td>'
                  html += '<td><div class="control-group"><div class="controls"><input id="email" name="email" placeholder="Email" class="input-medium mostrar" type="text" value="'+item.email+'"></div></div></td>'
                  html += '<td><div class="control-group"><div class="controls"><input id="usuario" name="usuario" placeholder="Usuario" class="input-medium mostrar" type="text" value="'+item.usuario+'"></div></div></td>'
                  var contrasena = Base64.decode(item.contrasena);
                  //alert(cadena);
                  html += '<td><div class="control-group"><div class="controls"><input id="contrasena" name="contrasena" placeholder="Contraseña" class="input-medium mostrar" type="text" value="'+contrasena+'"></div></div></td>'
                  
                  html += '<td><a onclick="habi();" id="ed">   <span class="glyphicon glyphicon-trash"></span> Editar  </a> <button type="submit"  class="btn btn-success"  name="editarmedico" id="editarmedico" >Aceptar</button>  </td>'
                  //
                  html += '</tr>';
                //html += '</form>';                            
            });         
}
if(html == '') html = '<tr><td colspan="7" align="center">No se encontraron registros..</td></tr>'
    $("#dataemple tbody").html(html);

$("#editarmedico").hide();
$(".mostrar").prop('disabled', true);
}
});
});

</script>

<script language="Javascript">

  function habi () {
    $(".mostrar").prop('disabled', false);
    $("#editarmedico").show();
    $("#ed").hide();
}
</script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Rapi-Health</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="panel-admin.php">Rapi-Health</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $nombres.' '.$apellidos; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesion</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i> Medicos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="ingreso-medico.php">Registro</a>
                            </li>
                            <li>
                                <a href="consultar-medicos.php">Listar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-bar-chart-o"></i> Pacientes <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="ingreso-paciente.php">Registro</a>
                            </li>
                            <li>
                                <a href="consultar-pacientes.php">Listar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-table"></i> Empleados <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="ingreso-empleado.php">Registro</a>
                            </li>
                            <li>
                                <a href="consultar-empleado.php">Listar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-desktop"></i> Turnos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="crear_periodos.php">Crear Periodo</a>
                            </li>
                            <li>
                                <a href="asignar_turnos.php">Asignar Turnos</a>
                            </li>
                            <li>
                                <a href="turnos_asignados.php">Turnos Asignados</a>
                            </li>
                            <li>
                                <a href="carga_turnos.php">Carga de Cuadro</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-table"></i> Citas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                            <li>
                                <a href="listado_citas.php">Listado</a>
                            </li>
                            <li>
                                <a href="asignacion_citas.php">Asignacion</a>
                            </li>
                            <li>
                                <a href="historias.php">Historias</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Consulta <small> Medicos</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="panel-admin.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Medicos
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Consulta
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row --> 

                <div class="row">


                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4> Datos Del empleado</h4>
                        </div>
                        <div class="table-responsive">
                            <form role="form"  method="post" action = "">

                             <table id="dataemple" class="table table-bordered table-hover table-striped">
                              <thead>
                                <tr>
                                  <th width="15%"><span title="cedula">Cedula</span></th>
                                  <th width="25%"><span title="nombre">Nombre</span></th>
                                  <th width="25%"><span title="nombre">Apellidos</span></th>
                                  <th width="20%"><span title="apellido">Direccion</span></th>
                                  
                              </tr>  

                          </thead>
                          <tbody>

                          </tbody>
                      </table>
                  </form>

              </div>
          </div>        
      </div> 

  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->   
</div>
<!-- /#wrapper -->
<div class="footer">
    <div class="container">
        <div class="">
            <a href="index.html">Rapi-Health</a>
        </div>
        <div style="text-align: right" class="">
            <p><font size="3">
                Adjustment And Modification | Rapi-Health </font> <br> <font size="1"> © 2015 All rights reserved | <a href="https://github.com/IronSummitMedia/startbootstrap/blob/gh-pages/LICENSE">Apache 2.0</a> by <a href="http://startbootstrap.com/">Start Bootstrap </a></font></p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    <script type="text/javascript" src="lib/jquery.1.7.1.js"></script>
    <script type="text/javascript" src="lib/jquery.ui.1.8.16.js"></script>
</body>

</html>
