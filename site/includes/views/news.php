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
    <?php echo static::GetMonthNews(); ?>
</section>

<section>
    <h2 class="lato normal">Saison <?php echo date("Y", strtotime(static::$seasonStart)) . "-" . date("y", strtotime(static::$seasonEnd)); ?></h2>
    <?php echo static::GetSeasonNews(); ?>
</section>

<section>
    <h2 class="lato normal">Tous les articles</h2>
    <?php echo static::GetAllNews(); ?>
</section>
