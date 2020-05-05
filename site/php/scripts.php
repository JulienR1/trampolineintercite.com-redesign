<?php    
    printScript("header.js");
    printScript("toparrow.js");

    $currentPage = Pages::GetCurrentPage();
    if($currentPage == Pages::INDEX){
        printScript("sidenav.js");
        printScript("index/index_header_format.js");
        printScript("index/index_height_format.js");
    }else if($currentPage == Pages::ACTIVITES_DETAILS){
        printScript("sidenav.js");       
    }

    function printScript($script){
        echo '<script src=/js/'.$script.'></script>';
    }
?>