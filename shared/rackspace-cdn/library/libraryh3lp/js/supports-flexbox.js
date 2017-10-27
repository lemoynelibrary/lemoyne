var doc = document.body || document.documentElement;
var style = doc.style;

if ( style.webkitFlexWrap == '' ||
     style.msFlexWrap == '' ||
     style.flexWrap == '' ) {
  doc.className += " supports-flex";
}
