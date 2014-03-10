$(document).ready(function(){
	botones();
	console.log("holi");
});
function cerrar_sesion(event)
{
	event.preventDefault();
	$.ajax({
		url: '../controller/controllerCloseSession.php',
		type: 'post',
		success: function (response){
			window.location.href = "../index.php";
		}
	});
}

function botones(){
	$.ajax({
		url: '../controller/controllerMain.php',
		type: 'post',
		success: function(response){
			console.log("hola");
			console.log(response);
			button=response;
			$("#main").html(button);
		}
	});
}
