<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>������ʦ����_�γ���վ</title>
<meta name="keywords" content="������ʦ,����,�γ���վ" />
<meta name="description" content="������ʦ,����,�γ���վ" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.button {	BORDER-RIGHT: #666666 2px solid; BORDER-TOP: #666666 1px solid; FONT-SIZE: 12px; BACKGROUND: #ffffff; BORDER-LEFT: #666666 1px solid; COLOR: #333333; BORDER-BOTTOM: #666666 2px solid; HEIGHT: 18px
}
.con {	FONT-SIZE: 12px; BACKGROUND: #ffffff; COLOR: #666666
}
.input {	BORDER-RIGHT: #666666 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #666666 1px solid; PADDING-LEFT: 2px; FONT-SIZE: 12px; BACKGROUND: #f5f5f5; PADDING-BOTTOM: 2px; BORDER-LEFT: #666666 1px solid; COLOR: #666666; PADDING-TOP: 2px; BORDER-BOTTOM: #666666 1px solid
}
.table {	BACKGROUND: #eeeeee
}
.title {	FONT-SIZE: 12px; BACKGROUND: #f0f0f0; COLOR: #666666
}
.con1 {FONT-SIZE: 12px; BACKGROUND: #ffffff; COLOR: #666666
}
-->
</style>
<script language="JavaScript">
// ���ύ�ͻ��˼��
function doCheck(){
  if (document.form1.truename.value==""){
	   alert("<?=$sitename?>��������\n��ʵ��������Ϊ��!");
	   form1.truename.focus();
	   return false;
  }
  if (document.form1.birth.value==""){
	   alert("<?=$sitename?>��������\n�������²���Ϊ��!");
	   form1.birth.focus();
	   return false;
  }
  if (document.form1.yuanxi.value==""){
	   alert("<?=$sitename?>��������\nԺϵ����Ϊ��!");
	   form1.yuanxi.focus();
	   return false;
  }
  if (document.form1.zhuanye.value==""){
	   alert("<?=$sitename?>��������\nרҵ����Ϊ��!");
	   form1.zhuanye.focus();
	   return false;
  }
  if (document.form1.xueli.value==""){
	   alert("<?=$sitename?>��������\nѧ������Ϊ��!");
	   form1.xueli.focus();
	   return false;
  }
  if (document.form1.daima.value==""){
	   alert("<?=$sitename?>��������\n�༶���벻��Ϊ��!");
	   form1.daima.focus();
	   return false;
  }
  if (document.form1.xuehao.value==""){
	   alert("<?=$sitename?>��������\nѧ�Ų���Ϊ��!");
	   form1.xuehao.focus();
	   return false;
  }
  if (document.form1.tel.value==""){
	   alert("<?=$sitename?>��������\n��ϵ�绰����Ϊ��!");
	   form1.tel.focus();
	   return false;
  }
  if (document.form1.email.value==""){
	   alert("<?=$sitename?>��������\nE-mail����Ϊ��!");
	   form1.email.focus();
	   return false;
  }
  if (document.form1.yiyuan.value==""){
	   alert("<?=$sitename?>��������\n������Ը����Ϊ��!");
	   form1.yiyuan.focus();
	   return false;
  }
  if (document.form1.userid.value==""){
	   alert("<?=$sitename?>��������\n��ʦ����Ϊ��!");
	   form1.userid.focus();
	   return false;
  }

}
</script>
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
    <td valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                      <td class="font"><a href="inheritance.php?cat=1">������ʦ</a></td>
                    </tr>
                    <tr>
                      <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                      <td class="font"><a href="inheritance.php?cat=2">��ҵ����</a></td>
                    </tr>
                    <tr>
                      <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                      <td class="font"><a href="book.php">ѧ������</a></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <?php include('inc/link.php'); ?></td>
          <td valign="top"><table width="571" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="571" height="29" background="images/inner-img2.gif"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="font">
                    <tr>
                      <td width="40"><div align="center"><img src="images/inner-img3.gif" width="20" height="20" /></div></td>
                      <td>���ĵ�ǰλ�ã�<a href="index.php">��ҳ</a> &gt;&gt; <a href="inheritance.php">����</a> &gt;&gt;������ʦ����</td>
                    </tr>
                  </table></td>
              </tr>
            </table>
<?php
if($_GET['act']== "")
{
?>
			<form action="upfile.php?act=save" method="post" name="form1" onSubmit="return doCheck();">
            <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
              <tbody>
                <tr>
                  <td class="title" align="middle" height="25">&nbsp;</td>
                  <td width="60%" height="25" align="middle" class="title"><strong>������ʦ����</strong></td>
                  <td width="20%" align="right" class="title"><a href="modupfile.php">�޸��ҵ�����</a></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">��ʵ������&nbsp;</td>
                  <td colspan="2" class="con"><input type="text" name="truename" size="20" maxlength="20" class="input" />
                    <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">�������£�&nbsp;</td>
                  <td colspan="2" class="con"><input type="text" name="birth" size="20" maxlength="15" class="input" /> <font color="#ff0000">* </font>�磺1900��01��01��</td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">Ժϵ��&nbsp;</td>
                  <td colspan="2" class="con"><input name="yuanxi" size="30" maxlength="30" type="text" class="input" />
                    <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">רҵ��&nbsp;</td>
                  <td colspan="2" class="con"><input name="zhuanye" size="30" maxlength="30" type="text" class="input" />
                    <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">ѧ����&nbsp;</td>
                  <td colspan="2" class="con"><select class="input" name="xueli">
                      <option value="1" selected="selected">����</option>
                      <option value="2">˶ʿ</option>
                      <option value="3">רҵѧλ��EMBA MBA ����˶ʿ��</option>
                      <option value="4">��ʿ</option>
                    </select>
                   <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%"><p>�༶���룺&nbsp;</p></td>
                  <td colspan="2" class="con"><input name="daima" size="30" maxlength="30" type="text" class="input" />
                   <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%"><p>ѧ�ţ�&nbsp;</p></td>
                  <td colspan="2" class="con"><input name="xuehao" size="30" maxlength="30" type="text" class="input" />
                   <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%"><p>��ϵ�绰��&nbsp;</p></td>
                  <td colspan="2" class="con"><input type="text" name="tel" size="20" maxlength="20" class="input" /> <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%"><p>E��mail��&nbsp;</p></td>
                  <td colspan="2" class="con"><input type="text" name="email" size="20" maxlength="30" class="input" /> <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%"><p>������Ը��&nbsp;</p></td>
                  <td colspan="2" class="con"><textarea class="input" name="yiyuan" rows="5" cols="50" onpropertychange="if(value.length>150)value=value.substr(0,150)"></textarea>
                   <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">��ʦ������&nbsp;</td>
                  <td colspan="2" class="con"><input type="text" name="userid" size="20" maxlength="30" class="input" />
                   (����ԣ�����)<font color="#ff0000">* </font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="javascript:window.open('daoshi.php','gouwu','width=450,height=350,toolbar=no, status=no, menubar=no, resizable=yes, scrollbars=yes');">�鿴��ʦ��Ϣ</a></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">��Ƭ��&nbsp;</td>
                  <td colspan="2" class="con"><input name="photo" size="30" maxlength="200" type="text" class="input" />
                    <br />
                    <iframe frameborder="0" width="290" height="26" scrolling="No" src="upload_pic.htm"></iframe></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">������&nbsp;</td>
                  <td colspan="2" class="con"><input name="jianli" size="30" maxlength="200" type="text" class="input" />
                    <br />
                    <iframe frameborder="0" width="290" height="26" scrolling="No" src="upload_soft.htm"></iframe></td>
                </tr>
                <tr>
                  <td class="title" align="right" colspan="3"><div align="center">
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
	$truename = SafeHtml($_POST['truename']);
	$birth = SafeHtml($_POST['birth']);
	$yuanxi = SafeHtml($_POST['yuanxi']);
	$zhuanye = SafeHtml($_POST['zhuanye']);
	$xueli = SafeHtml($_POST['xueli']);
	$daima = SafeHtml($_POST['daima']);
	$xuehao = SafeHtml($_POST['xuehao']);
	$tel = SafeHtml($_POST['tel']);
	$yiyuan = nl2br($_POST['yiyuan']);
	$userid = SafeHtml($_POST['userid']);
	if(empty($truename))
	{
		Error("��ʵ��������Ϊ�գ�","upfile.php");
	}
	if(empty($birth))
	{
		Error("�������²���Ϊ�գ�","upfile.php");
	}
	if(empty($yuanxi))
	{
		Error("Ժϵ����Ϊ�գ�","upfile.php");
	}
	if(empty($zhuanye))
	{
		Error("רҵ����Ϊ�գ�","upfile.php");
	}
        if(empty($xueli))
	{
		Error("ѧ������Ϊ�գ�","upfile.php");
	}
        if(empty($daima))
	{
		Error("�༶���벻��Ϊ�գ�","upfile.php");
	}
        if(empty($xuehao))
	{
		Error("ѧ�Ų���Ϊ�գ�","upfile.php");
	}
        if(empty($tel))
	{
		Error("�绰����Ϊ�գ�","upfile.php");
	}
        if(empty($yiyuan))
	{
		Error("������Ը����Ϊ�գ�","upfile.php");
	}
        if(empty($userid))
	{
		Error("��ʦ��������Ϊ�գ�","upfile.php");
	}
	$email = SafeHtml($_POST['email']);
	if(!empty($email)) {
	if(!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email))
	{
		Error("�����ַ����ȷ��","upfile.php");
	}
	}
    $photo = SafeHtml($_POST['photo']);
    $jianli = SafeHtml($_POST['jianli']);
	$pass=date('YmdHis').rand(100,999);
	$db->insert("INSERT INTO `updaoshi` (`truename`,`birth`,`yuanxi`,`zhuanye`,`xueli`,`daima`,`xuehao`,`tel`,`email`,`yiyuan`,`userid`,`photo`,`jianli`,`pass`) VALUES('".$truename."','".$birth."','".$yuanxi."','".$zhuanye."','".$xueli."','".$daima."','".$xuehao."','".$tel."','".$email."','".$yiyuan."','".$userid."','".$photo."','".$jianli."','".$pass."')");
	Error("����ɹ���<br>���ס��ȡ�룺".$pass.",�ύ��������´��޸����ϡ�","inheritance.php?cat=1");
    exit;
}
?>
			</td>
        </tr>
      </table></td>
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
