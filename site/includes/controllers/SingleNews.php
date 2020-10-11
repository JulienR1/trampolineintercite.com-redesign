<?php

class SingleNews extends Controller
{
    public static $img;
    public static $title;
    public static $date;
    private static $textFile;

    public static $hasTable;
    public static $disciplines;
    public static $categories;
    public static $tableName;
    private static $tableData;

    public static function CreateView($subpage)
    {
        $model = new mSingleNews();
        $newsData = $model->GetNewsData($subpage);

        // Provided page does not exist in the database
        // Give control back to route manager to load appropriate page
        if($newsData == NULL){
            return false;
        }

        $newsData = $newsData[0];
        self::$title = $newsData["title"];
        self::$img = $newsData["photo"];
        self::$date = $newsData["date"];
        self::$textFile = $newsData["text"];

        self::$hasTable = $newsData["resultId"] != NULL; 
        if(self::$hasTable){
            self::$disciplines = $model->GetDisciplines($newsData["resultId"]);
            self::$categories = $model->GetCategories($newsData["resultId"]);
            self::$tableName = $model->GetTableName($newsData["resultId"]);
            self::$tableData = $model->GetTableData($newsData["resultId"]);
        }

        self::CreateInfo();
        parent::CreateView("singlenews");
        return true;
    }

    private static function CreateInfo()
    {
        parent::$info = new PageInfo();
        parent::$info->setTitle("Trampoline Intercité | " . self::$title);
        parent::$info->setCss("singlenews/singlenews.css", "singlenews/resulttable.css");
    }

    public static function GetTextHtml()
    {
        return FileHelper::ReadFileAsParagraphs("files/news/".self::$textFile);
    }

    public static function GetResultTable()
    {
        $html = static::GetHeaderHTML();
        $html .= static::GetBodyHTML();
        return $html;
    }

    private static function GetHeaderHTML(){
        $html = "<tr>";
        $html .= static::GetDisciplineHTML("Athlète");
        foreach(static::$disciplines as $discipline){
            $html .= static::GetDisciplineHTML($discipline["title"]);
        }
        $html .= "</tr>";
        return $html;
    }

    private static function GetBodyHTML(){
        $html = "";
        $previousCategory = -1;
        foreach(static::$tableData as $row){
            if($previousCategory == -1 || $previousCategory != $row["categoryid"]){
                $previousCategory = $row["categoryid"];
                $html .= static::GetCategoryHTML($previousCategory);
            }

            $html .= "<tr>";
            $html .= static::GetUserHTML($row["firstname"] . " " . $row["lastname"], $row["pageUrl"]);
            foreach(static::$disciplines as $discipline){
                $html .= static::GetResultHTML($row["d" . $discipline["disciplineid"]]);
            }
            $html .= "</tr>";
        }
        return $html;
    }

    private static function GetCategoryHTML($categoryId){
        foreach(static::$categories as $category){
            if($category["categoryid"] == $categoryId){
                return '<tr><td colspan="'.(count(static::$disciplines) + 1).'" class="lato medium">'.$category["title"].'</tr>';
            }
        }
        return null;
    }

    private static function GetDisciplineHTML($disciplineName){
        return '<th class="lato bold">'.$disciplineName.'</th>';
    }

    private static function GetUserHTML($user, $userLink){
        return '<td><a href="'.$userLink.'" class="lato thin">'.$user.'</a></td>';
    }

    private static function GetResultHTML($result){
        if($result == "")
            return "<td></td>";
        switch($result){
            case 1: $resultStr = "Or"; break;
            case 2: $resultStr = "Argent"; break;
            case 3: $resultStr = "Bronze"; break;
            default: $resultStr = $result; break;
        }
        return '<td class="lato light">'.$resultStr.'</td>';
    }

}