<?php

class Controller
{
    public static $info;
    private static $partners;

    public static $fileVersion = 1;

    public static function CreateView($viewName)
    {
        $footerModel = new mFooter();
        self::$partners = $footerModel->GetPartners();

        require_once "includes/views/header.php";
        require_once "includes/views/$viewName.php";
        require_once "includes/views/footer.php";
    }

    public static function GetPartnersHtml()
    {
        $html = "";
        if (self::$partners != null) {
            $html .= "<ul>";
            foreach (self::$partners as $partner) {
                $html .= '<li><a href="' . $partner["websiteLink"] . '" target="_blank"><img src="/assets/partners/' . $partner["img"] . '" alt="' . $partner["partnerName"] . '"></a></li>';
            }
            $html .= "</ul>";
        }
        return $html;
    }
}