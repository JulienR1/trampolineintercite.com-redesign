document.addEventListener("DOMContentLoaded", smoothScroll);
window.addEventListener("hashchange", smoothScroll);

function smoothScroll() {
  if (window.location.hash) {
    var hash = window.location.hash + "_hash";

    if ($(hash).length) {
      $("html, body").animate(
        {
          scrollTop: $(hash).offset().top - $("header").height(),
        },
        900,
        "swing"
      );
    }
  }
}
