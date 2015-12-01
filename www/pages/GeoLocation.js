function initializeGeoLocation(){
	navigator.geolocation.getCurrentPosition(getPosition);
}
function getPosition(position) {
	// initialize the map
	var map = new Microsoft.Maps.Map(document.getElementById("map"), {credentials: "Ah_MZ2G3iAVue2xD_vZXOU9dyWh79NBvnTXE55nQnfRG-vCua3lj0s6KPFArtHyI"});
	
	var loc = new Microsoft.Maps.Location(position.coords.latitude, position.coords.longitude);
	
	//add a pin to the map
	var pin = new Microsoft.Maps.Pushpin(loc);
	map.entities.push(pin);
	
	//center the map on the location
	map.setView({center:loc, zoom: 10});
}
