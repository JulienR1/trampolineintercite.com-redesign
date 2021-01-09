<?php

class Contact extends Controller
{
    public static function CreateView($viewName)
    {
        self::CreateInfo();
        parent::CreateView($viewName);
    }

    private static function CreateInfo()
    {
        parent::$info = new PageInfo();
        parent::$info->setTitle("Trampoline Intercité | Contact");
        parent::$info->setCss("contact/contact.css");
    }
}