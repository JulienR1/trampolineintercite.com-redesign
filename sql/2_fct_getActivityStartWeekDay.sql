DROP FUNCTION IF EXISTS GetActivityStartDate;

DELIMITER //
CREATE FUNCTION GetActivityStartDate(weekday TINYINT, targetSessionId INT)
RETURNS DATE
DETERMINISTIC
BEGIN

    DECLARE weekStartDate DATE DEFAULT NOW
    ();

    DROP TEMPORARY TABLE
    IF EXISTS seasonDates;
CREATE TEMPORARY TABLE seasonDates
WITH RECURSIVE sample
(dt) AS
    (
        SELECT startDate AS dt
    FROM sessions
    WHERE sessions.id = targetSessionId
UNION ALL
    SELECT DATE_ADD(dt, INTERVAL
1 DAY)
        FROM sample, sessions
        WHERE DATE_ADD
(dt, INTERVAL 1 DAY) <= endDate AND sessions.id = targetSessionId
    )
SELECT dt
FROM sample;

DELETE FROM seasonDates
    WHERE dt IN (SELECT date
FROM offdays
WHERE sessionId = targetSessionId);

SELECT SUBDATE(startDate, DAYOFWEEK(startDate)-1)
FROM (
		SELECT MIN(dt) AS startDate
    FROM seasonDates
    WHERE DAYOFWEEK(dt)-1 = weekday) AS A
INTO weekStartDate;

DROP TEMPORARY TABLE
IF EXISTS seasonDates;

RETURN weekStartDate;

END;
//
DELIMITER ;