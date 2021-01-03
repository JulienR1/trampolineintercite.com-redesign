DROP FUNCTION IF EXISTS GetCurrentSession;
DELIMITER //
CREATE FUNCTION GetCurrentSession()
RETURNS INT
DETERMINISTIC
BEGIN

  RETURN (
		SELECT id
  FROM (
			SELECT id, DATEDIFF(startDate, NOW()) AS ds, DATEDIFF(endDate, NOW()) AS de
    FROM sessions
    ORDER BY de = 0 DESC, SIGN(de) DESC, LEAST(ABS(ds), abs(de))
        ) AS A
  LIMIT 1
    );

END;
//
DELIMITER ;