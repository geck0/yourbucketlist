/* Author: Ben Janik

*/

$(document).ready(function () {
    
    if (!document.location.hash) document.location.hash = '#home.html';
    
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
        $('a[rel=ajax]').removeClass('active');
        $(this).addClass('active');
         
        //hide the content and show the progress bar
        $('#content').fadeOut('slow');
         
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
             
            //add the content retrieved from ajax and put it in the #content div
            $('#content').html(html);
             
            //display the body with fadeIn transition
            $('#content').fadeIn('slow');
                  
        }      
    });
}
