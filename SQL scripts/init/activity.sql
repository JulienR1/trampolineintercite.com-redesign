CREATE TABLE `trampolineintercite`.`activity` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Name` NVARCHAR(128) NOT NULL,
  `CostMin` FLOAT NOT NULL,
  `CostMax` FLOAT NULL DEFAULT 0,
  `Description` VARCHAR(64) NOT NULL,
  `DescriptionDetail` MEDIUMTEXT NULL,
  `Quantity` INT NOT NULL,
  `WeeklyScheduleID` INT NOT NULL,
  PRIMARY KEY (`ID`));
