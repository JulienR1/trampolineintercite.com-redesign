//document.body.addEventListener("click", hideInfos);

function onActivityClick(e, activityData) {
  e.stopPropagation();
  infoContainer.setAttribute("visible", "");
  infoContainer.querySelector("h5").innerHTML = activityData.title;
  infoContainer.querySelector("#cost span").innerHTML = activityData.cost + "$";
  infoContainer.querySelector("#time span").innerHTML = trimTime(activityData.startTime) + " à " + trimTime(activityData.endTime);
  infoContainer.querySelector("#dates span").innerHTML = activityData.lessonCount + " cours";
  infoContainer.querySelector(".right").innerHTML = activityData.desc;

  var yPercent = (parseTime(activityData.startTime) - calendartStart) / (calendarEnd - calendartStart);
  var containerCoveragePercent = infoContainer.offsetHeight / document.querySelector("tbody").offsetHeight;
  var y = Math.min(yPercent, 1 - containerCoveragePercent);

  var offsetPercent = document.getElementById("timestamps").clientWidth / document.querySelector("tbody").clientWidth;
  var cellPercent = document.querySelector("tr[weekday]").clientWidth / document.querySelector("tbody").clientWidth;
  var xPercent = offsetPercent + (parseInt(activityData.weekday) + 1) * cellPercent;
  var containerCoveragePercent = infoContainer.clientWidth / document.querySelector("tbody").clientWidth;
  var x = xPercent < 1 - containerCoveragePercent ? xPercent : xPercent - containerCoveragePercent - cellPercent;

  if (!firstInfoContainerAnimation) {
    infoContainer.style.transition = "all 0.275s ease-in-out";
  }

  infoContainer.style.top = `${y * 100}%`;
  infoContainer.style.left = `${x * 100}%`;
  infoContainer.style.display = "";
  firstInfoContainerAnimation = false;
}

function hideInfos() {
  // infoContainer.removeAttribute("visible");
  // firstInfoContainerAnimation = true;
  // setTimeout(() => {
  //   infoContainer.style = "";
  // }, 275);
}
