SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE DATABASE IF NOT EXISTS `escuelaMatematicas`;
USE `escuelaMatematicas`;

--
-- Estructura de tabla para la tabla `USUARIOS`
--
CREATE TABLE `USUARIOS` (   

    `id` INT auto_increment PRIMARY KEY,
    `nombre` VARCHAR(120) NOT NULL,
    `contrasenia` VARCHAR(200) NOT NULL
 )ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 ;


CREATE TABLE `NOTICIAS` ( 
    `id` INT auto_increment PRIMARY KEY,
    `titulo` VARCHAR(60) NOT NULL,
    `resumen` VARCHAR(200) NOT NULL,
    `general` VARCHAR(1500) NOT NULL,
    `imagen` VARCHAR(300) 

)ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 ;
   
--
-- Estructura de tabla para la tabla `colaboradores`
--
CREATE TABLE `COLABORADORES`(
    `identificadorColaborador` INT auto_increment  PRIMARY KEY,
    `nombre` VARCHAR(60) NOT NULL,
    `areaInvestigacion` VARCHAR(100) NOT NULL,
   `areaTrabajo` VARCHAR(100) NOT NULL,
    `imagen` VARCHAR(300) NOT NULL
)ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 ;


CREATE TABLE `ACTIVIDADES`(
    `nombre` VARCHAR(200) NOT NULL,
    `fecha` DATE NOT NULL,
    `imagen` VARCHAR(300) NOT NULL,
    `descripcion` VARCHAR(800),
    `identificador` INT auto_increment PRIMARY KEY
)ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 ;
  

--- para asignacion de Noticias
CREATE TABLE `ASIGNACION_NOTICIAS`(
    `id` INT auto_increment  PRIMARY KEY,
    `identificadorNoticia` DATE NOT NULL,
    `identificadorColabo` VARCHAR(300) NOT NULL,
    `fecha` date NOT NULL,
    `area` VARCHAR(60) NOT NULL
)ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 ;

 --- agrega un valor unico 

 ALTER TABLE `USUARIOS`
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

-- llaves foraneas
 ALTER TABLE `ASIGNACION_NOTICIAS`
  ADD KEY `fk_ID_NOTICIA` (`identificadorNoticia`),
  ADD KEY `fk_ID_COLABORADOR` (`identificadorColabo`);

ALTER TABLE `ASIGNACION_NOTICIAS`
  ADD CONSTRAINT `fk_ID_NOTICIA_union` FOREIGN KEY (`identificadorNoticia`) REFERENCES `NOTICIAS` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ID_COLABORADOR_union` FOREIGN KEY (`identificadorColabo`) REFERENCES `COLABORADORES` (`identificadorColaborador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

COMMIT;