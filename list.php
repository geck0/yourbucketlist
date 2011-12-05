<?php

$target_user = CatalystUser::getByOauthUid($list);

$target_list_items = $target_user->getItems();

?>

<section id="content" class="container">
   <br />

   <!-- List and Results -->
   <div class="listresults">
      <h1 style="float:right;"><a style="color:black;" href="http://dev.yourbucketli.st">Create your own!</a></h1>
      <h1><?php echo $target_user->name ?>'s Bucket List</h1>
      
      
      
      <?php foreach ($target_list_items as $row) { ?>
      
      <div id="<?php echo $row['id'];?>">
      
         <p class="heading" <?php if ($row['status']) { echo 'style="background-color:#b7ecbd;"'; } ?>><?php echo $row['name'];?></p>
         
      </div>
      
      <?php } ?>
      
      
  </div>
  
</section>
               