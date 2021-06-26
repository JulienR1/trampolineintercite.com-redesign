DROP PROCEDURE IF EXISTS CreateTemporarySeasonDates;

DELIMITER //
CREATE PROCEDURE CreateTemporarySeasonDates(IN targetSessionId INT)
BEGIN

DROP TEMPORARY TABLE
    IF EXISTS seasonDates;
CREATE TEMPORARY TABLE seasonDates
WITH RECURSIVE sample(dt) AS
    (
		SELECT startDate AS dt
		FROM sessions
		WHERE sessions.id = targetSessionId
	UNION ALL
		SELECT DATE_ADD(dt, INTERVAL 1 DAY)
        FROM sample, sessions
        WHERE DATE_ADD(dt, INTERVAL 1 DAY) <= endDate AND sessions.id = targetSessionId)
	SELECT dt
	FROM sample;

	DELETE FROM seasonDates WHERE dt IN (SELECT date FROM offdays WHERE sessionId = targetSessionId);

END
//
DELIMITER ;