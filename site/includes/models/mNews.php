<?php

class mNews extends DatabaseHandler
{

    public function GetSeasonBoundaries()
    {
        $sql = "SELECT * FROM seasondates";
        return parent::query($sql);
    }

    public function GetMonthNews()
    {
        $sql = 'SELECT * FROM monthnews';
        return parent::query($sql);
    }

    public function GetSeasonNews()
    {
        $sql = 'SELECT * FROM seasonnews';
        return parent::query($sql);
    }

    public function GetAllNews()
    {
        $sql = 'SELECT * FROM allnews';
        return parent::query($sql);
    }

    public function GetActivities()
    {
        $sql = "SELECT title, teamId FROM activities, activitiesToTeams WHERE isCompetitive = TRUE AND activityId = id ORDER BY priority";
        return parent::query($sql);
    }

}