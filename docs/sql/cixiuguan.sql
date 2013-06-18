SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `cixiuguan` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `cixiuguan` ;

-- -----------------------------------------------------
-- Table `cixiuguan`.`checkin`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cixiuguan`.`checkin` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `place_id` INT UNSIGNED NOT NULL ,
  `lat` DECIMAL(18,14) NOT NULL ,
  `lng` DECIMAL(18,14) NOT NULL ,
  `comments` VARCHAR(500) NOT NULL ,
  `stars` TINYINT UNSIGNED NOT NULL ,
  `valid_tag` TINYINT(1) UNSIGNED NOT NULL ,
  `create_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `update_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cixiuguan`.`announcement`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cixiuguan`.`announcement` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) NOT NULL ,
  `content` TEXT NOT NULL ,
  `valid_tag` TINYINT(1) UNSIGNED NOT NULL ,
  `create_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `update_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
