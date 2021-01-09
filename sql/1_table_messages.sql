CREATE TABLE `messages`
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(128) NOT NULL,
  `startdate` DATE NOT NULL,
  `enddate` DATE NOT NULL,
  `text` VARCHAR(45) NOT NULL,
  PRIMARY KEY(`id`));