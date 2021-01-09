DROP VIEW IF EXISTS monthnews;
CREATE VIEW `monthnews` AS
SELECT news.*, GROUP_CONCAT(teamId SEPARATOR ',') AS teams
FROM news, teamsineventresults
WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) AND eventresultsid = resultId
ORDER BY date