	var x = document.getElementById("demo");

		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else { 
				x.innerHTML = "Geolocation is not supported by this browser.";
			}
		}

		function redirectToPosition(position) {
			window.location='msgLeaving.php.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
		}
