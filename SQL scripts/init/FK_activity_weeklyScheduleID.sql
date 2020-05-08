ALTER TABLE `trampolineintercite`.`activity` 
ADD INDEX `FK_activity_weekly_schedule_idx` (`WeeklyScheduleID` ASC) VISIBLE;
;
ALTER TABLE `trampolineintercite`.`activity` 
ADD CONSTRAINT `FK_activity_weeklyScheduleID`
  FOREIGN KEY (`WeeklyScheduleID`)
  REFERENCES `trampolineintercite`.`weekly_schedule` (`ID`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
