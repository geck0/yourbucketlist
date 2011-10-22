/* Author: Ben Janik

*/

$(document).ready(function () {
    
    if (!document.location.hash) document.location.hash = '#web/index.html';
    
    //Check if url hash value exists (for bookmark)
    $.history.init(pageload);  
         
    //highlight the selected link
    $('a[href="' + document.location.hash + '"]').addClass('current');
     
    //Seearch for link with REL set to ajax
    $('a[rel=ajax]').click(function () {
         
        //grab the full url
        var hash = this.href;
         
        //remove the # value
        hash = hash.replace(/^.*#/, '');
         
        //for back button
        $.history.load(hash);  
         
        //clear the selected class and add the class class to the selected link
        $('a[rel=ajax]').removeClass('current');
        $(this).addClass('current');
         
        //hide the content and show the progress bar
        $('#content').hide();
        $('#loading').show();
         
        //run the ajax
        getPage();
     
        //cancel the anchor tag behaviour
        return false;
    });
});
     
 
function pageload(hash) {
    //if hash value exists, run the ajax
    if (hash) getPage();   
}
         
function getPage() {
     
    //generate the parameter for the php script
    var data = document.location.hash.replace(/^.*#/, '');
    $.ajax({
        url: data, 
        type: "GET",       
        data: null,    
        cache: false,
        success: function (html) { 
         
            //hide the progress bar
            $('#loading').hide();  
             
            //add the content retrieved from ajax and put it in the #content div
            $('#content').html(html);
            
            myListeners();
             
            //display the body with fadeIn transition
            $('#content').fadeIn('slow');
                  
        }      
    });
}


function myListeners() {

	// brewery ajax click handler
	$('#breweryclick').click( function(e) {
	
		e.preventDefault();
		$('#brewerydiv').load('web/brewery.html', function() {  
		
			$.getScript('web/js/brewery.js', function() {
			
				$.scrollTo('#breweryclick',200);
				initialize_map();
				$('#breweryclick').unbind('click').click(toggleFunction);
				
			});
			
		});
		
	});
	
	// canvas ajax click handler
	$('#canvasclick').click( function(e) {
	
		e.preventDefault();
		$('#canvasdiv').load('web/canvas.html', function() {
		
			$.getScript('web/js/canvas.js', function() {
				
				$.scrollTo('#canvasclick',200);
				$('#canvasclick').unbind('click').click(toggleFunction);
			
			});
		
		});
	
	});
	
	// euler ajax click handler
	$('#eulerclick').click( function(e) {
	
		e.preventDefault();
		$('#eulerdiv').load('web/euler.html', function() {
		
			$.getScript('web/js/euler.js', function() {
			
				$.scrollTo('#eulerclick',200);
				$('#eulerclick').unbind('click').click(toggleFunction);
			
			});
		
		});
	
	});
	
	// gear ajax click handler
	$('#gearclick').click( function(e) {
	
		e.preventDefault();
		$('#geardiv').load('music/gear.html', function() {
		
			$.scrollTo('#gearclick',200);
			$('#gearclick').unbind('click').click(toggleFunction);
		
		});
	
	});

};



function toggleFunction() {
	$(this).next().slideToggle();
	$.scrollTo(this,200);
};











