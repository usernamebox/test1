<?php 
include('./inc/site.php');
include('./inc/db_class.php');
include('./inc/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>找回密码_课程网站</title>
<meta name="keywords" content="课程网站" />
<meta name="description" content="课程网站" />
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
                <td align="left">您的当前位置：<a href="index.php">首页</a> &gt;&gt; <a href="getpass.php">找回密码</a></td>
              </tr>
            </table></td>
          </tr>
        </table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                    <tr>
                      <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                      <td width="130" align="left"><span class="STYLE2">找回密码</span></td>
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
                          <td colspan="2" align="left"><strong>第一步：输入用户名</strong></td>
                          </tr>
                        <tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>请输入你的用户名：</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;">
                            <input type="text" name="username" size="20" maxlength="12"></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" bgcolor="#ffffff">
                            <input type="submit" name="Submit" value="下一步">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='Cancel' type='button' id='Cancel' style='cursor:hand;' onclick='window.location.href="./"' value=' 取消 '></td>
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
		Error("对不起，你输入的用户名不存在！","getpass.php");
		exit();
	}
?>
<form action="getpass.php?act=Step3" method="post" name="form1">
					  <table width="60%" border="0" cellspacing="2" cellpadding="0" bgcolor="#fdeacc">
                        <tr>
                          <td colspan="2" align="left"><strong>第二步：回答问题</strong></td>
                          </tr>
                        <tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>密码提示问题：</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$row['question']?></td>
                        </tr>
						<tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>你的答案：</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;">
                            <input type="text" name="answer" size="20" maxlength="20">
							<input type="hidden" name="username" value="<?=$row['username']?>"></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" bgcolor="#ffffff">
                            <input name='PrevStep' type='button' id='PrevStep' value='上一步' style='cursor:hand;' onclick='history.go(-1)'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" value="下一步">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='Cancel' type='button' id='Cancel' style='cursor:hand;' onclick='window.location.href="./"' value=' 取消 '></td>
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
   Error("问题答案不能为空！","getpass.php");
  }
  $username = SafeHtml($_POST['username']);
  $check_user = $db->query("SELECT * FROM user where username='".$username."' and answer='".$answer."'");
  $row=$db->getarray($check_user);
  if(!($row))
  {
	Error("对不起，您的答案不对！","getpass.php");
	exit();
  }
?>
<form action="getpass.php?act=Step4" method="post" name="form1">
					  <table width="60%" border="0" cellspacing="2" cellpadding="0" bgcolor="#fdeacc">
                        <tr>
                          <td colspan="2" align="left"><strong>第三步：设置新密码</strong></td>
                          </tr>
                        <tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>新密码：</strong><br />5—20位</td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="userpass" size="20" maxlength="20"></td>
                        </tr>
						<tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>确认新密码：</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;">
                            <input type="text" name="cuserpass" size="20" maxlength="20">
							<input type="hidden" name="id" value="<?=$row['id']?>">
							<input type="hidden" name="username" value="<?=$row['username']?>"></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" bgcolor="#ffffff">
                            <input name='PrevStep' type='button' id='PrevStep' value='上一步' style='cursor:hand;' onclick='history.go(-1)'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" value="下一步">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='Cancel' type='button' id='Cancel' style='cursor:hand;' onclick='window.location.href="./"' value=' 取消 '></td>
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
	Error("密码或确认密码为空！","getpass.php");
 }
 if($userpass != $cuserpass)
 {
	Error("两次输入的密码不一致！","getpass.php");
 }
 $id = intval($_POST['id']);
 $db->update("update `user` set `userpass`='".md5($userpass)."' where id='".$id."'");  
?>
					  <table width="60%" border="0" cellspacing="2" cellpadding="0" bgcolor="#fdeacc">
                        <tr>
                          <td colspan="2" align="left"><strong>第四步：成功设置新密码</strong></td>
                          </tr>
                        <tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>用户名：</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$_POST['username']?></td>
                        </tr>
						<tr>
                          <td width="39%" align="right" bgcolor="#ffffff" style="padding:0px 8px;"><strong>新密码：</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$userpass?></td>
                        </tr>
						<tr>
                          <td colspan="2" bgcolor="#ffffff" style="padding:0px 8px; color:#FF0000;" align="center">请记住您的新密码并使用新密码登录！</td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" bgcolor="#ffffff"><a href="./">【返回首页】</a>&nbsp;&nbsp;<a href="javascript:window.close();">【关闭窗口】</a></td>
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
