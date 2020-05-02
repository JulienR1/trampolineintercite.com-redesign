<?php

abstract class Pages{
    const INDEX = 0;
    const ACTIVITES = 1;
    const ACTIVITES_DETAILS = 2;

    public static function GetCurrentPage(){
        $pageURL = $_SERVER['REQUEST_URI'];
    
        if(strpos($pageURL,"index") || $pageURL == "/")
            return Pages::INDEX;
        if(strpos($pageURL,"activites-details"))
            return Pages::ACTIVITES_DETAILS;
    }
}

?>