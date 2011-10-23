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
function updateStatusViaJavascriptAPICalling(){
	var status = "Hello, World!";
	FB.api('/me/feed', 'post', { message: status }, function(response) {
	if (!response || response.error) {
		alert('Error occured');
	} else {
		alert('Status updated Successfully');
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
