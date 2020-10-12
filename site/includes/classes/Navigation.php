<?php

class Navigation
{
    private static function nav()
    {
        return array(
            new PageNav("Accueil", "/", "footer-only"),
            new PageNav("À propos", "#", null, array(
                new PageNav("Actualités", "/news"),
                new PageNav("Règlements", "#"),
                new PageNav("Annonces", "/messages"),
            )),
            new PageNav("Activités", "/activities", null, array(
                new PageNav("Récréatif", "/activities/details#recreative"),
                new PageNav("Fête d'enfants", "/activities/details#parties"),
                new PageNav("Compétitif", "/activities/details#competitive"),
                new PageNav("Comment s'inscrire", "/registration-help"),
            )),
            new PageNav(self::logoImage(), "/", "header-only nav-logo"),
            new PageNav("Horaire", "#"),
            new PageNav("Contact", "/contact"),
        );
    }

    public static function includeNav()
    {
        $html = "<nav>";
        $html .= self::getNavArrayHtml(self::nav());
        $html .= "</nav>";
        return $html;
    }

    public static function getNavArrayHtml($arr, $subMenu = false)
    {
        $arrHtml = "<ul" . ($subMenu ? ' class="bg-shadow-desktop"' : "") . ">";
        foreach ($arr as $pageNav) {
            $arrHtml .= $pageNav->getHtml();
        }
        $arrHtml .= "</ul>";
        return $arrHtml;
    }

    private static function logoImage()
    {
        return '<img src="/assets/img/logo.png" alt="Logo">';
    }
}