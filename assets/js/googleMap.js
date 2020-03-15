// Initialize and add the map
function initMap() {
	// The location 
	var harare = {lat: -17.824858, lng:31.053028};
	// The map, centered at location
	var map = new google.maps.Map(
		document.getElementById('map'), {zoom: 4, center: harare});
	// The marker, positioned at location
	var marker = new google.maps.Marker({position: harare, map: map});
  }