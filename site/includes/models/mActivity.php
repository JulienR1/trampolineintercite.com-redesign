<?php

class mActivity extends DatabaseHandler
{

    public function GetAffiliationForSession()
    {
        $sql = "SELECT affiliationCost FROM sessions WHERE id = GetCurrentSession()";
        return parent::query($sql);
    }

    public function GetActivities()
    {
        $sql = "SELECT * FROM allactivitydata";
        return parent::query($sql);
    }

    public function GetCompetitiveActivities()
    {
        $sql = "SELECT * FROM activities WHERE isCompetitive = TRUE ORDER BY priority";
        return parent::query($sql);
    }
}