<?php

class PageNav
{
    public $name;
    public $link;
    public $classes;
    public $children;

    public function __construct($name, $link, $classes = null, $children = null)
    {
        $this->name = $name;
        $this->link = $link;
        $this->classes = $classes;
        $this->children = $children;
    }

    public function getHtml()
    {
        $pageHtml = "<li " . ($this->classes != null ? $this->classes : "") . ">";
        $pageHtml .= '<a href="' . $this->link . '">' . $this->name . '</a>';
        if ($this->children != null) {
            $pageHtml .= Navigation::getNavArrayHtml($this->children);
        }
        $pageHtml .= "</li>";
        return $pageHtml;
    }
}