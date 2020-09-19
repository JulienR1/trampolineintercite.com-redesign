<?php

class Navigation
{
    private static function nav()
    {
        return array(
            new PageNav("Accueil", "/", "footer-only"),
            new PageNav("À propos", "#", null, array(
                new PageNav("Actualités", "#"),
                new PageNav("Règlements", "#"),
                new PageNav("Annonces", "#"),
            )),
            new PageNav("Activités", "#", null, array(
                new PageNav("Récréatif", "#"),
                new PageNav("Fête d'enfants", "#"),
                new PageNav("Compétitif", "#"),
                new PageNav("Comment s'inscrire", "#"),
            )),
            new PageNav(self::logoImage(), "/", "header-only"),
            new PageNav("Horaire", "#"),
            new PageNav("Contact", "#"),
        );
    }

    public static function includeNav()
    {
        $html = "<nav>";
        $html .= self::getNavArrayHtml(self::nav());
        $html .= "</nav>";
        return $html;
    }

    public static function getNavArrayHtml($arr)
    {
        $arrHtml = "<ul>";
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