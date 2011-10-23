function validation() { 
   $("#create_submit").click(function() { 
      var input1 = $("#input1").val();
      var input2 = $("#input2").val();
      var input3 = $("#input3").val();
      var input4 = $("#input4").val();
      var input5 = $("#input5").val();
      
      var dataString = 'input1=' + input1 + '&input2=' + input2 + '&input3=' + input3 + '&input4=' + input4 + '&input5=' + input5;
      
      $.ajax({  
        type: "POST",  
        url: "create_list.php",  
        data: dataString,  
        success: function() {  
           getPage.isLoaded = false;
           
           //remove the # value
           hash = 'mylist.html';
           
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