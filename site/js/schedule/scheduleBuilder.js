const VISIBLE_ATTR = "visible";
const MIN_DELAY_MS = 25;

let loader = document.querySelector(".loader");
var loaderTimeout = null;
var responsedReceived = false;
var isFiltering = false;

function filterSchedule(activityId) {
  if (isFiltering === true) return;

  isFiltering = true;
  activateLoader();
  // hide current data

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      onScheduleLoad(xhttp.responseText);
    }
  };
  xhttp.open("GET", "schedule?filterActivity=" + activityId);
  xhttp.send();
}

function onScheduleLoad(scheduleHtml) {
  console.log(scheduleHtml);
  responsedReceived = true;
  isFiltering = false;
  hideLoader();
  // show new data
}

function activateLoader() {
  responsedReceived = false;
  if (loaderTimeout !== null) clearTimeout(loaderTimeout);
  loaderTimeout = setTimeout(() => {
    if (responsedReceived === false) loader.setAttribute(VISIBLE_ATTR, "");
  }, MIN_DELAY_MS);
}

function hideLoader() {
  loader.removeAttribute(VISIBLE_ATTR);
}
