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
<title>
<?=$sitename?>
_��Ա����</title>
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
<?php
//��ӹ���
if($_GET['act']== "add")
{
?>
<form action="user.php?act=addok" method="post" name="form1" onSubmit="return Validator.Validate(this,2)">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">����»�Ա</td>
    </tr>
    <tr class="lanyuds">
      <td width="39%" align="left" style="padding:0px 8px;"><strong>�û�����</strong><br />
        ��������Ϊ4��12�ֽ�,������ĸ��ͷ.</td>
      <td width="61%" align="left"><input type="text" name="username" size="20" maxlength="12" dataType="Username" msg="�û��������Ϲ涨" />
        <span class="STYLE3">*</span></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>����(����5λ)��</strong><br />
        ���������룬<br />
        �벻Ҫʹ���κ����� '*'��' ' �� HTML �ַ�</td>
      <td align="left"><input type="password" name="userpass" size="20" maxlength="20" dataType="LimitB" msg="���벻���ϰ�ȫ����" min="5" max="20" />
        <span class="STYLE3">*</span></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>ȷ�����룺</strong><br />
        ������һ��ȷ��</td>
      <td align="left"><input type="password" name="cuserpass" size="20" maxlength="20" dataType="Repeat" to="userpass" msg="������������벻һ��" />
        <span class="STYLE3">*</span></td>
    </tr>
  </table>
  <table width="98%" border="1" align="center" cellpadding="4" cellspacing="0" class="lanyubk" id=adv style="DISPLAY: none;border-collapse: collapse">
    <tr class="lanyuds">
      <td width="39%" align="left" style="padding:0px 8px;"><strong>�������⣺</strong><br />
        ������������ʱ���ɴ��һ����롣<br />
        ��������Ϊ6��20�ֽ�</td>
      <td width="61%" align="left"><input type="text" name="question" size="20" maxlength="20" dataType="Limit" msg="�������ⲻ���Ϲ���" min="6" max="20" />
        <span class="STYLE3">*</span></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>����𰸣�</strong><br />
        ������������ʱ���ɴ��һ����롣<br />
        ��������Ϊ6��20�ֽ�</td>
      <td align="left"><input type="text" name="answer" size="20" maxlength="20" dataType="Limit" msg="����𰸲����Ϲ���" min="6" max="20" />
        <span class="STYLE3">*</span></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>��ʵ������</strong></td>
      <td align="left"><input type="text" name="truename" size="20" maxlength="20" require="false" dataType="Chinese" msg="����ֻ��������" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>�������£�</strong><br />
        �磺1900��01��01��</td>
      <td align="left"><input type="text" name="birth" size="20" maxlength="10" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>��Ƭ��</strong></td>
      <td align="left"><input name="photo" size="30" maxlength="200" type="text" />
        <br />
        <iframe frameborder="0" width="290" height="26" scrolling="No" src="../upload_pic.htm"></iframe></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>���ڵ�λ��</strong></td>
      <td align="left"><input type="text" name="com" size="20" maxlength="50" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>ְ��</strong></td>
      <td align="left"><input type="text" name="postion" size="20" maxlength="20" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>��λ��飺</strong></td>
      <td align="left"><input type="text" name="intro" size="20" maxlength="200" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>ͨѶ��ַ���ʱࣺ</strong></td>
      <td align="left"><input type="text" name="address" size="20" maxlength="100" />
        &nbsp;&nbsp;
        <input type="text" name="zip" size="6" maxlength="6" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>��ϵ�绰��</strong></td>
      <td align="left"><input type="text" name="tel" size="20" maxlength="20" require="false" dataType="Phone" msg="�绰���벻��ȷ" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>���棺</strong></td>
      <td align="left"><input type="text" name="tax" size="20" maxlength="20" require="false" dataType="Phone" msg="������벻��ȷ" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>�ֻ���</strong></td>
      <td align="left"><input type="text" name="mobile" size="20" maxlength="12" require="false" dataType="Mobile" msg="�ֻ����벻��ȷ" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>E��mail��</strong></td>
      <td align="left"><input type="text" name="email" size="20" maxlength="30" require="false" dataType="Email" msg="�����ʽ����ȷ" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>�뽻ͨ��ѧ��ؽ���������</strong><br />
        ��ҵԺϵ������רҵ�����ڰ༶����ҵʱ��</td>
      <td align="left"><label>
        <textarea name="experience" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"></textarea>
        </label></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>������Ҫ����������</strong></td>
      <td align="left"><textarea name="job" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"></textarea></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>������Ȥ���ã�</strong></td>
      <td align="left"><input type="text" name="hoby" size="40" maxlength="100" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>�Խ����Ľ����������</strong></td>
      <td align="left"><textarea name="expect" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"></textarea></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>ϣ��Ϊ����У�ѻ��ṩ�ķ���</strong></td>
      <td align="left"><textarea name="hope" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"></textarea></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>������</strong></td>
      <td align="left"><input name="jianli" size="30" maxlength="200" type="text" />
        <br />
        <iframe frameborder="0" width="290" height="26" scrolling="No" src="../upload_soft.htm"></iframe></td>
    </tr>
  </table>
  <table width="98%" border="1" align="center" cellpadding="4" cellspacing="0" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
          <INPUT id=advcheck name=advshow type=checkbox value=1 onclick=showadv()>
          <span id=advance>��ʾ�߼��û�����ѡ��</span> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="submit" name="submit" value="������Ա">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="ȡ��" onclick="document.location.href='user.php?act=list';">
        </p></td>
    </tr>
  </table>
</form>
<?php
}
//������ӹ���
elseif($_GET['act'] == "addok")
{
	$username = SafeHtml($_POST['username']);
	$userpass = SafeHtml($_POST['userpass']);
	$cuserpass = SafeHtml($_POST['cuserpass']);
	if(empty($username) || empty($userpass) || empty($cuserpass))
	{
		Error("��Ա��������Ϊ�գ�","user.php?act=add");
	}
	#[�ж���������������Ƿ�һ��]
	if($userpass != $cuserpass)
	{
		Error("������������벻һ�£�","user.php?act=add");
	}
	$email = SafeHtml($_POST['email']);
	if(!empty($email)) {
	if(!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email))
	{
		Error("�����ַ����ȷ��","user.php?act=add");
	}
	}
	$question = SafeHtml($_POST['question']);
	$answer = SafeHtml($_POST['answer']);
	$truename = SafeHtml($_POST['truename']);
    $truename = SafeHtml($_POST['truename']);
	$birth = SafeHtml($_POST['birth']);
    $photo = SafeHtml($_POST['photo']);
    $com = SafeHtml($_POST['com']);
    $postion = SafeHtml($_POST['postion']);
    $intro = SafeHtml($_POST['intro']);
    $address = SafeHtml($_POST['address']);
	$zip = SafeHtml($_POST['zip']);
    $tel = SafeHtml($_POST['tel']);
    $tax = SafeHtml($_POST['tax']);
    $mobile = SafeHtml($_POST['mobile']);
    $experience = nl2br($_POST['experience']);
    $job = nl2br($_POST['job']);
    $hoby = SafeHtml($_POST['hoby']);
    $expect = nl2br($_POST['expect']);
    $hope = nl2br($_POST['hope']);
    $jianli = SafeHtml($_POST['jianli']);
	$check_user = $db->query("SELECT * FROM user where username='".$username."'");
	$row=$db->getarray($check_user);
	if($row)
	{
		Error("�û����Ѿ����ڣ�","user.php?act=add");
	}
	$db->insert("INSERT INTO `user` (`username`,`userpass`,`question`,`answer`,`email`,`truename`,`birth`,`photo`,`com`,`postion`,`intro`,`address`,`zip`,`tel`,`tax`,`mobile`,`experience`,`job`,`hoby`,`expect`,`hope`,`jianli`) VALUES('".$username."','".md5($userpass)."','".$question."','".$answer."','".$email."','".$truename."','".$birth."','".$photo."','".$com."','".$postion."','".$intro."','".$address."','".$zip."','".$tel."','".$tax."','".$mobile."','".$experience."','".$job."','".$hoby."','".$expect."','".$hope."','".$jianli."')");
	Error("��ӳɹ���","user.php?act=list");
    echo "��ӳɹ�";
}
//�����б�
//elseif($act == "list" || $act == "default")
elseif($_GET['act']=="list")
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //�����ǻ�ȡpage=18�е�page��ֵ�����粻����page����ôҳ������1��
$num=30;  //ÿҳ��¼��.
$total=$db->getcount("select * from user");
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
    <td height="20"  colspan="3">��Ա�б�</td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center">���</div></td>
    <td width="44%" height="23"><div align="center">�û���</div></td>
    <td width="44%"><div align="center">����</div></td>
  </tr>
  <?php  
$result=$db->query("select * from user order by id desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
while($row=$db->getarray($result)){
?>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center"><?php echo $row[id]; ?></div></td>
    <td width="44%" height="23"><div align="center"><?php 
	if($row[islock]==1)
	{ 
	echo "<font color='#ff0000'>".$row[username]."</font>";
	}
	elseif($row[islock]==0) 
	{ 
	echo $row[username];
	}	
	?></div></td>
    <td width="44%"><div align="center"><?php
	if($row[islock]==1)
	{
	 echo "<a href='user.php?id=".$row[id]."&act=unislock'><font color='#ff0000'>�������</font></a>&nbsp;&nbsp;";
	}
	elseif($row[islock]==0)
	{
	 echo "<a href='user.php?id=".$row[id]."&act=islock'>�����û�</a>&nbsp;&nbsp;";
	}	
	if($row[isteach]==1)
	{
	 echo "<a href='user.php?id=".$row[id]."&act=unteach'>ȥ����ʦͷ��</a>&nbsp;&nbsp;";
	}
	elseif($row[isteach]==0)
	{
	 echo "<a href='user.php?id=".$row[id]."&act=teach'>��ӵ�ʦͷ��</a>&nbsp;&nbsp;";
	}
	if($row[super]==3)
	{?>
	<a href="user.php?id=<?=$row[id]?>&act=unsuper">��Ϊ��ͨ��Ա</a>
	<?php
	}
	else
	{?>
	<a href="user.php?id=<?=$row[id]?>&act=super">��Ϊ����Ա</a><?php } ?>&nbsp;&nbsp;<a href="user.php?id=<?php echo $row[id]; ?>&act=edit">�޸�</a>&nbsp;&nbsp;<a href="user.php?id=<?php echo $row[id]; ?>&act=del" onClick="{if(confirm('ȷ��Ҫɾ����\n\nɾ��֮����޷���ԭ!')){return true;}return false;}">ɾ��</a></div></td>
  </tr>
  <?php
}
?>
  <tr class="lanyuqs">
    <td height="23" colspan="3" align="right"><?php 
include '../inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);
echo '[��'.$pagenum.'ҳ]';
?>
    </td>
  </tr>
</table>
<?php
}
//�޸Ĳ���
elseif($_GET['act'] == "edit")
{
	if(empty($_GET['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
	$row = $db->query("SELECT * FROM user WHERE id='".$_GET['id']."'");
    //mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
   $edit=$db->getarray($row);
?>
<form action="user.php?act=editok" method="post" name="form1" onSubmit="return Validator.Validate(this,2)">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">�޸Ļ�Ա����</td>
    </tr>
    <tr class="lanyuds">
      <td width="39%" align="left" style="padding:0px 8px;"><strong>�û�����</strong><br />
        ��������Ϊ4��12�ֽ�,������ĸ��ͷ.</td>
      <td width="61%" align="left"><input type="text" name="username" size="20" maxlength="12" dataType="Username" msg="�û��������Ϲ涨" value="<?=$edit[username]?>" />
        <span class="STYLE3">*</span></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>����(����5λ)��</strong><br />
        ���������룬<br />
        �벻Ҫʹ���κ����� '*'��' ' �� HTML �ַ�.<br>
        <font color="#FF0000">���޸�������.</font></td>
      <td align="left"><input type="password" name="userpass" size="20" maxlength="20" />
        <span class="STYLE3">*</span></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>ȷ�����룺</strong><br />
        ������һ��ȷ�ϣ�<font color="#FF0000">���޸�������.</font></td>
      <td align="left"><input type="password" name="cuserpass" size="20" maxlength="20" />
        <span class="STYLE3">*</span></td>
    </tr>
  </table>
  <table width="98%" border="1" align="center" cellpadding="4" cellspacing="0" class="lanyubk" id=adv style="DISPLAY: none;border-collapse: collapse">
    <tr class="lanyuds">
      <td width="39%" align="left" style="padding:0px 8px;"><strong>�������⣺</strong><br />
        ������������ʱ���ɴ��һ����롣<br />
        ��������Ϊ6��20�ֽ�</td>
      <td width="61%" align="left"><input type="text" name="question" size="20" maxlength="20" value="<?=$edit[question]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>����𰸣�</strong><br />
        ������������ʱ���ɴ��һ����롣<br />
        ��������Ϊ6��20�ֽ�</td>
      <td align="left"><input type="text" name="answer" size="20" maxlength="20" value="<?=$edit[answer]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>��ʵ������</strong></td>
      <td align="left"><input type="text" name="truename" size="20" maxlength="20" require="false" dataType="Chinese" msg="����ֻ��������" value="<?=$edit[truename]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>�������£�</strong><br />
        �磺1900��01��01��</td>
      <td align="left"><input type="text" name="birth" size="20" maxlength="10" value="<?=$edit[birth]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>��Ƭ��</strong></td>
      <td align="left"><input name="photo" size="30" maxlength="200" type="text" value="<?=$edit[photo]?>" />
        <br />
        <iframe frameborder="0" width="290" height="26" scrolling="No" src="../upload_pic.htm"></iframe></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>���ڵ�λ��</strong></td>
      <td align="left"><input type="text" name="com" size="20" maxlength="50" value="<?=$edit[com]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>ְ��</strong></td>
      <td align="left"><input type="text" name="postion" size="20" maxlength="20" value="<?=$edit[postion]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>��λ��飺</strong></td>
      <td align="left"><input type="text" name="intro" size="20" maxlength="200" value="<?=$edit[intro]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>ͨѶ��ַ���ʱࣺ</strong></td>
      <td align="left"><input type="text" name="address" size="20" maxlength="100" value="<?=$edit[address]?>" />
        &nbsp;&nbsp;
        <input type="text" name="zip" size="6" maxlength="6" value="<?=$edit[zip]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>��ϵ�绰��</strong></td>
      <td align="left"><input type="text" name="tel" size="20" maxlength="20" require="false" dataType="Phone" msg="�绰���벻��ȷ" value="<?=$edit[tel]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>���棺</strong></td>
      <td align="left"><input type="text" name="tax" size="20" maxlength="20" require="false" dataType="Phone" msg="������벻��ȷ" value="<?=$edit[tax]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>�ֻ���</strong></td>
      <td align="left"><input type="text" name="mobile" size="20" maxlength="12" require="false" dataType="Mobile" msg="�ֻ����벻��ȷ" value="<?=$edit[mobile]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" style="padding:0px 8px;"><strong>E��mail��</strong></td>
      <td align="left"><input type="text" name="email" size="20" maxlength="30" require="false" dataType="Email" msg="�����ʽ����ȷ" value="<?=$edit[email]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>�뽻ͨ��ѧ��ؽ���������</strong><br />
        ��ҵԺϵ������רҵ�����ڰ༶����ҵʱ��</td>
      <td align="left"><label>
        <textarea name="experience" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"><?=$edit[experience]?>
</textarea>
        </label></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>������Ҫ����������</strong></td>
      <td align="left"><textarea name="job" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"> <?=$edit[job]?>
</textarea></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>������Ȥ���ã�</strong></td>
      <td align="left"><input type="text" name="hoby" size="40" maxlength="100" value="<?=$edit[hoby]?>" /></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>�Խ����Ľ����������</strong></td>
      <td align="left"><textarea name="expect" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"><?=$edit[expect]?>
</textarea></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>ϣ��Ϊ����У�ѻ��ṩ�ķ���</strong></td>
      <td align="left"><textarea name="hope" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"><?=$edit[hope]?>
</textarea></td>
    </tr>
    <tr class="lanyuds">
      <td align="left" valign="top" style="padding:0px 8px;"><strong>������</strong></td>
      <td align="left"><input name="jianli" size="30" maxlength="200" type="text" value="<?=$edit[jianli]?>" />
        <br />
        <iframe frameborder="0" width="290" height="26" scrolling="No" src="../upload_soft.htm"></iframe></td>
    </tr>
  </table>
  <table width="98%" border="1" align="center" cellpadding="4" cellspacing="0" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
          <input type="hidden" name="id" value="<?=$edit[id]?>">
          <input type="hidden" name="userpass1" value="<?=$edit[userpass]?>">
          <INPUT id=advcheck name=advshow type=checkbox value=1 onclick=showadv()>
          <span id=advance>��ʾ�߼��û�����ѡ��</span> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="submit" name="submit" value="�޸�">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="ȡ��" onclick="document.location.href='user.php?act=list';">
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
		Error("�Ƿ�����...","user.php?act=edit");
		die();
	}
	$username = SafeHtml($_POST['username']);
	$userpass = SafeHtml($_POST['userpass']);
	$cuserpass = SafeHtml($_POST['cuserpass']);
	if(empty($username))
	{
		Error("��Ա��Ϊ�գ�","user.php?act=edit");
	}
	#[�ж���������������Ƿ�һ��]
	if(empty($userpass))
	{
	  $userpass = SafeHtml($_POST['userpass1']);
	}
	elseif($userpass != $cuserpass)
	{
		Error("������������벻һ�£�","user.php?act=add");
	}
	else
	{
	  $userpass = md5($userpass);
	}
	$email = SafeHtml($_POST['email']);
	if(!empty($email)) {
	if(!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email))
	{
		Error("�����ַ����ȷ��","user.php?act=add");
	}
	}
	$question = SafeHtml($_POST['question']);
	$answer = SafeHtml($_POST['answer']);
    $truename = SafeHtml($_POST['truename']);
	$birth = SafeHtml($_POST['birth']);
    $photo = SafeHtml($_POST['photo']);
    $com = SafeHtml($_POST['com']);
    $postion = SafeHtml($_POST['postion']);
    $intro = SafeHtml($_POST['intro']);
    $address = SafeHtml($_POST['address']);
	$zip = SafeHtml($_POST['zip']);
    $tel = SafeHtml($_POST['tel']);
    $tax = SafeHtml($_POST['tax']);
    $mobile = SafeHtml($_POST['mobile']);
    $experience = nl2br($_POST['experience']);
    $job = nl2br($_POST['job']);
    $hoby = SafeHtml($_POST['hoby']);
    $expect = nl2br($_POST['expect']);
    $hope = nl2br($_POST['hope']);
    $jianli = SafeHtml($_POST['jianli']);
	$db->update("update `user` set `username`='".$username."',`userpass`='".$userpass."',`question`='".$question."',`answer`='".$answer."',`email`='".$email."',`truename`='".$truename."',`birth`='".$birth."',`photo`='".$photo."',`com`='".$com."',`postion`='".$postion."',`intro`='".$intro."',`address`='".$address."',`zip`='".$zip."',`tel`='".$tel."',`tax`='".$tax."',`mobile`='".$mobile."',`experience`='".$experience."',`job`='".$job."',`hoby`='".$hoby."',`expect`='".$expect."',`hope`='".$hope."',`jianli`='".$jianli."' where `id`='".$_POST['id']."'");  
	Error("�޸ĳɹ���","user.php?act=list");
    echo "�޸ĳɹ�";
}
//ɾ������
elseif($_GET['act'] == "del")
{
	if(empty($_GET['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
	$rs = $db->query("delete from user where id='".$_GET['id']."'");
	Error("ɾ���û��ɹ���","user.php?act=list");
    exit;
}
elseif($_GET['act'] == "super")
{
	if(empty($_GET['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
	$db->update("update `user` set `super`='3' where `id`='".$_GET['id']."'");  
	Error("���ù���Ա�ɹ���","user.php?act=list");
    exit;
}
elseif($_GET['act'] == "unsuper")
{
	if(empty($_GET['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
	$db->update("update `user` set `super`='1' where `id`='".$_GET['id']."'");  
	Error("��Ϊ��ͨ��Ա�ɹ���","user.php?act=list");
    exit;
}
elseif($_GET['act'] == "teach")
{
	if(empty($_GET['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
	$db->update("update `user` set `isteach`='1' where `id`='".$_GET['id']."'");  
	Error("��ӵ�ʦͷ�γɹ���","user.php?act=list");
    exit;
}
elseif($_GET['act'] == "unteach")
{
	if(empty($_GET['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
	$db->update("update `user` set `isteach`='0' where `id`='".$_GET['id']."'");  
	Error("ȥ����ʦͷ�γɹ���","user.php?act=list");
    exit;
}
elseif($_GET['act'] == "islock")
{
	if(empty($_GET['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
	$db->update("update `user` set `islock`='1' where `id`='".$_GET['id']."'");  
	Error("�����û��ɹ���","user.php?act=list");
    exit;
}
elseif($_GET['act'] == "unislock")
{
	if(empty($_GET['id']))
	{
		echo "�����Ƿ�...";
		die();
	}
	$db->update("update `user` set `islock`='0' where `id`='".$_GET['id']."'");  
	Error("�û������ɹ���","user.php?act=list");
    exit;
}
?>
<script type="text/javascript">
function showadv(){
if (document.form1.advshow.checked == true) {
	document.getElementById("adv").style.display = "";
	document.getElementById("advance").innerText="�رո߼��û�����ѡ��";
}else{
	document.getElementById("adv").style.display = "none";
	document.getElementById("advance").innerText="��ʾ�߼��û�����ѡ��";
}
}
  /*************************************************
	Validator v1.05
	code by �ҷ�ɽ��
	wfsr@msn.com
*************************************************/
 Validator = {
	Require : /.+/,
	Email : /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/,
	Phone : /^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/,
	Mobile :  /^((\(\d{2,3}\))|(\d{3}\-))?((13\d{9})|(15\d{9}))$/,
	Url : /^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/,
	IdCard : "this.IsIdCard(value)",
	Currency : /^\d+(\.\d+)?$/,
	Number : /^\d+$/,
	Zip : /^[1-9]\d{5}$/,
	QQ : /^[1-9]\d{4,8}$/,
	Integer : /^[-\+]?\d+$/,
	Double : /^[-\+]?\d+(\.\d+)?$/,
	English : /^[A-Za-z]+$/,
	Chinese :  /^[\u0391-\uFFE5]+$/,
	Username : /^[a-z]\w{3,}$/i,
	UnSafe : /^(([A-Z]*|[a-z]*|\d*|[-_\~!@#\$%\^&\*\.\(\)\[\]\{\}<>\?\\\/\'\"]*)|.{0,5})$|\s/,
	IsSafe : function(str){return !this.UnSafe.test(str);},
	SafeString : "this.IsSafe(value)",
	Filter : "this.DoFilter(value, getAttribute('accept'))",
	Limit : "this.limit(value.length,getAttribute('min'),  getAttribute('max'))",
	LimitB : "this.limit(this.LenB(value), getAttribute('min'), getAttribute('max'))",
	Date : "this.IsDate(value, getAttribute('min'), getAttribute('format'))",
	Repeat : "value == document.getElementsByName(getAttribute('to'))[0].value",
	Range : "getAttribute('min') < (value|0) && (value|0) < getAttribute('max')",
	Compare : "this.compare(value,getAttribute('operator'),getAttribute('to'))",
	Custom : "this.Exec(value, getAttribute('regexp'))",
	Group : "this.MustChecked(getAttribute('name'), getAttribute('min'), getAttribute('max'))",
	ErrorItem : [document.forms[0]],
	ErrorMessage : ["����ԭ�����ύʧ�ܣ�\t\t\t\t"],
	Validate : function(theForm, mode){
		var obj = theForm || event.srcElement;
		var count = obj.elements.length;
		this.ErrorMessage.length = 1;
		this.ErrorItem.length = 1;
		this.ErrorItem[0] = obj;
		for(var i=0;i<count;i++){
			with(obj.elements[i]){
				var _dataType = getAttribute("dataType");
				if(typeof(_dataType) == "object" || typeof(this[_dataType]) == "undefined")  continue;
				this.ClearState(obj.elements[i]);
				if(getAttribute("require") == "false" && value == "") continue;
				switch(_dataType){
					case "IdCard" :
					case "Date" :
					case "Repeat" :
					case "Range" :
					case "Compare" :
					case "Custom" :
					case "Group" : 
					case "Limit" :
					case "LimitB" :
					case "SafeString" :
					case "Filter" :
						if(!eval(this[_dataType]))	{
							this.AddError(i, getAttribute("msg"));
						}
						break;
					default :
						if(!this[_dataType].test(value)){
							this.AddError(i, getAttribute("msg"));
						}
						break;
				}
			}
		}
		if(this.ErrorMessage.length > 1){
			mode = mode || 1;
			var errCount = this.ErrorItem.length;
			switch(mode){
			case 2 :
				for(var i=1;i<errCount;i++)
					this.ErrorItem[i].style.color = "red";
			case 1 :
				alert(this.ErrorMessage.join("\n"));
				this.ErrorItem[1].focus();
				break;
			case 3 :
				for(var i=1;i<errCount;i++){
				try{
					var span = document.createElement("SPAN");
					span.id = "__ErrorMessagePanel";
					span.style.color = "red";
					this.ErrorItem[i].parentNode.appendChild(span);
					span.innerHTML = this.ErrorMessage[i].replace(/\d+:/,"*");
					}
					catch(e){alert(e.description);}
				}
				this.ErrorItem[1].focus();
				break;
			default :
				alert(this.ErrorMessage.join("\n"));
				break;
			}
			return false;
		}
		return true;
	},
	limit : function(len,min, max){
		min = min || 0;
		max = max || Number.MAX_VALUE;
		return min <= len && len <= max;
	},
	LenB : function(str){
		return str.replace(/[^\x00-\xff]/g,"**").length;
	},
	ClearState : function(elem){
		with(elem){
			if(style.color == "red")
				style.color = "";
			var lastNode = parentNode.childNodes[parentNode.childNodes.length-1];
			if(lastNode.id == "__ErrorMessagePanel")
				parentNode.removeChild(lastNode);
		}
	},
	AddError : function(index, str){
		this.ErrorItem[this.ErrorItem.length] = this.ErrorItem[0].elements[index];
		this.ErrorMessage[this.ErrorMessage.length] = this.ErrorMessage.length + ":" + str;
	},
	Exec : function(op, reg){
		return new RegExp(reg,"g").test(op);
	},
	compare : function(op1,operator,op2){
		switch (operator) {
			case "NotEqual":
				return (op1 != op2);
			case "GreaterThan":
				return (op1 > op2);
			case "GreaterThanEqual":
				return (op1 >= op2);
			case "LessThan":
				return (op1 < op2);
			case "LessThanEqual":
				return (op1 <= op2);
			default:
				return (op1 == op2);            
		}
	},
	MustChecked : function(name, min, max){
		var groups = document.getElementsByName(name);
		var hasChecked = 0;
		min = min || 1;
		max = max || groups.length;
		for(var i=groups.length-1;i>=0;i--)
			if(groups[i].checked) hasChecked++;
		return min <= hasChecked && hasChecked <= max;
	},
	DoFilter : function(input, filter){
return new RegExp("^.+\.(?=EXT)(EXT)$".replace(/EXT/g, filter.split(/\s*,\s*/).join("|")), "gi").test(input);
	},
	IsIdCard : function(number){
		var date, Ai;
		var verify = "10x98765432";
		var Wi = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
		var area = ['','','','','','','','','','','','����','���','�ӱ�','ɽ��','���ɹ�','','','','','','����','����','������','','','','','','','','�Ϻ�','����','�㽭','��΢','����','����','ɽ��','','','','����','����','����','�㶫','����','����','','','','����','�Ĵ�','����','����','����','','','','','','','����','����','�ຣ','����','�½�','','','','','','̨��','','','','','','','','','','���','����','','','','','','','','','����'];
		var re = number.match(/^(\d{2})\d{4}(((\d{2})(\d{2})(\d{2})(\d{3}))|((\d{4})(\d{2})(\d{2})(\d{3}[x\d])))$/i);
		if(re == null) return false;
		if(re[1] >= area.length || area[re[1]] == "") return false;
		if(re[2].length == 12){
			Ai = number.substr(0, 17);
			date = [re[9], re[10], re[11]].join("-");
		}
		else{
			Ai = number.substr(0, 6) + "19" + number.substr(6);
			date = ["19" + re[4], re[5], re[6]].join("-");
		}
		if(!this.IsDate(date, "ymd")) return false;
		var sum = 0;
		for(var i = 0;i<=16;i++){
			sum += Ai.charAt(i) * Wi[i];
		}
		Ai +=  verify.charAt(sum%11);
		return (number.length ==15 || number.length == 18 && number == Ai);
	},
	IsDate : function(op, formatString){
		formatString = formatString || "ymd";
		var m, year, month, day;
		switch(formatString){
			case "ymd" :
				m = op.match(new RegExp("^((\\d{4})|(\\d{2}))([-./])(\\d{1,2})\\4(\\d{1,2})$"));
				if(m == null ) return false;
				day = m[6];
				month = m[5]*1;
				year =  (m[2].length == 4) ? m[2] : GetFullYear(parseInt(m[3], 10));
				break;
			case "dmy" :
				m = op.match(new RegExp("^(\\d{1,2})([-./])(\\d{1,2})\\2((\\d{4})|(\\d{2}))$"));
				if(m == null ) return false;
				day = m[1];
				month = m[3]*1;
				year = (m[5].length == 4) ? m[5] : GetFullYear(parseInt(m[6], 10));
				break;
			default :
				break;
		}
		if(!parseInt(month)) return false;
		month = month==0 ?12:month;
		var date = new Date(year, month-1, day);
        return (typeof(date) == "object" && year == date.getFullYear() && month == (date.getMonth()+1) && day == date.getDate());
		function GetFullYear(y){return ((y<30 ? "20" : "19") + y)|0;}
	}
 }
</script>
</body>
</html>
