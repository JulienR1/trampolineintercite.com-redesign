document.addEventListener('DOMContentLoaded', function () {
    UpdateRender();
});

document.body.addEventListener('scroll', function () {
    UpdateRender();
});

function ScrollToTop() {
    $("html,body").stop().animate({
        scrollTop: 0
    }, 750, function () {
        window.location.hash = "";
    });
}

function UpdateRender() {
    if (document.body.scrollTop > 75) {
        document.getElementById("top-arrow").setAttribute("doRender", "");
    } else {
        document.getElementById("top-arrow").removeAttribute("doRender");
    }
}