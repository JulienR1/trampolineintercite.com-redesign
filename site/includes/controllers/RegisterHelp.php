<?php

class RegisterHelp extends Controller
{
    public static function CreateView($viewName)
    {
        self::CreateInfo();
        // do stuff here
        parent::CreateView($viewName);
    }

    private static function CreateInfo()
    {
        parent::$info = new PageInfo();
        parent::$info->setTitle("Trampoline Intercité | Comment s'inscrire");
        parent::$info->setCss("registerHelp/registerHelp.css?v=1");
    }
}