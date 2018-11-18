var divs = ["PCEwebsite","highsmiles","genjigame","FusionWoodfire","InterfaxDescription","EatngageDescription"];
var visibleDivId = null;

function toggleVisibility(divId) {
  if(visibleDivId === divId) {
    visibleDivId = null;
  } else {
    visibleDivId = divId;
  }
  hideVisibleDivs();
}

function hideVisibleDivs() {
  var i, divId, div;

  for(i = 0; i < divs.length; i++) {
    divId = divs[i];
    div = document.getElementById(divId);

    if(visibleDivId === divId) {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
}

