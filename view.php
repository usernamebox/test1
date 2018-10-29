<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
include("fckeditor.php");
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
</head>
<body>
<?php
include('header.php');
?>
<?php
if($_GET['act']=="")
{
$id=$_GET["id"];
$teachedit=$db->getfirst("select * from topic where id='$id'");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
$title=$teachedit[title];
$username1=$teachedit[username];
$content=$teachedit[content];
$addtime=$teachedit[addtime];
$istop=$teachedit[istop];
$iselite=$teachedit[iselite];
$islock=$teachedit[islock];
$bid=$teachedit[bid];
$hits=$teachedit[hits]+1;
$db->update("update topic set hits='$hits' where id='$id'");
$teachedit1=$db->getfirst("select * from board where id='$bid'");
$catname=$teachedit1[catname];
$boardmaster=$teachedit1[boardmaster];
/*
if($islock==1)
{
 if(($_SESSION['super']!=3) || ($boardmaster!=$_SESSION['username']))
 {
  echo ("<script type='text/javascript'> alert('帖子不存在或处于锁定状态！');history.go(-1);</script>");
  exit;
  }
}*/
?>
      <table cellspacing="1" cellpadding="5" width="776" align="center" bgcolor="#ffffff" style="margin-top:2px;">
        <tr>
          <td colspan="2" align="left" background="images/bg_menu.gif" class="head">您的当前位置：<a href="index.php" class="blink">首页</a> &gt;&gt; <a href="home.php" class="blink">家园</a> &gt;&gt; <a href="list.php?id=<?=$bid?>" class="blink">
            <?=$catname?>
            </a> &gt;&gt;
            <?=$title?></td>
        </tr>
        <tr align="middle" height="23">
          <td height="20" colspan="2" bgcolor="#EFEFEF"><table width="700" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>&nbsp;</td>
                <td width="100"><a href="post.php?bid=<?=$bid?>"><img src="images/post.gif" width="104" height="19" border="0" /></a></td>
              </tr>
            </table></td>
        </tr>
        <tr class="cbg" align="middle" height="23">
          <td colspan="2" align="left"><strong>标题:
            <?=$title?>
            </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
if(($_SESSION['super']==3) || ($boardmaster==$_SESSION['username']))
{
  if($istop==1)
  {
   echo "<a href='view.php?act=unistop&id=".$id."'>解除置顶</a> ";
  }
  elseif($istop==0)
  {
   echo "<a href='view.php?act=istop&id=".$id."'>置顶</a> ";
  }
  if($iselite==1)
  {
   echo "<a href='view.php?act=uniselite&id=".$id."'>解除精华</a> ";
  }
  elseif($iselite==0)
  {
   echo "<a href='view.php?act=iselite&id=".$id."'>精华</a> ";
  }
  if($islock==1)
  {
   echo "<a href='view.php?act=unislock&id=".$id."'>通过审核</a> ";
  }
  elseif($islock==0)
  {
   echo "<a href='view.php?act=islock&id=".$id."'>不通过审核</a> ";
  }
  ?>
            <a href="view.php?act=del&id=<?=$id?>" onClick="{if(confirm('确定要删除吗？\n\n删除该帖就连同回复帖一起删除并且无法还原!')){return true;}return false;}">删除</a>
            <?php
}
?></td>
        </tr>
        <tr>
          <td width="24%" align="left" valign="top" class="f_two"><?php
$totlerows=$db->getcount("select * from user where username='".$username1."'");
if($totlerows==0)
{
  echo "用户已被删除";
}
else
{
$result=$db->getfirst("select * from user where username='".$username1."'");
?>
            <?=$result[username]?>
            <br />
            <br />
            <br />
            <?php
  echo "姓名：".$result[truename]."<br />电话：".$result[tel]."<br />手机：".$result[mobile]."<br />E-mail：".$result[email]."<br />生日：".$result[birth];
}	
?></td>
          <td align="left" valign="top" bgcolor="#efefef"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top" style="border-bottom:#ffffff solid 1px;">发布时间：
            <?=$addtime?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
if(($_SESSION['super']==3) || ($boardmaster==$_SESSION['username']) || ($username1==$_SESSION['username']))
{
?>
            <a href="view.php?act=edittopic&id=<?=$id?>">编辑</a>
            <?php
}
?></td>
            </tr>
            <tr>
              <td align="left" valign="top"><?=$content?></td>
            </tr>
          </table></td>
        </tr>
        
        <?php
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=7;  
$total=$db->getcount("select * from review where tid='$id'");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
//页码计算
$pagenum=ceil($total/$num);     //获得总页数,也是最后一页
$page=min($pagenum,$page);//获得首页
$prepg=$page-1;//上一页
$nextpg=($page==$pagenum ? 0 : $page+1);//下一页
$offset=($page-1)*$num;
$result=$db->query("select * from review where tid='".$id."' limit $offset,$num");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
        <tr>
          <td width="24%" align="left" valign="top" class="f_two"><?=$row[username]?>
            <br />
            <br />
            <br />
            <?php
$user1=$row[username];
$totlerows1=$db->getcount("select * from `user` where `username`='".$user1."'");
if($totlerows1==0)
{
  echo "用户已被删除";
}
else
{
  $showuser1=$db->getfirst("select * from `user` where username='".$user1."'");
  echo "姓名：".$showuser1[truename]."<br />电话：".$showuser1[tel]."<br />手机：".$showuser1[mobile]."<br />E-mail：".$showuser1[email]."<br />生日：".$showuser1[birth];
}	
?></td>
          <td align="left" valign="top" class="f_one"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top" style="border-bottom:#ffffff solid 1px;">回复时间：
            <?=$row[addtime]?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
if(($_SESSION['super']==3) || ($boardmaster==$_SESSION['username']))
{
 if($row[islock]==1)
  {
   echo "<a href='view.php?act=viewunislock&id=".$row[id]."'>通过审核</a> ";
  }
  elseif($row[islock]==0)
  {
   echo "<a href='view.php?act=viewislock&id=".$row[id]."'>不通过审核</a> ";
  }
?>
            <a href="view.php?act=delview&id=<?=$row[id]?>" onClick="{if(confirm('确定要删除吗？\n\n删除该帖将无法还原!')){return true;}return false;}">删除</a>
            <?php
}
if(($_SESSION['super']==3) || ($boardmaster==$_SESSION['username']) || ($user1==$_SESSION['username']))
{
?>
            <a href="view.php?act=editview&id=<?=$row[id]?>&tid=<?=$id?>">编辑</a>
            <?php
}
?></td>
            </tr>
            <tr>
              <td align="left" valign="top">
<?php
if($row[islock]==1)
{
  if(($_SESSION['super']==3) || ($boardmaster==$_SESSION['username']) || ($username1==$_SESSION['username']))
    {
?>
			  <?=(empty($row[title])?"":"主题：".$row[title])?>
            <br />
            <?=$row[content]?>
<?php  
    }
    else
    {
	 echo "该回复尚未通过审核";
    }
}
else
{
?>
			  <?=(empty($row[title])?"":"主题：".$row[title])?>
            <br />
            <?=$row[content]?>
<?php
}
?></td>
            </tr>
          </table>
			
			</td>
        </tr>
<?php
}
?>
      </table>
      <table width="776" align="center" cellpadding="0" cellspacing="0" class="font" style="margin-top:2px;background-color:#FFFFFF;">
        <tr>
          <td><?php 
include 'inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);
?></td>
        </tr>
      </table>
      <?php
if(!empty($_SESSION['username']))
{
?>
      <form action="view.php?act=addok" method="post" name="form1">
        <input type="hidden" name="tid" value="<?=$id?>">
		<input type="hidden" name="bid" value="<?=$bid?>">
        <input type="hidden" name="username" value="<?=$_SESSION['username']?>">
        <table cellspacing="1" cellpadding="5" width="776" align="center" bgcolor="#ffffff" style="margin-top:2px;">
          <tr class="cbg">
            <td align="left" colspan="2"><strong>回复话题</strong></a></td>
          </tr>
          <tr>
            <td width="96" align="left">标题</td>
            <td width="648" align="left"><input type="text" name="title" size="40" maxlength="150"></td>
          </tr>
          <tr>
            <td width="96" align="left">内容</td>
            <td width="648" align="left"><?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
$oFCKeditor = new FCKeditor('content') ;
$oFCKeditor->BasePath	= $sBasePath ;
//$oFCKeditor->ToolbarSet = 'Basic';
$oFCKeditor->Height = '200';
$oFCKeditor->Value		= '' ;
$oFCKeditor->Create() ;
?></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#ffffff"><input type="submit" value="发表回复"></td>
          </tr>
        </table>
      </form>
<?php
}
}
elseif($_GET['act']=="addok")
{
$tid=intval($_POST['tid']);
$username1=SafeHtml($_POST['username']);
$title=SafeHtml($_POST['title']);
$content=$_POST['content'];
$addtime=date("Y-m-d G:i:s");
$ip=@getip($realip);
$bid=intval($_POST['bid']);
if($bid==2)
{
$islock=0;
}
else
{
$islock=1;
}
if(empty($content))
{
 echo ("<script type='text/javascript'> alert('内容为空！');history.go(-1);</script>");
 exit;
}
$db->insert("INSERT INTO `review` (`tid`,`username`,`title`,`content`,`addtime`,`ip`,`islock`) VALUES('".$tid."','".$username1."','".$title."','".$content."','".$addtime."','".$ip."','".$islock."')");
$show1=$db->getfirst("select * from topic where id='$tid'");
$bid=$show1[bid];
$reviewcount=$show1[reviewcount]+1;
$reviewtime=date("Y-m-d G:i:s");
$revieuser=$username1;
$db->update("update topic set reviewcount='$reviewcount',reviewtime='$reviewtime',revieuser='$revieuser' where id='$tid'");
$show=$db->getfirst("select * from board where id='$bid'");
$totaltopic=$show[totaltopic]+1;
$db->update("update board set totaltopic='$totaltopic' where id='$bid'");
Error("发表成功！","view.php?id=".$tid);
exit;
}
elseif($_GET['act']=="istop")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","view.php?id=".$_GET['id']);
		die();
	}
$db->update("update topic set istop=1 where id='".$_GET['id']."'");
Error("置顶成功！","view.php?id=".$_GET['id']);
exit;
}
elseif($_GET['act']=="unistop")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","view.php?id=".$_GET['id']);
		die();
	}
$db->update("update topic set istop=0 where id='".$_GET['id']."'");
Error("解除置顶成功！","view.php?id=".$_GET['id']);
exit;
}
elseif($_GET['act']=="iselite")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","view.php?id=".$_GET['id']);
		die();
	}
$db->update("update topic set iselite=1 where id='".$_GET['id']."'");
Error("设置精华成功！","view.php?id=".$_GET['id']);
exit;
}
elseif($_GET['act']=="uniselite")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","view.php?id=".$_GET['id']);
		die();
	}
$db->update("update topic set iselite=0 where id='".$_GET['id']."'");
Error("解除精华成功！","view.php?id=".$_GET['id']);
exit;
}
elseif($_GET['act']=="islock")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","view.php?id=".$_GET['id']);
		die();
	}
$db->update("update topic set `islock`=1 where id='".$_GET['id']."'");
echo ("<script type='text/javascript'> alert('帖子锁定成功！');history.go(-1);</script>");
//Error("帖子锁定成功！","view.php?id=".$_GET['id']);
exit;
}
elseif($_GET['act']=="unislock")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","view.php?id=".$_GET['id']);
		die();
	}
	$lockid=intval($_GET['id']);
$db->update("update topic set `islock`=0 where id='$lockid'");
echo ("<script type='text/javascript'> alert('帖子审核成功！');history.go(-1);</script>");
//Error("帖子解锁成功！","view.php?id=".$lockid);
exit;
}
elseif($_GET['act']=="viewislock")
{
	if(empty($_GET['id']))
	{
		echo ("<script type='text/javascript'> alert('非法操作！');history.go(-1);</script>");
		die();
	}
$db->update("update review set `islock`=1 where id='".$_GET['id']."'");
echo ("<script type='text/javascript'> alert('回复帖子锁定成功！');history.go(-1);</script>");
exit;
}
elseif($_GET['act']=="viewunislock")
{
	if(empty($_GET['id']))
	{
		echo ("<script type='text/javascript'> alert('非法操作！');history.go(-1);</script>");
		die();
	}
	$lockid=intval($_GET['id']);
$db->update("update review set `islock`=0 where id='$lockid'");
echo ("<script type='text/javascript'> alert('回复帖子审核成功！');history.go(-1);</script>");
exit;
}
elseif($_GET['act']=="del")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","view.php?id=".$_GET['id']);
		die();
	}
$del1=$db->getfirst("select * from topic where id='".$_GET['id']."'");
$delbid=$del1[bid];//版块ID
$dreviewcount=$del1[reviewcount];//回复帖子数
$del2=$db->getfirst("select * from board where id='".$delbid."'");
$dtopicnum=$del2[topicnum]-1;//总主题数
$dtotaltopic=$del2[totaltopic]-1;
$dtotaltopic=$dtotaltopic-$dreviewcount;//总帖子数
$db->update("update board set topicnum='$dtopicnum',totaltopic='$dtotaltopic' where id='$delbid'");
$rs = $db->query("delete from topic where id='".$_GET['id']."'");
$rs = $db->query("delete from review where tid='".$_GET['id']."'");
Error("删除成功！","list.php?id=".$delbid);
exit;
}
elseif($_GET['act']=="delview")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","home.php");
		die();
	}
$del3=$db->getfirst("select * from review where id='".$_GET['id']."'");	
$deltid=$del3[tid];//帖子ID
$del4=$db->getfirst("select * from topic where id='".$deltid."'");
$dbid1=$del4[bid];//版块ID
$db->update("update topic set reviewcount=reviewcount-1 where id='".$deltid."'");
$db->update("update board set totaltopic=totaltopic-1 where id='".$dbid1."'");
$rs = $db->query("delete from review where id='".$_GET['id']."'");
Error("删除成功！","view.php?id=".$deltid);
exit;
}
elseif($_GET['act']=="edittopic")
{
	if(empty($_GET['id']))
	{
		echo "操作非法...";
		die();
	}
$edit1=$db->getfirst("select * from topic where id='".$_GET['id']."'");
?>
      <form action="view.php?act=edittopicok" method="post" name="form1">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <table cellspacing="1" cellpadding="5" width="776" align="center" bgcolor="#ffffff" style="margin-top:2px;">
          <tr class="cbg">
            <td align="left" colspan="2"><strong>编辑话题</strong></a></td>
          </tr>
          <tr>
            <td width="96" align="left">标题</td>
            <td width="648" align="left"><input type="text" name="title" size="40" maxlength="150" value="<?=$edit1[title]?>"></td>
          </tr>
          <tr>
            <td width="96" align="left">内容</td>
            <td width="648" align="left"><?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;

$oFCKeditor = new FCKeditor('content') ;
$oFCKeditor->BasePath	= $sBasePath ;
$oFCKeditor->Height = '200';
$oFCKeditor->Value		= ''.$edit1[content] ;
$oFCKeditor->Create() ;
?></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" value="编辑话题"></td>
          </tr>
        </table>
      </form>
<?php
}
elseif($_GET['act']=="edittopicok")
{
	if(empty($_POST['id']))
	{
		echo "操作非法...";
		die();
	}
$title=SafeHtml($_POST['title']);
$content=$_POST['content'];
$edittime=date("Y-m-d G:i:s");
$ip=@getip($realip);
if(empty($title) || empty($content))
{
 echo ("<script type='text/javascript'> alert('主题或内容为空！');history.go(-1);</script>");
 exit;
}
$db->update("update topic set title='".$title."',content='".$content."',edittime='".$edittime."',ip='".$ip."' where id='".$_POST['id']."'");  
Error("编辑主题成功！","view.php?id=".$_POST['id']);
exit;
}
elseif($_GET['act']=="editview")
{
	if(empty($_GET['id']) || empty($_GET['tid']))
	{
		echo "操作非法...";
		die();
	}
$edit2=$db->getfirst("select * from review where id='".$_GET['id']."'");
?>
      <form action="view.php?act=editviewok" method="post" name="form1">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <input type="hidden" name="tid" value="<?=$_GET['tid']?>">
        <table cellspacing="1" cellpadding="5" width="776" align="center" bgcolor="#ffffff" style="margin-top:2px;">
          <tr class="cbg">
            <td align="left" colspan="2"><strong>编辑回复</strong></a></td>
          </tr>
          <tr>
            <td width="96" align="left">标题</td>
            <td width="648" align="left"><input type="text" name="title" size="40" maxlength="150" value="<?=$edit2[title]?>"></td>
          </tr>
          <tr>
            <td width="96" align="left">内容</td>
            <td width="648" align="left"><?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;

$oFCKeditor = new FCKeditor('content') ;
$oFCKeditor->BasePath	= $sBasePath ;
$oFCKeditor->Height = '200';
$oFCKeditor->Value		= ''.$edit2[content] ;
$oFCKeditor->Create() ;
?></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" value="编辑回复"></td>
          </tr>
        </table>
      </form>
<?php
}
elseif($_GET['act']=="editviewok")
{
	if(empty($_POST['id']) || empty($_POST['tid']))
	{
		echo "操作非法...";
		die();
	}
$title=SafeHtml($_POST['title']);
$content=$_POST['content'];
$edittime=date("Y-m-d G:i:s");
$ip=@getip($realip);
if(empty($title) || empty($content))
{
 echo ("<script type='text/javascript'> alert('主题或内容为空！');history.go(-1);</script>");
 exit;
}
$db->update("update review set title='".$title."',content='".$content."',edittime='".$edittime."',ip='".$ip."' where id='".$_POST['id']."'");  
Error("编辑回复成功！","view.php?id=".$_POST['tid']);
exit;
}
?>
      <table cellspacing="1" cellpadding="5" width="776" align="center" bgcolor="#ffffff" style="margin-top:2px;">
        <tr>
          <td><iframe id=user src="cp1.php" frameBorder="0" width="700" scrolling="no" height="30" allowTransparency="true"></iframe></td>
        </tr>
      </table>
<?php
include('footer.php');
?>
</body>
</html>
