CREATE TABLE `offdays`(
	`id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(60) NOT NULL,
    `date` DATE NOT NULL,
    `seasonId` INT NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`seasonId`) REFERENCES season(`id`)
);