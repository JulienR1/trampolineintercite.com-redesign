CREATE TABLE `activitystats`(
`id` INT NOT NULL AUTO_INCREMENT,
`cost` FLOAT NOT NULL,
`weekday` TINYINT NOT NULL,
`startTime` TIME NOT NULL,
`endTime` TIME NOT NULL,
`sessionId` INT NOT NULL,
PRIMARY KEY(`id`),
FOREIGN KEY(`sessionId`) REFERENCES sessions(`id`)
);