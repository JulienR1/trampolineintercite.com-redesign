DROP FUNCTION IF EXISTS GetWeekCount;

DELIMITER //
CREATE FUNCTION GetWeekCount(targetWeekday INT, sessionId INT)
RETURNS INT
DETERMINISTIC
BEGIN

    RETURN (
		SELECT WEEK(weekEndDay) - WEEK(weekStartDay) - IFNULL(offdayCount, 0) + 1
    FROM (
			SELECT DATE_ADD(startDate, INTERVAL (targetWeekday - DAYOFWEEK(startDate) + 1) DAY) AS weekStartDay,
        DATE_ADD(endDate, INTERVAL MOD(targetWeekDay + DAYOFWEEK(endDate) - 8
    , 7) DAY) AS weekEndDay, id
			FROM sessions
            WHERE sessions.id = sessionId
        ) AS A
        LEFT JOIN
    (
			SELECT sessionId, COUNT(*) AS offdayCount
    FROM offdays
    WHERE DAYOFWEEK(date) - 1 = targetWeekday
        )
    AS B ON A.id = B.sessionId
    );

END;
//
DELIMITER ;