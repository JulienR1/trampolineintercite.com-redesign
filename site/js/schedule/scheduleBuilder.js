const VISIBLE_ATTR = "visible";
const MIN_DELAY_MS = 25;

let infoContainer = document.getElementById("infos");
let loader = document.querySelector(".loader");
var loaderTimeout = null;
var responsedReceived = false;
var isFiltering = false;

let completeActivityData = [];

document.addEventListener("DOMContentLoaded", filterSchedule(-1));

function filterSchedule(activityId) {
  if (isFiltering === true) return;

  isFiltering = true;
  activateLoader();
  // hide current data

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(xhttp.responseText);
      onScheduleLoad(JSON.parse(xhttp.responseText));
    }
  };
  xhttp.open("GET", "schedule?filterActivity=" + activityId);
  xhttp.send();
}

function onScheduleLoad(scheduleJSON) {
  completeActivityData = scheduleJSON;
  generateHTML();
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

function generateHTML() {
  var weekdays = document.querySelectorAll("tr[weekday] td");
  weekdays.forEach((weekday) => (weekday.innerHTML = ""));

  var calendartStart = Math.min(getEarliestActivity(), 24);
  var calendarEnd = Math.max(getLatestActivity(), 0);
  createTimestamps(calendartStart, calendarEnd);

  completeActivityData.forEach((activityData) => {
    var currentWeekday = weekdays[activityData.weekday];

    var activityElement = document.createElement("DIV");
    activityElement.classList += "activity";
    if (activityData.adjacent) activityElement.classList += " adjacent";
    if (activityData.overlap && activityData.overlap > 0) activityElement.classList += " overlap-" + activityData.overlap;
    if (activityData.color === null) activityData.color = "ff0000";
    activityElement.style = `--calStart:${calendartStart};--startTime:${parseTime(activityData.startTime)};--endTime:${parseTime(activityData.endTime)};--color:#${activityData.color};`;

    activityHTML = `<div class="overlay"></div>`;
    activityHTML += `<h4 class="lato medium">${activityData.title}</h4>`;
    activityHTML += `<span class="lato thin">${trimTime(activityData.startTime)} à ${trimTime(activityData.endTime)}</span>`;
    activityElement.innerHTML = activityHTML;

    activityElement.addEventListener("click", () => onActivityClick(activityData));
    currentWeekday.appendChild(activityElement);
  });
}

function onActivityClick(activityData) {
  // calculate position
  // make sure to not stay in frame
  var x, y;
  infoContainer.setAttribute("visible", "");
  infoContainer.querySelector("h5").innerHTML = activityData.title;
  infoContainer.querySelector("#cost span").innerHTML = activityData.cost + "$";
  infoContainer.querySelector("#time span").innerHTML = trimTime(activityData.startTime) + " à " + trimTime(activityData.endTime);
  infoContainer.querySelector("#dates span").innerHTML = "IL FAUT CALCULER LES DATES A UN MOEMNT DONNE";
  infoContainer.querySelector(".right").innerHTML = "FileHelper::ReadFileAsParagraphs()";
  infoContainer.style.transform = `translate(${x}% ${y}%)`;
}

function createTimestamps(earliest, latest) {
  if (earliest > latest) {
    console.error("Mauvaise gestion des activités\nContacter les administrateurs");
    return;
  }

  var timestampsContainer = document.getElementById("timestamps");
  var timestampsHTML = "";
  for (var time = earliest; time <= latest; time++) {
    timestampsHTML += `<td class="lato light"><span>${time}:00</span></td>`;
  }
  timestampsContainer.innerHTML = timestampsHTML;
}

function getEarliestActivity() {
  var earliest = 24;
  completeActivityData.forEach((data) => {
    var startTime = parseTime(data.startTime);
    if (startTime < earliest) {
      earliest = startTime;
    }
  });
  return Math.floor(earliest);
}

function getLatestActivity() {
  var latest = 0;
  completeActivityData.forEach((data) => {
    var endTime = parseTime(data.endTime);
    if (endTime > latest) {
      latest = endTime;
    }
  });
  return Math.floor(latest);
}

function parseTime(time) {
  var timeStr = time.split(":");
  var hours = parseInt(timeStr[0]);
  var mins = parseFloat(timeStr[1]);
  return hours + mins / 60.0;
}

function trimTime(time) {
  var timeElements = time.split(":");
  return timeElements[0] + ":" + timeElements[1];
}
