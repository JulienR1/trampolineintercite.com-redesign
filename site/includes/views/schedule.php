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
                <th>Dimanche</th>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
                <th>Samedi</th>
            </tr>
        </thead>
        <tbody>
            <tr id="timestamps">
                <!-- TODO: Generate timestmaps automagically according to min max activities -->
                <?php
for ($i = 0; $i < 12; $i++) {
    echo '<td class="lato light"><span>' . ($i + 8) . ':00</span></td>';
}
?>
            </tr>
            <tr weekday="0">
                <td>
                    <div class="activity" style="--calStart:8;--startTime:8;--endTime:10.5;">
                        <h4 class="lato medium">Titre</h4>
                        <span class="lato thin">8:00 à 10:30</span>
                    </div>
                    <div class="activity" style="--calStart:8;--startTime:19;--endTime:20;">
                        <h4 class="lato medium">Titre de lactivite</h4>
                        <span class="lato thin">19:00 à 20:00</span>
                    </div>
                </td>
            </tr>
            <tr weekday="1">
                <td>
                    <div class="activity" style="--calStart:8;--startTime:12;--endTime:14;">
                        <h4 class="lato medium">Titre</h4>
                        <span class="lato thin">12:00 à 14:00</sp>
                    </div>
                    <div class="activity overlap-1" style="--calStart:8;--startTime:13;--endTime:15;">
                        <h4 class="lato medium">Titre de lactivite</h4>
                        <span class="lato thin">13:00 à 15:00</span>
                    </div>
                    <div class="activity overlap-2" style="--calStart:8;--startTime:14;--endTime:16;">
                        <h4 class="lato medium">Titre de lactivite</h4>
                        <span class="lato thin">14:00 à 16:00</span>
                    </div>
                    <div class="activity overlap-3" style="--calStart:8;--startTime:15;--endTime:17;">
                        <h4 class="lato medium">Titre de lactivite</h4>
                        <span class="lato thin">15:00 à 17:00</span>
                    </div>
                </td>
            </tr>
            <tr weekday="2">
                <td>
                    <div class="activity adjacent" style="--calStart:8;--startTime:8;--endTime:9.5">
                        <h4 class="lato medium">Titre</h4>
                        <span class="lato thin">8:00 à 9:30</span>
                    </div>
                    <div class="activity adjacent" style="--calStart:8;--startTime:8;--endTime:9.5">
                        <h4 class="lato medium">Titre 2</h4>
                        <span class="lato thin">8:00 à 9:30</span>
                    </div>
                </td>
            </tr>
            <tr weekday="3"></tr>
            <tr weekday="4">
                <td>
                    <div class="activity adjacent" style="--calStart:8;--startTime:8;--endTime:9.5">
                        <h4 class="lato medium">Titre</h4>
                        <span class="lato thin">8:00 à 9:30</span>
                    </div>
                    <div class="activity adjacent" style="--calStart:8;--startTime:8;--endTime:9.5">
                        <h4 class="lato medium">Titre beaucoup trop long</h4>
                        <span class="lato thin">8:00 à 9:30</span>
                    </div>
                    <div class="activity" style="--calStart:8;--startTime:13;--endTime:15">
                        <h4 class="lato medium">Titre plus bas</h4>
                        <span class="lato thin">13:00 à 15:00</span>
                    </div>
                </td>
            </tr>
            <tr weekday="5"></tr>
            <tr weekday="6"></tr>
        </tbody>
    </table>
</div>

<?php include "loader.php";?>