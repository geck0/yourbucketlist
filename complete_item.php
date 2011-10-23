<?php
$item_id = $_REQUEST['item_id'];

$username = "root";
$password = "yourbucketlist";
$database = "yourbucketlist";

$sql_conn = mysql_connect(localhost,$username,$password);
mysql_select_db($database,$sql_conn);

$query = "UPDATE items SET status = 1 WHERE id = '$item_id' LIMIT 1";

$result = mysql_query($query);

?>