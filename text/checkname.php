<?php 
include('./inc/site.php');
include('./inc/db_class.php');
include('./inc/function.php');

$username = SafeHtml($_GET['username']);
if(empty($username))
{
	Error("会员名或密码为空！","reg.php");
}
if($user=$db->getfirst("select * from `user` where username='".$username."'"))
echo "$username 此用户名已经被注册！<br/>请尝试使用其他用户名";
else
echo "$username 此用户名可以注册！";

exit;
?>