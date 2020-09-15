<?php

Route::set("index.php", function () {
    Home::CreateView("home");
});

Route::set("404", function () {
    PageNotFound::CreateView("pageNotFound");
});

if (!in_array($_GET["url"], Route::$validRoutes)) {
    header("Location: /404");
    exit();
}