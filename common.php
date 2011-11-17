<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'yourbucketlist');
define('DB_NAME', 'yourbucketlist');
define('SHOWSQL', false);

require_once 'classes/Catalyst.php';
require_once 'classes/CatalystUser.php';

// INIT //
Catalyst::init();
?>