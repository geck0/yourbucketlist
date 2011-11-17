<?php
$items = $user->getItems();

?>

<section id="content" class="container">
   <br />

   <!-- List and Results -->
   <div class="listresults">
      
      <?php foreach ($items as $row) { ?>
      
      <div id="<?php echo $row['id'];?>">
      
         <p class="heading" <?php if ($row['status']) { echo 'style="background-color:#b7ecbd;"'; } ?>><?php echo $row['name'];?>
            <?php if (!$row['status']) { ?>
            <a class='btn success' title='Complete!' id="complete_<?php echo $row['id'];?>" style='float:right;margin-right:10px;'>&#10003;</a>
            <?php } ?>
            <a class='btn danger' title='Delete' id="delete_<?php echo $row['id'];?>" style='float:right;margin-right:10px;'>X</a>
            <?php if (!$row['status']) { ?>
            <a class='btn' title='Edit' id="edit_<?php echo $row['id'];?>" style='float:right;margin-right:10px;'>Edit</a>
            <?php } ?>
         </p>
         
         <div class="content">
         	<div class="option1">Click here for option 1</div>
         	<div class="option2">Click here for option 2</div>
         	<div class="option3">Click here for option 3</div>
         </div>
         
         <script type="text/javascript">
         
            $('#complete_<?php echo $row['id'];?>').click(function (e) {
               complete_item(<?php echo $row['id'];?>);
               e.stopPropagation();
               document.getElementById('new_item').focus()
            });
            
            $('#delete_<?php echo $row['id'];?>').click(function (e) {
               delete_item(<?php echo $row['id'];?>);
               e.stopPropagation();
               document.getElementById('new_item').focus()
            });
         
         </script>
      
      </div>
      
      <?php } ?>
      
      
  </div>
  
  <div align="center">
         <form id="new_item_form">
            <input id="new_item" class="createlist" type="text" size="30" name="input1" />
            <input id="create_submit" class="btn large primary" type="submit" value="Add" />
            <script>document.getElementById('new_item').focus()</script>
         </form>
      </div>
      
      <script type="text/javascript">
         
         $('#new_item_form').bind("submit", function (e) {
            var name = $('#new_item').val();
            $('#new_item').val('');
            var r = new_item(name);
            document.getElementById('new_item').focus();
            return false;
         });
      </script>
  
</section>
               