<?php

Route::set("index.php", function () {
    Home::CreateView("home");
});

Route::set("contact", function () {
    Contact::CreateView("contact");
});

Route::set("registration-help", function(){
    RegisterHelp::CreateView("registerHelp");
});

Route::set("ie", function () {
    IE::CreateView("ie");
});

if (!in_array($_GET["url"], Route::$validRoutes)) {
    PageNotFound::CreateView("pageNotFound");
}