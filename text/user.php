<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
if(empty($_SESSION["username"]))
{
	Error("�ò���ֻ�б�վ��Ա�ſ������","index.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��Ա����_�γ���վ</title>
<meta name="keywords" content="��Ա����,�γ���վ" />
<meta name="description" content="��Ա����,�γ���վ" />
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
              <td class="font"><a href="user.php?username=<?=$_SESSION["username"]?>">�޸�����</a></td>
            </tr>
            <tr>
              <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
              <td class="font"><a href="user.php?username=<?=$_SESSION["username"]?>&act=modpass">�޸�����</a></td>
            </tr>
            <tr>
              <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
              <td class="font"><a href="user.php?username=<?=$_SESSION["username"]?>&act=message">��ܰף��</a></td>
            </tr>
            <tr>
              <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
              <td class="font"><a href="download.php">��������</a></td>
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
            <td>���ĵ�ǰλ�ã�<a href="index.php">��ҳ</a> &gt;&gt; ��Ա����</td>
          </tr>
        </table></td>
    </tr>
  </table>
  <?php
if($_GET['act']== "")
{
$username=$_SESSION["username"];
$show=$db->getfirst("select * from user where username='$username'");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
?>
  <form action="user.php?act=save" method="post" name="form1" onSubmit="return Validator.Validate(this,2)">
    <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
      <tbody>
        <tr>
          <td class="title" align="middle" colspan="2" height="25"><strong>�����޸�</strong></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">��ʵ������&nbsp;</td>
          <td width="77%" class="con"><input type="hidden" name="id" value="<?=$show[id]?>" />
            <input type="text" name="truename" size="20" maxlength="20" require="false" dataType="Chinese" msg="����ֻ��������" class="input" value="<?=$show[truename]?>" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">�������⣺&nbsp;</td>
          <td class="con"><input type="text" name="question" size="20" maxlength="20" dataType="Limit" msg="�������ⲻ���Ϲ���" min="6" max="20" class="input" value="<?=$show[question]?>" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">����𰸣�&nbsp;</td>
          <td class="con"><input type="text" name="answer" size="20" maxlength="20" dataType="Limit" msg="����𰸲����Ϲ���" min="6" max="20" class="input" value="<?=$show[answer]?>" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">�������£�&nbsp;</td>
          <td class="con"><input type="text" name="birth" size="20" maxlength="15" class="input" value="<?=$show[birth]?>" />
            �磺1900��01��01��</td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">��Ƭ��&nbsp;</td>
          <td class="con"><input name="photo" size="30" maxlength="200" type="text" class="input" value="<?=$show[photo]?>" />
            <br />
            <iframe frameborder="0" width="290" height="26" scrolling="No" src="upload_pic.htm"></iframe></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">���ڵ�λ��&nbsp;</td>
          <td class="con"><input type="text" name="com" size="20" maxlength="50" class="input" value="<?=$show[com]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">ְ��&nbsp;</td>
          <td class="con"><input type="text" name="postion" size="20" maxlength="20" class="input" value="<?=$show[postion]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>��λ��飺&nbsp;</p></td>
          <td class="con"><input type="text" name="intro" size="20" maxlength="200" class="input" value="<?=$show[intro]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>ͨѶ��ַ���ʱࣺ&nbsp;</p></td>
          <td class="con"><input type="text" name="address" size="30" maxlength="100" class="input" value="<?=$show[address]?>" />
            &nbsp;&nbsp;
            <input type="text" name="zip" size="6" maxlength="6" require="false" dataType="Zip" msg="�ʱ಻��ȷ" class="input" value="<?=$show[zip]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>��ϵ�绰��&nbsp;</p></td>
          <td class="con"><input type="text" name="tel" size="20" maxlength="20" require="false" dataType="Phone" msg="�绰���벻��ȷ" class="input" value="<?=$show[tel]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>���棺&nbsp;</p></td>
          <td class="con"><input type="text" name="tax" size="20" maxlength="20" require="false" dataType="Phone" msg="������벻��ȷ" class="input" value="<?=$show[tax]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>�ֻ���&nbsp;</p></td>
          <td class="con"><input type="text" name="mobile" size="20" maxlength="12" require="false" dataType="Mobile" msg="�ֻ����벻��ȷ" class="input" value="<?=$show[mobile]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>E��mail��&nbsp;</p></td>
          <td class="con"><input type="text" name="email" size="20" maxlength="30" require="false" dataType="Email" msg="�����ʽ����ȷ" class="input" value="<?=$show[email]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>�뽻ͨ��ѧ��ؽ���������&nbsp;</p></td>
          <td class="con"><textarea name="experience" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)" class="input"><?=$show[experience]?>
</textarea></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>������Ҫ����������&nbsp;</p></td>
          <td class="con"><textarea name="job" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)" class="input"><?=$show[job]?>
</textarea></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>������Ȥ���ã�&nbsp;</p></td>
          <td class="con"><input type="text" name="hoby" size="40" maxlength="100" class="input" value="<?=$show[hoby]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>�Խ����Ľ����������&nbsp;</p></td>
          <td class="con"><textarea name="expect" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)" class="input"><?=$show[expect]?>
</textarea></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>ϣ��Ϊ����У�ѻ��ṩ�ķ���&nbsp;</p></td>
          <td class="con"><textarea name="hope" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)" class="input"><?=$show[hope]?>
</textarea></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">������&nbsp;</td>
          <td class="con"><input name="jianli" size="30" maxlength="200" type="text" class="input" value="<?=$show[jianli]?>" />
            <br />
            <iframe frameborder="0" width="290" height="26" scrolling="No" src="upload_soft.htm"></iframe></td>
        </tr>
        <tr>
          <td class="title" align="right" colspan="2"><div align="center">
              <input class="button" type="submit" value=" �� �� " name="Submit" />
            </div></td>
        </tr>
      </tbody>
    </table>
  </form>
  <?php
}
elseif($_GET['act']== "save")
{
	if(empty($_POST['id']))
	{
	   echo ("<script type='text/javascript'>alert('�Ƿ�����...');history.go(-1);</script>");
	   exit;
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
	//echo $truename;
	//die();
	$db->update("update `user` set `question`='".$question."',`answer`='".$answer."',`email`='".$email."',`truename`='".$truename."',`birth`='".$birth."',`photo`='".$photo."',`com`='".$com."',`postion`='".$postion."',`intro`='".$intro."',`address`='".$address."',`zip`='".$zip."',`tel`='".$tel."',`tax`='".$tax."',`mobile`='".$mobile."',`experience`='".$experience."',`job`='".$job."',`hoby`='".$hoby."',`expect`='".$expect."',`hope`='".$hope."',`jianli`='".$jianli."' where `id`='".$_POST['id']."'");  
	echo ("<script type='text/javascript'>alert('�����޸ĳɹ�...');history.go(-1);</script>");
    exit;
}
if($_GET['act']== "modpass")
{
$show=$db->getfirst("select * from user where username='".$_SESSION["username"]."'");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
?>
  <form action="user.php?act=modpassok" method="post" name="form1" onSubmit="return Validator.Validate(this,2)">
    <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
      <tbody>
        <tr>
          <td class="title" align="middle" colspan="2" height="25"><strong>�����޸�</strong></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">�û�����&nbsp;</td>
          <td width="77%" class="con"><input type="hidden" name="id" value="<?=$show[id]?>" />
            <?=$show[username]?></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">�����룺&nbsp;</td>
          <td class="con"><input type="password" name="olduserpass" size="20" maxlength="20" dataType="LimitB" msg="���벻���ϰ�ȫ����" min="5" max="20" class="input" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">�����룺&nbsp;</td>
          <td class="con"><input type="password" name="userpass" size="20" maxlength="20" dataType="LimitB" msg="���벻���ϰ�ȫ����" min="5" max="20" class="input" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">ȷ�������룺&nbsp;</td>
          <td class="con"><input type="password" name="cuserpass" size="20" maxlength="20"  dataType="Repeat" to="userpass" msg="������������벻һ��" class="input" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" colspan="2"><div align="center">
              <input class="button" type="submit" value=" �� �� " name="Submit" />
            </div></td>
        </tr>
      </tbody>
    </table>
  </form>
  <?php
}
elseif($_GET['act']== "modpassok")
{
	if(empty($_POST['id']))
	{
	   echo ("<script type='text/javascript'>alert('�Ƿ�����...');history.go(-1);</script>");
	   exit;
	}	
	$olduserpass = SafeHtml($_POST['olduserpass']);
	$userpass = SafeHtml($_POST['userpass']);
	$cuserpass = SafeHtml($_POST['cuserpass']);
	if(empty($olduserpass) || empty($userpass) || empty($cuserpass))
	{
		echo ("<script type='text/javascript'>alert('��Ϣ������');history.go(-1);</script>");
		exit;
	}
	#[�ж���������������Ƿ�һ��]
	if($userpass != $cuserpass)
	{
		echo ("<script type='text/javascript'>alert('��������ȷ�����벻ͬ!');history.go(-1);</script>");
		exit;
	}
	
	if(!$checkuser=$db->getfirst("select * from user where userpass='".md5($olduserpass)."' and id='".$_POST['id']."'"))
	  echo ("<script type='text/javascript'>alert('�����벻��ȷ!');history.go(-1);</script>");
	//$check=$db->getfirst("select * from user where id='".$_POST['id']."'");
	//if($check[userpass]!=md5($olduserpass))
	$db->update("update `user` set `userpass`='".md5($userpass)."' where `id`='".$_POST['id']."'");  
	echo ("<script type='text/javascript'>alert('�����޸ĳɹ�...');history.go(-1);</script>");
    exit;
}
elseif($_GET['act']== "message")
{
$username=$_SESSION["username"];
$page=isset($_GET['page'])?intval($_GET['page']):1;        //�����ǻ�ȡpage=18�е�page��ֵ�����粻����page����ôҳ������1��
$num=15; 
$total=$db->getcount("select * from `message` where username='".$username."' or jieshou='".$username."' or jieshou='all'");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
//ҳ�����
$pagenum=ceil($total/$num);     //�����ҳ��,Ҳ�����һҳ
$page=min($pagenum,$page);//�����ҳ
$prepg=$page-1;//��һҳ
$nextpg=($page==$pagenum ? 0 : $page+1);//��һҳ
$offset=($page-1)*$num;  
?>
  <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
    <tr>
      <td height="25" colspan="3" align="middle" class="title"><strong>��ܰף��</strong></td>
      <td height="25" align="middle" class="title"><a href="user.php?act=sendmsg&username=<?=$username?>">����ף��</a></td>
    </tr>
    <tr>
      <td width="18%" class="con">����</td>
      <td width="29%" class="con">������</td>
      <td width="41%" class="con">������</td>
      <td width="12%" class="con">״̬</td>
    </tr>
    <?php 
$result=$db->query("select * from `message` where username='".$username."' or jieshou='".$username."' or jieshou='all' order by id desc limit $offset,$num");
while($row=$db->getarray($result)){
?>
    <tr>
      <td class="con"><?=(($row['username']==$username)?"����":"<font color='red'>����</font>")?></td>
      <td class="con"><a href="user.php?act=showmsg&id=<?=$row['id']?>">
        <?=$row['username']?>
        </a></td>
      <td class="con"><?=$row['jieshou']?></td>
      <td class="con"><?php
	    if($row['jieshou']==$username || ($row['jieshou']=='all' && $row['username']!=$username))
		{
		if($row['islook']==0)
		{
		  echo "����";
		  }
		elseif($row['islook']==1)
		{
		  echo "<font color='red'>δ��</font>";
		  }
		}?>
        &nbsp;&nbsp;<a href="user.php?act=delmsg&id=<?=$row['id']?>">ɾ��</a></td>
    </tr>
    <?php
}
?>
    <tr>
      <td colspan="4" align="right" class="title"><?php 
include 'inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);
?></td>
    </tr>
  </table>
  <?php
}
elseif($_GET['act']== "sendmsg")
{
   if(empty($_GET['username']))
	{
		echo ("<script type='text/javascript'>alert('�Ƿ�����');history.go(-1);</script>");
		die();
	}
?>
  <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
  <form action="user.php?act=sendok" method="post" name="form1">  
    <tr>
      <td height="25" colspan="2" align="middle" class="title"><strong>����ף��</strong></td>
    </tr>
    <tr>
      <td width="11%" class="con">������:</td>
      <td width="89%" class="con"><?=$_GET['username']?><input type="hidden" name="username" value="<?=$_GET['username']?>" /></td>
    </tr>
    <tr>
      <td class="con">������:</td>
      <td class="con"><select name="jieshou">
<option value="all" selected="selected">������</option>
<?php
$total=$db->getcount("select * from user where islock=0");
$result=$db->query("select * from user where islock=0 limit 0,$total");
while($row=$db->getarray($result)){
?>
      <option value="<?=$row[username]?>"><?=$row[username]?></option>
<?php
}
?>
      </select></td>
    </tr>
    <tr>
      <td valign="top" class="con">����:</td>
      <td class="con"><textarea name="content" id="content" cols="45" rows="5" onpropertychange="if(value.length>255)value=value.substr(0,255)"></textarea></td>
    </tr>
<tr>
      <td colspan="2" align="right" class="title"><div align="center">
        <input class="button" type="submit" value=" �� �� " name="Submit" />
      </div></td>
    </tr>
</form>
    </table>
<?php
}
elseif($_GET['act']== "sendok")
{
   $username = SafeHtml($_POST['username']);
   $jieshou = SafeHtml($_POST['jieshou']);
   $content = nl2br($_POST['content']);
   if(empty($username) || empty($jieshou) || empty($content))
	{
		echo ("<script type='text/javascript'>alert('��Ϣ������');history.go(-1);</script>");
	}
   $addtime=date("Y-m-d G:i:s");
   $result=$db->query("select * from `message`");
   $db->insert("INSERT INTO `message` (`username`,`jieshou`,`content`,`addtime`) VALUES('".$username."','".$jieshou."','".$content."','".$addtime."')");
   echo ("<script type='text/javascript'>alert('����ף���ɹ�!');history.go(-1);</script>");
	
	
	
}
elseif($_GET['act']== "showmsg")
{
   if(empty($_GET['id']))
	{
		echo ("<script type='text/javascript'>alert('�Ƿ�����');history.go(-1);</script>");
		die();
	}
	$db->update("update `message` set islook='0' where id='".$_GET['id']."'");
	$show=$db->getfirst("select * from `message` where id='".$_GET['id']."'");
?>
  <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
    <tr>
      <td height="25" colspan="2" align="middle" class="title"><strong>��ܰף��</strong></td>
    </tr>
    <tr>
      <td width="11%" class="con">������:</td>
      <td width="89%" class="con"><?=$show['username']?></td>
    </tr>
    <tr>
      <td class="con">������:</td>
      <td class="con"><?=$show['jieshou']?></td>
    </tr>
    <tr>
      <td valign="top" class="con">����:</td>
      <td class="con"><?=$show['content']?></td>
    </tr>
<tr>
      <td colspan="2" align="right" class="title"><?=$show['addtime']?></td>
    </tr>
    </table>
    <?php	
}
elseif($_GET['act']== "delmsg")
{
   if(empty($_GET['id']))
	{
		echo ("<script type='text/javascript'>alert('�Ƿ�����');history.go(-1);</script>");
		die();
	}
	$rs = $db->query("delete from `message` where id='".$_GET['id']."'");
	echo ("<script type='text/javascript'>alert('ɾ���ɹ�');history.go(-1);</script>");
}
?>
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
<script>
  /*************************************************
	Validator v1.05
	code by �ҷ�ɽ��
	wfsr@msn.com
*************************************************/
 Validator = {
	Require : /.+/,
	Email : /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/,
	Phone : /^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/,
	Mobile : /^((\(\d{2,3}\))|(\d{3}\-))?((13\d{9})|(15\d{9}))$/,
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
