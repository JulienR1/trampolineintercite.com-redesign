<?php

class mSingleNews extends DatabaseHandler
{
    public function GetNewsData($subpage)
    {
        $sql = "SELECT title, text, photo, date, resultId
                FROM news
                WHERE pageLink = ?";
        return parent::query($sql, $subpage);
    }

    public function GetDisciplines($eventId)
    {
        $sql = "SELECT disciplineid, title
                FROM athletetoeventresults, discipline
                WHERE eventresultsid = ? AND discipline.id = disciplineid
                GROUP BY disciplineid";
        return parent::query($sql, $eventId);
    }

    public function GetCategories($eventId)
    {
        $sql = "SELECT categoryid, title
                FROM athletetoeventresults, category
                WHERE eventresultsid = ? AND category.id = categoryid
                GROUP BY categoryid
                ORDER BY priority DESC";
        return parent::query($sql, $eventId);
    }

    public function GetTableName($eventId)
    {
        $sql = "SELECT tableName FROM eventResults WHERE id = ?";
        return parent::query($sql, $eventId)[0]["tableName"];
    }

    public function GetTableData($eventId)
    {
        $query = parent::querySP("CALL GetEventResultsTable(?, @query)", "@query", $eventId)["@query"];
        return parent::query($query);
    }

}