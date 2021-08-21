<link rel="stylesheet" href="assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

<script src="assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script src="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>

<script src="assets/js/leaflet-routing-machine/examples/Control.Geocoder.js"></script>

   <script type="text/javascript">

   	let latLng=[-6.22634555, 106.88842826999377];
   	var map = L.map('mapid').setView(latLng, 17);
	var LayerKita=L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
	});
	
	map.addLayer(LayerKita);
    getLocation();
    setInterval(() => {
        getLocation();
    }, 5000);
   
	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } else {
	    x.innerHTML = "Geolocation is not supported by this browser.";
	  }
	}

	function showPosition(position) {
        console.log('Route1',position.coords.latitude,position.coords.longitude);
	  $("[name=latNow]").val(position.coords.latitude);
	  $("[name=lngNow]").val(position.coords.longitude);
      let latLng=[position.coords.latitude,position.coords.longitude];
        control.spliceWaypoints(0, 1, latLng);
        map.panTo(latLng);
	}


	//rute

	var control = L.Routing.control({
	    waypoints: [
	        latLng
	       
	    ],
	    geocoder: L.Control.Geocoder.nominatim(),
		routeWhileDragging: true,
		reverseWaypoints: true,
		showAlternatives: true,
		altLineOptions: {
			styles: [
				{color: 'black', opacity: 0.15, weight: 9},
				{color: 'white', opacity: 0.8, weight: 6},
				{color: 'blue', opacity: 0.5, weight: 2}
			]
		}
		
	})
	control.addTo(map);
	
	


	

   </script>