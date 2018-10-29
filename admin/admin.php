<?php 
session_start();
?>
<?php include('../inc/site.php');?>
<?php include('islogin.php'); ?>
<html>
<head>
<title><?php echo $sitename; ?>_管理中心</title>
<meta http-equiv="content-type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<link href="images/Admin_Css.css" rel="stylesheet" type="text/css">
</head>

<frameset rows='*' id='Frame' cols='185,*' framespacing='0' frameborder='no' border='0'>
<frame src='left.php' scrolling='auto' id='left' name='left' noresize marginwidth='5' marginheight='5'>
<frame src='main.php' name='main' id='main' scrolling='auto' noresize marginwidth='0' marginheight='0'>
</frameset>
<noframes>
<body>
<font color=red style=font-size:14px><b>你的浏览器不支持帧页面，请升级！</b></font>
</body>
</noframes>
</html>