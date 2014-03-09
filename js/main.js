function cerrar_session()
{
	$.ajax({
		url: './controller/controllerCloseSession.php',
		type: 'post',
		success: function (response){
			window.location.href = "./index.php";
		}
	});
}