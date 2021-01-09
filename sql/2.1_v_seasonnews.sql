DROP VIEW IF EXISTS seasonnews;
CREATE VIEW `seasonnews` AS
SELECT news.*, GROUP_CONCAT(teamId SEPARATOR ','') AS teams
FROM news, seasondates, teamsineventresults
WHERE date >= startDate AND date < endDate AND date < DATE_FORMAT(CURDATE(),"%Y-%m-01") AND eventresultsid = resultId
ORDER BY date