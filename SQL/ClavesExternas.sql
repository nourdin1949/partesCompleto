DROP DATABASE IF EXISTS ParteBD;

CREATE DATABASE IF NOT EXISTS ParteBD;

DROP TABLE IF EXISTS `ParteBD`.`Parte` ;

CREATE TABLE IF NOT EXISTS  `ParteBD`.`Parte` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comentario` VARCHAR(300) NOT NULL,
  `fecha_suceso` Date NOT NULL,
  `fecha_llamada`Date NOT NULL,
  `fecha_rellenar` Date NOT NULL,
  `personaCitada` VARCHAR(100) NOT NULL,
  `hora` TIME NOT NULL,
  `profesor` VARCHAR(100) NOT NULL,
  `tipo` enum('malaConducta','buenaConducta') NOT NULL,
  PRIMARY KEY (`id`));
  
  
DROP TABLE IF EXISTS `ParteBD`.`Alumno` ;

CREATE TABLE IF NOT EXISTS  `ParteBD`.`Alumno` (
  `id` INT,
  `nombre` VARCHAR(100) NOT NULL,
  `curso` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (id) REFERENCES Parte(id));


  
DROP TABLE IF EXISTS `ParteBD`.`Tutor` ;

CREATE TABLE IF NOT EXISTS `ParteBD`.`Tutor` (
  `id` INT ,
  `nombrePadre` VARCHAR(100) NOT NULL,
  `direccion` VARCHAR(100) NOT NULL,
  `codigo_postal` INT NOT NULL,
  `ciudad` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (id) REFERENCES Parte(id));

