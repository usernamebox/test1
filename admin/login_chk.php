<?php 
session_start();
?>
<?php include('../inc/site.php');?>
<?php 
$user1=htmlspecialchars($_POST["user"]);
$pass1=htmlspecialchars($_POST["pass"]);
$number1=htmlspecialchars($_POST["number"]);
if (empty($user1))
  {
  echo ("<script type='text/javascript'>alert('用户名不能是空的');history.go(-1);</script>");
  exit;}
if (empty($pass1))
  {
  echo ("<script type='text/javascript'> alert('密码不能是空的');history.go(-1);</script>");
  exit;}
if (empty($number1))
  {
  echo ("<script type='text/javascript'> alert('验证码不能是空的');history.go(-1);</script>");
  exit;}
if ($number1 != $_SESSION['code'])
echo ("<script type='text/javascript'> alert('验证码输入不正确');history.go(-1);</script>");

include('../inc/db_class.php');

if(!$user=$db->getfirst("select * from user where username='".$user1."' and userpass='".md5($pass1)."' and super=3"))
  {
   echo ("<script type='text/javascript'> alert('用户名或密码不正确');history.go(-1);</script>");
  }
else
  {
  $_SESSION['username']=$user[username];
  $_SESSION["super"]=$user[super];  
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php\">"; 
 }
?>