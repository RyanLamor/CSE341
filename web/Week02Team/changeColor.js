function changeColor(val){
  color = document.getElementById("txtColor").value;
  div = document.getElementById("changeColor");
  if (val === 0)
    div.style.backgroundColor = "red";
  else if (color.length === 0)
  {
    div.style.backgroundColor = "white";
    alert("no color selected");
  }
  else if (!isColor(color)) {
    alert("not a valid color");
  }
  else
    div.style.backgroundColor = color;
}

function isColor(strColor){//found on stackoverflow
  var s = new Option().style;
  s.color = strColor;
  return s.color == strColor;
}//https://stackoverflow.com/questions/48484767/javascript-check-if-string-is-valid-css-color
