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
          alert('cool'); 
        }  
      });
      
      return false;
   });
}