<?php 
session_start();
include('../inc/site.php');
include('./islogin.php');
include('../inc/db_class.php');
include('../inc/function.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title><?=$sitename?>_ѧ������</title>
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
<SCRIPT>
<!--
function is_email(str)
{ if((str.indexOf("@")==-1)||(str.indexOf(".")==-1)){
	
	return false;
	}
	return true;
}
function CheckForm(theForm)
{
if (theForm.title.value.length == 0)
	{
		alert("��������⣡")
		theForm.title.focus()
		return false
	}
if (document.form1.title.value.indexOf("<")!=-1 || document.form1.title.value.indexOf(">")!=-1)
{
		alert("������ı����а����Ƿ��ַ� (<,>) ");
		document.form1.title.focus();
		return false;
	}
	if (document.form1.title.value.indexOf("'")!=-1)
   {
		alert("������ı����а����Ƿ��ַ� (') ");
		document.form1.title.focus();
		return false;
	}
	if(!empty(form1.email.value)) {
	if(!is_email(form1.email.value))
	{ alert("�Ƿ���EMail��ַ��");
		form1.email.focus();
	return false;
	}
}
if (theForm.content.value.length == 0)
	{
		alert("���������ݣ�")
		theForm.content.focus()
		return false
	}
if (document.form1.content.value.indexOf("<")!=-1 || document.form1.content.value.indexOf(">")!=-1)
{
		alert("������������а����Ƿ��ַ� (<,>) ");
		document.form1.content.focus();
		return false;
}
if (document.form1.content.value.indexOf("'")!=-1)
{
		alert("������������а����Ƿ��ַ� (') ");
		document.form1.content.focus();
		return false;
}
return true;
}
//-->
</SCRIPT>
</head>

<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<?php
//�б�
if($_GET['act']=="list")
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //�����ǻ�ȡpage=18�е�page��ֵ�����粻����page����ôҳ������1��
$num=8;  //ÿҳ��¼��.
$total=$db->getcount("select * from book");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
//ҳ�����
$pagenum=ceil($total/$num);     //�����ҳ��,Ҳ�����һҳ
$page=min($pagenum,$page);//�����ҳ
$prepg=$page-1;//��һҳ
$nextpg=($page==$pagenum ? 0 : $page+1);//��һҳ
$offset=($page-1)*$num;
?>
<table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
  <tr class="lanyuss">
    <td height="20">ѧ����������</td>
  </tr>
  <tr class="lanyuds">
    <td height="23">
<?php  
$result=$db->query("select * from book order by id desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
while($row=$db->getarray($result)){
?>
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#ffffff" style="padding:0 0 0 4px;">
                                <tr bgcolor="#E4EDF9">
                                  <td width="63%" height="24">���ߣ�<?=$row[yname]?>[<?=($row[hidden]==0?"����":"���Ļ�")?>]</td>
                                  <td width="37%">����ʱ�䣺
                                    <?=$row[utime]?>
                                  &nbsp;&nbsp;&nbsp;<img src="../images/icon_tel.gif" width="16" height="16" border="0" alt="<?=$row[yname]?>�ĵ绰��<?=$row[tel]?>">&nbsp;&nbsp;<img src="../images/icon_email.gif" width="16" height="16" border="0" alt="<?=$row[yname]?>��E-mail��<?=$row[email]?>">&nbsp;&nbsp;<img src="../images/icon_ip.gif" width="16" height="16" border="0" alt="<?=$row[yname]?>����<?=$row[ip]?>"></td>
                                </tr>
                                <tr>
                                  <td colspan="2" bgcolor="#FFF8EE">���⣺
                                    <?=$row[title]?>
                                    <br />
                                    <?=$row[content]?>
                                    <?php
if(!(empty($row[review])))
{
echo "<br>------------------------------------------------------------------------------------------------------<br>";
echo "վ���ظ���".$row[review];
}
?>
                                  </td>
                                </tr>
								 <tr>
                                  <td colspan="2" bgcolor="#E4EDF9" align="right" height="22"><?php
								  if($row[islock]==1)
								  {
								  echo "<a href='book.php?id=".$row[id]."&act=lock'>����</a>";
								  }
								  elseif($row[islock]==0)
								  {
								  echo "<a href='book.php?id=".$row[id]."&act=unlock'>���</a>";
								  }
								  ?> &nbsp;<a href="book.php?id=<?=$row[id]?>&act=review">�ظ�</a> &nbsp;<a href="book.php?id=<?=$row[id]?>&act=edit">�༭</a> &nbsp;<a href="book.php?id=<?=$row[id]?>&act=del" onClick="{if(confirm('ȷ��Ҫɾ����\n\nɾ��֮����޷���ԭ!')){return true;}return false;}">ɾ��</a>&nbsp;&nbsp;</td>
                                </tr>
                              </table><br>
                              <?php
}
?>	  							  
							  
							  </td>
  </tr>

  <tr class="lanyuqs">
      <td height="23" align="right"><?php 
include '../inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);
echo '[��'.$pagenum.'ҳ]';
?>	  </td>
    </tr>
</table>
<?php
}
//�޸Ĳ���
elseif($_GET['act'] == "edit")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","book.php?act=list");
		die();
	}
	$row = $db->query("SELECT * FROM book WHERE id='".$_GET['id']."'");
    //mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
   $edit=$db->getarray($row);
?>
<form action="book.php?act=editok" method="post" name="form1" onSubmit="return CheckForm(this);">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">ѧ�������޸�</td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">����:</td>
      <td height="23" align="left"><?=$edit[yname]?></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">�绰:</td>
      <td height="23" align="left"><input type="text" name="tel" maxlength="15" size="40" value="<?=$edit[tel]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">E-mail:</td>
      <td height="23" align="left"><input type="text" name="email" maxlength="30" size="40" value="<?=$edit[email]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font  color="#FF0000">*</font>���Ա���:</td>
      <td height="23" align="left"><input type="text" name="title" maxlength="150" size="40" value="<?=$edit[title]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="46"  width="12%" align="right" valign="top"><font color="#FF0000">*</font>��������:</td>
      <td height="46" align="left"><textarea name="content" cols="40" rows="10" id="content"><?=$edit[content]?></textarea></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">��������:</td>
      <td height="23" align="left"><input name="hidden" type="radio" value="0" <?=($edit[hidden]==0?"checked":"")?>>����
       <input type="radio" name="hidden" value="1" <?=($edit[hidden]==1?"checked":"")?>>���Ļ�</td>
    </tr>
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	      <input type="hidden" name="id" value="<?=$edit[id]?>">
          <input type="submit" name="submit" value="�޸�">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="ȡ��">
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
		Error("�Ƿ�����...","book.php?act=edit");
		die();
	}
$tel=SafeHtml($_POST['tel']);
$email=SafeHtml($_POST['email']);
$title=SafeHtml($_POST['title']);
$content=nl2br($_POST['content']);
if(empty($title) || empty($content))
{
   Error("�������������Ϊ�գ�","book.php?act=edit");
}
if(!empty($email)) {
   if(!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email))
   {
	 Error("�����ַ����ȷ��","book.php?act=edit");
   }
}
$hidden=$_POST['hidden'];
	$db->update("update book set tel='".$tel."',email='".$email."',title='".$title."',content='".$content."',hidden='".$hidden."' where id='".$_POST['id']."'");  
	Error("�޸ĳɹ���","book.php?act=list");
    echo "�޸ĳɹ�";
}
//�ظ�����
elseif($_GET['act'] == "review")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","book.php?act=list");
		die();
	}
	$row = $db->query("SELECT * FROM book WHERE id='".$_GET['id']."'");
    //mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
   $edit=$db->getarray($row);
?>
<form action="book.php?act=reviewok" method="post" name="form1" onSubmit="return CheckForm(this);">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">�ظ�����</td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">��������:</td>
      <td height="23" align="left"><?=$edit[title]?>[����:<?=$edit[yname]?>]</td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">��������:</td>
      <td height="23" align="left"><?=$edit[content]?></td>
    </tr>
    <tr class="lanyuds">
      <td height="46"  width="12%" align="right" valign="top"><font color="#FF0000">*</font>�ظ�����:</td>
      <td height="46" align="left"><textarea name="review" cols="40" rows="10" id="review"></textarea></td>
    </tr>
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	      <input type="hidden" name="id" value="<?=$edit[id]?>">
          <input type="submit" name="submit" value="�ظ�">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="ȡ��">
        </p></td>
    </tr>
  </table>
</form>
<?php
}
elseif($_GET['act'] == "reviewok")
{
	if(empty($_POST['id']))
	{
		Error("�Ƿ�����...","book.php?act=list");
		die();
	}
$review=nl2br($_POST['review']);
$rtime=date("Y-m-d G:i:s");
if(empty($review))
{
   Error("�ظ�����Ϊ�գ�","book.php?act=list");
}
	$db->update("update book set review='".$review."',rtime='".$rtime."' where id='".$_POST['id']."'");  
	Error("�ظ��ɹ���","book.php?act=list");
    die();
}
//ɾ������
elseif($_GET['act'] == "del")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","book.php?act=list");
		die();
	}
	$rs = $db->query("delete from book where id='".$_GET['id']."'");
	Error("ɾ���ɹ���","book.php?act=list");
    echo "ɾ���ɹ�";
}
//���
elseif($_GET['act'] == "unlock")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","book.php?act=list");
		die();
	}
	$db->update("update book set `islock`='1' where id='".$_GET['id']."'");  
	Error("��˳ɹ���","book.php?act=list");
    exit;
}
//����
elseif($_GET['act'] == "lock")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","book.php?act=list");
		die();
	}
	$db->update("update book set `islock`='0' where id='".$_GET['id']."'");  
	Error("�����ɹ���","book.php?act=list");
    exit;
}
?>

</body>
</html>
