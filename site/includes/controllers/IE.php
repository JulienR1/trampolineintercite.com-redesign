<?php

class IE extends Controller
{
    public static function CreateView($viewName)
    {
        require "includes/views/$viewName.php";
    }
}