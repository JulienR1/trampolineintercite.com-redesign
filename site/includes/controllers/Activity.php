<?php

class Activity extends Controller
{

    public static $affiliationCost = 29;
    private static $activityData = array();

    public static function CreateView($viewName)
    {
        $model = new mActivity();
        self::$activityData = $model->GetActivities();

        self::CreateInfo();
        parent::CreateView($viewName);
    }

    private static function CreateInfo()
    {
        parent::$info = new PageInfo();
        parent::$info->setTitle("Trampoline Intercité | Toutes les activités");
        parent::$info->setCss("activities/activities.css");
    }

    public static function GetActivitiesHtml()
    {
        $html = "";
        foreach (self::$activityData as $activity) {
            $html .= self::GetSingleActivityHtml($activity);
        }
        return $html;
    }

    private static function GetSingleActivityHtml($activity)
    {
        $html = '<div class="activity bg-shadow">';
        $html .= self::GetImgHtml($activity);
        $html .= self::GetDataHtml($activity);
        $html .= '</div>';
        return $html;
    }

    private static function GetImgHtml($activity)
    {
        if ($activity["img"] !== null) {
            $html = '<div class="img-container">';
            $html .= '<img src="/assets/activities/' . $activity["img"] . '">';
            $html .= '</div>';
            return $html;
        } else {
            return "";
        }
    }

    private static function GetDataHtml($activity)
    {
        $html = '<div class="data-container">';
        $html .= self::GetTitles($activity);
        $html .= self::GetDescription($activity);
        $html .= self::GetStats($activity);
        $html .= '</div>';
        return $html;
    }

    private static function GetTitles($activity)
    {
        $html = '<h4 class="lato bold">' . $activity["title"] . '</h4>';
        if (!empty($activity["subtitle"])) {
            $html .= '<h5 class="lato medium">' . $activity["subtitle"] . '</h5>';
        }
        return $html;
    }

    private static function GetDescription($activity)
    {
        $html = '<div class="desc">';
        $html .= FileHelper::ReadFileAsParagraphs("files/activities/" . $activity["desc"], "lato thin");
        $html .= "</div>";
        return $html;
    }

    private static function GetStats($activity)
    {
        $html = '<div class="stats">';
        $html .= self::GetCost($activity);
        $html .= self::GetHours($activity);
        $html .= self::GetDates($activity);
        $html .= "</div>";
        $html .= '<a href="https://app.sportnroll.com/#/registration/21ef84af-f7c1-4f3e-a182-729a8ca963f8" class="lato bold bg-shadow">S\'inscrire</a>';
        $html .= '<a href="horaire?a=' . $activity['id'] . '" class="lato bold bg-shadow to-schedule">Voir dans l\'horaire</a>';
        return $html;
    }

    private static function GetCost($activity)
    {
        $minCost = round(floatval($activity["minCost"]), 2);
        $maxCost = round(floatval($activity["maxCost"]), 2);

        $html = '<div class="cost">';
        $html .= '<i class="fas fa-dollar-sign"></i>';
        if (intval($minCost) === intval($maxCost)) {
            $html .= '<span class="lato thin">' . $minCost . '$</span>';
        } else {
            $html .= '<span class="lato thin">' . $minCost . ' - ' . $maxCost . '$</span>';
        }
        $html .= '</div>';
        return $html;
    }

    private static function GetHours($activity)
    {
        $maxDuration = date_format(date_create($activity["maxDuration"]), "g:i");
        $minDuration = date_format(date_create($activity["minDuration"]), "g:i");

        $maxDurationStr = str_replace(":", "h", str_replace("00", "", $maxDuration));
        $minDurationStr = str_replace(":", "h", str_replace("00", "", $minDuration));

        $html = '<div class="time">';
        $html .= '<i class="far fa-clock"></i>';
        if (strtotime($maxDuration) === strtotime($minDuration)) {
            $html .= '<span class="lato thin">' . $maxDurationStr . ' par semaine</span>';
        } else {
            $html .= '<span class="lato thin">' . $minDurationStr . ' à ' . $maxDurationStr . ' par semaine</span>';
        }
        $html .= '</div>';
        return $html;
    }

    private static function GetDates($activity)
    {
        $minWeek = intval($activity["minWeekCount"]);
        $maxWeek = intval($activity["maxWeekCount"]);

        $html = '<div class="dates">';
        $html .= '<i class="far fa-calendar-alt"></i>';
        if ($maxWeek === $minWeek) {
            $html .= '<span class="lato thin">' . $maxWeek . ' semaines</span>';
        } else {
            $html .= '<span class="lato thin">' . $minWeek . ' à ' . $maxWeek . ' semaines</span>';
        }
        $html .= '</div>';
        return $html;
    }

}