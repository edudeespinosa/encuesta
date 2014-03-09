function cerrar_sesion(event)
{
	event.preventDefault();
	$.ajax({
		url: './controller/controllerCloseSession.php',
		type: 'post',
		success: function (response){
			window.location.href = "./index.php";
		}
	});
}