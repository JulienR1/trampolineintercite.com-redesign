<div id="activity-filter">

<?php if(static::$activities !== null && sizeof(static::$activities) > 0){ ?>
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
            <tr weekday="0">
                <td>
                    <div class="activity" style="--startTime:8;--endTime:10.5;">
                        <h4>Titre</h4>
                        <span>8:00 à 10:30</span>
                    </div>
                    <div class="activity" style="--startTime:19;--endTime:20;">
                        <h4>Titre de lactivite</h4>
                        <span>19:00 à 20:00</span>
                    </div>
                </td>
            </tr>
            <tr weekday="1">
                <div class="activity" style="--startTime:12;--endTime:14;">
                        <h4>Titre</h4>
                        <span>12:00 à 14:00</sp>
                    </div>
                    <div class="activity overlap-1" style="--startTime:13;--endTime:15;">
                        <h4>Titre de lactivite</h4>
                        <span>13:00 à 15:00</span>
                </div>
            </tr>
            <tr weekday="2">
                <div class="activity adjacent-1" style="--startTime:8;--endTime:9.5">
                    <h4>Titre</h4>
                    <span>8:00 à 9:30</span>
                </div>
                <div class="activity adjacent-2" style="--startTime:8;--endTime:9.5">
                    <h4>Titre 2</h4>
                    <span>8:00 à 9:30</span>
                </div>
            </tr>
            <tr weekday="3"></tr>
            <tr weekday="4">
                <div class="activity adjacent-1" style="--startTime:8;--endTime:9.5">
                    <h4>Titre</h4>
                    <span>8:00 à 9:30</span>
                </div>
                <div class="activity adjacent-2" style="--startTime:8;--endTime:9.5">
                    <h4>Titre 2</h4>
                    <span>8:00 à 9:30</span>
                </div>
                <div class="activity" style="--startTime:13;--endTime:15">
                    <h4>Titre plus bas</h4>
                    <span>13:00 à 15:00</span>
                </div>
            </tr>
            <tr weekday="5"></tr>
            <tr weekday="6"></tr>
        </tbody>
    </table>
</div>

<?php include "loader.php";?>