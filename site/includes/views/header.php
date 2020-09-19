<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo static::$info->title; ?></title>
</head>

<body>

<header>
    <div class="bg-shadow desktop-hide-scroll">
        <div class="desktop-hide">
            <div id="logo"><img src="/assets/img/logo.png" alt="Logo"></div>
            <div id="nav-button"><!-- style with ::before and ::after --></div>
        </div>

        <nav>
            <ul>
                <li>
                    <a href="#">À propos</a>
                    <ul>
                        <li><a href="#">Actualités</a></li>
                        <li><a href="#">Règlements</a></li>
                        <li><a href="#">Annonces</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Activités</a>
                    <ul>
                        <li><a href="#">Récréatif</a></li>
                        <li><a href="#">Fête d'enfants</a></li>
                        <li><a href="#">Compétitif</a></li>
                        <li><a href="#">Comment s'inscrire</a></li>
                    </ul>
                </li>
                <li class="desktop-only">
                    <a href="#"><img src="/assets/img/logo.png" alt="Logo"></a>
                </li>
                <li>
                    <a href="#">Horaire</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</header>