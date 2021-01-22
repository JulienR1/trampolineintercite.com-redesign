<?php

class Schedule extends Controller
{
    private static $model = null;
    public static $activities = array();

    public static function CreateView($viewName)
    {
        self::$model = new mSchedule();

        if (isset($_GET["filterActivity"]) && !empty($_GET["filterActivity"])) {
            echo self::GetScheduleForActivity($_GET["filterActivity"]);
            return;
        }

        self::$activities = self::$model->GetAllActivities();

        self::CreateInfo();
        parent::CreateView($viewName);
    }

    private static function CreateInfo()
    {
        parent::$info = new PageInfo();
        parent::$info->setTitle("Trampoline Intercité | Horaire");
        parent::$info->setCss("loader/loader.css");
        parent::$info->setJs("schedule/scheduleBuilder.js");
    }

    private static function GetScheduleForActivity($activityId)
    {
        $activityId = intval($activityId);
        if ($activityId === -1) {
            return self::GetAllActivityData();
        }

        $isActivityValidDatatable = self::$model->IsActivityValid($activityId);
        if ($isActivityValidDatatable !== null && sizeof($isActivityValidDatatable) === 1) {
            if ($isActivityValidDatatable[0]["isValid"]) {
                return self::GetScheduleHtml($activityId);
            }
        }
        return "error";
    }

    private static function GetAllActivityData()
    {
        $activityData = self::$model->GetUnfilteredActivityData();
        return json_encode($activityData);
    }

    private static function GetScheduleHtml($activityId)
    {
        $activityData = self::$model->GetFilteredActivityData($activityId);
        return json_encode($activityData);
    }

}