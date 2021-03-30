<?php

class Schedule extends Controller
{
    private static $model = null;
    public static $activities = array();

    public static function CreateView($viewName)
    {
        self::$model = new mSchedule();

        if (isset($_GET["activityIds"]) && !empty($_GET["activityIds"])) {
            $ids = array();
            for ($i = 0; $i < sizeof($_GET["activityIds"]); $i++) {
                $ids[] = intval($_GET["activityIds"][$i]);
            }
            echo self::GetScheduleForActivity($ids);
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
        parent::$info->setCss("loader/loader.css", "schedule/schedule.css", "schedule/calendar.css");
        parent::$info->setJs("schedule/infoContainer.js", "schedule/scheduleBuilder.js", "schedule/scheduleFitter.js");
    }

    private static function GetScheduleForActivity($activityIds)
    {
        $isActivityValidDatatable = self::$model->IsActivityValid($activityIds);
        if ($isActivityValidDatatable !== null && sizeof($isActivityValidDatatable) === 1) {
            if ($isActivityValidDatatable[0]["isValid"]) {
                return self::GetSchedulJSON($activityIds);
            }
        }

        return self::GetAllActivityData();
    }

    private static function GetAllActivityData()
    {
        $activityData = self::$model->GetUnfilteredActivityData();
        $activityData = self::ApplyRenderingFilters($activityData);
        return json_encode($activityData);
    }

    private static function GetSchedulJSON($activityIds)
    {
        $activityData = self::$model->GetFilteredActivityData($activityIds);
        $activityData = self::ApplyRenderingFilters($activityData);
        return json_encode($activityData);
    }

    private static function ApplyRenderingFilters($activities)
    {
        $currentWeekday = 0;
        $weekdayTimePairs = array("start" => array(), "end" => array());
        for ($i = 0; $i < sizeof($activities); $i++) {
            if ($currentWeekday != $activities[$i]["weekday"]) {
                $currentWeekday = $activities[$i]["weekday"];
                $weekdayTimePairs = array("start" => array(), "end" => array());
                $overlapIndex = 0;
            }

            if (sizeof($weekdayTimePairs["start"]) > 0) {
                // adjacent filter
                if (strtotime($activities[$i]["startTime"]) === $weekdayTimePairs["start"][sizeof($weekdayTimePairs["start"]) - 1]) {
                    $activities[$i]["adjacent"] = 1;
                    $activities[$i - 1]["adjacent"] = 1;
                }

                // overlap filter
                $overlapIndex = 0;
                $adjacentCount = 0;
                for ($j = 0; $j < sizeof($weekdayTimePairs["end"]); $j++) {
                    if ($weekdayTimePairs["start"][$j] !== strtotime($activities[$i]["startTime"])) {
                        if ($weekdayTimePairs["end"][$j] > strtotime($activities[$i]["startTime"])) {
                            $overlapIndex++;
                            if (isset($activities[$j]["adjacent"]) && $activities[$j]["adjacent"] === 1) {
                                $adjacentCount++;
                            }
                        }
                    }
                }
                $activities[$i]["overlap"] = min($overlapIndex - ($adjacentCount > 0 ? $adjacentCount - 1 : 0), 3);
            }

            $weekdayTimePairs["start"][] = strtotime($activities[$i]["startTime"]);
            $weekdayTimePairs["end"][] = strtotime($activities[$i]["endTime"]);
        }
        return $activities;
    }

}