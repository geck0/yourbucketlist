function validation() { 
   $("#create_submit").click(function() { 
      updateStatusViaJavascriptAPICalling('I just completed my bucket list.  Check it out and make your own!');
      
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
        url: "create_list.php",  
        data: dataString,  
        success: function() {  
           getPage.isLoaded = false;
           
           //remove the # value
           hash = 'mylist.php';
           
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
      });
      
      return false;
   });
}

function get_cookie ( cookie_name )
{
  var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );

  if ( results )
    return ( unescape ( results[2] ) );
  else
    return null;
}

function delete_item(item_id) {
   var dataString = 'item_id=' + item_id;
   
   $.ajax({  
        type: "POST",  
        url: "delete_item.php",  
        data: dataString,  
        success: function() {
           var this_id = "#item"+item_id;
           var sugg_id = "#suggestion"+item_id;
           $(this_id).remove();
           $(sugg_id).remove();
           
           console.log('deleted');
           
           var field = '<div class="clearfix"><div class="input"><input id="input'+item_id+'" class="createlist"  placeholder="New.." type="text" size="30" name="input'+item_id+'"></div></div>';
           
           $('#list_fieldset').append(field);
           
        }  
      });
   
}

function complete_item(item_id) {
   var dataString = 'item_id=' + item_id;
   
   $.ajax({  
        type: "POST",  
        url: "complete_item.php",  
        data: dataString,  
        success: function() {
           var this_id = "#item"+item_id;
           var sugg_id = "#suggestion"+item_id;
           $(this_id).css('background-color','#b7ecbd');
           $(sugg_id).remove();
        }  
      });
      
      updateStatusViaJavascriptAPICalling('I just checked "' + blank + '" off my bucket list.  What have you done lately?');
   
}