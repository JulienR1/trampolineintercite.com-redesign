<?php

class FileHelper
{

    public static function ReadFileAsParagraphs($filepath, $pClasses = null)
    {
        $out = "";
        $file = fopen($filepath, "r") or die("Error opening " . $filepath);

        while (true) {
            if (feof($file)) {
                break;
            }

            if (substr($out, -4) == "</p>" || $out == "") {
                if ($pClasses !== null) {
                    $out .= '<p class="' . $pClasses . '">';
                } else {
                    $out .= "<p>";
                }
            }

            $line = fgets($file);
            $out .= $line;

            if (strlen(trim($line))) {
                $out .= "</p>";
            }
        }

        fclose($file);
        return $out;
    }

}