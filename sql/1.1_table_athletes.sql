CREATE TABLE `Athlete`
(
	`id` INT NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(40) NOT NULL,
    `lastname` VARCHAR(40) NOT NULL,
    `dob` DATE,
    `pageUrl` VARCHAR(40),
    PRIMARY KEY(`id`)
);