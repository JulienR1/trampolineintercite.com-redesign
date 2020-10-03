CREATE TABLE `athletetoeventresults`(
	`athleteid` INT NOT NULL,
    `disciplineid` INT NOT NULL,
    `categoryid` INT NOT NULL,
    `eventresultsid` INT NOT NULL,
    `result` INT UNSIGNED NOT NULL,
    FOREIGN KEY(`athleteid`) REFERENCES athlete(`id`),
    FOREIGN KEY(`disciplineid`) REFERENCES discipline(`id`),
    FOREIGN KEY(`categoryid`) REFERENCES category(`id`),
    FOREIGN KEY(`eventresultsid`) REFERENCES eventresults(`id`)
);