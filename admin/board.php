<?php 
session_start();
?>
<?php 
include('../inc/site.php');
include('./islogin.php');
include('../inc/db_class.php');
include('../inc/function.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title><?=$sitename?>_��԰</title>
<meta name="author" content="Alanliu">
<link href="images/admin.css" rel="stylesheet" type="text/css">
<style type=text/css>
body  {  
font:Verdana 12px; 
SCROLLBAR-FACE-COLOR: #799AE1; 
SCROLLBAR-HIGHLIGHT-COLOR: #799AE1; 
SCROLLBAR-SHADOW-COLOR: #799AE1; 
SCROLLBAR-DARKSHADOW-COLOR: #799AE1; 
SCROLLBAR-3DLIGHT-COLOR: #799AE1; 
SCROLLBAR-ARROW-COLOR: #FFFFFF;
SCROLLBAR-TRACK-COLOR: #AABFEC;
}
table { border:0px; }
td  { font:normal 12px ����;}
img  { vertical-align:bottom; border:0px; }
a  { font:normal 12px ����; color:#000000; text-decoration:none; }
a:hover  { color:#428EFF;text-decoration:underline; }
.sec_menu  { border-left:1px solid white; border-right:1px solid white; border-bottom:1px solid white; overflow:hidden; background:#D6DFF7; }
.menu_title  { }
.menu_title span  { position:relative; top:0px; left:8px; color:#000000; font-weight:bold; }
.menu_title2  { }
.menu_title2 span  { position:relative; top:0px; left:8px; color:#999999; font-weight:bold; }
</style>
</head>

<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
  <tr class="lanyuss">
    <td height="20">��԰�������</td>
  </tr>
  <tr class="lanyuds">
    <td height="23"><a href="board.php?act=add">����°��</a> �� <a href="board.php?act=list">������</a> �� <a href="javascript:history.back();">������һ��</a></td>
  </tr>
</table><br>
<?php
if($_GET['act']== "add")
{
?>
<form action="board.php?act=addok" method="post" name="form1" onSubmit="return doCheck();">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">����°��</td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>�������:</td>
      <td height="23" align="left"><input type="text" name="catname" maxlength="50" size="40"></td>
    </tr>
    <tr class="lanyuds">
      <td  width="12%" height="23" align="right" valign="top">�������:</td>
      <td height="23" align="left"><textarea name="readme" cols="40" rows="8" onpropertychange="if(value.length>150)value=value.substr(0,150)"></textarea></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">��̳����:</td>
      <td height="23" align="left"><input type="text" name="boardmaster" maxlength="150" size="40"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">���Ȩ��:</td>
      <td height="23" align="left"><input type="radio" name="setting1" value="0" checked="checked">�ο����&nbsp;<input type="radio" name="setting1" value="1">��Ա���</td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">����ʽ:</td>
      <td height="23" align="left"><input type="radio" name="setting2" value="0" checked="checked">������&nbsp;<input type="radio" name="setting2" value="1">���ظ�</td>
    </tr>
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	            <input type="submit" name="submit" value="����">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="ȡ��" onclick="document.location.href='board.php?act=list';">
        </p></td>
    </tr>
  </table>
</form>
<?php
}
//������ӹ���
elseif($_GET['act'] == "addok")
{
    $catname=SafeHtml($_POST['catname']);
    $readme=SafeHtml($_POST['readme']);
    $boardmaster=SafeHtml($_POST['boardmaster']);
    $setting1=intval($_POST['setting1']);
	$setting2=intval($_POST['setting2']);
	if(empty($catname))
	{
     echo ("<script type='text/javascript'>alert('����������Ȩ�޻�����ʽ�����ǿյ�');history.go(-1);</script>");
     exit;}
	$result=$db->query("select * from `board`");
	$db->insert("INSERT INTO `board` ( `catname` , `readme` , `boardmaster` , `setting1` , `setting2`) VALUES('".$catname."','".$readme."','".$boardmaster."','".$setting1."','".$setting2."')");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=board.php?act=list\">";
	exit;
}
elseif($_GET['act']=="list")
{
$total=$db->getcount("select * from board");
?>
<table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
  <tr class="lanyuss">
    <td height="20"  colspan="3">������</td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center">���</div></td>
    <td width="62%" height="23"><div align="center">�����</div></td>
    <td width="26%"><div align="center">����</div></td>
  </tr>
<?php  
$result=$db->query("select * from board order by id desc limit 0,$total");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
while($row=$db->getarray($result)){
?>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center"><?=$row[id]?></div></td>
    <td width="62%" height="23"><div align="center"><?=$row[catname]?></div></td>
    <td width="26%"><div align="center"><a href="board.php?id=<?=$row[id]?>&act=del" onClick="{if(confirm('ȷ��Ҫɾ����\n\nɾ��֮����޷���ԭ!')){return true;}return false;}">ɾ��</a>&nbsp;&nbsp;<a href="board.php?id=<?=$row[id]?>&act=edit">�޸�</a></div></td>
  </tr>
<?php
}
?>  
</table>
<?php
}
elseif($_GET['act'] == "edit")
{
	if(empty($_GET['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
	$row = $db->query("SELECT * FROM board WHERE id='".$_GET['id']."'");
    //mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
   $edit=$db->getarray($row);
?>
<form action="board.php?act=editok" method="post" name="form1" onSubmit="return doCheck();">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">�޸İ��</td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>�������:</td>
      <td height="23" align="left"><input type="text" name="catname" maxlength="50" size="40" value="<?=$edit[catname]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td  width="12%" height="23" align="right" valign="top">�������:</td>
      <td height="23" align="left"><textarea name="readme" cols="40" rows="8" onpropertychange="if(value.length>150)value=value.substr(0,150)"><?=$edit[readme]?></textarea></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">��̳����:</td>
      <td height="23" align="left"><input type="text" name="boardmaster" maxlength="150" size="40" value="<?=$edit[boardmaster]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">���Ȩ��:</td>
      <td height="23" align="left">
	  <input type="radio" name="setting1" value="0" <?=($edit[setting1]==0?"checked":"")?>>�ο����
	  &nbsp;<input type="radio" name="setting1" value="1" <?=($edit[setting1]==1?"checked":"")?>>��Ա���</td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">����ʽ:</td>
      <td height="23" align="left"><input type="radio" name="setting2" value="0" <?=($edit[setting2]==0?"checked":"")?>>������&nbsp;<input type="radio" name="setting2" value="1" <?=($edit[setting2]==1?"checked":"")?>>���ظ�</td>
    </tr>
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	  <input type="hidden" name="id" value="<?=$edit[id]?>">
	            <input type="submit" name="submit" value="�޸�">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="ȡ��" onclick="document.location.href='board.php?act=list';">
        </p></td>
    </tr>
  </table>
</form>
<?php
}
elseif($_GET['act'] == "editok")
{
	if(empty($_POST['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
    $catname=SafeHtml($_POST['catname']);
    $readme=SafeHtml($_POST['readme']);
    $boardmaster=SafeHtml($_POST['boardmaster']);
    $setting1=intval($_POST['setting1']);
	$setting2=intval($_POST['setting2']);
	if(empty($catname))
	{
     echo ("<script type='text/javascript'>alert('����������Ȩ�޻�����ʽ�����ǿյ�');history.go(-1);</script>");
     exit;
	 }
	$db->update("update board set catname='".$catname."',readme='".$readme."',boardmaster='".$boardmaster."',setting1='".$setting1."',setting2='".$setting2."' where id='".$_POST['id']."'");  
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=board.php?act=list\">";
    exit;
}
//ɾ������
elseif($_GET['act'] == "del")
{
	if(empty($_GET['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
	$rs = $db->query("delete from board where id='".$_GET['id']."'");
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=board.php?act=list\">";
    exit;
}
?>
</body>
</html>
