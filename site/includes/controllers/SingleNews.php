<?php

class SingleNews extends Controller
{
    public static $img;

    public static function CreateView($subpage)
    {
        self::$img = "2020/doje.jpg";

        self::CreateInfo();
        parent::CreateView("singlenews");
    }

    private static function CreateInfo()
    {
        parent::$info = new PageInfo();
        parent::$info->setTitle("Trampoline Intercité | TITRE ICI");
        parent::$info->setCss("singlenews/singlenews.css", "singlenews/resulttable.css");
    }

    public static function GetTextHtml()
    {
        return "<p class=\"lato thin\">Paragraph no 1 text text</p><p class=\"lato thin\">Paragraph no 2 text text</p>";
    }

    public static function GetResultTable()
    {
        return "";
    }

}