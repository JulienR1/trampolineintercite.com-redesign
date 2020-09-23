var tmp = document.documentMode,
  e,
  isIE;

// Try to force this property to be a string.
try {
  document.documentMode = "";
} catch (e) {}

// If document.documentMode is a number, then it is a read-only property, and so
//we have IE 8+.
// Otherwise, if conditional compilation works, then we have IE < 11.
// Otherwise, we have a non-IE browser.
isIE = typeof document.documentMode == "number" || new Function("return/*@cc_on!@*/!1")();

// Switch back the value to be unobtrusive for non-IE browsers.
try {
  document.documentMode = tmp;
} catch (e) {}

if (isIE) {
  window.location.replace("/ie");
}
