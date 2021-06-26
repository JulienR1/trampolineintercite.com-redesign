DROP FUNCTION IF EXISTS GetActivityEndDate;

DELIMITER //
CREATE FUNCTION GetActivityEndDate(weekday TINYINT, targetSessionId INT)
RETURNS DATE
DETERMINISTIC
BEGIN

    DECLARE weekEndDate DATE DEFAULT NOW();

    CALL CreateTemporarySeasonDates(targetSessionId);

    SELECT SUBDATE(startDate, DAYOFWEEK(startDate)-1)
    FROM (
            SELECT MAX(dt) AS startDate
        FROM seasonDates
        WHERE DAYOFWEEK(dt)-1 = weekday) AS A
    INTO weekEndDate;

    DROP TEMPORARY TABLE IF EXISTS seasonDates;

    RETURN weekEndDate;

END;
//
DELIMITER ;