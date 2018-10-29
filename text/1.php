<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$id="102|103|104";
$a=0;
for($j=100;$j<=110;$j++){
  $r[$j]=$j;
  $s[$j]=$j;
}
$rr = array_keys($r);
$p_id=explode ('|',$id);
for($i=0;$i<count($rr);$i++){
$check_srt = str_replace($p_id, 0, $rr[$i]);
if ($check_srt==0){
  $select="checked=\"checked\"";
}else{
  $select="";
}
  $str.="<input name=\"checkbox\" type=\"checkbox\" value=\"".$r[($rr[$i])]."\" ".$select." />".$s[$rr[$i]]."<br>"; 
}
print $str;
?>
</body>
</html>