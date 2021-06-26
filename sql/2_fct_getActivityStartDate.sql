DROP FUNCTION IF EXISTS GetActivityStartDate;

DELIMITER //
CREATE FUNCTION GetActivityStartDate(weekday TINYINT, targetSessionId INT)
RETURNS DATE
DETERMINISTIC
BEGIN

    DECLARE weekStartDate DATE DEFAULT NOW();

    CALL CreateTemporarySeasonDates(targetSessionId);

SELECT SUBDATE(startDate, DAYOFWEEK(startDate)-1)
FROM (
		SELECT MIN(dt) AS startDate
    FROM seasonDates
    WHERE DAYOFWEEK(dt)-1 = weekday) AS A
INTO weekStartDate;

DROP TEMPORARY TABLE IF EXISTS seasonDates;

RETURN weekStartDate;

END;
//
DELIMITER ;