<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>人生导师申请_课程网站</title>
<meta name="keywords" content="人生导师,传承,课程网站" />
<meta name="description" content="人生导师,传承,课程网站" />
<style type="text/css">
<!--
body {margin:0px;
}
.button {	BORDER-RIGHT: #666666 2px solid; BORDER-TOP: #666666 1px solid; FONT-SIZE: 12px; BACKGROUND: #ffffff; BORDER-LEFT: #666666 1px solid; COLOR: #333333; BORDER-BOTTOM: #666666 2px solid; HEIGHT: 18px
}
.con {	FONT-SIZE: 12px; BACKGROUND: #ffffff; COLOR: #666666
}
.input {	BORDER-RIGHT: #666666 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #666666 1px solid; PADDING-LEFT: 2px; FONT-SIZE: 12px; BACKGROUND: #f5f5f5; PADDING-BOTTOM: 2px; BORDER-LEFT: #666666 1px solid; COLOR: #666666; PADDING-TOP: 2px; BORDER-BOTTOM: #666666 1px solid
}
.table {	BACKGROUND: #eeeeee
}
.title {	FONT-SIZE: 12px; BACKGROUND: #f0f0f0; COLOR: #666666
}
.con1 {FONT-SIZE: 12px; BACKGROUND: #ffffff; COLOR: #666666
}
-->
</style>
</head>
<body>
<table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
  <tr>
    <td class="title" align="middle" height="25"><strong>人生导师列表</strong></td>
  </tr>
 </table>
<table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
<?php
$total=$db->getcount("select * from user where isteach=1 and islock=0");
$result=$db->query("select * from user where isteach=1 and islock=0 limit 0,$total");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
$i=4;
while($row=$db->getarray($result)){
if($i%4==0)   
  echo   "<tr>";  
?>

    <td class="con"><a href="showuser.php?id=<?=$row[id]?>" target="_blank"><?=$row[truename]?></a></td>
<?php
$i++;
if($i%4==0)   
  echo   "</tr>";
}
?>
</table>
</body>
</html>
