<?php

class mActivity extends DatabaseHandler
{

    public function GetAffiliationForSeason()
    {
        // check pour la session en cours (1), la prochaine saison (2) ou la derniere saison (3)
    }

    public function GetActivities()
    {
        $sql = "SELECT * FROM allactivitydata";
        return parent::query($sql);
    }
}