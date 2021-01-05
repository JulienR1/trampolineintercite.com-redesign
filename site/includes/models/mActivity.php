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
}