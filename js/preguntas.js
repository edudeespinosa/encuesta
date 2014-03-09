		function next_question(){
			numPregunta = Number($("#query").val());
			imprime_pregunta(numPregunta+1);
		}
		function previous_question(){
			numPregunta = Number($("#query").val());
			imprime_pregunta(numPregunta-1);			
		}
		function getMargin(numero){
			if(numero<=5)
				return 11;
			else if(numero<9)
				return 9;
			else if(numero<12)
				return 4;
			else return 2;
		}
		function imprime_pregunta(pregunta){
		var parametros = {
			"numPregunta" : pregunta
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
			success: function (response){
				todo = response.split(":");
				$("#pregunta").flippy({
				    color_target: "#FDFDFD",
				    duration: "900",
				    direction: "LEFT",
				    verso: todo[0]
				});

				//alert(response);
				//$("#pregunta").html(todo[0]);
				respuestas = todo[1].split(";");
				html_respuestas = "<ul class=\"list-unstyled options\"  >";
				for (var i = 0; i < respuestas.length-1; i++) {
					html_respuestas += "<li class=\"radio\" style=\"margin: "+getMargin(respuestas.length-1)+"% auto\"><label for=\"option";
					html_respuestas += i;
					html_respuestas +="\">"+respuestas[i]+"<input type=\"radio\" name=\"optionsRadio\" value=\"option"+i+"\" id=\"option"+i+"\"></label></li>";
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
				$("#query").val(pregunta);
				$("#tituloPregunta").html(pregunta);
			}
		});
	}
	$(document).ready(function(){
		imprime_pregunta(1);
		$("#tituloPregunta").html("1");
		$("#query").val(1);
	});
