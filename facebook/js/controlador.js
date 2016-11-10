function seleccionarUsuario(codigoUsuario, nombreUsuario){
	alert("Codigo: " + codigoUsuario + ", Nombre: " + nombreUsuario);
	$("#txt-nombre").val(nombreUsuario);
	$("#txt-id-usuario").val(codigoUsuario);
	var parametros = "codigoUsuario="+$("#txt-id-usuario").val();
	$.ajax({
			url:"ajax/acciones.php?accion=2",
			method: "POST",
			data:parametros,
			success:function(resultado){
				$("#div-aleros").html(resultado);
			},
			error:function(){
				alert(parametros);

			}

			});
		$.ajax({
			url:"ajax/acciones.php?accion=3",
			method: "POST",
			data: parametros,
			success:function(resultado){
				$("#div-nocompis").html(resultado);
			},
			error:function(){
				alert(parametros);

			}

			});
	//aleros();
//	noAmigos();

	
	

}



	
	



function agregarAmigo(codigoNuevoAmigo){
	alert("Codigo nuevo amigo: " + codigoNuevoAmigo);
	var parametros = "codigoNuevoAmigo="+codigoNuevoAmigo+"&codigoUsuario="+$('#txt-id-usuario').val();
	alert(parametros);
	$.ajax({
			url:"ajax/acciones.php?accion=4",
			method: "POST",
			data: parametros,
			success:function(resultado){
				$.ajax({
						url:"ajax/acciones.php?accion=2",
						method: "POST",
						data:"codigoUsuario="+$("#txt-id-usuario").val(),
						success:function(resultado){
							$("#div-aleros").html(resultado);
						},
						error:function(){
							alert(parametros);

						}

						});
				$.ajax({
					url:"ajax/acciones.php?accion=3",
					method: "POST",
					data: "codigoUsuario="+$("#txt-id-usuario").val(),
					success:function(resultado){
						$("#div-nocompis").html(resultado);
					},
					error:function(){
						alert(parametros);

					}

				});
				
			},
			error:function(){
				alert(parametros);

			}
		});
	
	
}
$(document).ready(function(){
	$("#btn-tengo-hambre").click(function(e){
		e.preventDefault();
		alert("Puede tomar 5 minutos e ir donde don Tito a comprar algo, me trae.");
	});	
	$("#btn-ir-banio").click(function(e){
		e.preventDefault();
		alert("Vaya, solamente deje su telefono en el escritorio.");
	});
	$("#btn-iniciar").click(function(e){
	var parametros= "txt-email="+$("#txt-email").val()+"&txt-contra="+$("#txt-contra").val();
	alert(parametros);

	$.ajax({
			url:"ajax/acciones.php?accion=5",
			method: "POST",
			data: parametros,
			success:function(resultado){
				$("#div-verde").html(resultado);
			},
			error:function(){
				alert(parametros);

			}

			});

		});
	$("#btn-registro-usuario").click(function(e){
	var parametros= "txt-correo="+$("#txt-correo").val()+"&txt-contrasena="+$("#txt-contrasena").val()+
					"&txt-usuario="+$("#txt-usuario").val()+"&slc-url-imagen="+$("#slc-url-imagen").val();
	alert(parametros);
	$("#imagen").css('display', 'inline');

	$.ajax({
			url:"ajax/acciones.php?accion=6",
			method: "POST",
			data: parametros,
			success:function(resultado){
				$("#div-verde").html(resultado);
				$.ajax({
						url:"ajax/acciones.php?accion=2",
						method: "POST",
						data:"codigoUsuario="+$("#txt-id-usuario").val(),
						success:function(resultado){
							$("#imagen").css('display', 'none');

							$("#div-aleros").html(resultado);
						},
						error:function(){
							alert(parametros);

						}

						});
				$.ajax({
					url:"ajax/acciones.php?accion=3",
					method: "POST",
					data: "codigoUsuario="+$("#txt-id-usuario").val(),
					success:function(resultado){
						$("#div-nocompis").html(resultado);
					},
					error:function(){
						alert(parametros);

					}

				});
			},
			error:function(){
				alert(parametros);

			}

			});
	});

	function cargarTarjetas(){
		$.ajax({
			url:"ajax/acciones.php?accion=1",
			method: "POST",
			success:function(resultado){
				$("#div-quiensoy").html(resultado);
			},
			error:function(){
				alert(parametros);

			}

			});
		$.ajax({
			url:"ajax/acciones.php?accion=2",
			method: "POST",
			data:"codigoUsuario="+$("#txt-id-usuario").val(),
			success:function(resultado){
				$("#div-aleros").html(resultado);
			},
			error:function(){
				alert(parametros);

			}

			});
		$.ajax({
			url:"ajax/acciones.php?accion=3",
			method: "POST",
			data: "codigoUsuario="+$("#txt-id-usuario").val(),
			success:function(resultado){
				$("#div-nocompis").html(resultado);
			},
			error:function(){
				alert(parametros);

			}

			});
		//var parametros = "codigoNuevoAmigo="+codigoNuevoAmigo+"&codigoUsuario="+$('#txt-id-usuario').val();

	}
	
	//noAmigos();
	//aleros();
	cargarTarjetas();	
	
});

