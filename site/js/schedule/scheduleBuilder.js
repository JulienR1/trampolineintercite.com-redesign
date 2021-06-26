const VISIBLE_ATTR = "visible";
const MIN_DELAY_MS = 100;
const WEEKDAYS = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];

let filterButtons = document.querySelectorAll("#activity-filter button, #activity-filter input");

let infoContainer = document.getElementById("infos");
let loader = document.querySelector(".loader");
var loaderTimeout = null;
var responsedReceived = false;
var isFiltering = false;

var calendartStart = 0,
  calendarEnd = 0;
let completeActivityData = [];
let firstInfoContainerAnimation = true;

document.addEventListener("DOMContentLoaded", () => {
  let params = new URLSearchParams(window.location.search);
  var filterId = parseInt(params.get("activity"));

  filterButtons.forEach((button) => {
    if (button.hasAttribute("activityid") && button.getAttribute("activityid") == filterId) {
      button.checked = true;
      button.setAttribute("selected", "");
    }
  });

  filterSchedule(filterId ? filterId : -1);
});

function filterSchedule(activityId) {
  if (isFiltering === true) return;
  if (validateFilterSelection(activityId)) return;
  // if (infoContainer === null) return;

  isFiltering = true;
  updateFilterButtons(activityId);
  hideInfos(); // TODO: Ajouter delai pour laisser le temps aux animations de fermeture de seffectuer avant de charger les nouvelles donnees
  activateLoader();
  // hide current data

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      onScheduleLoad(JSON.parse(xhttp.responseText));
    }
  };

  xhttp.open("GET", "schedule?" + formatArrayToPhpString(getActivatedIds(), "activityIds"));
  xhttp.send();
}

function getActivatedIds() {
  var ids = [];
  filterButtons.forEach((button) => {
    if (button.checked) {
      ids.push(button.getAttribute("activityid"));
    }
  });
  if (ids.length === 0) {
    ids.push("-1");
  }
  return ids;
}

function formatArrayToPhpString(arr, arrName) {
  var str = "";
  for (var i = 0; i < arr.length; i++) {
    str += arrName + "[]=" + arr[i];
    if (i < arr.length - 1) str += "&";
  }
  return str;
}

function validateFilterSelection(activityId) {
  if (activityId !== -1) {
    var checkedCount = 0;
    filterButtons.forEach((button) => {
      if (button.checked) checkedCount++;
    });
    if (checkedCount === 0) {
      filterSchedule(-1);
      return true;
    }
  }
  return false;
}

function updateFilterButtons(activityId) {
  filterButtons.forEach((button) => {
    if (button.hasAttribute("activityid")) {
      if ((button.checked && activityId != -1) || (button.getAttribute("activityid") == -1 && activityId == -1)) {
        button.setAttribute("selected", "");
      } else {
        button.removeAttribute("selected");
        button.checked = false;
      }
    } else {
      console.log("Bouton dans filtre qui ne contient pas dactivite.");
    }
  });
}

function onScheduleLoad(scheduleJSON) {
  console.log(scheduleJSON);
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

  calendartStart = Math.min(getEarliestActivity(), 24);
  calendarEnd = Math.max(getLatestActivity(), 0);
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
    activityHTML += `<span class="lato thin partial_render"></i>${WEEKDAYS[activityData.weekday]}</span>`;
    activityHTML += `<span class="lato thin">${trimTime(activityData.startTime)} à ${trimTime(activityData.endTime)}</span>`;
    activityHTML += `<span class="lato thin partial_render"></i>${activityData.cost}$</span>`;
    activityHTML += `<span class="lato thin partial_render">${activityData.lessonCount} cours</span>`;
    activityElement.innerHTML = activityHTML;

    // activityElement.addEventListener("click", (e) => onActivityClick(e, activityData));
    // activityElement.addEventListener("click", (e) => {
    //   console.log(e.target.parentNode);
    //   if (e.target.parentNode.classList.contains("selected")) e.target.parentNode.classList.remove("selected");
    //   else e.target.parentNode.classList += " selected ";
    // });
    currentWeekday.appendChild(activityElement);
  });
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
  var earliest = 8;
  completeActivityData.forEach((data) => {
    var startTime = parseTime(data.startTime);
    if (startTime < earliest) {
      earliest = startTime;
    }
  });
  return Math.floor(earliest);
}

function getLatestActivity() {
  var latest = 20;
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
