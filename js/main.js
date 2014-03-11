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
					todo=response.split(";");
					resultado = "<div class=\"wut\"><div class=\"final_questions\">";
					mmm=new Array();
					for(i=0;i<8;i++){
						//p=getPregunta(i+1);
						mmm[i]="Recomendación "+(i+1);
						resultado+="<p class=\"pares\">";
						resultado+=mmm[i]+"</p>";
					}
						resultado +="</div>";
						mmm=new Array();
						resultado += "<div class=\"final_answers\">";
						for(i=0;i<8;i++){
							//p=getPregunta(i+1);
							mmm[i]=todo[(i)];
							resultado+="<p class=\"pares\">";
							resultado+=mmm[i]+"</p>";
						}
						resultado+="</div>";
						//resultado+="</div></div><div class=\"navigation\"></div>";
						$(".aux").html("Tus respuestas finales:");
						//alert(todo[1]);
						navegacion+="<button name=\"previous\" type=\"button\" class=\"btn btn-danger\" id=\"prev\" onclick=\"botones();\">Home</button>";
						navegacion="<button name=\"next\" type=\"button\" class=\"btn btn-danger\" id=\"finalfinal\" onclick=\"numRep();\" style=\"float: right\">Anterior</button>";
						$(".navigation").html(navegacion);
						$(".navigation").fadeIn("slow");
						resultado+=navegacion;

					//alert(response);
					$("#main").html(resultado);
		}
	});
}
