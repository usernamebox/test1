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
<title><?=$sitename?>_��ҵ</title>
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
<script language="JavaScript">
// ���ύ�ͻ��˼��
function doCheck(){
  if (document.form1.title.value==""){
	   alert("<?=$sitename?>��������\n���ⲻ��Ϊ��!");
	   form1.title.focus();
	   return false;
  }
  // getHTML()ΪeWebEditor�Դ��Ľӿں���������Ϊȡ�༭��������
  if (WebEditor1.getHTML()==""){
	  alert("<?=$sitename?>��������\n���ݲ���Ϊ��!");
	  return false;
  }
}
</script>
</head>
<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<?php
//��ӹ���
if($_GET['act']== "add")
{
?>
<form action="sunshine.php?act=addok" method="post" name="form1" onSubmit="return doCheck();">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">��ҵ����</td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>����:</td>
      <td height="23" align="left"><select name="cat">
	  <option value="1">������ҵ</option>
	  <option value="2">��ҵ</option>
	  </select></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>����:</td>
      <td height="23" align="left"><input type="text" name="title" maxlength="150" size="40"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">������:</td>
      <td height="23" align="left"><input type="text" name="author" maxlength="50" size="40" value="<?=$_SESSION['admin']; ?>"></td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">������:</td>
      <td height="23" align="left"><input type="text" name="show" maxlength="50" size="40" value="<?php echo $_SESSION['admin']; ?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">����ʱ��:</td>
      <td height="23" align="left"><input type="text" name="ntime" maxlength="20" size="40" value="<?=date("y/m/d") ?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="46"  width="12%" align="right" valign="top"><font color="#FF0000">*</font>��Ҫ����:</td>
      <td height="46" align="left"><textarea name="content" style="display:none"></textarea>
        <iframe ID="WebEditor1" src="../WebEditor/ewebeditor.htm?id=content&style=coolblue" frameborder="0" scrolling="no" width="550" HEIGHT="350"></iframe></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">�������:</td>
      <td height="23" align="left"><input name="hits" type="text" value="0" size="10"></td>
    </tr>
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	            <input type="submit" name="submit" value="����">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="ȡ��" onclick="document.location.href='sunshine.php?act=list';">
        </p></td>
    </tr>
  </table>
</form>
<?php
}
//�������
elseif($_GET['act'] == "addok")
{
    $cat=$_POST['cat'];
    $title=SafeHtml($_POST['title']);
    $author=SafeHtml($_POST['author']);
	$show=SafeHtml($_POST['show']);
    $ntime=SafeHtml($_POST['ntime']);
    $content=$_POST['content'];
    $hits=intval($_POST['hits']);
	$result=$db->query("select * from sunshine");
	$db->insert("INSERT INTO `sunshine` ( `cat` , `title` , `author`, `show` , `ntime` , `content` , `hits`) VALUES('".$cat."','".$title."','".$author."','".$show."','".$ntime."','".$content."','".$hits."')");
	Error("��ӳɹ���","sunshine.php?act=list");
    echo "��ӳɹ�";
}
//�б�
elseif($_GET['act']=="list")
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //�����ǻ�ȡpage=18�е�page��ֵ�����粻����page����ôҳ������1��
$num=30;  //ÿҳ��¼��.
$total=$db->getcount("select * from sunshine");
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
    <td height="20"  colspan="4">��ҵ����</td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center">���</div></td>
    <td width="18%" height="23"><div align="center">���</div></td>
    <td width="57%"><div align="center">����</div></td>
    <td width="13%"><div align="center">����</div></td>
  </tr>
<?php  
$result=$db->query("select * from sunshine order by id desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
while($row=$db->getarray($result)){
?>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center"><?=$row[id]?></div></td>
    <td width="18%" height="23"><div align="center"><?php if($row[cat]==1)
	  {
	    echo "������ҵ";
	  }
	  elseif($row[cat]==2)
	  {
	    echo "��ҵ";
	  }
	 ?></div></td>
    <td width="57%" height="23"><div align="center"><?=$row[title]?></div></td>
    <td width="13%"><div align="center"><a href="sunshine.php?id=<?=$row[id]?>&act=del" onClick="{if(confirm('ȷ��Ҫɾ����\n\nɾ��֮����޷���ԭ!')){return true;}return false;}">ɾ��</a>&nbsp;&nbsp;<a href="sunshine.php?id=<?=$row[id]?>&act=edit">�޸�</a></div></td>
  </tr>
<?php
}
?>  
  <tr class="lanyuqs">
      <td height="23" colspan="4" align="right"><?php 
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
		Error("�Ƿ�����...","sunshine.php?act=list");
		die();
	}
	$row = $db->query("SELECT * FROM sunshine WHERE id='".$_GET['id']."'");
    //mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
   $edit=$db->getarray($row);
?>
<form action="sunshine.php?act=editok" method="post" name="form1" onSubmit="return doCheck();">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">��ҵ�޸�</td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>����:</td>
      <td height="23" align="left"><select name="cat">
	  <option value="1" <?=($edit[cat]==1?"selected":"")?>>������ҵ</option>
	  <option value="2" <?=($edit[cat]==2?"selected":"")?>>��ҵ</option>
	  </select></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>����:</td>
      <td height="23" align="left"><input type="text" name="title" maxlength="150" size="40" value="<?=$edit[title]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">������:</td>
      <td height="23" align="left"><input type="text" name="author" maxlength="50" size="40" value="<?=$edit[author]?>"></td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">������:</td>
      <td height="23" align="left"><input type="text" name="show" maxlength="50" size="40" value="<?=$edit[show]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">����ʱ��:</td>
      <td height="23" align="left"><input type="text" name="ntime" maxlength="20" size="40" value="<?=$edit[ntime]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="46"  width="12%" align="right" valign="top"><font color="#FF0000">*</font>��Ҫ����:</td>
      <td height="46" align="left"><textarea name="content" style="display:none"><?=$edit[content]?></textarea>
        <iframe ID="WebEditor1" src="../WebEditor/ewebeditor.htm?id=content&style=coolblue" frameborder="0" scrolling="no" width="550" HEIGHT="350"></iframe></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">�������:</td>
      <td height="23" align="left"><input name="hits" type="text" size="10" value="<?=$edit[hits]?>"></td>
    </tr>
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	      <input type="hidden" name="id" value="<?=$edit[id]?>">
          <input type="submit" name="submit" value="�޸�">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="ȡ��" onclick="document.location.href='sunshine.php?act=list';">
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
		Error("�Ƿ�����...","sunshine.php?act=edit");
		die();
	}
	$cat=$_POST['cat'];
	$istop = isset($_POST["istop"]) ? 1 : 0;
    $title=SafeHtml($_POST['title']);
    $author=SafeHtml($_POST['author']);
	$show=SafeHtml($_POST['show']);
    $ntime=SafeHtml($_POST['ntime']);
    $content=$_POST['content'];
    $hits=intval($_POST['hits']);
	$photo=SafeHtml($_POST['photo']);
	$db->update("update sunshine set cat='".$cat."',title='".$title."',author='".$author."',`show`='".$show."',ntime='".$ntime."',content='".$content."',hits='".$hits."' where id='".$_POST['id']."'");  
	Error("�޸ĳɹ���","sunshine.php?act=list");
    echo "�޸ĳɹ�";
}
//ɾ������
elseif($_GET['act'] == "del")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","sunshine.php?act=list");
		die();
	}
	$rs = $db->query("delete from sunshine where id='".$_GET['id']."'");
	Error("ɾ���ɹ���","sunshine.php?act=list");
    echo "ɾ���ɹ�";
}
?>
</body>
</html>
