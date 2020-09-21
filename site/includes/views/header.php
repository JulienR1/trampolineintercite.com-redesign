<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo static::$info->title; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/df8eedba6f.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/general/general.css?v=1">
    <link rel="stylesheet" href="css/header/header.css?v=1">
    <link rel="stylesheet" href="css/footer/footer.css?v=1">
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