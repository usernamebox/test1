<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
include("fckeditor.php");
if($_GET['act']=="")
{
$bid=$_GET["bid"];
if(empty($_SESSION["username"]))
{
	Error("只有本站会员才可发表！","index.php");
	exit;
}
$teachedit=$db->getfirst("select * from board where id='$bid'");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
$catname=$teachedit[catname];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>家园_课程网站</title>
<meta name="keywords" content="家园,课程网站" />
<meta name="description" content="家园,课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.cbg {	PADDING-RIGHT: 3px; PADDING-LEFT: 3px; BACKGROUND: url(images/bgtt.gif); PADDING-BOTTOM: 3px; COLOR: #000000; PADDING-TOP: 3px
}
.cfont {	COLOR: #ffffff
}
.f_one {	BACKGROUND: #f7f7f7
}
.f_two {	BACKGROUND: #efefef
}
.fnamecolor {	COLOR: #003366
}
.head {	PADDING-RIGHT: 3px; PADDING-LEFT: 3px; BACKGROUND: url(images/bg_menu.gif); PADDING-BOTTOM: 3px; COLOR: #ffffff; PADDING-TOP: 3px
}
.smalltxt {	FONT-SIZE: 11px; FONT-FAMILY: Tahoma, Verdana
}
INPUT {
	BORDER-RIGHT: #ffffff 1px solid; BORDER-TOP: #707070 1px solid; FONT-WEIGHT: normal; FONT-SIZE: 12px; BACKGROUND: #f0f0f0; BORDER-LEFT: #707070 1px solid; COLOR: #000000; BORDER-BOTTOM: #ffffff 1px solid; FONT-FAMILY: Tahoma, Verdana
}
-->
</style>
<script language="JavaScript">
// 表单提交客户端检测
function doCheck(){
  if (document.form1.title.value==""){
	   alert("<?=$sitename?>提醒您：\n主题不能为空!");
	   form1.title.focus();
	   return false;
  }
}
</script>
</head>

<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="images/sjjy-bg.gif"><table cellspacing="1" cellpadding="5" width="700" align="center" bgcolor="#ffffff" style="margin-top:60px;">
      <tr>
        <td colspan="2" align="left" background="images/bg_menu.gif" class="head">您的当前位置：<a href="index.php" class="blink">首页</a> &gt;&gt; <a href="home.php" class="blink">家园</a>&gt;&gt; <a href="list.php?id=<?=$id?>" class="blink">
          <?=$catname?>
        </a></td>
      </tr>
      <tr align="middle" height="23">
        <td height="20" colspan="2" bgcolor="#EFEFEF"><table width="700" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>&nbsp;</td>
              <td width="100">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr class="cbg" align="middle" height="23">
        <td colspan="2"><strong>发表新话题</strong></td>
      </tr>
      <form action="post.php?act=addok" method="post" name="form1" onSubmit="return doCheck();">
        <input type="hidden" name="bid" value="<?=$bid?>" />
        <input type="hidden" name="username" value="<?=$_SESSION["username"]?>" />
        <tr>
          <td width="12%" align="right" class="f_two">标题：</td>
          <td width="88%" align="left" class="f_one"><input type="text" name="title" size="40" maxlength="150"></td>
        </tr>
		<tr>
          <td width="12%" align="right" valign="top" class="f_two">内容：</td>
          <td width="88%" align="left" class="f_one"><?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;

$oFCKeditor = new FCKeditor('content') ;
$oFCKeditor->BasePath	= $sBasePath ;
$oFCKeditor->Value		= '' ;
$oFCKeditor->Create() ;
?></td>
        </tr>
		<tr>
          <td colspan="2" align="center" valign="center" class="f_two"><input type="submit" value="发表话题"></td>
          </tr>
      </form>
    </table>
<?php
}
elseif($_GET['act']=="addok")
{
$bid=intval($_POST['bid']);
$username=SafeHtml($_POST['username']);
$title=SafeHtml($_POST['title']);
$content=$_POST['content'];
$addtime=date("Y-m-d G:i:s");
$ip=@getip($realip);
$reviewtime=date("Y-m-d G:i:s");
$revieuser=SafeHtml($_POST['username']);
if(empty($title) || empty($username) || empty($content))
{
 echo ("<script type='text/javascript'> alert('用户名或主题或内容为空！');history.go(-1);</script>");
 exit;
}
if($bid==2)
{
$islock=0;
}
else
{
$islock=1;
}
$result=$db->query("select * from topic");
$db->insert("INSERT INTO `topic` (`bid`,`username`,`title`,`content`,`addtime`,`ip`,`reviewtime`,`revieuser`,`islock`) VALUES('".$bid."','".$username."','".$title."','".$content."','".$addtime."','".$ip."','".$reviewtime."','".$revieuser."','".$islock."')");
$show=$db->getfirst("select * from board where id='$bid'");
$topicnum=$show[topicnum]+1;
$totaltopic=$show[totaltopic]+1;
$db->update("update board set topicnum='$topicnum',totaltopic='$totaltopic' where id='$bid'");
if($bid==2)
{
Error("发表成功！","list.php?id=".$bid);
}
else
{
Error("发表成功！请等待管理员审核。","list.php?id=".$bid);
}
exit;
}
?>
    <table width="700" align="center" cellpadding="0" cellspacing="0" class="font" style="margin-top:10px;">
            <tr>
              <td>&nbsp;</td>
            </tr>
      </table>
      <table width="700" align="center" cellpadding="0" cellspacing="0" style="margin-top:10px;">
            <tr>
              <td><iframe id=user src="cp1.php" frameBorder="0" width="700" scrolling="no" height="30" allowTransparency="true"></iframe></td>
            </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
