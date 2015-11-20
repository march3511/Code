// JavaScript Document
var ordenar = '&orderby=';
$(document).ready(function(){
	
	// Llamando a la funcion de busqueda al
	// cargar la pagina	
	filtrar();
	
	// filtrar al darle click al boton
	$("#btnfiltrar").click(function(){ filtrar() });

	$("#todos").click(function(){ filtrar() });

	// boton cancelar
	$("#btncancel").click(function(){ 
		//alert("hola");
		$(".filtro input").val('')
		//$(".filtro select").find("option[value='0']").attr("selected",true)
		filtrar() 
	});
	
	// ordenar por
	$("#data th span").click(function(){
		var orden = '';
		if($(this).hasClass("desc"))
		{
			$("#data th span").removeClass("desc").removeClass("asc")
			$(this).addClass("asc");
			ordenar = "&orderby="+$(this).attr("title")+" asc"		
		}else
		{
			$("#data th span").removeClass("desc").removeClass("asc")
			$(this).addClass("desc");
			ordenar = "&orderby="+$(this).attr("title")+" desc"
		}
		//alert(ordenar);
		filtrar()
	});
});

function filtrar()
{	
	//alert("entro ->" + $("#frm_filtro").serialize()+ordenar);
	$.ajax({
		data: $("#frm_filtro").serialize()+ordenar,
		type: "POST",
		dataType: "json",
		url: "../../plantilla/ajax/ajax_pasajero.php?action=listar",
		success: function(data){
			//alert(data);
			var html = '';
			if(data.length > 0){


				$.each(data, function(i,item){
					html += '<tr>'
					//html += '<td><a class="btn btn-metis-6 btn-sm btn-grad"><i class="glyphicon glyphicon-eye-open"></i> </a></td> '
						//html += '<td><a class="btn btn-metis-6 btn-sm btn-grad" href="consultar_vehiculos.php?placa='+item.placa+'")"><i class="glyphicon glyphicon-eye-open"></i> </a></td> '
				html += '<td>'+item.cedula+'</td>'
				html += '<td>'+item.nombres+'</td>'
				html += '<td>'+item.apellidos+'</td>'
				html += '<td>'+item.direccion+'</td>'
				html += '<td>'+item.telefono+'</td>'
				html += '<td>'+item.email+'</td>'
				html += '<td>'+item.sexo+'</td>'
				html += '<td>'+item.usuario+'</td>'
				html += '<td><a href="#" id="editar" class="editar"  onclick="editar('+item.cedula+')">  <span class="glyphicon glyphicon-pencil"></span> </a>	<a href="#" onclick="eliminar('+item.cedula+')">  <span class="glyphicon glyphicon-trash"></span> </a></td>'

				html += '</tr></a>';

						//html += '</form>';													
					});					
			}
			if(html == '') html = '<tr><td colspan="4" align="center">No se encontraron registros..</td></tr>'
				$("#data tbody").html(html);
		}
	});
}

//html += '<td><a href="*" id="editar" class="editar"  onclick="editar('+item.cod_reserva+')">  <span class="glyphicon glyphicon-pencil"></span> </a>	<a href="#" onclick="eliminar('+item.cod_reserva+')">  <span class="glyphicon glyphicon-trash"></span> </a></td>'

function eliminar(cedula) {
	//alert(cedula);

	$.ajax({
		type:"POST",
		url: "../../plantilla/ajax/eliminar_pasajero.php",
		data: "id="+cedula
	}).done(function(msg){
		//alert(msg);
		if(msg == "ok"){
			alert("Eliminado con Exito");
			//window.locationf="../../consulta_reserva.php";
			$(location).attr('href', '../../contenido/Pasajero/Consultar.php');
		}else{alert("Ha ocurrido un Error");}

	});
}

function editar(cedula){
	alert(cedula);
}
