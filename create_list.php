<?php
$input1 = $_REQUEST['input1'];
$input2 = $_REQUEST['input2'];
$input3 = $_REQUEST['input3'];
$input4 = $_REQUEST['input4'];
$input5 = $_REQUEST['input5'];

$username = "root";
$password = "yourbucketlist";
$database = "yourbucketlist";

$sql_conn = mysql_connect(localhost,$username,$password);
mysql_select_db($database,$sql_conn);

if ($input1 != '') {
   $query = "INSERT INTO items (name,user_id) VALUES ('$input1','1')";
   echo 'yes';
   mysql_query($query);
}
if ($input2 != '') {
   $query = "INSERT INTO items (name,user_id) VALUES ('$input2','1')";
   mysql_query($query);
}
if ($input3 != '') {
   $query = "INSERT INTO items (name,user_id) VALUES ('$input3','1')";
   mysql_query($query);
}
if ($input4 != '') {
   $query = "INSERT INTO items (name,user_id) VALUES ('$input4','1')";
   mysql_query($query);
}
if ($input5 != '') {
   $query = "INSERT INTO items (name,user_id) VALUES ('$input5','1')";
   mysql_query($query);
}

?>