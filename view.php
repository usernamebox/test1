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
<title>��԰_�γ���վ</title>
<meta name="keywords" content="��԰,�γ���վ" />
<meta name="description" content="��԰,�γ���վ" />
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
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
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
  echo ("<script type='text/javascript'> alert('���Ӳ����ڻ�������״̬��');history.go(-1);</script>");
  exit;
  }
}*/
?>
      <table cellspacing="1" cellpadding="5" width="776" align="center" bgcolor="#ffffff" style="margin-top:2px;">
        <tr>
          <td colspan="2" align="left" background="images/bg_menu.gif" class="head">���ĵ�ǰλ�ã�<a href="index.php" class="blink">��ҳ</a> &gt;&gt; <a href="home.php" class="blink">��԰</a> &gt;&gt; <a href="list.php?id=<?=$bid?>" class="blink">
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
          <td colspan="2" align="left"><strong>����:
            <?=$title?>
            </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
if(($_SESSION['super']==3) || ($boardmaster==$_SESSION['username']))
{
  if($istop==1)
  {
   echo "<a href='view.php?act=unistop&id=".$id."'>����ö�</a> ";
  }
  elseif($istop==0)
  {
   echo "<a href='view.php?act=istop&id=".$id."'>�ö�</a> ";
  }
  if($iselite==1)
  {
   echo "<a href='view.php?act=uniselite&id=".$id."'>�������</a> ";
  }
  elseif($iselite==0)
  {
   echo "<a href='view.php?act=iselite&id=".$id."'>����</a> ";
  }
  if($islock==1)
  {
   echo "<a href='view.php?act=unislock&id=".$id."'>ͨ�����</a> ";
  }
  elseif($islock==0)
  {
   echo "<a href='view.php?act=islock&id=".$id."'>��ͨ�����</a> ";
  }
  ?>
            <a href="view.php?act=del&id=<?=$id?>" onClick="{if(confirm('ȷ��Ҫɾ����\n\nɾ����������ͬ�ظ���һ��ɾ�������޷���ԭ!')){return true;}return false;}">ɾ��</a>
            <?php
}
?></td>
        </tr>
        <tr>
          <td width="24%" align="left" valign="top" class="f_two"><?php
$totlerows=$db->getcount("select * from user where username='".$username1."'");
if($totlerows==0)
{
  echo "�û��ѱ�ɾ��";
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
  echo "������".$result[truename]."<br />�绰��".$result[tel]."<br />�ֻ���".$result[mobile]."<br />E-mail��".$result[email]."<br />���գ�".$result[birth];
}	
?></td>
          <td align="left" valign="top" bgcolor="#efefef"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top" style="border-bottom:#ffffff solid 1px;">����ʱ�䣺
            <?=$addtime?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
if(($_SESSION['super']==3) || ($boardmaster==$_SESSION['username']) || ($username1==$_SESSION['username']))
{
?>
            <a href="view.php?act=edittopic&id=<?=$id?>">�༭</a>
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
$page=isset($_GET['page'])?intval($_GET['page']):1;        //�����ǻ�ȡpage=18�е�page��ֵ�����粻����page����ôҳ������1��
$num=7;  
$total=$db->getcount("select * from review where tid='$id'");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
//ҳ�����
$pagenum=ceil($total/$num);     //�����ҳ��,Ҳ�����һҳ
$page=min($pagenum,$page);//�����ҳ
$prepg=$page-1;//��һҳ
$nextpg=($page==$pagenum ? 0 : $page+1);//��һҳ
$offset=($page-1)*$num;
$result=$db->query("select * from review where tid='".$id."' limit $offset,$num");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
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
  echo "�û��ѱ�ɾ��";
}
else
{
  $showuser1=$db->getfirst("select * from `user` where username='".$user1."'");
  echo "������".$showuser1[truename]."<br />�绰��".$showuser1[tel]."<br />�ֻ���".$showuser1[mobile]."<br />E-mail��".$showuser1[email]."<br />���գ�".$showuser1[birth];
}	
?></td>
          <td align="left" valign="top" class="f_one"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top" style="border-bottom:#ffffff solid 1px;">�ظ�ʱ�䣺
            <?=$row[addtime]?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
if(($_SESSION['super']==3) || ($boardmaster==$_SESSION['username']))
{
 if($row[islock]==1)
  {
   echo "<a href='view.php?act=viewunislock&id=".$row[id]."'>ͨ�����</a> ";
  }
  elseif($row[islock]==0)
  {
   echo "<a href='view.php?act=viewislock&id=".$row[id]."'>��ͨ�����</a> ";
  }
?>
            <a href="view.php?act=delview&id=<?=$row[id]?>" onClick="{if(confirm('ȷ��Ҫɾ����\n\nɾ���������޷���ԭ!')){return true;}return false;}">ɾ��</a>
            <?php
}
if(($_SESSION['super']==3) || ($boardmaster==$_SESSION['username']) || ($user1==$_SESSION['username']))
{
?>
            <a href="view.php?act=editview&id=<?=$row[id]?>&tid=<?=$id?>">�༭</a>
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
			  <?=(empty($row[title])?"":"���⣺".$row[title])?>
            <br />
            <?=$row[content]?>
<?php  
    }
    else
    {
	 echo "�ûظ���δͨ�����";
    }
}
else
{
?>
			  <?=(empty($row[title])?"":"���⣺".$row[title])?>
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
            <td align="left" colspan="2"><strong>�ظ�����</strong></a></td>
          </tr>
          <tr>
            <td width="96" align="left">����</td>
            <td width="648" align="left"><input type="text" name="title" size="40" maxlength="150"></td>
          </tr>
          <tr>
            <td width="96" align="left">����</td>
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
            <td colspan="2" align="center" bgcolor="#ffffff"><input type="submit" value="����ظ�"></td>
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
 echo ("<script type='text/javascript'> alert('����Ϊ�գ�');history.go(-1);</script>");
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
Error("����ɹ���","view.php?id=".$tid);
exit;
}
elseif($_GET['act']=="istop")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","view.php?id=".$_GET['id']);
		die();
	}
$db->update("update topic set istop=1 where id='".$_GET['id']."'");
Error("�ö��ɹ���","view.php?id=".$_GET['id']);
exit;
}
elseif($_GET['act']=="unistop")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","view.php?id=".$_GET['id']);
		die();
	}
$db->update("update topic set istop=0 where id='".$_GET['id']."'");
Error("����ö��ɹ���","view.php?id=".$_GET['id']);
exit;
}
elseif($_GET['act']=="iselite")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","view.php?id=".$_GET['id']);
		die();
	}
$db->update("update topic set iselite=1 where id='".$_GET['id']."'");
Error("���þ����ɹ���","view.php?id=".$_GET['id']);
exit;
}
elseif($_GET['act']=="uniselite")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","view.php?id=".$_GET['id']);
		die();
	}
$db->update("update topic set iselite=0 where id='".$_GET['id']."'");
Error("��������ɹ���","view.php?id=".$_GET['id']);
exit;
}
elseif($_GET['act']=="islock")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","view.php?id=".$_GET['id']);
		die();
	}
$db->update("update topic set `islock`=1 where id='".$_GET['id']."'");
echo ("<script type='text/javascript'> alert('���������ɹ���');history.go(-1);</script>");
//Error("���������ɹ���","view.php?id=".$_GET['id']);
exit;
}
elseif($_GET['act']=="unislock")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","view.php?id=".$_GET['id']);
		die();
	}
	$lockid=intval($_GET['id']);
$db->update("update topic set `islock`=0 where id='$lockid'");
echo ("<script type='text/javascript'> alert('������˳ɹ���');history.go(-1);</script>");
//Error("���ӽ����ɹ���","view.php?id=".$lockid);
exit;
}
elseif($_GET['act']=="viewislock")
{
	if(empty($_GET['id']))
	{
		echo ("<script type='text/javascript'> alert('�Ƿ�������');history.go(-1);</script>");
		die();
	}
$db->update("update review set `islock`=1 where id='".$_GET['id']."'");
echo ("<script type='text/javascript'> alert('�ظ����������ɹ���');history.go(-1);</script>");
exit;
}
elseif($_GET['act']=="viewunislock")
{
	if(empty($_GET['id']))
	{
		echo ("<script type='text/javascript'> alert('�Ƿ�������');history.go(-1);</script>");
		die();
	}
	$lockid=intval($_GET['id']);
$db->update("update review set `islock`=0 where id='$lockid'");
echo ("<script type='text/javascript'> alert('�ظ�������˳ɹ���');history.go(-1);</script>");
exit;
}
elseif($_GET['act']=="del")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","view.php?id=".$_GET['id']);
		die();
	}
$del1=$db->getfirst("select * from topic where id='".$_GET['id']."'");
$delbid=$del1[bid];//���ID
$dreviewcount=$del1[reviewcount];//�ظ�������
$del2=$db->getfirst("select * from board where id='".$delbid."'");
$dtopicnum=$del2[topicnum]-1;//��������
$dtotaltopic=$del2[totaltopic]-1;
$dtotaltopic=$dtotaltopic-$dreviewcount;//��������
$db->update("update board set topicnum='$dtopicnum',totaltopic='$dtotaltopic' where id='$delbid'");
$rs = $db->query("delete from topic where id='".$_GET['id']."'");
$rs = $db->query("delete from review where tid='".$_GET['id']."'");
Error("ɾ���ɹ���","list.php?id=".$delbid);
exit;
}
elseif($_GET['act']=="delview")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","home.php");
		die();
	}
$del3=$db->getfirst("select * from review where id='".$_GET['id']."'");	
$deltid=$del3[tid];//����ID
$del4=$db->getfirst("select * from topic where id='".$deltid."'");
$dbid1=$del4[bid];//���ID
$db->update("update topic set reviewcount=reviewcount-1 where id='".$deltid."'");
$db->update("update board set totaltopic=totaltopic-1 where id='".$dbid1."'");
$rs = $db->query("delete from review where id='".$_GET['id']."'");
Error("ɾ���ɹ���","view.php?id=".$deltid);
exit;
}
elseif($_GET['act']=="edittopic")
{
	if(empty($_GET['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
$edit1=$db->getfirst("select * from topic where id='".$_GET['id']."'");
?>
      <form action="view.php?act=edittopicok" method="post" name="form1">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <table cellspacing="1" cellpadding="5" width="776" align="center" bgcolor="#ffffff" style="margin-top:2px;">
          <tr class="cbg">
            <td align="left" colspan="2"><strong>�༭����</strong></a></td>
          </tr>
          <tr>
            <td width="96" align="left">����</td>
            <td width="648" align="left"><input type="text" name="title" size="40" maxlength="150" value="<?=$edit1[title]?>"></td>
          </tr>
          <tr>
            <td width="96" align="left">����</td>
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
            <td colspan="2" align="center"><input type="submit" value="�༭����"></td>
          </tr>
        </table>
      </form>
<?php
}
elseif($_GET['act']=="edittopicok")
{
	if(empty($_POST['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
$title=SafeHtml($_POST['title']);
$content=$_POST['content'];
$edittime=date("Y-m-d G:i:s");
$ip=@getip($realip);
if(empty($title) || empty($content))
{
 echo ("<script type='text/javascript'> alert('���������Ϊ�գ�');history.go(-1);</script>");
 exit;
}
$db->update("update topic set title='".$title."',content='".$content."',edittime='".$edittime."',ip='".$ip."' where id='".$_POST['id']."'");  
Error("�༭����ɹ���","view.php?id=".$_POST['id']);
exit;
}
elseif($_GET['act']=="editview")
{
	if(empty($_GET['id']) || empty($_GET['tid']))
	{
		echo "�����Ƿ�...";
		die();
	}
$edit2=$db->getfirst("select * from review where id='".$_GET['id']."'");
?>
      <form action="view.php?act=editviewok" method="post" name="form1">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <input type="hidden" name="tid" value="<?=$_GET['tid']?>">
        <table cellspacing="1" cellpadding="5" width="776" align="center" bgcolor="#ffffff" style="margin-top:2px;">
          <tr class="cbg">
            <td align="left" colspan="2"><strong>�༭�ظ�</strong></a></td>
          </tr>
          <tr>
            <td width="96" align="left">����</td>
            <td width="648" align="left"><input type="text" name="title" size="40" maxlength="150" value="<?=$edit2[title]?>"></td>
          </tr>
          <tr>
            <td width="96" align="left">����</td>
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
            <td colspan="2" align="center"><input type="submit" value="�༭�ظ�"></td>
          </tr>
        </table>
      </form>
<?php
}
elseif($_GET['act']=="editviewok")
{
	if(empty($_POST['id']) || empty($_POST['tid']))
	{
		echo "�����Ƿ�...";
		die();
	}
$title=SafeHtml($_POST['title']);
$content=$_POST['content'];
$edittime=date("Y-m-d G:i:s");
$ip=@getip($realip);
if(empty($title) || empty($content))
{
 echo ("<script type='text/javascript'> alert('���������Ϊ�գ�');history.go(-1);</script>");
 exit;
}
$db->update("update review set title='".$title."',content='".$content."',edittime='".$edittime."',ip='".$ip."' where id='".$_POST['id']."'");  
Error("�༭�ظ��ɹ���","view.php?id=".$_POST['tid']);
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
