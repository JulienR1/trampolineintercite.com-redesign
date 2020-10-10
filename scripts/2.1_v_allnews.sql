CREATE VIEW `allnews` AS
SELECT news.*
FROM news, seasondates
WHERE date < startDate
ORDER BY date