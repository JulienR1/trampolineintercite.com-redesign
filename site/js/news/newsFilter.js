document.addEventListener("DOMContentLoaded", initFilter);

let news = null;
let filter = null;
let filterRadios = null;

let pageOffset = 0;
let filterDefaultPos = 0;

function initFilter() {
  news = document.querySelectorAll("article");
  filter = document.querySelector("#filter");

  setupCloseFilterOnBackgroundClick();
  window.addEventListener("scroll", keepFilterInRange);
  pageOffset = document.querySelector("main").offsetTop;
  filterDefaultPos = document.getElementById("filter").offsetTop;

  const defaultFilter = readFilterFromURL();
  if (defaultFilter === null) return;

  setFilterChecked(defaultFilter);
  applyFilter(defaultFilter);
}

function readFilterFromURL() {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const filter = urlParams.get("filter");

  if (filter === null || filter === "") return null;
  return filter;
}

function setFilterChecked(appliedFilter) {
  document.querySelectorAll("#menu input[type='radio']").forEach((radioInput) => {
    radioInput.checked = radioInput.id === appliedFilter ? "checked" : "";
  });
}

function applyFilter(appliedFilter) {
  news.forEach((article) => {
    article.setAttribute("filtered-out", "");

    const teamAttribute = article.getAttribute("teams");
    if (teamAttribute !== null) {
      let teamIds = teamAttribute.split(",");
      if (teamIds.includes(appliedFilter) || appliedFilter === null) {
        article.removeAttribute("filtered-out");
      }
    }
  });
  setTimeout(closeFilter, 100);
}

function toggleFilter() {
  if (filter.hasAttribute("open")) {
    filter.removeAttribute("open");
  } else {
    filter.setAttribute("open", "");
  }
}

function closeFilter() {
  filter.removeAttribute("open");
}

function keepFilterInRange() {
  let pageHeight = document.querySelector("main").offsetHeight;
  let currentPos = pageOffset + 0.85 * pageHeight - window.scrollY;
  filter.style.top = filterDefaultPos > currentPos ? currentPos + "px" : "50%";
}

function setupCloseFilterOnBackgroundClick() {
  filter.addEventListener("click", (e) => {
    e.stopPropagation();
  });
  document.querySelector("main").addEventListener("click", (e) => {
    closeFilter();
  });
}
