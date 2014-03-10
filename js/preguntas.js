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
	function next_question(){
		numPregunta = Number($("#query").val());
		flag=false;
		for(i=0;i<document.forma_r.optionsRadio.length;i++){
			if(document.forma_r.optionsRadio[i].checked){
				respuestas_guardadas[numPregunta-1]=document.forma_r.optionsRadio[i].value;
				flag=true;
			}
		}
		if(flag){
			imprime_pregunta(numPregunta+1);
			$(".alerts").fadeOut("slow");
			//$(".alerts").html("");
		}
		else{
			$(".alerts").html("Contesta la pregunta antes de continuar");
			$(".alerts").fadeIn("slow");
		}

	}
	function regresar(){
		console.log(respuestas_guardadas);
		imprime_pregunta(8);
	}
	function previous_question(){
		$(".alerts").fadeOut("slow");
		//$(".alerts").html("");
		numPregunta = Number($("#query").val());
		flag=false;
		for(i=0;i<document.forma_r.optionsRadio.length;i++){
			if(document.forma_r.optionsRadio[i].checked){
				respuestas_guardadas[numPregunta-1]=document.forma_r.optionsRadio[i].value;
				flag = true;
			}
		}
		imprime_pregunta(numPregunta-1);
	}
	function laluigi(){
		var parametros = {
			"respuestas" : respuestas_guardadas
		};
		$.ajax({
			data: parametros,
			url: '../controller/controllerInsert.php',
			type: 'post',
			beforeSend: function(){
				//turn();
			},
			success: function(response){
				//alert(response);
				$("#pregunta").flippy({
				    color_target: "#FDFDFD",
				    duration: "900",
				    direction: "LEFT",
				    verso: response
				});
			}
		});
	}

		function get_results(){
			numPregunta = Number($("#query").val());
			flag=false;
			for(i=0;i<document.forma_r.optionsRadio.length;i++){
				if(document.forma_r.optionsRadio[i].checked){
					respuestas_guardadas[numPregunta-1]=document.forma_r.optionsRadio[i].value;
					flag=true;
				}
			}
			if(!flag)
				alert("Contesta la pregunta antes de continuar");
			else{
			console.log(respuestas_guardadas);
			var parametros = {
				"respuestas" : respuestas_guardadas
			};
			$.ajax({
				data: parametros,
				url: '../controller/print_questions.php',
				type: 'post',
				beforeSend: function(){
				$("#pregunta").flippy({
				    color_target: "#FDFDFD",
				    duration: "900",
				    direction: "LEFT",
				    depth: .05,
				    verso: "Procesando, espere por favor"
				});
				$("#respuesta").flippy({
				    color_target: "#0C3E4E",
				    duration: "900",
				    light: 0,
				    depth: .05,
				    direction: "RIGHT",
				    verso: ""
				});

			},
				success: function(response){
					//$(".navigation").html("");
					//alert(response);
					todo=response.split(";");
					mmm=new Array();
					for(i=0;i<8;i++){
						//p=getPregunta(i+1);
						mmm[i]=todo[i];
					}
					//alert(todo[1]);
					$("#pregunta").flippy({
					    color_target: "#FDFDFD",
					    duration: "900",
					    direction: "LEFT",
					    verso: todo
					});
					navegacion="<button name=\"next\" type=\"button\" class=\"btn btn-danger\" id=\"finalfinal\" onclick=\"laluigi();\" style=\"float: right\">Confirmar Respuestas</button>";
					$(".navigation").html(navegacion);
				}
			});}
		}
	function getMargin(numero){
		return 100/numero;
		/*if(numero<=5)
			return 17;
		else if(numero<9)
			return 8;
		else if(numero<12)
			return 2;
		else return 2;*/
	}
	function imprime_pregunta(pregunta){
		var parametros = {
			"numPregunta" : pregunta
		};
		$.ajax({
			data: parametros,
			url: '../controller/print_questions.php',
			//url: "/encuesta/controller/print_questions.php",
			type: 'post',
			beforeSend: function(){
				$(".navigation").fadeOut("slow");
			},
			success: function (response){
				todo = response.split(":");
				//turn();
				question_text = "<p id='testo'>"+todo[0]+"</p>"
				$("#pregunta").flippy({
				    color_target: "#FDFDFD",
				    duration: "900",
				    direction: "LEFT",
				    verso: question_text
				});

				//$("#pregunta").html(todo[0]);
				respuestas = todo[1].split(";");
				//html_respuestas = "<ul class=\"list-unstyled options\"  >";
				html_respuestas = "<form name=\"forma_r\" class='responda'><ul class=\"list-unstyled options\"  >";
				
				for (var i = 0; i < respuestas.length-1; i++) {
					html_respuestas += "<li class=\"radio\" style=\"height: "+getMargin(respuestas.length-1)+"%\"><label for=\"option";
					html_respuestas += i;
					//html_respuestas +="\">"+respuestas[i]+"<input type=\"radio\" name=\"optionsRadio\" value=\"option"+i+"\" id=\"option"+i+"\"></label></li>";
					html_respuestas +="\">"+respuestas[i]+"<input type=\"radio\" name=\"optionsRadio\" value=\""+i+"\" id=\"option\"";
					if(respuestas_guardadas[pregunta-1]==i){
						html_respuestas += " checked";
					}

					html_respuestas += "></label></li></form>";
				}
				html_respuestas+="</ul>";
				//$("#respuesta").html (html_respuestas);
				var navegacion = "";
				$("#respuesta").flippy({
				    direction: "RIGHT",
				    light: 0,
				    color_target: "#0C3E4E",
				    duration: "900",
				    verso: html_respuestas
				});
				//$("#respuesta").html (html_respuestas);
				if(pregunta < 8)
				{
					navegacion += "<button name=\"next\" type=\"button\" class=\"btn btn-danger\" id=\"next\" onclick=\"next_question();\">Siguiente</button>";
				}
				if(pregunta == 8){
					navegacion+= "<button name=\"next\" type=\"button\" class=\"btn btn-danger\" id=\"final\" onclick=\"get_results();\">Contestar Encuesta</button>";
				}
				if(pregunta > 1){
					navegacion+="<button name=\"previous\" type=\"button\" class=\"btn btn-danger\" id=\"prev\" onclick=\"previous_question();\">Anterior</button>";
				}

				$(".navigation").html(navegacion);
				$(".navigation").fadeIn("slow");
				$("#query").val(pregunta);
				$("#tituloPregunta").html(pregunta);
			}
		});
	}

function turn(){
	$("#pregunta").flippy({
	    color_target: "#FDFDFD",
	    duration: "900",
	    direction: "LEFT",
	    depth: .05,
	    verso: "Procesando, espere por favor"
	});
	$("#respuesta").flippy({
	    color_target: "#0C3E4E",
	    duration: "900",
	    light: 0,
	    depth: .05,
	    direction: "RIGHT",
	    verso: ""
	});
}
$(document).ready(function(){
	var respuestas_guardadas=new Array(8);
	for(i=0;i<8;i++){
		respuestas_guardadas[i]=-1;
		}

	imprime_pregunta(1);
	//turn();

	$("#tituloPregunta").html("1");
	//$(".alerts").fadeOut("slow");
	$("#query").val(1);
	//$(".navigation").fadeOut("slow");

});

