/* function validation() { 
   $("#create_submit").click(function() { 
      updateStatusViaJavascriptAPICalling('I just created my bucket list.  Check it out and make your own!');
      
      var email = get_cookie("email");
      var name = get_cookie("name");

      var input1 = $("#input1").val();
      var input2 = $("#input2").val();
      var input3 = $("#input3").val();
      var input4 = $("#input4").val();
      var input5 = $("#input5").val();
      
      var dataString = 'input1=' + input1 + '&input2=' + input2 + '&input3=' + input3 + '&input4=' + input4 + '&input5=' + input5 + '&email=' + email + '&name=' + name;
      
      $.ajax({  
        type: "POST",  
        url: "createlist.php",  
        data: dataString,  
        success: function() {  
           
         }  
      });
      
      return false;
   });
} */

function get_cookie ( cookie_name )
{
  var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );

  if ( results )
    return ( unescape ( results[2] ) );
  else
    return null;
}

function new_item(name) {
   var dataString = 'item_name=' + name;
   
   $.ajax({  
      type: "GET",  
      url: "newitem.php",  
      data: dataString,  
      success: function( data ) {
         var item = $('.listresults').append(data);
         $(".listresults :last-child .content").hide();
         $(".listresults :last-child .heading").click(function() {
            $(this).next(".content").slideToggle(100);
         });
      }  
   });
}

function delete_item(item_id) {
   var dataString = 'item_id=' + item_id;
   
   $.ajax({  
      type: "GET",  
      url: "deleteitem.php",  
      data: dataString,  
      success: function() {
         $('#'+item_id).fadeOut(300, function() { $(this).remove(); })
      }  
   });   
}

function complete_item(item_id) {
   var dataString = 'item_id=' + item_id;
   
   $.ajax({  
      type: "GET",  
      url: "completeitem.php",  
      data: dataString,  
      success: function() {
         $('#'+item_id+' p').css('background-color','#b7ecbd');
         $('#complete_'+item_id).remove();
         $('#edit_'+item_id).remove();
      }  
   });   
}