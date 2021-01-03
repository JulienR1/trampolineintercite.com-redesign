CREATE TABLE `offdays`
(
	`id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR
(60) NOT NULL,
    `date` DATE NOT NULL,
    `sessionId` INT NOT NULL,
    PRIMARY KEY
(`id`),
    FOREIGN KEY
(`sessionId`) REFERENCES sessions
(`id`)
);