// JavaScript Document
var ordenar = '&orderby=';
$(document).ready(function(){
	
	// Llamando a la funcion de busqueda al
	// cargar la pagina	
	filtrar();
	
	
	// filtrar al darle click al boton
	$("#btnfiltrar").click(function(){ filtrar() });
	
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
	//alert(ordenar);
	$.ajax({
		data: $("#frm_filtro").serialize()+ordenar,
		type: "POST",
		dataType: "json",
		url: "ajax/ajax_propietarios.php?action=listar",
			success: function(data){
				var html = '';
				if(data.length > 0){
					$.each(data, function(i,item){
						
						html += '<tr>'
							html += '<td><a class="btn btn-metis-6 btn-sm btn-grad" href="consulta-propietarioss.php?documento='+item.no_identificacion+'")"><i class="glyphicon glyphicon-eye-open"></i> </a></td> '
							html += '<td>'+item.tipo_doc+'</td></a>'
							//html += '<td><a href="consultar_propietarios.php?cedula='+item.cedula+'">'+item.cedula+'</td></a>'
							html += '<td>'+item.no_identificacion+'</td>'
							html += '<td>'+item.nombre+'</td>'
							html += '<td>'+item.apellidos+'</td>'
							html += '<td>'+item.direccion+'</td>'
							html += '<td>'+item.telefono+'</td>'
							//html += '<td><input type="submit" value="+"></td>'
						html += '</tr></a>';
						//html += '</form>';														
					});					
				}
				if(html == '') html = '<tr><td colspan="4" align="center">No se encontraron registros..</td></tr>'
				$("#data tbody").html(html);
			}
	  });
}