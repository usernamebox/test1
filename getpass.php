<?php 
include('./inc/site.php');
include('./inc/db_class.php');
include('./inc/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�һ�����_�γ���վ</title>
<meta name="keywords" content="�γ���վ" />
<meta name="description" content="�γ���վ" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {font-size: 14px}
.STYLE3 {color: #FF0000}
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
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top" align="center"><table width="99%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="29" background="images/inner-img02.gif"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="font">
              <tr>
                <td width="40"><div align="center"><img src="images/inner-img3.gif" width="20" height="20" /></div></td>
                <td align="left">���ĵ�ǰλ�ã�<a href="index.php">��ҳ</a> &gt;&gt; <a href="getpass.php">�һ�����</a></td>
              </tr>
            </table></td>
          </tr>
        </table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                    <tr>
                      <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                      <td width="130" align="left"><span class="STYLE2">�һ�����</span></td>
                      <td style="padding-right:18px;">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="top" class="font" style="padding:8px 8px 8px 8px;" align="center">
<?php
$act=$_GET['act'];
if($act=="")
{
?>
					  <form action="getpass.php?act=Step2" method="post" name="form1">
					  <table width="60%" border="0" cellspacing="2" cellpadding="0" bgcolor="#fdeacc">
                        <tr>
                          <td colspan="2" align="left"><strong>��һ���������û���</strong></td>
                          </tr>
                        <tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>����������û�����</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;">
                            <input type="text" name="username" size="20" maxlength="12"></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" bgcolor="#ffffff">
                            <input type="submit" name="Submit" value="��һ��">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='Cancel' type='button' id='Cancel' style='cursor:hand;' onclick='window.location.href="./"' value=' ȡ�� '></td>
                          </tr>
                      </table>
					  </form>
<?php
}
if($act=="Step2")
{
    $username = SafeHtml($_POST['username']);  
	$check_user = $db->query("SELECT * FROM user where username='".$username."'");
	$row=$db->getarray($check_user);
	if(!($row))
	{
		Error("�Բ�����������û��������ڣ�","getpass.php");
		exit();
	}
?>
<form action="getpass.php?act=Step3" method="post" name="form1">
					  <table width="60%" border="0" cellspacing="2" cellpadding="0" bgcolor="#fdeacc">
                        <tr>
                          <td colspan="2" align="left"><strong>�ڶ������ش�����</strong></td>
                          </tr>
                        <tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>������ʾ���⣺</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$row['question']?></td>
                        </tr>
						<tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>��Ĵ𰸣�</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;">
                            <input type="text" name="answer" size="20" maxlength="20">
							<input type="hidden" name="username" value="<?=$row['username']?>"></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" bgcolor="#ffffff">
                            <input name='PrevStep' type='button' id='PrevStep' value='��һ��' style='cursor:hand;' onclick='history.go(-1)'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" value="��һ��">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='Cancel' type='button' id='Cancel' style='cursor:hand;' onclick='window.location.href="./"' value=' ȡ�� '></td>
                          </tr>
                      </table>
					  </form>

<?php
}
if($act=="Step3")
{
  $answer = SafeHtml($_POST['answer']);
  if(empty($answer))
  {
   Error("����𰸲���Ϊ�գ�","getpass.php");
  }
  $username = SafeHtml($_POST['username']);
  $check_user = $db->query("SELECT * FROM user where username='".$username."' and answer='".$answer."'");
  $row=$db->getarray($check_user);
  if(!($row))
  {
	Error("�Բ������Ĵ𰸲��ԣ�","getpass.php");
	exit();
  }
?>
<form action="getpass.php?act=Step4" method="post" name="form1">
					  <table width="60%" border="0" cellspacing="2" cellpadding="0" bgcolor="#fdeacc">
                        <tr>
                          <td colspan="2" align="left"><strong>������������������</strong></td>
                          </tr>
                        <tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>�����룺</strong><br />5��20λ</td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="userpass" size="20" maxlength="20"></td>
                        </tr>
						<tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>ȷ�������룺</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;">
                            <input type="text" name="cuserpass" size="20" maxlength="20">
							<input type="hidden" name="id" value="<?=$row['id']?>">
							<input type="hidden" name="username" value="<?=$row['username']?>"></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" bgcolor="#ffffff">
                            <input name='PrevStep' type='button' id='PrevStep' value='��һ��' style='cursor:hand;' onclick='history.go(-1)'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" value="��һ��">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='Cancel' type='button' id='Cancel' style='cursor:hand;' onclick='window.location.href="./"' value=' ȡ�� '></td>
                          </tr>
                      </table>
					  </form>
<?php
}
if($act=="Step4")
{
 $userpass = SafeHtml($_POST['userpass']);
 $cuserpass = SafeHtml($_POST['cuserpass']);
 if(empty($userpass) || empty($cuserpass))
 {
	Error("�����ȷ������Ϊ�գ�","getpass.php");
 }
 if($userpass != $cuserpass)
 {
	Error("������������벻һ�£�","getpass.php");
 }
 $id = intval($_POST['id']);
 $db->update("update `user` set `userpass`='".md5($userpass)."' where id='".$id."'");  
?>
					  <table width="60%" border="0" cellspacing="2" cellpadding="0" bgcolor="#fdeacc">
                        <tr>
                          <td colspan="2" align="left"><strong>���Ĳ����ɹ�����������</strong></td>
                          </tr>
                        <tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>�û�����</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$_POST['username']?></td>
                        </tr>
						<tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>�����룺</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$userpass?></td>
                        </tr>
						<tr>
                          <td colspan="2" bgcolor="#ffffff" style="padding:0px 8px; color:#FF0000;" align="center">���ס���������벢ʹ���������¼��</td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" bgcolor="#ffffff"><a href="./">��������ҳ��</a>&nbsp;&nbsp;<a href="javascript:window.close();">���رմ��ڡ�</a></td>
                          </tr>
                      </table>

<?php
}
?>
					  </td>
                    </tr>
                  </table></td>
                </tr>
          </table></td>
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
