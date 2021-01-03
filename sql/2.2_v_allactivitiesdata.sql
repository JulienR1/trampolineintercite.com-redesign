DROP VIEW IF EXISTS allactivitydata;
CREATE VIEW allactivitydata
AS
    SELECT A.id,
        title,
        subtitle,
        A.DESC,
        img,
        MIN(cost) AS minCost,
        MAX(cost) AS maxCost,
        CAST(MIN(endTime - startTime) AS TIME) AS minDuration,
        CAST(MAX(endTime - startTime) AS TIME) AS maxDuration,
        MIN(weekCount) AS minWeekCount,
        MAX(weekCount) AS maxWeekCount
    FROM (
	SELECT activities.*, cost, startTime, endTime, GetWeekCount(weekday, sessionId) AS weekCount
        FROM activityStats
            JOIN activitytostats ON statsId = activityStats.id AND sessionId = GetCurrentSession()
            JOIN activities ON activities.id = activityId
) AS A
    GROUP BY A.id;