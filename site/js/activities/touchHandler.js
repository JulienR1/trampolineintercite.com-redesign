document.addEventListener("DOMContentLoaded", initTouchHandles);

function initTouchHandles() {
  const activities = Object.values(document.querySelectorAll("main li"));
  if (isTouchDevice()) {
    activities.map((el) => el.removeAttribute("cananimate"));
  } else {
    activities.map((el) => el.setAttribute("cananimate", ""));
  }
}

function isTouchDevice() {
  return "ontouchstart" in window || navigator.maxTouchPoints;
}
