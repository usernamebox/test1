<?php
session_start();
$_SESSION["super"] =0;
session_destroy(); 
echo"<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">"
?>