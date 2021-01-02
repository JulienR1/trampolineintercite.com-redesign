CREATE VIEW `seasonnews` AS
SELECT news.*
FROM news, seasondates
WHERE date >= startDate AND date < endDate AND date < DATE_FORMAT(CURDATE(),"%Y-%m-01")
ORDER BY date