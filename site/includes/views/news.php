<h1 class="lato normal">Dans les médias</h1>
<hr>

<section>
    <h2 class="lato normal">
        <?php
date_default_timezone_set("America/Toronto");
$months = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
echo $months[date("m") - 1] . " " . date("Y");
?>
    </h2>
    <div>
        <?php echo static::GetMonthNews(); ?>
    </div>
</section>

<section>
    <h2 class="lato normal">Saison <?php echo date("Y", strtotime(static::$seasonStart)) . "-" . date("y", strtotime(static::$seasonEnd)); ?></h2>
    <div>
        <?php echo static::GetSeasonNews(); ?>
    </div>
</section>

<section>
    <h2 class="lato normal">Tous les articles</h2>
    <div>
        <?php echo static::GetAllNews(); ?>
    </div>
</section>