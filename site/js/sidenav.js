navigationElements = new Array();
anchors = new Array();

header = null;

InitializeSideNav();
InitiliazeAnchorElements();
document.body.addEventListener("scroll", () => { OnScroll(); });
OnScroll();

function InitializeSideNav() {
    sidenavHeight = document.getElementById("sidenav").offsetHeight;
    sidenavBars = document.querySelectorAll("aside .sidenav-bar");
    sidenavBars.forEach(element => {
        element.style.height = "calc(50% - " + (sidenavHeight / 2) + "px)";
    });
}

function InitiliazeAnchorElements() {
    anchors = document.querySelectorAll("aside nav .quick-nav a");
    anchors.forEach((anchor) => {
        navigationElements[navigationElements.length] = document.getElementById(anchor.getAttribute("href"));
    });
}

function OnScroll() {
    index = 0;

    if (header == null)
        header = document.querySelector("header");

    navigationElements.forEach((navElement) => {
        if (navElement != null) {
            if (navElement.getBoundingClientRect().bottom > header.offsetHeight) { return; }
            index++;
        }
    });
    UpdateSidenavUI(index);
}

function UpdateSidenavUI(index) {
    DeselectAll();
    if (index >= anchors.length)
        index = anchors.length - 1;
    anchors[index].parentNode.setAttribute("active", "");
}

function OnQuickNavSelection(event) {
    event.preventDefault();
    linkElement = event.toElement.getAttribute("href");
    if (linkElement == null)
        linkElement = event.path[1].getAttribute("href");
    ScrollToElement(linkElement);
}

function ScrollToElement(targetId) {
    if (document.getElementById(targetId) == null)
        return;

    hash = "#" + targetId;
    scrollTarget = $(hash).position().top;

    if (header == null)
        header = document.querySelectorAll("header");
    if ($(header).css("position") == "absolute")
        if (scrollTarget != 0)
            scrollTarget -= header.offsetHeight - (header.hasAttribute("atscreentop") ? 40 : 0); // TODO: REMOVE HARDCODED VALUE

    $("html,body").stop().animate({
        scrollTop: scrollTarget
    }, 1000, function () {
        if (window.location.pathname == "/")
            window.location.pathname = "/index.php";
        window.location.hash = hash;
    });
}

function DeselectAll() {
    sideToggles = document.querySelectorAll("aside nav .quick-nav");
    sideToggles.forEach((toggle) => {
        toggle.removeAttribute("active");
    });
}