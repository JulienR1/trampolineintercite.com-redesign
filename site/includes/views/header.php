<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo static::$info->title; ?></title>

    <script src="js/header/ieKiller.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/df8eedba6f.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/general/general.css?v=1">
    <link rel="stylesheet" href="css/general/fonts.css?v=1">
    <link rel="stylesheet" href="css/header/header.css?v=1">
    <link rel="stylesheet" href="css/footer/footer.css?v=1">

    <link rel="icon" type="image/png" href="assets/img/Logo.png">

    <?php
foreach (static::$info->cssFiles as $file) {
    echo '<link rel="stylesheet" href="css/' . $file . '">';
}
?>
</head>

<body>

    <header>
        <div class="bg-shadow desktop-hide-scroll">
            <div class="desktop-hide" id="header-container">
                <a href="/" id="logo"><img src="/assets/img/logo.png" alt="Logo"></a>
                <div id="nav-button">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>

            <?php echo Navigation::includeNav(); ?>
        </div>
    </header>

    <main>