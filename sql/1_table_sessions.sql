CREATE TABLE `sessions`
(
	`id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR
(60) NOT NULL,
    `startDate` DATE NOT NULL,
    `endDate` DATE NOT NULL,
    PRIMARY KEY
(`id`)
);