-- MySQL Script generated by MySQL Workbench
-- dom 24 may 2020 14:59:00
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_horarios
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bd_horarios` ;

-- -----------------------------------------------------
-- Schema bd_horarios
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_horarios` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `bd_horarios` ;

-- -----------------------------------------------------
-- Table `bd_horarios`.`PERIODOS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_horarios`.`PERIODOS` ;

CREATE TABLE IF NOT EXISTS `bd_horarios`.`PERIODOS` (
  `id_periodos` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_periodos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_horarios`.`PROGRAMAS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_horarios`.`PROGRAMAS` ;

CREATE TABLE IF NOT EXISTS `bd_horarios`.`PROGRAMAS` (
  `id_programas` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  `id_periodos` INT(11) NOT NULL,
  PRIMARY KEY (`id_programas`, `id_periodos`),
  INDEX `fk_programas_periodos_idx` (`id_periodos` ASC) ,
  CONSTRAINT `fk_programas_periodos`
    FOREIGN KEY (`id_periodos`)
    REFERENCES `bd_horarios`.`PERIODOS` (`id_periodos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_horarios`.`MATERIAS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_horarios`.`MATERIAS` ;

CREATE TABLE IF NOT EXISTS `bd_horarios`.`MATERIAS` (
  `id_materias` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  `creditos` INT(11) NULL,
  `semestre` VARCHAR(45) NULL,
  PRIMARY KEY (`id_materias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_horarios`.`JORNADAS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_horarios`.`JORNADAS` ;

CREATE TABLE IF NOT EXISTS `bd_horarios`.`JORNADAS` (
  `id_jornadas` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_jornadas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_horarios`.`NRCS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_horarios`.`NRCS` ;

CREATE TABLE IF NOT EXISTS `bd_horarios`.`NRCS` (
  `id_nrcs` INT(11) NOT NULL AUTO_INCREMENT,
  `id_materias` VARCHAR(45) NOT NULL,
  `id_jornadas` INT(11) NOT NULL,
  PRIMARY KEY (`id_nrcs`, `id_materias`, `id_jornadas`),
  INDEX `fk_nrcs_materia1_idx` (`id_materias` ASC) ,
  INDEX `fk_nrcs_jornada1_idx` (`id_jornadas` ASC) ,
  CONSTRAINT `fk_nrcs_materia1`
    FOREIGN KEY (`id_materias`)
    REFERENCES `bd_horarios`.`MATERIAS` (`id_materias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_nrcs_jornada1`
    FOREIGN KEY (`id_jornadas`)
    REFERENCES `bd_horarios`.`JORNADAS` (`id_jornadas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_horarios`.`PROGRAMAS_MATERIAS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_horarios`.`PROGRAMAS_MATERIAS` ;

CREATE TABLE IF NOT EXISTS `bd_horarios`.`PROGRAMAS_MATERIAS` (
  `id_programas` VARCHAR(45) NOT NULL,
  `id_periodos` INT(11) NOT NULL,
  `id_materias` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_programas`, `id_periodos`, `id_materias`),
  INDEX `fk_programas_has_materia_materia1_idx` (`id_materias` ASC) ,
  INDEX `fk_programas_has_materia_programas1_idx` (`id_programas` ASC, `id_periodos` ASC) ,
  CONSTRAINT `fk_programas_has_materia_programas1`
    FOREIGN KEY (`id_programas` , `id_periodos`)
    REFERENCES `bd_horarios`.`PROGRAMAS` (`id_programas` , `id_periodos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_programas_has_materia_materia1`
    FOREIGN KEY (`id_materias`)
    REFERENCES `bd_horarios`.`MATERIAS` (`id_materias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_horarios`.`DIAS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_horarios`.`DIAS` ;

CREATE TABLE IF NOT EXISTS `bd_horarios`.`DIAS` (
  `id_dias` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_dias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_horarios`.`CLASES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_horarios`.`CLASES` ;

CREATE TABLE IF NOT EXISTS `bd_horarios`.`CLASES` (
  `id_dias` INT(11) NOT NULL,
  `id_nrcs` INT(11) NOT NULL,
  `id_materias` VARCHAR(45) NOT NULL,
  `id_jornadas` INT(11) NOT NULL,
  `hora_inicio` TIME NOT NULL,
  `hora_final` TIME NOT NULL,
  PRIMARY KEY (`id_dias`, `id_nrcs`, `id_materias`, `id_jornadas`),
  INDEX `fk_CLASES_NRCS1_idx` (`id_nrcs` ASC, `id_materias` ASC, `id_jornadas` ASC) ,
  CONSTRAINT `fk_CLASES_DIAS1`
    FOREIGN KEY (`id_dias`)
    REFERENCES `bd_horarios`.`DIAS` (`id_dias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CLASES_NRCS1`
    FOREIGN KEY (`id_nrcs` , `id_materias` , `id_jornadas`)
    REFERENCES `bd_horarios`.`NRCS` (`id_nrcs` , `id_materias` , `id_jornadas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
