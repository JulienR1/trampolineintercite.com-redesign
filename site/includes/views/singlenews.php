<h1 class="lato medium"><?php echo static::$title; ?></h1>
<hr>

<div class="wrapper">
    <div class="left">
        <p class="date lato light"><?php echo static::$date; ?></p>

        <?php echo static::GetTextHtml(); ?>
    </div>

    <div class="right">
        <img src="/assets/news/<?php echo static::$img; ?>">
    </div>
</div>

<h4 class="lato bold"><?php echo static::$tableName; ?></h4>
<div class="table-wrapper">
    <table>
        <tbody>
            <?php echo static::GetResultTable(); ?>          
        </tbody>
    </table>
</div>