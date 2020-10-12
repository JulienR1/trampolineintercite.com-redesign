CREATE TABLE `activitytostats`(
    `activityId` INT NOT NULL,
    `statsId` INT NOT NULL,
    FOREIGN KEY(`activityId`) REFERENCES activities(`id`),
    FOREIGN KEY(`statsId`) REFERENCES activitystats(`id`)
);