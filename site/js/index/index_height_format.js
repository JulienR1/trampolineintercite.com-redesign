document.addEventListener('DOMContentLoaded', function () {
    SetIndexHeight();
});

window.addEventListener("resize", () => {
    SetIndexHeight();
});

document.body.addEventListener("scroll", () => {
    SetIndexHeight();
});

function SetIndexHeight() {
    height = window.innerHeight;
    if (height < 600)
        height = 600;
    document.getElementById("main_page").style.height = height + "px";
}