<?php
    require "activity_data.php";
    $data = new ActivityData();
    $data = $data->get();

    foreach($data as $activity){
        echo '<div class="activity-showcase">';
        echo '<img src="'.$activity['src'].'"></img>';
        echo '<div class="info-tab">';
        echo '<h2>'.$activity['title'].'</h2>';
        echo '<div class="desc">'.$activity['paragraphs'].'</div>';
        echo '</div>';
        echo '<div class="interaction-tab">';
        echo '<a href="'.$activity['link'].'"><i class="fas fa-caret-right"></i>Plus d\'informations</a>';
        echo '<hr>';
        echo '</div>';
        echo '</div>';
    }
?>