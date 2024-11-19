<?php
session_start();
$_SESSION = [];
session_destroy();
header("Location: /dbgroupthree/homepage/homepage.php");
exit();
?>
