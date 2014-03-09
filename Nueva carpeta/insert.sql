
-- Clean swipe
DELETE FROM `respuestas_us` WHERE 1;
DELETE FROM `respuestas` WHERE 1;
DELETE FROM `usuario` WHERE 1;
DELETE FROM `preguntas` WHERE 1;

-- User data
INSERT INTO `usuario` VALUES(NULL, 'example@lol.com', 'pswd',0, 'lol123', 0, FROM_UNIXTIME(1276041600)); 
INSERT INTO `usuario` VALUES(NULL, 'rofl@hotmail.com', 'pswd',0, 'ma_lazr', 0, FROM_UNIXTIME(1088553600)); 
INSERT INTO `usuario` VALUES(NULL, 'test@aol.com', 'pswd',0, 'someRandomDuD3', 0, FROM_UNIXTIME(850780800)); 
INSERT INTO `usuario` VALUES(NULL, 'jim.apples@hotmail.com', 'pswd',0, 'Jimmy', 0, FROM_UNIXTIME(214099200)); 
INSERT INTO `usuario` VALUES(NULL, 'myamazinghorse1292@gmail.com', 'pswd',0, 'ricky12332', 0, FROM_UNIXTIME(495244800)); 

INSERT INTO preguntas VALUES (NULL, '¿Cuánta cantidad de agua ingieres al día?');
INSERT INTO preguntas VALUES (NULL, '¿Cuántas horas duermes al día?');
INSERT INTO preguntas VALUES (NULL, '¿Con qué frecuencia consumes alcohol?');
INSERT INTO preguntas VALUES (NULL, '¿Con qué frecuencia haces ejercicio?');
INSERT INTO preguntas VALUES (NULL, '¿Qué alimentos consumes con mayor frecuencia?');
INSERT INTO preguntas VALUES (NULL, 'En promedio, ¿cuántos cigarrillos fumas al día?');
INSERT INTO preguntas VALUES (NULL, '¿Consumes alguna sustancia ilícita?');
INSERT INTO preguntas VALUES (NULL, '¿Cuándo inicias los proyectos de la escuela?');

INSERT INTO respuesta VALUES (NULL, 1, 'Medio litro', 1, '');
INSERT INTO respuesta VALUES (NULL, 1, 'Un litro', 2, '');
INSERT INTO respuesta VALUES (NULL, 1, 'Litro y medio', 3, '');
INSERT INTO respuesta VALUES (NULL, 1, 'Dos litros', 4, '');
INSERT INTO respuesta VALUES (NULL, 1, 'Más de dos litros', 5, '');
INSERT INTO respuesta VALUES (NULL, 2, 'Menos de 4', 1, '');
INSERT INTO respuesta VALUES (NULL, 2, 'Entre 4 y 6', 2, '');
INSERT INTO respuesta VALUES (NULL, 2, 'Entre 6 y 8', 3, '');
INSERT INTO respuesta VALUES (NULL, 2, 'Entre 8 y 10', 5, '');
INSERT INTO respuesta VALUES (NULL, 2, 'Más de 10', 4, '');
INSERT INTO respuesta VALUES (NULL, 3, 'No consumo alcohol', 5, '');
INSERT INTO respuesta VALUES (NULL, 3, 'Una vez a la semana', 3, '');
INSERT INTO respuesta VALUES (NULL, 3, 'Una vez al mes', 4, '');
INSERT INTO respuesta VALUES (NULL, 3, 'Más de una vez a la semana', 2, '');
INSERT INTO respuesta VALUES (NULL, 3, 'Diario', 1, '');
INSERT INTO respuesta VALUES (NULL, 4, 'No hago ejercicio', 1, '');
INSERT INTO respuesta VALUES (NULL, 4, 'Una vez a la semana', 3, '');
INSERT INTO respuesta VALUES (NULL, 4, 'Una vez al mes', 2, '');
INSERT INTO respuesta VALUES (NULL, 4, 'Más de una vez a la semana', 4, '');
INSERT INTO respuesta VALUES (NULL, 4, 'Diario', 5, '');
INSERT INTO respuesta VALUES (NULL, 5, 'Leche, yogurt, crema (lácteos)', 2, '');
INSERT INTO respuesta VALUES (NULL, 5, 'Carne, pescado, huevos (proteínas)', 3, '');
INSERT INTO respuesta VALUES (NULL, 5, 'Arroz, trigo, papa (cereales)', 5, '');
INSERT INTO respuesta VALUES (NULL, 5, 'Manzana, lechuga, zanahoria (frutas y verduras)', 4, '');
INSERT INTO respuesta VALUES (NULL, 5, 'Aceite, mantequilla, manteca (grasas)', 1, '');
INSERT INTO respuesta VALUES (NULL, 6, 'No fumo', 6, '');
INSERT INTO respuesta VALUES (NULL, 6, 'Entre 1 y 4', 5, '');
INSERT INTO respuesta VALUES (NULL, 6, 'Entre 5 y 10', 4, '');
INSERT INTO respuesta VALUES (NULL, 6, 'Entre 11 y 15', 3, '');
INSERT INTO respuesta VALUES (NULL, 6, 'Entre 16 y 20', 2 ,'');
INSERT INTO respuesta VALUES (NULL, 6, 'Una o más cajetillas', 1, '');
INSERT INTO respuesta VALUES (NULL, 7, 'No consumo sustancias ilícitas', 5, '');
INSERT INTO respuesta VALUES (NULL, 7, 'Mariguana', 1, '');
INSERT INTO respuesta VALUES (NULL, 7, 'Heroína', 1, '');
INSERT INTO respuesta VALUES (NULL, 7, 'Metanfetaminas', 1, '');
INSERT INTO respuesta VALUES (NULL, 7, 'Pegamentos', 1, '');
INSERT INTO respuesta VALUES (NULL, 7, 'Ácido', 1, '');
INSERT INTO respuesta VALUES (NULL, 7, 'Cocaína', 1, '');
INSERT INTO respuesta VALUES (NULL, 7, 'Crack', 1, '');
INSERT INTO respuesta VALUES (NULL, 7, 'Hongos', 1, '');
INSERT INTO respuesta VALUES (NULL, 8, 'En cuanto tengo los lineamientos', 4, '');
INSERT INTO respuesta VALUES (NULL, 8, 'Cuando queda la mitad del tiempo', 3, '');
INSERT INTO respuesta VALUES (NULL, 8, 'La semana de la entrega', 2, '');
INSERT INTO respuesta VALUES (NULL, 8, 'El día antes de la entrega', 1, '');
