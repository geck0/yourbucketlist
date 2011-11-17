<?php
session_start();

require_once 'common.php';

$item_id = $_GET['item_id'];
$user_id = $_SESSION['user_id'];

$r = CatalystUser::deleteUserItem($user_id, $item_id);

?>