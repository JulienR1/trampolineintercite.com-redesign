<?php

class News extends Controller{

    private static $monthNews = array();
    private static $seasonNews = array();
    private static $allNews = array();

    public static $seasonStart, $seasonEnd;

    public static function CreateView($viewName)
    {
        self::$seasonStart = "2020-10-11";
        self::$seasonEnd = "2021-10-10";

        self::CreateInfo();
        parent::CreateView($viewName);
    }

    private static function CreateInfo()
    {
        parent::$info = new PageInfo();
        parent::$info->setTitle("Trampoline Intercité | Actualités");
        parent::$info->setCss("news/news.css?v=1");
    }

    public static function GetMonthNews(){
        return self::GetNews(self::$monthNews);
    }

    public static function GetSeasonNews(){
        return self::GetNews(self::$seasonNews);
    }

    public static function GetAllNews(){
        return self::GetNews(self::$allNews);
    }

    private static function GetNews($news){
        if($news != null){
            $html = "";
            foreach($news as $singleNews){
                $html .= GetNewsHtml($news);
            }
            return $html;
        }else{
            return self::GetNoNewsHtml();
        }
    }

    private static function GetNewsHtml($singleNews){
        return "";
    }

    private static function GetNoNewsHtml(){
        return "NO NEWS BB!";
    }

}