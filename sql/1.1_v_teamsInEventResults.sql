DROP VIEW IF EXISTS teamsInEventResults;
CREATE VIEW teamsInEventResults AS
SELECT DISTINCT eventresultsid, teamId
FROM eventresults, athletetoeventresults, category
WHERE categoryId = category.id AND eventresultsid = eventresults.id;