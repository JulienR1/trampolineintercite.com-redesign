<?php
    $GLOBALS["currentPage"] = $_SERVER['REQUEST_URI'];

    echo '<script src="https://kit.fontawesome.com/df8eedba6f.js" crossorigin="anonymous"></script>';
    echo '<link rel="icon" href="/Assets/img/icons/Logo.ico">';

    printLink("base.css");
    if(LinkContains("index") || $GLOBALS["currentPage"] == "/"){
        printLink("header/header_style.css");
        printLink("header/header_style_cell.css");
    }

    function printLink($fileName){
        echo '<link rel="stylesheet" href="/css/'.$fileName.'">';
        echo "\n";
    }

    function LinkContains($str){
        return strpos($GLOBALS["currentPage"], $str);
    }
?>