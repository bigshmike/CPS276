CREATE TABLE `admins` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `status` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`id`));