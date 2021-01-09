document.addEventListener("DOMContentLoaded", initFilter);

let news = null;

function initFilter() {
  const defaultFilter = readFilterFromURL();
  if (defaultFilter === null) return;

  news = document.querySelectorAll("article");
  applyFilter(defaultFilter);
}

function readFilterFromURL() {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const filter = urlParams.get("filter");

  if (filter === null || filter === "") return null;
  return filter;
}

function applyFilter(appliedFilter) {
  news.forEach((article) => {
    article.setAttribute("filtered-out", "");

    const teamAttribute = article.getAttribute("teams");
    if (teamAttribute !== null) {
      let teamIds = teamAttribute.split(",");
      if (teamIds.includes(appliedFilter)) {
        article.removeAttribute("filtered-out");
      }
    }
  });
}
