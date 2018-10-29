<?php 
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>课程网站</title>
<meta name="keywords" content="家园,课程网站" />
<meta name="description" content="家园,课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.cbg {
	PADDING-RIGHT: 3px;
	PADDING-LEFT: 3px;
	BACKGROUND: url(images/bgtt.gif);
	PADDING-BOTTOM: 3px;
	COLOR: #000000;
	PADDING-TOP: 3px
}
.cfont {
	COLOR: #ffffff
}
.f_one {
	BACKGROUND: #f7f7f7
}
.f_two {
	BACKGROUND: #efefef
}
.fnamecolor {
	COLOR: #003366
}
.head {
	PADDING-RIGHT: 3px;
	PADDING-LEFT: 3px;
	BACKGROUND: url(images/bg_menu.gif);
	PADDING-BOTTOM: 3px;
	COLOR: #ffffff;
	PADDING-TOP: 3px
}
.smalltxt {
	FONT-SIZE: 11px;
	FONT-FAMILY: Tahoma, Verdana
}
INPUT {
	BORDER-RIGHT: #ffffff 1px solid;
	BORDER-TOP: #707070 1px solid;
	FONT-WEIGHT: normal;
	FONT-SIZE: 12px;
	BACKGROUND: #f0f0f0;
	BORDER-LEFT: #707070 1px solid;
	COLOR: #000000;
	BORDER-BOTTOM: #ffffff 1px solid;
	FONT-FAMILY: Tahoma, Verdana
}
-->
</style>
</head>
<body>
<?php
include('header.php');
?>
<table cellspacing="1" cellpadding="5" width="776" align="center" bgcolor="#ffffff" style="margin-top:2px;">
  <tr>
    <td colspan="6" align="left" background="images/bg_menu.gif" class="head">您的当前位置：<a href="index.php" class="blink">首页</a> &gt;&gt; <a href="home.php" class="blink">课程资源</a></td>
  </tr>
  <tr class="cbg" align="middle" height="23">
    <td width="6%"></td>
    <td width="20%" >论坛</td>
    <td width="36%">描述</td>
    <td width="16%">主题数</td>
    <td width="11%">帖数</td>
    <td width="11%">版主</td>
  </tr>
  <?php
$total=$db->getcount("select * from board");
$result=$db->query("select * from board limit 0,$total");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
  <tr>
    <td class="f_two" valign="center" align="middle"><img src="images/new.gif" width="33" height="25" /></td>
    <td class="f_one" onmouseover="this.className='f_two'" onmouseout="this.className='f_one'" align="left">&nbsp; <a class="fnamecolor" href="list.php?id=<?=$row[id]?>"><b>『
      <?=$row[catname]?>
      』</b></a> <br />
    </td>
    <td align="left" class="f_two" onmouseover="this.className='f_two'" onmouseout="this.className='f_one'"><?=$row[readme]?></td>
    <td class="f_two" align="middle"><?=$row[topicnum]?></td>
    <td class="smalltxt" bgcolor="#f7f7f7"><?=$row[totaltopic]?></td>
    <td class="f_two" style="WORD-BREAK: keep-all" align="middle"><?=$row[boardmaster]?></td>
  </tr>
  <?php
}
?>
</table>
<table width="776" align="center" cellpadding="0" cellspacing="0" style="margin-top:5px;background-color:#FFFFFF;">
  <tr>
    <td><iframe id=user src="cp1.php" frameBorder="0" width="700" scrolling="no" height="30" allowTransparency="true"></iframe></td>
  </tr>
</table>
<?php
include('footer.php');
?>
</body>
</html>
