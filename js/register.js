function checkForm(form)
{
	event.preventDefault();

	if($("#user").val()=="")
	{
		$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Por favor escribe un nombre de usuario</p>");
		return false;
	}
	if($("#password").val()=="")
	{
		$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Por favor escribe una contraseña</p>");
		return false;
	}
	if($("#password").val()!=$("#repassword").val())
	{
		$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Las contraseñas no son iguales</p>");
		return false;
	}
	if($("#mail").val()=="")
	{
		$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Por favor escribe un correo</p>");
		return false;
	}
	if($("#sexo1").val()==""||$('#sexo2').val()=="")
	{
		$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Por favor selecciona un sexo</p>");
		return false;
	}
	if($("#fecha").val()=="")
	{
		$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Por favor escribe una fecha de nacimiento</p>");
		return false;
	}
	if($("#sexo1").val()=="")
		var sexo = $("#sexo2").val();
	else
		var sexo = $("#sexo1").val();
	registrar($("#user").val(), $("#password").val(), $("#repassword").val(), $("#mail").val(),  sexo, $("#fecha").val());

}

	function registrar(usr, pswd, repswd, mail, sexo, fecha){
		var parametros = {
			"user" : usr,
			"password" : pswd,
			"repassword" : repswd,
			"mail" : mail,
			"sexo" : sexo,
			"fecha" : fecha
		};
		$.ajax({
			data: parametros,
			url: '../controller/controllerRegister.php',
			type: 'post',
			success: function (response){
				console.log(response);
				if(response==-1){
					$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>El usuario ya existe. Prueba con otro nombre de usuario</p>");
				}
				else if(response==-2){
					$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Las contraseñas no son iguales</p>");
				}
				else if(response==-3){
					$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Llena todos los campos</p>");
				}
				else if(response==-4){
					$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Error interno. Intentélo más tarde</p>");
				}
				else if(response==1)
				{
				}
			}
		});
	}
