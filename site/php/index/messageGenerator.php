<?php
    $msgIsPrinted = false;
    $startDate = "";
    $endDate = "";

    PrintMainMessage();

    function PrintMainMessage(){
        $dirName = "msg";
        if(is_dir($dirName)){
            if($dir = opendir($dirName)){
                while(($fileName = readdir($dir)) !== false){
                    $fileWasPrinted = InterpreteFile($dirName, $fileName);
                    if($fileWasPrinted){
                        break;
                    }
                }
                closedir($dir);
            }
        }
    }

    function InterpreteFile($dirName, $fileName){
        if($fileName != "." && $fileName != ".."){
            $file = fopen($dirName."/".$fileName,"r");
            if($file){       
                return PrintMessage($file);
            }
        }
    }

    function PrintMessage($file){        
        global $startDate; global $endDate;
        $startDate = ""; $endDate = "";

        while(($line = fgets($file)) !== false){
            $skipFile = !InterpreteLine($line);
            if($skipFile){
                break;
            }
        }
        fclose($file);
        if(!$skipFile){
            echo "</a>";
            return true;
        }
        return false;
    }

    function InterpreteLine($line){
        global $startDate;
        global $endDate;
        global $msgIsPrinted;

        if(!IsEmpty($line)){
            if(!MsgIsActive($startDate, $endDate)){                
                return false;
            }

            if(IsLinkLine($line)){
                echo "<a href=\"".GetLink($line)."\">";
                return true;
            }

            if(IsDateLine($line)){
                $startDate = GetStartTime($line);
                $endDate = GetEndTime($line);
                return true;
            }

            echo $line."</br>";
            $msgIsPrinted = true;
        }
        return true;
    }

    function MsgIsActive($startDate, $endDate){
        $currentDate = date("Y-m-d");
        if($startDate != "")
            if($startDate > $currentDate)
                return false;
        if($endDate != "")
            if($endDate < $currentDate)
                return false;
        return true;
    }

    function GetLink($line){
        if(strpos($line,"link:") !== false){
            return str_replace("link: ", "", $line);
        }
        return "#";
    }

    function GetStartTime($line){
        return GetTime($line, "start:");
    }

    function GetEndTime($line){
        return GetTime($line, "end:");
    }

    function GetTime($line, $timeToGet){
        if(strpos($line, $timeToGet) !== false){
            return str_replace($timeToGet." ", "", $line);
        }
        return "";
    }

    function IsLinkLine($line){
        return strpos($line, "link:") !== false;
    }

    function IsDateLine($line){
        if(strpos($line, "start:") !== false)
            return true;
        if(strpos($line, "end:") !== false)
            return true;
        return false;
    }

    function IsEmpty($line){
        return strpos($line, "\n") == 1;
    }
?>