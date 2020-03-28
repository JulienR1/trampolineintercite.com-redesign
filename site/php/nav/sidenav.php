<?php

    echo '<aside class="hide-on-cell">';
    echo '<div class="sidenav-bar"></div>';
    echo '<nav id="sidenav">';

    $sideNav = new SideNavigation();
    $sideNav = $sideNav->get();
    foreach($sideNav as $navLink){
        echo '<div class="quick-nav">';
        echo '<a href="'.$navLink.'" onclick="OnQuickNavSelection(event)"></a>';
        echo '</div>';
    }

    echo '</nav>';
    echo '<div class="sidenav-bar"></div>';
    echo '</aside>';

?>