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

<div id="filter">
    <div id="toggle" class="bg-shadow" onclick="toggleFilter();"><i class="fas fa-filter"></i></div>
    <div id="menu" class="bg-shadow">
        <h4 class="lato normal">Filtrer les articles</h4>
        <ul>
            <?php echo static::GetFiltersHtml(); ?>
            <li>
                <input type="radio" id="filter-clear" name="filter" onclick="applyFilter(null)" checked="checked"></input>
                <label for="filter-clear" class="lato thin"><span>Aucun</span></label>
            </li>
        </ul>
    </div>
</div>