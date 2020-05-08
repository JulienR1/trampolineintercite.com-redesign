CREATE TABLE `trampolineintercite`.`weekly_schedule` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `WeekDay` INT NOT NULL DEFAULT 0 COMMENT '0: dimanche\n...\n6: samedi',
  `StartTime` TIME NOT NULL,
  `EndTime` TIME NOT NULL,
  `StartDate` DATE NOT NULL,
  `EndDate` DATE NOT NULL,
  PRIMARY KEY (`ID`));
