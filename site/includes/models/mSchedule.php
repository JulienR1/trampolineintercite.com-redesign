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

    public function IsActivityValid($activityId)
    {
        $sql = "SELECT COUNT(activityId) > 0 AS isValid
                FROM activitytostats, activitystats
                WHERE statsId = activitystats.id AND sessionId = GetCurrentSession() AND activityId = ?";
        return parent::query($sql, $activityId);
    }

    public function GetUnfilteredActivityData()
    {
        $sql = "SELECT title, weekday, startTime, endTime, cost
                FROM activitystats, activitytostats, activities
                WHERE statsId = activitystats.id AND activities.id = activityId
                ORDER BY weekday, startTime";
        return parent::query($sql);
    }

    public function GetFilteredActivityData($activityId)
    {
        $sql = "SELECT title, weekday, startTime, endTime, cost
                FROM activitytostats, activitystats, activities
                WHERE statsId = activitystats.id AND sessionId = GetCurrentSession() AND activities.id = activityId AND activityId = ?
                ORDER BY weekday, startTime";
        return parent::query($sql, $activityId);
    }

}