<?php

Route::set("index.php", function () {
    Home::CreateView("home");
});

if (!in_array($_GET["url"], Route::$validRoutes)) {
    PageNotFound::CreateView("pageNotFound");
}