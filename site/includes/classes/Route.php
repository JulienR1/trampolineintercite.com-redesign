<?php
class Route
{
    public static $validRoutes = array();

    public static function set($route, $callback)
    {
        self::$validRoutes[] = $route;

        if ($_GET["url"] == $route) {
            session_start();
            $_SESSION["currentPage"] = $route;
            $callback->__invoke();
        }
    }
}