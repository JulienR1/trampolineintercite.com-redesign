const TOGGLED_ATTR = "toggled";
const OPEN_ATTR = "open";

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("nav-button").addEventListener("click", toggleMenu);
  document.querySelectorAll("header ul i").forEach((arrow) => {
    arrow.addEventListener("click", () => {
      toggleMenuList(arrow);
    });
  });
  document.querySelectorAll("header ul li").forEach((element) => {
    element.addEventListener("click", (e) => {
      e.stopPropagation();
    });
  });
  document.querySelector("header nav").addEventListener("click", closeToggleMenus);
  document.querySelector("header").addEventListener("click", (e) => {
    e.stopPropagation();
  });
  document.body.addEventListener("click", closeHeader);
});

function toggleMenu() {
  document.getElementById("nav-button").toggleAttribute(TOGGLED_ATTR);
  document.querySelector("header nav").toggleAttribute(OPEN_ATTR);
}

function toggleMenuList(listToggler) {
  listToggler.toggleAttribute(TOGGLED_ATTR);
  listToggler.nextSibling.toggleAttribute(OPEN_ATTR);
}

function closeToggleMenus() {
  document.querySelectorAll("header nav ul i").forEach((menuToggle) => {
    menuToggle.removeAttribute(TOGGLED_ATTR);
    menuToggle.nextSibling.removeAttribute(OPEN_ATTR);
  });
}

function closeHeader() {
  closeToggleMenus();
  document.getElementById("nav-button").removeAttribute(TOGGLED_ATTR);
  document.querySelector("header nav").removeAttribute(OPEN_ATTR);
}
