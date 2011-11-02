 <section id="content" class="container">

<?php
$input1 = $_REQUEST['input1'];
$input2 = $_REQUEST['input2'];
$input3 = $_REQUEST['input3'];
$input4 = $_REQUEST['input4'];
$input5 = $_REQUEST['input5'];
$email = $_REQUEST['email'];
$name = $_REQUEST['name'];

$username = "root";
$password = "yourbucketlist";
$database = "yourbucketlist";

$sql_conn = mysql_connect(localhost,$username,$password);
mysql_select_db($database,$sql_conn);

$query = "SELECT id FROM users WHERE email = '$email' LIMIT 1";

$result = mysql_query($query);

$user_id = mysql_result($result,0,"id");

if ($input1 != '' && $input1 != 'undefined') {
   $query = "INSERT INTO items (name,user_id,priority) VALUES ('$input1','$user_id','1')";
   mysql_query($query);
}
if ($input2 != '' && $input2 != 'undefined') {
   $query = "INSERT INTO items (name,user_id,priority) VALUES ('$input2','$user_id','2')";
   mysql_query($query);
}
if ($input3 != '' && $input3 != 'undefined') {
   $query = "INSERT INTO items (name,user_id,priority) VALUES ('$input3','$user_id','3')";
   mysql_query($query);
}
if ($input4 != '' && $input4 != 'undefined') {
   $query = "INSERT INTO items (name,user_id,priority) VALUES ('$input4','$user_id','4')";
   mysql_query($query);
}
if ($input5 != '' && $input5 != 'undefined') {
   $query = "INSERT INTO items (name,user_id,priority) VALUES ('$input5','$user_id','5')";
   mysql_query($query);
}

?>
   </section> <!-- /container -->