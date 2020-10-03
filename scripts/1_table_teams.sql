CREATE TABLE `teams`(
	`id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(20) NOT NULL,
    `description` LONGTEXT NOT NULL,
    PRIMARY KEY(`id`)
);

INSERT INTO `teams` (`id`, `title`, `descriptions`)
VALUES (NULL, "Undefined", "Default empty team");