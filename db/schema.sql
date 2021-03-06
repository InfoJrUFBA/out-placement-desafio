SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
-- -----------------------------------------------------
-- Table `out-placement`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `out-placement`.`address` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `zip_code` VARCHAR(10) NOT NULL,
  `street` VARCHAR(100) NOT NULL,
  `neighborhood` VARCHAR(100) NOT NULL,
  `number` VARCHAR(6) NOT NULL,
  `complement` VARCHAR(100) NULL,
  `city` VARCHAR(100) NOT NULL,
  `state` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `out-placement`.`actual_position`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `out-placement`.`actual_position` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `out-placement`.`company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `out-placement`.`company` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `out-placement`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `out-placement`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `marital_status` INT NOT NULL,
  `course` VARCHAR(100) NOT NULL,
  `registration` VARCHAR(20) NOT NULL,
  `rg` VARCHAR(20) NOT NULL,
  `organ` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `email` VARCHAR(70) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `address_id` INT NOT NULL,
  `position_id` INT NOT NULL,
  `company_id` INT NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date` DATE NULL,
  `level` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_endereco_idx` (`address_id` ASC),
  INDEX `fk_user_position1_idx` (`position_id` ASC),
  INDEX `fk_user_company1_idx` (`company_id` ASC),
  CONSTRAINT `fk_user_endereco`
    FOREIGN KEY (`address_id`)
    REFERENCES `out-placement`.`address` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_position1`
    FOREIGN KEY (`position_id`)
    REFERENCES `out-placement`.`actual_position` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_company1`
    FOREIGN KEY (`company_id`)
    REFERENCES `out-placement`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `out-placement`.`phone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `out-placement`.`phone` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `number` VARCHAR(45) NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_phone_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_phone_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `out-placement`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `out-placement`.`mej_position`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `out-placement`.`mej_position` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `place` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `out-placement`.`user_has_mej_position`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `out-placement`.`user_has_mej_position` (
  `user_id` INT NOT NULL,
  `mej_position_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `mej_position_id`),
  INDEX `fk_user_has_mej_position_mej_position1_idx` (`mej_position_id` ASC),
  INDEX `fk_user_has_mej_position_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_has_mej_position_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `out-placement`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_mej_position_mej_position1`
    FOREIGN KEY (`mej_position_id`)
    REFERENCES `out-placement`.`mej_position` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `out-placement`.`project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `out-placement`.`project` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `out-placement`.`user_has_project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `out-placement`.`user_has_project` (
  `user_id` INT NOT NULL,
  `project_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `project_id`),
  INDEX `fk_user_has_project_project1_idx` (`project_id` ASC),
  INDEX `fk_user_has_project_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_has_project_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `out-placement`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_project_project1`
    FOREIGN KEY (`project_id`)
    REFERENCES `out-placement`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `out-placement`.`social_media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `out-placement`.`social_media` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nickname` VARCHAR(45) NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_social_media_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_social_media_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `out-placement`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `out-placement`.`recovery`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `out-placement`.`recovery` (
  `token` VARCHAR(70) NOT NULL,
  `expiration` DATETIME NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`token`),
  INDEX `fk_recovery_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_recovery_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `out-placement`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
