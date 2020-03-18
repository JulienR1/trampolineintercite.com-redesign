<?php
    $currentPage = $_SERVER['REQUEST_URI'];

    printLink("base.css");
    if($currentPage == "/" || strpos($currentPage, "index")){
        // index.php
        printLink("header_style.css");
    } elseif (strpos($currentPage, "contact")) {
        // contact.php
    }

    function printLink($fileName){
        echo '<link rel="stylesheet" href="/css/'.$fileName.'">';
        echo "\n";
    }
?>