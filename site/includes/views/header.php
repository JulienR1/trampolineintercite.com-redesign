<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo static::$info->title; ?></title>

    <link rel="stylesheet" href="css/general/general.css?v=1">
    <link rel="stylesheet" href="css/header/header.css?v=1">
    <link rel="stylesheet" href="css/footer/footer.css?v=1">
</head>

<body>

    <header>
        <div class="bg-shadow desktop-hide-scroll">
            <div class="desktop-hide">
                <div id="logo"><img src="/assets/img/logo.png" alt="Logo"></div>
                <div id="nav-button">
                    <!-- style with ::before and ::after -->
                </div>
            </div>

            <?php echo Navigation::includeNav(); ?>
        </div>
    </header>