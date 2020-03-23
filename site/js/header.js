const IS_ACTIVE = "isActive";
const IS_MENU_ACTIVE = "isMenuActive";

document.body.addEventListener("click", onBodyClick);

function onBodyClick() {
    list = document.querySelector("header nav #main_list");
    button = document.getElementById("hamburger", "");
    list.removeAttribute(IS_MENU_ACTIVE);
    button.removeAttribute(IS_MENU_ACTIVE);
    disableHeaderMenu(getHeaderMenuButtonParents());
}

function onHeaderClick(event) {
    buttons = getHeaderMenuButtonParents();
    disableHeaderMenu(buttons);
    event.stopPropagation();
}

function onHeaderListItemClick(event) {
    skipEvent = false;
    event.path.forEach((item) => {
        if (item.classList != null)
            if (item.hasAttribute(IS_ACTIVE))
                skipEvent = true;
    });
    if (skipEvent)
        event.stopPropagation();
}

function toggleSideMenu(event) {
    event.preventDefault();
    event.stopPropagation();
    list = document.querySelector("header nav #main_list");
    button = document.getElementById("hamburger");
    if (list.hasAttribute(IS_MENU_ACTIVE)) {
        button.removeAttribute(IS_MENU_ACTIVE);
        list.removeAttribute(IS_MENU_ACTIVE);
    } else {
        button.setAttribute(IS_MENU_ACTIVE, "");
        list.setAttribute(IS_MENU_ACTIVE, "");
    }
}

function toggleHeaderMenu(event, buttonIndex) {
    buttons = getHeaderMenuButtonParents();
    toggleState = !buttons[buttonIndex].hasAttribute(IS_ACTIVE);

    disableHeaderMenu(buttons);
    if (toggleState)
        buttons[buttonIndex].setAttribute(IS_ACTIVE, "");
    else
        buttons[buttonIndex].removeAttribute(IS_ACTIVE);

    event.preventDefault();
    event.stopPropagation();
}

function getHeaderMenuButtonParents() {
    return document.querySelectorAll("header nav #main_list .dropdown");
}

function disableHeaderMenu(buttons) {
    buttons.forEach((item, index) => { item.removeAttribute(IS_ACTIVE) });
}