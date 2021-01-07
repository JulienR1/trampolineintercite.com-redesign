<?php

class FileHelper
{

    public static function ReadFileAsParagraphs($filepath, $pClasses = null)
    {
        if (!file_exists($filepath)) {
            return "<p>Erreur au chargement de l'information. Contacter l'organisation</p>";
        }

        $out = "";
        $file = fopen($filepath, "r");

        if (!$file) {
            return "<p>Erreur à la lecture de l'information. Contacter l'organisation</p>";
        }

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