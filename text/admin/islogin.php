<?php
if(empty($_SESSION['username']) || $_SESSION["super"]!=3)
  { 
   echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";
   exit;
  } 
?>  