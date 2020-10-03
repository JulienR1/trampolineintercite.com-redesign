DELIMITER $$

CREATE PROCEDURE GetSeasonDates(
	OUT startDate DATE,
    OUT endDate DATE
)	
BEGIN
	IF(MONTH(CURDATE()) <= 10) THEN
		SET startDate = STR_TO_DATE(CONCAT(YEAR(CURDATE()) - 1, " 11 1"), "%Y %c %d");
        SET endDate = STR_TO_DATE(CONCAT(YEAR(CURDATE()), " 10 31"), "%Y %c %d");
	ELSEIF(MONTH(CURDATE()) > 10) THEN
		SET startDate = STR_TO_DATE(CONCAT(YEAR(CURDATE()), " 11 1"), "%Y %c %d");
        SET endDate = STR_TO_DATE(CONCAT(YEAR(CURDATE()) + 1, " 10 31"), "%Y %c %d");
	END IF;
END $$

DELIMITER ;