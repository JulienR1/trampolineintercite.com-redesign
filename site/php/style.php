<?php
    require "php/nav/pages.php";

    echo '<script src="https://kit.fontawesome.com/df8eedba6f.js" crossorigin="anonymous"></script>';
    echo '<link rel="icon" href="/Assets/img/icons/Logo.ico">';

    printLink("base.css");
    printLink("header/header_style.css");
    printLink("header/header_style_cell.css");
    printLink("footer/footer_style.css");
    printLink("footer/footer_style_cell.css");
    printLink("top-arrow/toparrow.css");

    $currentPage = Pages::GetCurrentPage();
    if($currentPage == Pages::INDEX){
        printLink("index/index_header.css");
        printLink("index/index_style.css");
        printLink("sidenav/sidenav_style.css");
        printLink("down-arrow/down-arrow.css");
    }

    function printLink($fileName){
        echo '<link rel="stylesheet" href="/css/'.$fileName.'">';
        echo "\n";
    }
?>