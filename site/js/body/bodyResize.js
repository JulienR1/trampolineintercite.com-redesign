document.addEventListener("DOMContentLoaded", resizeMain);
window.addEventListener("resize", resizeMain);

function resizeMain() {
  var headerHeight = document.querySelector("header").offsetHeight;
  var windowHeight = window.innerHeight;
  var mainHeight = windowHeight - headerHeight;

  document.querySelector("main").style.minHeight = mainHeight + "px";
}
