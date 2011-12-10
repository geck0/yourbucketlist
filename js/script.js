/* Author: Ben Janik

*/

$(document).ready(function() {
  $(".content").hide();
  //toggle the componenet with class msg_body
  $(".heading").click(function()
  {
    $(this).next(".content").slideToggle(100);
  });
});


// fb status
function updateStatusViaJavascriptAPICalling(message){
	var status = message,
		url = 'http://www.yourbucketli.st/?v1',
		caption = 'Helping you achieve your dreams.';
	FB.api('/me/feed', 'post', { message: status, link: url, caption: caption }, function(response) {
	if (!response || response.error) {
		console.log('Error occured');
	} else {
		console.log('Status updated Successfully');
	}
	}); 
};

var googleSearch;

function initializeMap(search) {
    var mapOptions = {
	      zoom: 4,
	      mapTypeControl: true,
	      navigationControl: true,
	      navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
	      mapTypeId: google.maps.MapTypeId.ROADMAP      
	    };
	map = new google.maps.Map(document.getElementById("infoBox"), mapOptions);
	
	googleSearch = search;
	
	getLocation();
};

function getLocation() {
	if(geo_position_js.init())
	{
		geo_position_js.getCurrentPosition(searchPlaces,function(){alert("Couldn't get location")},{enableHighAccuracy:true});
	}
	else
	{
		alert("Functionality not available");
	}
};

function searchPlaces(p) {
	// Find your coordinates and set up map
	pos = new google.maps.LatLng(p.coords.latitude,p.coords.longitude);
	
	// Set parameters for the Places search
	var request = {
		location: pos,
		radius: '630000',
	};

	request.name = [googleSearch];

	// Search Google Places using parameters
	service = new google.maps.places.PlacesService(map);
	service.search(request, displayResults);
};

function displayResults(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
  
  		// use first result and find coordinates
      var place = results[0];
      var placeLoc = place.geometry.location;
      var dest = new google.maps.LatLng(placeLoc.lat(), placeLoc.lng());
      
      // Display business name of first result from search
      document.getElementById('infoBox').innerHTML = "<p>" + place.name + "</p><p>" + place.vicinity + "</p><p>Rating: " + place.rating + "</p>";

	  $('#infoBox').removeAttr('style');
  };
};