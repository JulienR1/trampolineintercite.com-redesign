navigationElements = new Array();
anchors = new Array();

headerHeight = 0;

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

    if (headerHeight == 0)
        headerHeight = document.querySelector("header").offsetHeight;

    navigationElements.forEach((navElement) => {
        if (navElement != null) {
            if (navElement.getBoundingClientRect().bottom > headerHeight) { return; }
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
    $("html,body").stop().animate({
        scrollTop: $(hash).position().top
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