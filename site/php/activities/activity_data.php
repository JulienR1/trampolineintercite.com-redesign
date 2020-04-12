<?php

    class ActivityData{
        function get(){
            return array(
                createData("#", "Titre ici!", "activity1", "#"),
                createData("#", "Titre ici encore une fois!", "activity2", "#")
            );
        }
    }

    function createData($src, $title, $paragraphFile, $link){
        return array(
            "src" => $src,
            "title" => $title,
            "paragraphs" => readParagraphs($paragraphFile),
            "link" => $link
        );
    }

    function readParagraphs($paragraphFile){
        $output = "";
        $file = fopen("php/activities/paragraphs/".$paragraphFile.".txt","r");
        if($file){            
            while(($line = fgets($file)) !== false){
                $output .= "<p>".$line."</p>";
            }
            fclose($file);
        }
        return $output;
    }

?>