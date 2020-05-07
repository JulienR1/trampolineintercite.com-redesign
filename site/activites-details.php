<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trampoline intercité | Nos cours</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?php include "php/style.php"; ?>
</head>
<body> 
    <?php include "php/nav/header.php"; 
          include "php/nav/sidenav.php";?>

    <main>
        <section id="recreatif">
            <div class="section-title">
                <h1>Secteur récréatif</h1>
                <hr>
            </div>

            <p id="affiliation">Noter qu'une affiliation de ----$ est obligatoire pour tous</p>

            <div class="activity">
                <div class="img-container">
                    <img src="#">
                </div>
                <div class="data-container">
                    <h3>Initiation 3-5 ans</h3>
                    <div class="desc">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate asperiores ab dolorem pariatur dolores sequi?</p>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa, non!</p>                        
                    </div>
                    <div class="stats-container">
                        <div class="stat">
                            <i class="fas fa-dollar-sign"></i>
                            <p>99.99$</p>
                        </div>
                        <div class="stat">
                            <i class="far fa-clock"></i>
                            <p>25h / jour</p>
                        </div>
                        <div class="stat">
                            <i class="far fa-calendar-alt"></i>
                            <p>12 fev au 29 fev</p>
                        </div>
                    </div>
                    <div class="button-container">
                        <a href="#" onclick="RepositionLayout()" class="activity-button"><span>S'inscrire</span></a>
                        <a href="#" class="activity-button"><span>Plages horaire</span></a>
                    </div>
                </div>
            </div>
        </section>

        <section id="competitif">

        </section>

        <section id="prive">

        </section>
    </main>

    <?php include "php/nav/footer.php";
          include "php/nav/arrows/toparrow.php";
          include "php/scripts.php"?>
</body>
</html>