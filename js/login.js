function redirect(event){
	event.preventDefault();
	window.location.href = "./views/register.php";
}
function checkLogin(form, event)
{
	event.preventDefault();

	if($("#usr").val()==""){
		$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Por favor escribe un nombre de usuario</p>");
		return false;
	}
	if($("#pswd").val()=="")
	{
		$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Por favor escribe una contraseña</p>");
		return false;
	}
	login($("#usr").val(), $("#pswd").val());
}

function login(usr, psswd)
{
	var parametros = {
		"user" : usr,
		"password" : psswd
	};
	$.ajax({
		data: parametros,
		url: './controller/controllerAccess.php',
		type: 'post',
		success: function (response){
			if(response==-1){
				$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Escribe un nombre de usuario</p>");
			}
			else if(response==-2){
				$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Escribe una contraseña</p>");
			}
			else if(response==-3){
				$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Llena todos los campos</p>");
			}
			else if(response==-4){
				$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Contraseña incorrect</p>");
			}
			else if(response==1)
			{
				window.location.href = "./views/main.php";
			}
			else{
				$("#verificaciones").html("<p style='width: 100%; border: 1px red;'>Error interno. Intentélo más tarde</p>");
			}
		}
	});
}