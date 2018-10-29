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
<title>课程网站</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
margin:0px;
padding:0px;
}
</style>
</head>
<body style="BACKGROUND-COLOR: transparent">
<?php
if($_SESSION["username"])
{
	$usercp = true;
?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">
		<tr>
          <td height="75" align="center">
<?=$_SESSION["username"]?> 你好，欢迎光临</td>
        </tr>
        <tr>
          <td align="center" valign="top"><?php if($_SESSION["super"]==3) {
		  echo "<a href='admin/admin.php' target='_blank'>进入后台</a>";
		  }
		  ?>
		  &nbsp;&nbsp;<a href="user.php?username=<?=$_SESSION["username"]?>" target="_blank">控制面板</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="cp.php?act=logout">退出</a></td>
        </tr>
      </table>
<?php
}
else
{
	$usercp = false;
?>
<script language=javascript>
  function checkform()
  {
      if (document.form1.username.value==""){
	      alert("<?php echo $sitename; ?>\n请输入用户名？")
		  document.form1.username.focus();
		  return false
		    }
	  if (document.form1.userpass.value==""){
	      alert("<?php echo $sitename; ?>\n请输入密码？");
		  document.form1.userpass.focus();
		  return false
		  } 
          if (document.form1.number.value==""){
	      alert("<?php echo $sitename; ?>\n请输入验证码？");
		  document.form1.number.focus();
		  return false
		  }
		  return true
  }
</script>
	<form name="form1" method="post" action="cp.php?act=login" onSubmit="return checkform()">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">

        <tr>
          <td align="right">用户名：</td>
          <td align="center"><input name="username" type="text" size="15" maxlength="12"></td>
        </tr>
        <tr>
          <td align="right">密　码：</td>
          <td align="center"><input name="userpass" type="password" size="15" maxlength="20"></td>
        </tr>
        <tr>
          <td align="right">验证码：</td>
          <td align="center"><input name="number" type="text" size="8">&nbsp;&nbsp;&nbsp;<img src="inc/checknumber.php?act=init"></td>
        </tr>
		<tr>
          <td colspan="2" align="center"><input type="image" name="Submit" src="images/login.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="reg.php" target="_top"><img src="images/member_.gif" width="72" height="24" border="0" /></a></td>
        </tr>
        <tr>
          <td colspan="2" class="font" align="center"><a href="getpass.php" target="_top">忘记密码怎么办?</a></td>
        </tr>
      </table>
</form>
<?php
}
if($_GET['act']== "login") 
{
    $username=SafeHtml($_POST['username']);
	$userpass=SafeHtml($_POST['userpass']);
	$number1=SafeHtml($_POST["number"]);
	if (empty($number1))
   {
      echo ("<script type='text/javascript'> alert('验证码不能是空的');history.go(-1);</script>");
      exit;
	}
    if ($number1 != $_SESSION['code'])
	{
       echo ("<script type='text/javascript'> alert('验证码输入不正确');history.go(-1);</script>");
	   exit;
	 }
	if(empty($username) || empty($userpass))
	{
	   echo "<script language=javascript>";
	   echo "alert('用户名或密码不能为空！');";
	   echo "</script>";
	}
	else
	{
		$row = $db->getfirst("SELECT * FROM user WHERE username='".$username."' AND userpass='".md5($userpass)."'");
		if(!$row)
		{
           echo ("<script type='text/javascript'> alert('用户名或密码不正确！');history.go(-1);</script>");
		}
		else
		{
		    if($row['islock']==1)
			{
			 echo ("<script type='text/javascript'> alert('您的帐号尚未通过验证或已被锁定！');history.go(-1);</script>");
			 exit;
			 }
			$_SESSION['username']=$row['username'];
			$_SESSION["super"] =$row['super'];
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=cp.php\">"; 
		}
	}
}
elseif($_GET['act']== "logout") 
{
  $_SESSION["super"] =0;
  session_destroy();
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=cp.php\">";
}
?>
</body>
</html>
