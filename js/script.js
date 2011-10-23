/* Author: Ben Janik

*/

$(document).ready(function () {
    
    if (!document.location.hash) document.location.hash = '#home.html';
    
    //Check if url hash value exists (for bookmark)
    $.history.init(pageload);  
         
    //highlight the selected link
    $('a[href="' + document.location.hash + '"]').parent().addClass('active');
     
    //Seearch for link with REL set to ajax
    $('a[rel=ajax]').click(function (event) {
        
        getPage.isLoaded = false
        
        //grab the full url
        var hash = this.href;
        
        //remove the # value
        hash = hash.replace(/^.*#/, '');
        
        //for back button
        $.history.load(hash);  
        
        //clear the selected class and add the class class to the selected link
        $('a[rel=ajax]').parent().removeClass('active');
        $(this).parent().addClass('active');
        
        //hide the content
        $('#content').fadeTo(1, 0.01);
        
        //run the ajax
        getPage();
        
        return false;
     
    });
});
     
 
function pageload(hash) {
    //if hash value exists, run the ajax
    if (hash) getPage();   
}
         
function getPage() {

    if(getPage.isLoaded != true) {
    
    //generate the parameter for the php script
    var data = document.location.hash.replace(/^.*#/, '');
    $.ajax({
        url: data, 
        type: "GET",       
        data: null,    
        cache: false,
        success: function (html) { 
             
            //add the content retrieved from ajax and put it in the #content div
            $('#content').html(html);
            
            validation();
            
            //display the body with fadeIn transition
            $('#content').fadeTo('fast', 1.0);
                  
        }      
    });
    
    }
    
    getPage.isLoaded = true;
    
}

// fb status
function updateStatusViaJavascriptAPICalling(message){
	var status = message,
		url = 'http://www.yourbucketli.st',
		caption = 'Helping you achieve your dreams.';
	FB.api('/me/feed', 'post', { message: status, link: url, caption: caption }, function(response) {
	if (!response || response.error) {
		console.log('Error occured');
	} else {
		console.log('Status updated Successfully');
	}
	}); 
};

function logout_callback() {

   console.log('logging out...');
   
   $('.nav li:last-child').remove();
   $('.nav li:last-child').remove();
   
   getPage.isLoaded = false;

  //remove the # value
  hash = 'home.html';
  
  //for back button
  $.history.load(hash);  
  
  //clear the selected class and add the class class to the selected link
  $('a[rel=ajax]').parent().removeClass('active');
  $(this).parent().addClass('active');
  
  //hide the content
  $('#content').fadeTo(1, 0.01);
  
  //run the ajax
  getPage();
}

function initializeMap() {
    var mapOptions = {
	      zoom: 4,
	      mapTypeControl: true,
	      navigationControl: true,
	      navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
	      mapTypeId: google.maps.MapTypeId.ROADMAP      
	    };
	map = new google.maps.Map(document.getElementById("infoBox"), mapOptions);
	
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
		radius: '6300000',
		name: ['restaurant']
	};

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