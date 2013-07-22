SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `plock`.`customers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `customers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `observation` TEXT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plock`.`servers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `servers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `url` VARCHAR(255) NULL ,
  `user` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  `ip` VARCHAR(255) NULL ,
  `observation` TEXT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plock`.`domains`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `domains` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `customer_id` INT UNSIGNED NOT NULL ,
  `server_id` INT UNSIGNED NULL ,
  `url` VARCHAR(255) NOT NULL ,
  `observation` TEXT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_domains_customers` (`customer_id` ASC) ,
  INDEX `fk_domains_servers1` (`server_id` ASC) ,
  CONSTRAINT `fk_domains_customers`
    FOREIGN KEY (`customer_id` )
    REFERENCES `customers` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_domains_servers1`
    FOREIGN KEY (`server_id` )
    REFERENCES `servers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plock`.`connection_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `connection_types` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plock`.`connections`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `connections` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `domain_id` INT UNSIGNED NOT NULL ,
  `connection_type_id` INT UNSIGNED NOT NULL ,
  `host` VARCHAR(255) NOT NULL ,
  `user` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_connections_domains1` (`domain_id` ASC) ,
  INDEX `fk_connections_connection_types1` (`connection_type_id` ASC) ,
  CONSTRAINT `fk_connections_domains1`
    FOREIGN KEY (`domain_id` )
    REFERENCES `domains` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_connections_connection_types1`
    FOREIGN KEY (`connection_type_id` )
    REFERENCES `connection_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plock`.`contacts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `contacts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `customer_id` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `phone` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_contacts_customers1` (`customer_id` ASC) ,
  CONSTRAINT `fk_contacts_customers1`
    FOREIGN KEY (`customer_id` )
    REFERENCES `customers` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plock`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `role` VARCHAR(20) NOT NULL ,
  `hash_change_password` VARCHAR(255) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `plock`.`connection_types`
-- -----------------------------------------------------
INSERT INTO `connection_types` (`id`, `name`) VALUES (NULL, 'DB');
INSERT INTO `connection_types` (`id`, `name`) VALUES (NULL, 'FTP');


-- -----------------------------------------------------
-- Data for table `plock`.`users`
-- -----------------------------------------------------
INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `role`, `hash_change_password`, `created`, `modified`) VALUES (NULL, 'admin', 'e7ec0fb155b345bebf66ab65e379c434d761345e', 'admin@admin.com', 'admin', 'admin', NULL, NULL, NULL);
