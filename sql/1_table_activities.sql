CREATE TABLE `activities`(
	`id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(60) NOT NULL,
    `subtitle` VARCHAR(100),
    `desc` VARCHAR(40),
    `img` VARCHAR(40),
    `isCompetitive` BOOLEAN NOT NULL DEFAULT FALSE,
    `priority` INT NOT NULL DEFAULT -1,
    `color` VARCHAR(6),
    PRIMARY KEY(`id`)
);