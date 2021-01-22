<div id="activity-filter">
    <ul>
        <?php
foreach (static::$activities as $activity) {
    echo '<li><button onclick="filterSchedule(' . $activity["id"] . ')">' . $activity["title"] . "</button></li>";
}
?>
        <li><button onclick="filterSchedule(-1)">Aucun filtre</button></li>
    </ul>
</div>

<div id="schedule"></div>

<?php include "loader.php";?>