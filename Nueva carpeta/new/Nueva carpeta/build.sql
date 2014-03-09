CREATE DATABASE IF NOT EXISTS `preguntas_salud`;
USE `preguntas_salud`;

DROP TABLE `respuesta_us`;
DROP TABLE `respuesta`;
DROP TABLE `usuario`;
DROP TABLE `preguntas`;

CREATE TABLE IF NOT EXISTS `preguntas` (
	
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	`texto` VARCHAR(1024) NOT NULL

) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci;
CREATE TABLE IF NOT EXISTS `respuesta` (
	
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	`id_pregunta` INT UNSIGNED NOT NULL, 
	`texto` VARCHAR(1024) NOT NULL, 
	`valor` FLOAT NOT NULL, 
	`comentario` VARCHAR(1024) NOT NULL, 

	FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas`(`id`)

) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci;
CREATE TABLE IF NOT EXISTS `usuario` (
	
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	`email` VARCHAR(256) NOT NULL, 
	`contrsn` CHAR(128) NOT NULL, 
	`repeticiones` TINYINT NOT NULL DEFAULT 0, 
	`usuario` VARCHAR(256) NOT NULL, 
	`sexo` TINYINT UNSIGNED CHECK (`sexo` = 0 OR `sexo` = 1), 
	`fecha_nac` TIMESTAMP DEFAULT CURRENT_TIMESTAMP

) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci;
CREATE TABLE IF NOT EXISTS `respuesta_us` (
	
	`id_usuario` INT UNSIGNED NOT NULL, 
	`id_respuesta` INT UNSIGNED NOT NULL, 

	FOREIGN KEY (`id_usuario`) REFERENCES `usuario`(`id`),
	FOREIGN KEY (`id_respuesta`) REFERENCES `respuesta`(`id`)

) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci;