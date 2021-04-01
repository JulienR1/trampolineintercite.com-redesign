<?php

class mSchedule extends DatabaseHandler
{

    public function GetAllActivities()
    {
        $sql = "SELECT DISTINCT activities.id, title
                FROM activities, activitytostats, activitystats
                WHERE activities.id = activityId AND activityStats.id = statsId AND sessionId = GetCurrentSession()";
        return parent::query($sql);
    }

    public function IsActivityValid($activityIds)
    {
        $strTemplates = str_repeat("?, ", sizeof($activityIds) - 1) . "?";
        $sql = "SELECT COUNT(activityId) > 0 AS isValid
                FROM activitytostats, activitystats
                WHERE statsId = activitystats.id AND sessionId = GetCurrentSession() AND activityId IN (" . $strTemplates . ")";

        return parent::query($sql, ...$activityIds);
    }

    public function GetUnfilteredActivityData()
    {
        $sql = "SELECT title, weekday, startTime, endTime, cost, color, activities.desc, GetWeekCount(weekday, sessionId) AS lessonCount
                FROM activitystats, activitytostats, activities
                WHERE statsId = activitystats.id AND activities.id = activityId
                ORDER BY weekday, startTime";
        return parent::query($sql);
    }

    public function GetFilteredActivityData($activityIds)
    {
        $strTemplates = str_repeat("?, ", sizeof($activityIds) - 1) . "?";
        $sql = "SELECT title, weekday, startTime, endTime, cost, color, activities.desc, GetWeekCount(weekday, sessionId) AS lessonCount
                FROM activitytostats, activitystats, activities
                WHERE statsId = activitystats.id AND sessionId = GetCurrentSession() AND activities.id = activityId AND activityId IN (" . $strTemplates . ")
                ORDER BY weekday, startTime";

        return parent::query($sql, ...$activityIds);
    }

}