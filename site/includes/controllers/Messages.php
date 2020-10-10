<?php

class Messages extends Controller{

    private static $messages = array();

    public static function CreateView($viewName)
    {
        $model = new mMessages();
        self::$messages = $model->getMessages();

        self::CreateInfo();
        parent::CreateView($viewName);
    }

    private static function CreateInfo()
    {
        parent::$info = new PageInfo();
        parent::$info->setTitle("Trampoline Intercité | Messages");
        parent::$info->setCss("messages/messages.css?v=1");
    }

    public static function GetMessagesHtml(){
        $html = "";
        if(!empty(self::$messages)){
            foreach(self::$messages as $message){
                $html .= self::GetSingleMessageHtml($message);
            }
        }else{
            $html = '<p class="no-msg lato normal">
                        Aucun message a afficher pour le moment
                    </p>';
        }

        return $html;
    }

    private static function GetSingleMessageHtml($message){
        $out = '<section class="bg-shadow">';
        $out .= '<div><h3 class="lato normal">'.$message["title"].'</h3><span class="lato light">'.$message["startdate"].'</span></div>';
        
        $out .= "<div>";
        $out .= self::ReadMessageAsParagraphs($message["text"]);
        $out .= "</div>";
        
        $out .= "</section>";
        return $out;
    }

    private static function ReadMessageAsParagraphs($filename){
        $out = ""; 
        $file = fopen("files/messages/".$filename, "r") or die("Error opening " . $filename);

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