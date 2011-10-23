<!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>This is your list.</h1>
        <p>There are many like it, but this one is yours. What can you check off today?</p>
      </div>

<?php

$username = "root";
$password = "yourbucketlist";
$database = "yourbucketlist";

$sql_conn = mysql_connect(localhost,$username,$password);
mysql_select_db($database,$sql_conn);

$name = $_COOKIE['name'];
$email = $_COOKIE['email'];

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

$query = "SELECT * FROM items WHERE user_id = '$user_id' ORDER BY priority LIMIT 0,5";

$results = mysql_query($query);

$row_count = mysql_numrows($results);

$i = 0;

if ($row_count != 0) {
while ($i < $row_count) {

	$item_name = mysql_result($results,$i,"name");
	$item_priority = mysql_result($results,$i,"priority");
	$item_id = mysql_result($results,$i,"id");

   echo "<div class='well'><h2 style='float:right;'>#$item_priority</h2><a class='btn success' style='float:right;margin-right:10px;'>&#10003;</a><a class='btn danger' style='float:right;margin-right:10px;'>X</a><a class='btn' style='float:right;margin-right:10px;'>Edit</a><h2>$item_name</h2></div>";
   echo '<div class="suggestions">
            <div class="api pull">
               <h2>Suggestions</h2><br>
               Go skydiving with tomjoearny Skydiving in Galesburg this month. Lorem ipum bullshit
            </div>
         </div>';
   
	$i++;
}
}

$i = 5 - $i;

echo '<form action="">
          	<fieldset>';

while ($i > 0) {
   echo '<div class="clearfix">
    			<div class="input">
    				<input id="input'.(5-$i+1).'" class="createlist"  placeholder="#'.(5-$i+1).'" type="text" size="30" name="input1">
    			</div>
         </div>';
   $i--;
}

?>

</fieldset>
          </form>
<div align="center">
<?php if ($row_count != 5) { ?>
                  <input id="create_submit" class="btn large primary" type="submit" value="Save List" />
<?php } ?>
               </div>