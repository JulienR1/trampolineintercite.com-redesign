DROP VIEW IF EXISTS allnews;
CREATE VIEW `allnews` AS
SELECT news.*, GROUP_CONCAT(teamId SEPARATOR ',') AS teams
FROM news, seasondates, teamsineventresults
WHERE date < startDate AND eventresultsid = resultId
ORDER BY date