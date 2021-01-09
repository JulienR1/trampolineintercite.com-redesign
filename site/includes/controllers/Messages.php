<?php

class Messages extends Controller
{

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
        parent::$info->setCss("messages/messages.css");
    }

    public static function GetMessagesHtml()
    {
        $html = "";
        if (!empty(self::$messages)) {
            foreach (self::$messages as $message) {
                $html .= self::GetSingleMessageHtml($message);
            }
        } else {
            $html = '<p class="no-msg lato normal">
                        Aucun message à afficher pour le moment
                    </p>';
        }

        return $html;
    }

    private static function GetSingleMessageHtml($message)
    {
        $out = '<section class="bg-shadow">';
        $out .= '<div><h3 class="lato normal">' . $message["title"] . '</h3><span class="lato light">' . $message["startdate"] . '</span></div>';

        $out .= "<div>";
        $out .= FileHelper::ReadFileAsParagraphs("files/messages/" . $message["text"]);
        $out .= "</div>";

        $out .= "</section>";
        return $out;
    }
}