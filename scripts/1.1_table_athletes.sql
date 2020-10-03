CREATE TABLE `Athlete`(
	`id` INT NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(40) NOT NULL,
    `lastname` VARCHAR(40) NOT NULL,
    `dob` DATE,
    `teamid` INT NOT NULL DEFAULT 1,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`teamId`) REFERENCES teams(`id`)
);