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
<title>�γ���վ</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
margin:0px;
padding:0px;
background-color:#FFFFFF;
}
INPUT {
	BORDER-RIGHT: #ffffff 1px solid; BORDER-TOP: #707070 1px solid; FONT-WEIGHT: normal; FONT-SIZE: 12px; BACKGROUND: #f0f0f0; BORDER-LEFT: #707070 1px solid; COLOR: #000000; BORDER-BOTTOM: #ffffff 1px solid; FONT-FAMILY: Tahoma, Verdana
}
</style>
</head>
<body>
<?php
if($_SESSION["username"])
{
	$usercp = true;
?>
<?=$_SESSION["username"]?>
      ��ã���ӭ����!&nbsp;&nbsp;
      <?php if($_SESSION["super"]==3) {
		  echo "<a href='admin/admin.php' target='_blank'>�����̨</a>";
		  }
		  ?>
      &nbsp;&nbsp;<a href="user.php?username=<?=$_SESSION["username"]?>" target="_blank">�������</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="cp1.php?act=logout">�˳�</a>
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
	      alert("<?php echo $sitename; ?>\n�������û�����")
		  document.form1.username.focus();
		  return false
		    }
	  if (document.form1.userpass.value==""){
	      alert("<?php echo $sitename; ?>\n���������룿");
		  document.form1.userpass.focus();
		  return false
		  } 
	  return true
  }
</script>

  <form name="form1" method="post" action="cp1.php?act=login" onSubmit="return checkform()">
	  �û���:
        <input name="username" type="text" size="15" maxlength="12">
        ����:
        <input name="userpass" type="password" size="15" maxlength="20">
        <input name="submit" type="submit" value="�� ¼" />
        <a href="reg.php" target="_top"><input name="reg" type="input" style="cursor:hand;" value="ע ��" size="3" /></a>
  </form>

<?php
}
if($_GET['act']== "login") 
{
    $username=SafeHtml($_POST['username']);
	$userpass=SafeHtml($_POST['userpass']);
	if(empty($username) || empty($userpass))
	{
	   echo "<script language=javascript>";
	   echo "alert('�û��������벻��Ϊ�գ�');";
	   echo "</script>";
	}
	else
	{
		$rowlogin = $db->getfirst("SELECT * FROM user WHERE username='".$username."' AND userpass='".md5($userpass)."'");
		if(!$rowlogin)
		{
           echo ("<script type='text/javascript'> alert('�û��������벻��ȷ��');history.go(-1);</script>");
		}
		else
		{
		    if($row['islock']==1)
			{
			 echo ("<script type='text/javascript'> alert('�����ʺ���δͨ����֤���ѱ�������');history.go(-1);</script>");
			 exit;
			 }
			$_SESSION['username']=$rowlogin['username'];
			$_SESSION["super"] =$rowlogin['super'];
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=cp1.php\">"; 
		}
	}
}
elseif($_GET['act']== "logout") 
{
  $_SESSION["super"] =0;
  session_destroy();
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=cp1.php\">";
}
?>
</body>
</html>
