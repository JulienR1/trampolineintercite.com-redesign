<?php

class News extends Controller
{
    public static $monthNews = array();
    private static $seasonNews = array();
    private static $allNews = array();
    private static $activityFilters = array();

    public static $seasonStart, $seasonEnd;

    public static function CreateView($viewName)
    {
        $model = new mNews();
        self::GetSeasonDates($model);
        self::$monthNews = $model->GetMonthNews();
        self::$seasonNews = $model->GetSeasonNews();
        self::$allNews = $model->GetAllNews();

        self::$activityFilters = $model->GetActivities();

        self::CreateInfo();
        parent::CreateView($viewName);
    }

    private static function CreateInfo()
    {
        parent::$info = new PageInfo();
        parent::$info->setTitle("Trampoline Intercité | Actualités");
        parent::$info->setCss("news/news.css");
        parent::$info->setJs("news/newsFilter.js");
    }

    private static function GetSeasonDates($model)
    {
        $dates = $model->GetSeasonBoundaries()[0];
        self::$seasonStart = $dates["startDate"];
        self::$seasonEnd = $dates["endDate"];
    }

    public static function GetMonthNews()
    {
        return self::GetNews(self::$monthNews);
    }

    public static function GetSeasonNews()
    {
        return self::GetNews(self::$seasonNews);
    }

    public static function GetAllNews()
    {
        return self::GetNews(self::$allNews);
    }

    private static function GetNews($news)
    {
        if (!(sizeof($news) === 1 && $news[0]["id"] === null)) {
            $html = "";
            foreach ($news as $singleNews) {
                $html .= self::GetNewsHtml($singleNews);
            }
            return $html;
        } else {
            return self::GetNoNewsHtml();
        }
    }

    private static function GetNewsHtml($singleNews)
    {
        $html = '<article teams="' . $singleNews["teams"] . '">';
        $html .= '<a href="/news/' . $singleNews["pageLink"] . '" class="bg-shadow">';
        $html .= '<img src="/assets/news/' . $singleNews["photo"] . '" alt="">';
        $html .= '<div class="infos">';
        $html .= '<p class="date lato light">' . $singleNews["date"] . '</p>';
        $html .= '<p class="lato medium">' . $singleNews["title"] . '</p>';
        $html .= '</div></a><div class="curtain"></div></article>';
        return $html;
    }

    private static function GetNoNewsHtml()
    {
        return '<p class="lato thin">Aucune nouvelle à afficher pour l\'instant</p>';
    }

    public static function GetFiltersHtml()
    {
        $html = "";
        foreach (self::$activityFilters as $activity) {
            $html .= self::GetSingleFilterHtml($activity);
        }
        return $html;
    }

    public static function GetSingleFilterHtml($filter)
    {
        $html = "<li>";
        $html .= '<input type="radio" id="' . $filter["teamId"] . '" name="filter" onclick="applyFilter(\'' . $filter["teamId"] . '\')"></input>';
        $html .= '<label for="' . $filter["teamId"] . '">';
        $html .= '<div class="radio"><div class="outer"><div class="inner"></div></div></div>';
        $html .= '<span class="lato thin">' . $filter["title"] . '</span>';
        $html .= "</label></li>";
        return $html;
    }

}