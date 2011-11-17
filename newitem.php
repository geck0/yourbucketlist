<?php
session_start();

require_once 'common.php';

$item_name = $_GET['item_name'];
$user_id = $_SESSION['user_id'];

$new_id = CatalystUser::newItem($user_id, $item_name);

$row = CatalystUser::getItemById($user_id, $new_id);

?>

<div id="<?php echo $row['id'];?>">
      
   <p class="heading" <?php if ($row['status']) { echo 'style="background-color:#b7ecbd;"'; } ?>><?php echo $row['name'];?>
      <?php if (!$row['status']) { ?>
      <a class='btn success' title='Complete!' id="complete_<?php echo $row['id'];?>" style='float:right;margin-right:10px;'>&#10003;</a>
      <a class='btn danger' title='Delete' id="delete_<?php echo $row['id'];?>" style='float:right;margin-right:10px;'>X</a>
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