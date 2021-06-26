window.addEventListener("DOMContentLoaded", updateCalendarFit);
window.addEventListener("resize", updateCalendarFit);
let calendar = document.getElementById("schedule");

function updateCalendarFit() {
  if (calendar === null) return;

  var distanceFromTop = schedule.getBoundingClientRect().top;
  var screenHeight = window.innerHeight;

  calendar.style.maxHeight = screenHeight - distanceFromTop + "px";
}
