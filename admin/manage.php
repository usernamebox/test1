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
<title><?=$sitename?>_管理员列表</title>
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
td  { font:normal 12px 宋体;}
img  { vertical-align:bottom; border:0px; }
a  { font:normal 12px 宋体; color:#000000; text-decoration:none; }
a:hover  { color:#428EFF;text-decoration:underline; }
.sec_menu  { border-left:1px solid white; border-right:1px solid white; border-bottom:1px solid white; overflow:hidden; background:#D6DFF7; }
.menu_title  { }
.menu_title span  { position:relative; top:0px; left:8px; color:#000000; font-weight:bold; }
.menu_title2  { }
.menu_title2 span  { position:relative; top:0px; left:8px; color:#999999; font-weight:bold; }
</style>
<script language="JavaScript">
// 表单提交客户端检测
function doCheck(){
  if (document.form1.user.value==""){
	   alert("<?=$sitename?>提醒您：\n帐号不能为空!");
	   form1.user.focus();
	   return false;
  }
  if (document.form1.pass.value==""){
	   alert("<?=$sitename?>提醒您：\n密码不能为空!");
	   form1.pass.focus();
	   return false;
  }
}
</script>
</head>
<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<?php
//保存添加
if($_GET['act'] == "addok")
{
    $user=SafeHtml($_POST['user']);
    $pass=SafeHtml($_POST['pass']);
	if(empty($user) || empty($pass))
	{
		Error("管理员名称或密码为空！","manage.php?act=list");
	}
	$check_user = $db->query("SELECT * FROM `admin` where user='".$user."'");
	$row=$db->getarray($check_user);
	if($row)
	{
		Error("用户名已经存在！","manage.php?act=list");
	}
	$result=$db->query("select * from admin");
	$db->insert("INSERT INTO `admin` ( `user` , `pass`) VALUES('".$user."','".$pass."')");
	Error("添加成功！","manage.php?act=list");
    echo "添加成功";
}
//公告列表
//elseif($act == "list" || $act == "default")
elseif($_GET['act']=="list")
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=30;  //每页记录数.
$total=$db->getcount("select * from admin");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
//页码计算
$pagenum=ceil($total/$num);     //获得总页数,也是最后一页
$page=min($pagenum,$page);//获得首页
$prepg=$page-1;//上一页
$nextpg=($page==$pagenum ? 0 : $page+1);//下一页
$offset=($page-1)*$num;
?>
<table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
  <tr class="lanyuss">
    <td height="20"  colspan="3">管理员列表</td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center">编号</div></td>
    <td width="62%" height="23"><div align="center">帐号</div></td>
    <td width="26%"><div align="center">操作</div></td>
  </tr>
<?php  
$result=$db->query("select * from admin order by uid desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center"><?php echo $row[uid]; ?></div></td>
    <td width="62%" height="23"><div align="center"><?php echo $row[user]; ?></div></td>
    <td width="26%"><div align="center"><a href="manage.php?id=<?php echo $row[uid]; ?>&act=del" onClick="{if(confirm('确定要删除吗？\n\n删除之后就无法还原!')){return true;}return false;}">删除</a>&nbsp;&nbsp;<a href="manage.php?id=<?php echo $row[uid]; ?>&act=edit">修改</a></div></td>
  </tr>
<?php
}
?>  
  <tr class="lanyuqs">
      <td height="23" colspan="3" align="right"><?php 
include '../inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);
echo '[共'.$pagenum.'页]';
?>
	  </td>
    </tr>
</table>
<br><br>
<form action="manage.php?act=addok" method="post" name="form1" onSubmit="return doCheck();">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">新增管理员</td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>帐号:</td>
      <td height="23" align="left"><input type="text" name="user" maxlength="10" size="20"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>密码:</td>
      <td height="23" align="left"><input type="text" name="pass" maxlength="15" size="20"></td>
    </tr>
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	            <input type="submit" name="submit" value="新增">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="取消">
        </p></td>
    </tr>
  </table>
</form>
<?php
}
//修改部分
elseif($_GET['act'] == "edit")
{
	if(empty($_GET['id']))
	{
		echo "操作非法...";
		die();
	}
	$row = $db->query("SELECT * FROM admin WHERE uid='".$_GET['id']."'");
    //mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
   $edit=$db->getarray($row);
?>
<form action="manage.php?act=editok" method="post" name="form1" onSubmit="return doCheck();">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">修改资料</td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>帐号:</td>
      <td height="23" align="left"><input type="text" name="user" maxlength="10" size="20" value="<?=$edit[user]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>密码:</td>
      <td height="23" align="left"><input type="text" name="pass" maxlength="15" size="20" value="<?=$edit[pass]?>"></td>
    </tr>
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	      <input type="hidden" name="id" value="<?=$edit[uid]?>">
          <input type="submit" name="submit" value="修改">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="取消">
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
		echo "操作非法...";
		die();
	}
    $user=SafeHtml($_POST['user']);
    $pass=SafeHtml($_POST['pass']);
	if(empty($user) || empty($pass))
	{
		Error("管理员名称或密码为空！","manage.php?act=list");
	}
	$db->update("update admin set user='".$user."',pass='".$pass."' where uid='".$_POST['id']."'");  
	Error("修改成功！","manage.php?act=list");
    exit;
}
//删除部分
elseif($_GET['act'] == "del")
{
	if(empty($_GET['id']))
	{
		echo "操作非法...";
		die();
	}
	$rs = $db->query("delete from admin where uid='".$_GET['id']."'");
	Error("删除管理员成功！","manage.php?act=list");
    exit;
}
?>
</body>
</html>