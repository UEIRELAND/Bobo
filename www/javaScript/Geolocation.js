function initializeGeoLocation(){
	navigator.geolocation.getCurrentPosition(getPosition);
}
						
						
function getPosition(position) {
	// initialize the map
	var map = new Microsoft.Maps.Map(document.getElementById("map"), {credentials: "AIzaSyAWRMiZPMRN1F4CkMBZK_oEtnEBZ44-8z"});
	
	var lat = new Microsoft.Maps.Location(position.coords.latitude);
	var lat = new Microsoft.Maps.Location(position.coords.longitude);
}


function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
	
   window.location.href= "confirmation.php?lat=" + position.coords.latitude +"&lgn=" + position.coords.longitude;	
}



function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
