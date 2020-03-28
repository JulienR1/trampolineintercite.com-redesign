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
        <section id="main_page" style="height: 1000px; background-color: blue;"></section>
        <section id="activities" style="height: 1000px; background-color: red;"></section>
        <section id="news" style="height: 1000px; background-color: yellow;"></section>
    </main>

    <?php include "php/nav/footer.php";
          include "php/scripts.php"?>

</body>
</html>