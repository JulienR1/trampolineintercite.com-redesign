const heightToScroll = 120;
var header = null;

document.addEventListener('DOMContentLoaded', function () {
    AssignHeader();
    UpdateHeaderSize();
});

document.body.addEventListener("scroll", () => {
    AssignHeader();
    UpdateHeaderSize();
});

function AssignHeader() {
    if (header === null) {
        header = document.querySelector("header");
    }
}

function UpdateHeaderSize() {
    header.removeAttribute("atScreenTop");
    if (document.body.scrollTop < heightToScroll) {
        header.setAttribute("atScreenTop", "");
    }
}