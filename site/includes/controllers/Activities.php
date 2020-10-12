<?php

class Activities extends Controller{

    public static function CreateView($viewName)
    {
        self::CreateInfo();
        parent::CreateView($viewName);
    }

    private static function CreateInfo()
    {
        parent::$info = new PageInfo();
        parent::$info->setTitle("Trampoline Intercité | Toutes les activités");
        parent::$info->setCss("activities/activity.css");
    }
    
}