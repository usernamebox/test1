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
<title><?=$sitename?>_�</title>
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
// �����ύ�ͻ��˼��
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
//���ӹ���
if($_GET['act']== "add")
{
?>
<form action="active.php?act=addok" method="post" name="form1" onSubmit="return doCheck();">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">�����</td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>����:</td>
      <td height="23" align="left"><select name="cat">
	  <option value="1">��̳</option>
	  <option value="2">�Ի�</option>
	  <option value="3">ɳ��</option>
	  <option value="4">���</option>
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
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">����:</td>
      <td height="23" align="left"><input name="istop" type="checkbox" id="istop" value="1" onClick="seeme();">
          ͷ��</td>
	</tr>
	<tr class="lanyuds" id="top" style="display:none;">
      <td height="23"  width="12%" align="right">ͼƬ:</td>
      <td height="23" align="left" valign="middle"><input name="photo" size="30" maxlength="200" type="text"> 
      �����С:105*73<br>
      <iframe frameborder="0" width="280" height="26" scrolling="No" src="../upload_pic.htm"></iframe></td>
	</tr>
<script> 
function seeme()
{
	if (document.form1.istop.checked==true) document.getElementById('top').style.display='';
	else document.getElementById('top').style.display='none';
}
</script> 
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	            <input type="submit" name="submit" value="����">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="ȡ��" onClick="document.location.href='active.php?act=list';">
        </p></td>
    </tr>
  </table>
</form>
<?php
}
//��������
elseif($_GET['act'] == "addok")
{
    $cat=$_POST['cat'];
    $istop = isset($_POST["istop"]) ? 1 : 0;
    $title=SafeHtml($_POST['title']);
    $author=SafeHtml($_POST['author']);
	$show=SafeHtml($_POST['show']);
    $ntime=SafeHtml($_POST['ntime']);
    $content=$_POST['content'];
    $hits=intval($_POST['hits']);
	$photo=SafeHtml($_POST['photo']);
	$result=$db->query("select * from active");
	$db->insert("INSERT INTO `active` ( `cat` , `title` , `author` , `show` , `ntime` , `content` , `hits`, `istop`, `photo`) VALUES('".$cat."','".$title."','".$author."','".$show."','".$ntime."','".$content."','".$hits."','".$istop."','".$photo."')");
	Error("���ӳɹ���","active.php?act=list");
    echo "���ӳɹ�";
}
//�б�
elseif($_GET['act']=="list")
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //�����ǻ�ȡpage=18�е�page��ֵ�����粻����page����ôҳ������1��
$num=30;  //ÿҳ��¼��.
$total=$db->getcount("select * from active");
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
    <td height="20"  colspan="4">�����</td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center">���</div></td>
    <td width="18%" height="23"><div align="center">���</div></td>
    <td width="57%"><div align="center">����</div></td>
    <td width="13%"><div align="center">����</div></td>
  </tr>
<?php  
$result=$db->query("select * from active order by id desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
while($row=$db->getarray($result)){
?>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center"><?=$row[id]?></div></td>
    <td width="18%" height="23"><div align="center"><?php if($row[cat]==1)
	  {
	    echo "��̳";
	  }
	  elseif($row[cat]==2)
	  {
	    echo "�Ի�";
	  }
	  elseif($row[cat]==3)
	  {
	    echo "ɳ��";
	  }
	  elseif($row[cat]==4)
	  {
	    echo "���";
	  }
	 ?></div></td>
    <td width="57%" height="23"><div align="center"><?=$row[title]?><?=($row[istop]==1)?"(ͷ��)":""?></div></td>
    <td width="13%"><div align="center"><a href="active.php?id=<?=$row[id]?>&act=del" onClick="{if(confirm('ȷ��Ҫɾ����\n\nɾ��֮����޷���ԭ!')){return true;}return false;}">ɾ��</a>&nbsp;&nbsp;<a href="active.php?id=<?=$row[id]?>&act=edit">�޸�</a></div></td>
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
		Error("�Ƿ�����...","active.php?act=list");
		die();
	}
	$row = $db->query("SELECT * FROM active WHERE id='".$_GET['id']."'");
    //mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
   $edit=$db->getarray($row);
?>
<form action="active.php?act=editok" method="post" name="form1" onSubmit="return doCheck();">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">��޸�</td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>����:</td>
      <td height="23" align="left"><select name="cat">
	  <option value="1" <?=($edit[cat]==1?"selected":"")?>>��̳</option>
	  <option value="2" <?=($edit[cat]==2?"selected":"")?>>�Ի�</option>
	  <option value="3" <?=($edit[cat]==3?"selected":"")?>>ɳ��</option>
	  <option value="4" <?=($edit[cat]==4?"selected":"")?>>���</option>
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
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">����:</td>
      <td height="23" align="left">
	  <input name="istop" type="checkbox" id="istop" value="1" onClick="seeme();" <?=($edit[istop] ? " checked" :"")?>>
          ͷ��</td>
	</tr>
	<tr class="lanyuds" id="top" <?php if($edit[istop]==1){
	  echo  "style=display:block;";}
	  elseif($edit[istop]==0) {
	  echo  "style=display:none;";}
	  ?>>
      <td height="23"  width="12%" align="right">ͼƬ:</td>
      <td height="23" align="left" valign="middle"><input name="photo" size="30" maxlength="200" type="text" value="<?=$edit[photo]?>"> 
      �����С:105*73<br>
      <iframe frameborder="0" width="280" height="26" scrolling="No" src="../upload_pic.htm"></iframe></td>
	</tr>
<script> 
function seeme()
{
	if (document.form1.istop.checked==true) document.getElementById('top').style.display='';
	else document.getElementById('top').style.display='none';
}
</script> 
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	      <input type="hidden" name="id" value="<?=$edit[id]?>">
          <input type="submit" name="submit" value="�޸�">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="ȡ��" onClick="document.location.href='active.php?act=list';">
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
		Error("�Ƿ�����...","active.php?act=edit");
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
	$db->update("update active set cat='".$cat."',title='".$title."',author='".$author."',`show`='".$show."',ntime='".$ntime."',content='".$content."',hits='".$hits."',istop='".$istop."',photo='".$photo."' where id='".$_POST['id']."'");  
	Error("�޸ĳɹ���","active.php?act=list");
    echo "�޸ĳɹ�";
}
//ɾ������
elseif($_GET['act'] == "del")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","active.php?act=list");
		die();
	}
	$rs = $db->query("delete from active where id='".$_GET['id']."'");
	Error("ɾ���ɹ���","active.php?act=list");
    echo "ɾ���ɹ�";
}
?>
</body>
</html>