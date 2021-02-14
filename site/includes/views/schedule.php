<div id="activity-filter">

    <?php if (static::$activities !== null && sizeof(static::$activities) > 0) {?>
    <ul>
        <?php
foreach (static::$activities as $activity) {
    echo '<li><button onclick="filterSchedule(' . $activity["id"] . ')">' . $activity["title"] . "</button></li>";
}
    ?>
        <li><button onclick="filterSchedule(-1)">Aucun filtre</button></li>
    </ul>
    <?php }?>

</div>

<div id="schedule">
    <table>
        <thead>
            <tr>
                <th class="lato medium">Dimanche</th>
                <th class="lato medium">Lundi</th>
                <th class="lato medium">Mardi</th>
                <th class="lato medium">Mercredi</th>
                <th class="lato medium">Jeudi</th>
                <th class="lato medium">Vendredi</th>
                <th class="lato medium">Samedi</th>
            </tr>
        </thead>
        <tbody>
            <tr id="timestamps"></tr>
            <tr weekday="0"><td></td></tr>
            <tr weekday="1"><td></td></tr>
            <tr weekday="2"><td></td></tr>
            <tr weekday="3"><td></td></tr>
            <tr weekday="4"><td></td></tr>
            <tr weekday="5"><td></td></tr>
            <tr weekday="6"><td></td></tr>
        </tbody>
    </table>

    <div id="infos" class="bg-shadow">
        <div class="left">
            <h5 class="lato medium">Titre de l'activite</h5>
            <p id="cost"><i class="fas fa-dollar-sign"></i><span class="lato thin">150.63$</span></p>
            <p id="time"><i class="far fa-clock"></i><span class="lato thin">18h30 à 20h00</span></p>
            <p id="dates"><i class="far fa-calendar-alt"></i><span class="lato thin">32 février au 18 mai</span></p>
        </div>
        <div class="right">
            <p class="lato light">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, illo?</p>
            <p class="lato light">Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
            <p class="lato light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae architecto velit esse odio quos quo?</p>
        </div>
    </div>
</div>

<?php include "loader.php";?>