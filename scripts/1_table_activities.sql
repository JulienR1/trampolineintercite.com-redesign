CREATE TABLE `activities`(
	`id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(60) NOT NULL,
    `subtitle` VARCHAR(100),
    `desc` VARCHAR(40),
    `img` VARCHAR(40),
    PRIMARY KEY(`id`)
);