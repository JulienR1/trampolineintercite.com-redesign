create table `activitiesToTeams`(
`activityId` INT NOT NULL,
`teamId` INT NOT NULL,
FOREIGN KEY(`activityId`) REFERENCES activities(`id`),
FOREIGN KEY(`teamId`) REFERENCES teams(`id`)
);