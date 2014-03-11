function checkForm(form)
{
	event.preventDefault();
	$(".alerts").fadeOut("slow");

	if($("#user").val()=="")
	{
		$(".alerts").html("Por favor escribe un nombre de usuario");
		$(".alerts").fadeIn("slow");
		return false;
	}
	if($("#password").val()=="")
	{
		$(".alerts").html("Por favor escribe una contraseña");
		$(".alerts").fadeIn("slow");
		return false;
	}
	if($("#password").val()!=$("#repassword").val())
	{
		$(".alerts").html("Las contraseñas no son iguales");
		$(".alerts").fadeIn("slow");
		return false;
	}
	if($("#mail").val()=="")
	{
		$(".alerts").html("Por favor escribe un correo");
		$(".alerts").fadeIn("slow");
		return false;
	}
	if($("#sexo1").val()==""||$('#sexo2').val()=="")
	{
		$(".alerts").html("Por favor selecciona un sexo");
		$(".alerts").fadeIn("slow");
		return false;
	}
	if($("#fecha").val()=="")
	{
		$(".alerts").html("Por favor escribe una fecha de nacimiento");
		$(".alerts").fadeIn("slow");
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
			url: '/encuesta/controller/controllerRegister.php',
			type: 'post',
			success: function (response){
				console.log(response);
				if(response==-1){
					$(".alerts").html("El usuario ya existe. Prueba con otro nombre de usuario");
					$(".alerts").fadeIn("slow");
				}
				else if(response==-2){
					$(".alerts").html("Las contraseñas no son iguales");
					$(".alerts").fadeIn("slow");
				}
				else if(response==-3){
					$(".alerts").html("Llena todos los campos");
					$(".alerts").fadeIn("slow");
				}
				else if(response==-4){
					$(".alerts").html("Error interno. Intentélo más tarde");
					$(".alerts").fadeIn("slow");
				}
				else if(response==1)
				{
					window.location.href = "../views/main.php";
				}
			}
		});
	}
