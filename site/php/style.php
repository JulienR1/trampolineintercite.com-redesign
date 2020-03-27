<?php
    $GLOBALS["currentPage"] = $_SERVER['REQUEST_URI'];

    echo '<script src="https://kit.fontawesome.com/df8eedba6f.js" crossorigin="anonymous"></script>';
    echo '<link rel="icon" href="/Assets/img/icons/Logo.ico">';

    printLink("base.css");
    printLink("header/header_style.css");
    printLink("header/header_style_cell.css");
    printLink("footer/footer_style.css");
    printLink("footer/footer_style_cell.css");

    if(LinkContains("index") || $GLOBALS["currentPage"] == "/"){
        printLink("index/index_header.css");
    }

    function printLink($fileName){
        echo '<link rel="stylesheet" href="/css/'.$fileName.'">';
        echo "\n";
    }

    function LinkContains($str){
        return strpos($GLOBALS["currentPage"], $str);
    }
?>