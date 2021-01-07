document.addEventListener("DOMContentLoaded", initSmoothScroll);
window.addEventListener("hashchange", smoothScroll);
window.addEventListener("scroll", updateArrow);

let topArrow = null;
const ARROW_VISIBILITY_LIMIT = 50;

function initSmoothScroll() {
  topArrow = document.getElementById("topArrow");
  topArrow.addEventListener("click", scrollTop);

  smoothScroll();
  updateArrow();
}

function smoothScroll() {
  if (window.location.hash) {
    var hash = window.location.hash + "_hash";

    if ($(hash).length) {
      scroll($(hash).offset().top);
    }
  }
}

function scroll(offset) {
  $("html, body").animate(
    {
      scrollTop: offset - $("header").height(),
    },
    900
  );
}

function updateArrow() {
  if (window.scrollY > ARROW_VISIBILITY_LIMIT) {
    topArrow.setAttribute("visible", "");
  } else {
    topArrow.removeAttribute("visible");
  }
}

function scrollTop() {
  scroll(0);
}
