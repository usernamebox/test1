<?php 
include('./inc/site.php');
include('./inc/db_class.php');
include('./inc/function.php');

$username = SafeHtml($_GET['username']);
if(empty($username))
{
	Error("��Ա��������Ϊ�գ�","reg.php");
}
if($user=$db->getfirst("select * from `user` where username='".$username."'"))
echo "$username ���û����Ѿ���ע�ᣡ<br/>�볢��ʹ�������û���";
else
echo "$username ���û�������ע�ᣡ";

exit;
?>