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
            <li>
                <input type="radio" id="1" name="filter" onclick="applyFilter('1')"></input>
                <label for="1">
                    <div class="radio">
                        <div class="outer">
                            <div class="inner"></div>
                        </div>
                    </div>
                    <span class="lato thin">Régional</span>
                </label>
            </li>
            <li>
                <input type="radio" id="2" name="filter" onclick="applyFilter('2')"></input>
                <label for="2">
                    <div class="radio">
                        <div class="outer">
                            <div class="inner"></div>
                        </div>
                    </div>
                    <span class="lato thin">Provincial</span>
                </label>
            </li>
            <li>
                <input type="radio" id="3" name="filter" onclick="applyFilter('3')"></input>
                <label for="3">
                    <div class="radio">
                        <div class="outer">
                            <div class="inner"></div>
                        </div>
                    </div>
                    <span class="lato thin">National</span>
                </label>
            </li>
            <li>
                <input type="radio" id="filter-clear" name="filter" onclick="applyFilter(null)" checked="checked"></input>
                <label for="filter-clear" class="lato thin"><span>Aucun</span></label>
            </li>
        </ul>
    </div>
</div>