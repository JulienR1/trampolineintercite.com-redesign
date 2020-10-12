<?php

class Activity extends Controller{

    public static $affiliationCost = 29;

    public static function CreateView($viewName)
    {
        self::CreateInfo();
        parent::CreateView($viewName);
    }

    private static function CreateInfo()
    {
        parent::$info = new PageInfo();
        parent::$info->setTitle("Trampoline Intercité | Activité");
        parent::$info->setCss("activities/activities.css");
    }

}