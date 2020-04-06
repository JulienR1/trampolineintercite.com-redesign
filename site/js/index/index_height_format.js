document.addEventListener('DOMContentLoaded', function () {
    SetIndexHeight();
});

document.body.addEventListener("scroll", () => {
    SetIndexHeight();
});

function SetIndexHeight() {
    document.getElementById("main_page").style.height = window.innerHeight + "px";
}