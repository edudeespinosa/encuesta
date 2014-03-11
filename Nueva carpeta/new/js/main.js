$(document).ready(function(){
	botones();
	//console.log("holi");
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
	var parametros={
		"action": 1
	};
	$.ajax({
		data: parametros,
		url: '../controller/controllerMain.php',
		type: 'post',
		success: function(response){
			//console.log("hola");
			//console.log(response);
			button=response;
			$("#main").html(button);
		}
	});
}

function numRep(){
	var parametros={
		"action": 2
	};
	$.ajax({
		data: parametros,
		url: '../controller/controllerMain.php',
		type: 'post',
		success: function(response){
			$("#main").html(response);
		}
	});
}

function retro(i){
	var parametros={
		"action": 3,
		"num": i
	};
	$.ajax({
		data: parametros,
		url: '../controller/controllerMain.php',
		type: 'post',
		success: function(response){
			$("#main").html(response);
		}
	});
}
