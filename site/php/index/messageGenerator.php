<?php
    $dirName = "msg";
    $currentDate = date("Y-m-d");

    if(is_dir($dirName)){
        if($dir = opendir($dirName)){
            while(($fileName = readdir($dir)) !== false){
                if($fileName != "." && $fileName != ".."){
                    $file = fopen($dirName."/".$fileName,"r");
                    if($file){                    
                        $firstLine = true;
                        $startDate = "";
                        $endDate = "";
                        while(($line = fgets($file)) !== false){
                            if(strpos($line, "\n") != 1){
                                if($firstLine){
                                    echo "<a href=\"".$line."\">";
                                    $firstLine = false;
                                }else{
                                    if($startDate != ""){
                                        if($startDate > $currentDate){
                                        break;
                                        }
                                    }
                                    if($endDate != ""){
                                        if($endDate < $currentDate){
                                        break;
                                        }
                                    }
                                

                                    if(strpos($line, "start:") !== false){
                                        $startDate = str_replace("start: ", "", $line);                                        
                                    }elseif(strpos($line, "end:") !== false){
                                        $endDate = str_replace("end: ", "", $line);
                                    }else{
                                        echo($line."</br>");
                                    }
                                }
                            }
                        }
                        echo "</a>";
                        fclose($file);
                        break;
                    }
                }
            }
            closedir($dir);
        }
    }
?>