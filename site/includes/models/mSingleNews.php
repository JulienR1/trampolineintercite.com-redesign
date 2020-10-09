<?php

class mSingleNews extends DatabaseHandler
{
    private $subpage;

    public function __construct($subpage)
    {
        $this->subpage = $subpage;
    }

    public function GetNewsData()
    {
        $sql = "SELECT title, text, photo, date, resultId
                FROM news
                WHERE pageLink = ?";
        return parent::query($sql, "s", $this->subpage);
    }

    public function GetDisciplines($eventId)
    {

    }

    public function GetCategories($eventId)
    {

    }

    public function GetTableData($eventId)
    {

    }

}