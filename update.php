<?php 
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
?>
<?php
$upgrade = <<<EOT

ALTER TABLE `updaoshi` CHANGE `birth` `birth` VARCHAR( 20 ) NULL DEFAULT NULL;
ALTER TABLE `user` CHANGE `birth` `birth` VARCHAR( 20 ) NULL DEFAULT NULL;


EOT;

runquery($upgrade);
	echo "Éý¼¶Íê³É.";
	
function runquery($query) {
	global $tablepre;
	$expquery = explode(";", $query);
	foreach($expquery as $sql) {
		$sql = trim($sql);
		if($sql != "" && $sql[0] != "#") {
			mysql_query(str_replace("cdb_", $tablepre, $sql)) or die(mysql_error());
		}
	}
}
?>
