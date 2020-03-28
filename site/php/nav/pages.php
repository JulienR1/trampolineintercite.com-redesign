<?php

abstract class Pages{
    const INDEX = 0;

    public static function GetCurrentPage(){
        $pageURL = $_SERVER['REQUEST_URI'];
    
        if(strpos($pageURL,"index") || $pageURL == "/")
            return Pages::INDEX;
    }
}

?>