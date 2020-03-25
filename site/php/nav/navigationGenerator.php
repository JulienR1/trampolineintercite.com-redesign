<?php

function createNavigation(){
    if(!function_exists("getLogoImage")){
        require 'php/nav/navigation.php';
    }
    $nav = new Navigation();
    $nav = $nav->get();

    $currentMenuIndex = 0;
    echo '<ul id="main_list">';
    foreach($nav as $principalMenu){   
        generateList($principalMenu, $currentMenuIndex);
        $currentMenuIndex++;    
    }
    echo '</ul>';
}


function generateList($menu, $currentIndex){
    $menuClass = getMenuClass($menu);
    $onclick = getMenuOnclick($menu);
    $anchorID = getMenuAnchorID($menu);

    echo "<li".$menuClass.$onclick.">";
    echo "<a href=\"".$menu["ref"]."\"".$anchorID.">".$menu["name"]."</a>";
    if($menu["subMenus"] != NULL){
        generateSubList($menu, $currentIndex);
    }
    echo "</li>";
}

function generateSubList($mainList, $currentIndex){
    echo "<button class=\"hide-on-pc header-only\" onclick=\"toggleHeaderMenu(event, ".$currentIndex.")\"><i class=\"fas fa-chevron-down\"></i></button>";

    $subIndex = 0;
    echo "<ul>";
    foreach($mainList["subMenus"] as $subMenu){
        generateList($subMenu, $subIndex);
        $subMenu++;
    }
    echo "</ul>";
}

function getMenuClass($menu){
    if($menu["class"] != NULL){
        return " class=\"".$menu["class"]."\"";
    }
    return "";
}

function getMenuOnclick($menu){
    if($menu["subMenus"] != NULL){
        return " onclick=\"onHeaderListItemClick(event)\"";
    }
    return "";
}

function getMenuAnchorID($menu){
    if($menu["linkID"]){
        return " id=\"". $menu["linkID"] ."\"";
    }
    return "";
}

?>