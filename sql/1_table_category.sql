CREATE TABLE `category`
(
	`id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(40),
    `priority` INT NOT NULL,
    `teamId` INT NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`teamId`) REFERENCES teams(`id`)
);