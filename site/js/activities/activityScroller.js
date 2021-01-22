document.addEventListener("DOMContentLoaded", initScroller);

const MIN_SCREEN_WIDTH = 800;

var scroller = null;
var footer = null;

var imgCount = 0;
var imgLoadedCount = 0;

var scrollerWidth = null;
var footerHeight = null;
var scrollerMarginTotal = null;

var currentHorizontalScroll = 0,
  targetHorizontalScroll = 0;
var currentVerticalScroll = 0,
  targetVerticalScroll = 0;
var easeFactor = 0.15;

function initScroller() {
  window.addEventListener("resize", () => {
    setMargins;
    initScollerConstants();
  });
  VirtualScroll.on(calculateTargetScroll);

  // Update the layout only when all images have been affected by css
  let imgs = document.querySelectorAll("main ul img");
  imgCount = imgs.length;
  console.log(imgLoadedCount);
  imgs.forEach((img) => img.addEventListener("load", onImageLoad));
  initScrollerContent();
}

function onImageLoad() {
  if (++imgLoadedCount === imgCount) {
    initScrollerContent();
  }
}

function initScrollerContent() {
  setMargins();
  initScollerConstants();
  runScroller();
}

function setMargins() {
  var list = document.querySelector("main ul");
  list.style = "";
  var leftmostElement = document.querySelector("main ul li:first-of-type");
  var rightmostElement = document.querySelector("main ul li:last-of-type");

  var listElementMargin = getComputedStyle(leftmostElement).marginLeft.replace(/\D/g, "");

  var windowSize = window.innerWidth;
  var leftMargin = (windowSize - leftmostElement.offsetWidth) * 0.5 - listElementMargin;
  var rightMargin = (windowSize - rightmostElement.offsetWidth) * 0.5 - listElementMargin;

  scrollerMarginTotal = leftMargin + rightMargin;

  if (window.innerWidth < MIN_SCREEN_WIDTH) {
    leftMargin = 0;
    rightMargin = 0;
  }

  list.style.paddingLeft = leftMargin + "px";
  list.style.paddingRight = rightMargin + "px";
}

function initScollerConstants() {
  scroller = document.querySelector("main ul");
  footer = document.querySelector("footer");
  let reducer = (sum, el) => sum + el.getBoundingClientRect().width + 2 * parseFloat(getComputedStyle(el).margin.replace(/\D/g, ""));
  scrollerWidth = scrollerMarginTotal + Object.values(document.querySelectorAll("main ul li")).reduce(reducer, 0);
  footerHeight = footer.getBoundingClientRect().height;
}

function calculateTargetScroll(e) {
  if (window.innerWidth < MIN_SCREEN_WIDTH) return;

  var delta = Math.abs(e.deltaX) > Math.abs(e.deltaY) ? e.deltaX : e.deltaY;
  if (!footerOpen() && (!scrollerComplete() || delta > 0)) {
    targetHorizontalScroll += delta;
    targetHorizontalScroll = Math.max((scrollerWidth - window.innerWidth) * -1, targetHorizontalScroll);
    targetHorizontalScroll = Math.min(0, targetHorizontalScroll);
  } else {
    targetVerticalScroll += delta;
    targetVerticalScroll = Math.max(-footerHeight, targetVerticalScroll);
    targetVerticalScroll = Math.min(0, targetVerticalScroll);
  }
}

function runScroller() {
  requestAnimationFrame(runScroller);
  currentHorizontalScroll += (targetHorizontalScroll - currentHorizontalScroll) * easeFactor;
  currentVerticalScroll += (targetVerticalScroll - currentVerticalScroll) * easeFactor;

  var tS = "translateX(" + currentHorizontalScroll + "px) translateZ(0)";
  var sS = scroller.style;
  setStyleTransform(sS, tS);

  var tF = "translateY(" + currentVerticalScroll + "px) translateZ(0)";
  setStyleTransform(document.querySelector("main").style, tF);
  setStyleTransform(document.querySelector("footer").style, tF);
}

let footerOpen = () => Math.abs(currentVerticalScroll) > 50;
let scrollerComplete = () => Math.abs(currentHorizontalScroll - window.innerWidth + scrollerWidth) < 50;

function setStyleTransform(el, t) {
  el["transform"] = t;
  el["webkitTransform"] = t;
  el["mozTransform"] = t;
  el["msTransform"] = t;
}
