CREATE TABLE `activitystats`(
`id` INT NOT NULL AUTO_INCREMENT,
`cost` FLOAT NOT NULL,
`weekday` TINYINT NOT NULL,
`startTime` TIME NOT NULL,
`endTime` TIME NOT NULL,
`seasonId` INT NOT NULL,
PRIMARY KEY(`id`),
FOREIGN KEY(`seasonId`) REFERENCES season(`id`)
);