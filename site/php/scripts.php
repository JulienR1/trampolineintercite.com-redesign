<?php
    echo '<script src="/js/header.js"></script>';

    $currentPage = Pages::GetCurrentPage();
    if($currentPage == Pages::INDEX){
        printScript("sidenav.js");
    }

    function printScript($script){
        echo '<script src=/js/'.$script.'></script>';
    }
?>