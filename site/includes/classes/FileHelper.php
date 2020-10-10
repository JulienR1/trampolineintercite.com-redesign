<?php

class FileHelper{

    public static function ReadFileAsParagraphs($filepath){
        $out = ""; 
        $file = fopen($filepath, "r") or die("Error opening " . $filepath);

        while(true){
            if(feof($file)){
            break;
            }

            if(substr($out, -4) == "</p>" || $out == ""){
                $out .= "<p>";
            }

            $line = fgets($file);
            $out .= $line;

            if(strlen(trim($line))){
                $out .= "</p>";
            }
        }

        fclose($file);
        return $out;
    }

}