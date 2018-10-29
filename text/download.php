<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
if(empty($_SESSION["username"]))
{
	Error("该部分只有本站会员才可浏览！","index.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>会员中心_课程网站</title>
<meta name="keywords" content="会员中心,课程网站" />
<meta name="description" content="会员中心,课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.button {
	BORDER-RIGHT: #666666 2px solid;
	BORDER-TOP: #666666 1px solid;
	FONT-SIZE: 12px;
	BACKGROUND: #ffffff;
	BORDER-LEFT: #666666 1px solid;
	COLOR: #333333;
	BORDER-BOTTOM: #666666 2px solid;
	HEIGHT: 18px
}
.con {
	FONT-SIZE: 12px;
	BACKGROUND: #ffffff;
	COLOR: #666666
}
.input {
	BORDER-RIGHT: #666666 1px solid;
	PADDING-RIGHT: 2px;
	BORDER-TOP: #666666 1px solid;
	PADDING-LEFT: 2px;
	FONT-SIZE: 12px;
	BACKGROUND: #f5f5f5;
	PADDING-BOTTOM: 2px;
	BORDER-LEFT: #666666 1px solid;
	COLOR: #666666;
	PADDING-TOP: 2px;
	BORDER-BOTTOM: #666666 1px solid
}
.table {
	BACKGROUND: #eeeeee
}
.title {
	FONT-SIZE: 12px;
	BACKGROUND: #f0f0f0;
	COLOR: #666666
}
.con1 {
	FONT-SIZE: 12px;
	BACKGROUND: #ffffff;
	COLOR: #666666
}
-->
</style>
</head>
<body>
<?php
include('header.php');
?>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:6px;">
<tr>
  <td><img src="images/body_top.gif" width="776" height="7" /></td>
</tr>
<tr>
<td valign="top" bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  
  <td width="202" height="566" valign="top"><table width="195" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="images/inner-img1.gif" width="195" height="100" /></td>
      </tr>
    </table>
    <table height="200" width="195" border="0" align="center" cellpadding="0" cellspacing="0" background="images/inner_member.gif">
      <tr>
        <td height="40">&nbsp;</td>
      </tr>
      <tr>
        <td><iframe id=user src="cp.php" frameBorder="0" width="100%" scrolling="no" height="160" allowTransparency="true"></iframe></td>
      </tr>
    </table>
    <table width="195" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:8px;">
      <tr>
        <td height="260" valign="top" background="images/inner_lmdh.gif"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="30" height="38">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
              <td class="font"><a href="user.php?username=<?=$_SESSION["username"]?>">修改资料</a></td>
            </tr>
            <tr>
              <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
              <td class="font"><a href="user.php?username=<?=$_SESSION["username"]?>&act=modpass">修改密码</a></td>
            </tr>
            <tr>
              <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
              <td class="font"><a href="user.php?username=<?=$_SESSION["username"]?>&act=message">温馨祝福</a></td>
            </tr>
            <tr>
              <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
              <td class="font"><a href="download.php">资料下载</a></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <?php include('inc/link.php'); ?></td>
  <td valign="top">
  <table width="571" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="571" height="29" background="images/inner-img2.gif"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="font">
          <tr>
            <td width="40"><div align="center"><img src="images/inner-img3.gif" width="20" height="20" /></div></td>
            <td>您的当前位置：<a href="index.php">首页</a> &gt;&gt; 会员中心</td>
          </tr>
        </table></td>
    </tr>
  </table>
<table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
    <tr>
      <td height="25" colspan="3" align="middle" class="title"><strong>资料下载</strong></td>
      </tr>
    <tr>
      <td width="18%" class="con">ID</td>
      <td class="con">资料名称</td>
      <td width="16%" class="con">下载地址</td>
    </tr>
<?php
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=12; 
$total=$db->getcount("select * from download");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
//页码计算
$pagenum=ceil($total/$num);     //获得总页数,也是最后一页
$page=min($pagenum,$page);//获得首页
$prepg=$page-1;//上一页
$nextpg=($page==$pagenum ? 0 : $page+1);//下一页
$offset=($page-1)*$num;   
$result=$db->query("select * from download order by id desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){?>
    <tr>
      <td class="con"><?=$row['id']?></td>
      <td class="con"><?=$row['title']?></td>
      <td class="con"><a href="<?=$row['url']?>">点击下载</a></td>
    </tr>
<?php  
}
?>
     <tr>
      <td colspan="3" align="right" class="title"><?php 
include 'inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);
?></td>
    </tr>
  </table>



  </td>
  </tr>
    
  </table>
  </td>
  
  </tr>
  
  <tr>
    <td><img src="images/body_bottom.gif" width="776" height="7" /></td>
  </tr>
</table>
<?php
include('footer.php');
?>
</body>
</html>
