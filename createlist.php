<?php include('header.php'); ?>

<section id="content" class="container">

<!-- Main hero unit for a primary marketing message or call to action -->
      <div class="g-unit">
        <h1>Create your list!</h1>
        <p>What do you want to do before you die?</p>
      </div>

<?php

$username = "root";
$password = "yourbucketlist";
$database = "yourbucketlist";

$sql_conn = mysql_connect(localhost,$username,$password);
mysql_select_db($database,$sql_conn);

$name = $_COOKIE['name'];
$email = $_COOKIE['email'];

$query = "SELECT * FROM suggestions";
$suggestions = mysql_query($query);
$num_suggestions = mysql_numrows($suggestions);

$query = "SELECT * FROM places";
$places = mysql_query($query);
$num_places = mysql_numrows($places);

$query = "SELECT id FROM users WHERE email = '$email' LIMIT 1";

$result = mysql_query($query);

$exists = mysql_numrows($result);

if ($exists == 0) {
   $query = "INSERT INTO users (email, name) VALUES ('$email','$name')";
   mysql_query($query);
   $query = "SELECT id FROM users WHERE email = '$email' LIMIT 1";
   $result = mysql_query($query);
   $user_id = mysql_result($result,0,"id");
} else {
   $user_id = mysql_result($result,0,"id");
}

$query = "SELECT * FROM items WHERE user_id = '$user_id' ORDER BY added LIMIT 0,5";

$results = mysql_query($query);

$row_count = mysql_numrows($results);

$i = 0;

if ($row_count != 0) {
while ($i < $row_count) {

	$item_name = mysql_result($results,$i,"name");
	$item_priority = mysql_result($results,$i,"priority");
	$item_id = mysql_result($results,$i,"id");
   $item_status = mysql_result($results,$i,"status");
   if ($item_status == 1) {
      $bk_color = 'b7ecbd';
   } else {
      $bk_color = 'F5F5F5';
   }

   echo "<div id='item$item_id' class='well' style='background-color:#$bk_color'><a class='btn success' title='Complete!' onclick='complete_item($item_id);' style='float:right;margin-right:10px;'>&#10003;</a><a class='btn danger' title='Delete' onclick='delete_item($item_id);' style='float:right;margin-right:10px;'>X</a><!--<a class='btn' style='float:right;margin-right:10px;'>Edit</a>--><h2>$item_name</h2></div>";
   
   if ($item_status == 0) {
   echo "<div id='suggestion$item_id' class='suggestions'>
            <div class='api pull'>
               <h3>Suggestions</h3><br>";
   $s = 0;
   $r = false;
   while ($s < $num_suggestions) {
      
      $c_suggest = mysql_result($suggestions,$s,"pattern");
      
      $found = stripos($item_name,$c_suggest);
      
      if ($found === false) {
         
      } else {
         echo mysql_result($suggestions,$s,"result");
         $r = true;
         break;
      }
      $s++;
   }
   $s = 0;
   if (!$r) {
      while ($s < $num_places) {
         $c_suggest = mysql_result($places,$s,"pattern");
         
         $found = stripos($item_name,$c_suggest);
         if ($found === false) {
            
         } else {
            echo "<a href='http://www.lonelyplanet.com/searchResult?q=";
            echo substr($item_name,$found + strlen($c_suggest) + 1,300);
            echo "' target='_blank'>See results for ";
            echo substr($item_name,$found + strlen($c_suggest) + 1,300);
            echo " on Lonely Planet.</a>";
            $r = true;
            break;
         }
         $s++;
      }
   }
   if (!$r) {
      echo "<a href='http://www.google.com/search?q=site:amazon.com ".$item_name."&btnI' target='_blank'>Look for ".$item_name." on Amazon.com</a>";
   }
   
   echo "</div>
         </div>";
   }
	$i++;
}
}

$i = 1 - $i;

echo '<form action="">
          	<fieldset id="list_fieldset">';

$array = array('Travel to Hawaii','Bike the Everglades','Meet someone famous','Break a world record','Eat at a famous restaurant','Go to the Olympics','Swim in all of the oceans','Win the lottery','Backpack Europe','Build a house','Start a family','Drive on the Autobahn','Throw the first pitch in a baseball game');
while ($i > 0) {
   echo '<div class="clearfix">
    			<div class="input">
    				<input id="input'.(5-$i+1).'" class="createlist"  placeholder="'.$array[array_rand($array)].'" type="text" size="30" name="input1">
    			</div>
         </div>';
   $i--;
}

?>

</fieldset>
          </form>
			   <div align="center">
                  <input id="create_submit" class="btn large primary" type="submit" value="Save List" />
               </div>
               
               </section> <!-- /container -->
               
               <?php include('footer.php'); ?>