<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Trampoline Intercité</title>   

    <?php include "php/style.php"; ?>
</head>

<body>
    <?php include "php/nav/header.php"; 
          include "php/nav/sidenav.php"?>

    <main>
        <section id="main_page">
            <div id="background-img"></div>

            <div id="msg-box">
                <div id="msg-container">
                    <div class="msg-background-line start"></div>
                    <div id="msg">
                        <h3>
                            <?php include "php/index/messageGenerator.php"; ?>
                        </h3>
                    </div>
                    <div class="msg-background-line end"></div>
                </div>
            </div>

            <div id="cta-block">
                <div id="cta-container">
                    <h1>trampoline intercité</h1>
                    <hr>
                    <div id="cta-buttons">
                        <a href="#">S'inscrire</a>
                        <a href="#">Nos activités</a>
                    </div>
                </div>
            </div>

            <a class="down-arrow" href="activities" onclick="OnQuickNavSelection(event)"><i class="fas fa-chevron-down"></i></a>
        </section>

        <section id="activities">

        </section>

        <section id="news"></section>
    </main>

    <?php include "php/nav/footer.php";
          include "php/scripts.php"?>
</body>
</html>