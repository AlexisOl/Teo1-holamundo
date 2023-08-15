SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE DATABASE IF NOT EXISTS `escuelaMatematicas`;
USE `escuelaMatematicas`;


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
  
COMMIT;