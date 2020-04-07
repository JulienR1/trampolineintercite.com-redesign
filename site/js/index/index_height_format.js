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

    elements = document.getElementsByClassName("full-height");
    for (var i = 0; i < elements.length; i++)
        elements[i].style.height = height + "px";
}