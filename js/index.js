function showNav(){
  var x = document.getElementById('myNavigation');
  if(x.className === "navigation"){
    x.className += " responsiveNav"
  }
  else{
    x.className = "navigation"
  }
}