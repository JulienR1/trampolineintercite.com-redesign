<?php

Route::set("index.php", function () {
    Home::CreateView("home");
});

Route::set("news", function () {
    if ($_GET["subpage"]) {
        $subpageExisted = SingleNews::CreateView($_GET["subpage"]);
        if(!$subpageExisted){
            NewsNotFound::CreateView("newsNotFound");
        }
    } else {
        News::CreateView("news");
    }
});

Route::set("messages", function () {
    Messages::CreateView("messages");
});

Route::set("registration-help", function () {
    RegisterHelp::CreateView("registerHelp");
});

Route::set("contact", function () {
    Contact::CreateView("contact");
});

Route::set("ie", function () {
    IE::CreateView("ie");
});

if (!in_array($_GET["url"], Route::$validRoutes)) {
    PageNotFound::CreateView("pageNotFound");
}
