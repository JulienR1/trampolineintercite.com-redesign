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
        <div id="main-container">
            <section id="main_page">
                <div id="msg-box">
                    <div id="msg-container">
                        <div id="msg-background-line"></div>
                        <div id="msg">
                            <h3>Message de la semaine, du mois ou du moment<br>Il y a des informations à passer</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="activities"></section>

        <section id="news"></section>
    </main>

    <?php include "php/nav/footer.php";
          include "php/scripts.php"?>
</body>
</html>