var x = document.getElementById("dropbtn");
  
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else { 
    x.innerHTML = "Select Your Location";
  }
}
    
function showPosition(position) {
    if((position.coords.latitude-28.61729)**2 + (position.coords.longitude-77.20729)**2 <= 0.25){
        x.innerHTML = "Current Location: Delhi"
    }
    else if((position.coords.latitude-13.08558)**2 + (position.coords.longitude-80.25712)**2 <= 0.2500){
        x.innerHTML = "Current Location: Chennai"
    }
    else if((position.coords.latitude-19.111111)**2 + (position.coords.longitude-72.95)**2 <= 0.2500){
        x.innerHTML = "Current Location: Mumbai"
    }
    else if((position.coords.latitude-22.58)**2 + (position.coords.longitude-88.36)**2 <= 0.2500){
        x.innerHTML = "Current Location: Kolkata"
    }
    else{
        x.innerHTML = "Select Your Location"
    }
}
