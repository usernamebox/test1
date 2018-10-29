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
<title><?=$sitename?>_关于我们</title>
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
  if (WebEditor1.getHTML()==""){
	  alert("<?=$sitename?>提醒您：\n内容不能为空!");
	  return false;
  }
}
</script>
</head>

<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<?php
if($_GET['act'] == "list")
{
$row = $db->query("SELECT * FROM about WHERE id=1");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
$edit=$db->getarray($row);
?>
<form action="about.php?act=save" method="post" name="form1" onSubmit="return doCheck();">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20">关于我们</td>
    </tr>
    <tr class="lanyuds">
      <td height="46" align="center"><textarea name="content" style="display:none"><?=$edit['content']?></textarea>
        <iframe ID="WebEditor" src="../WebEditor/ewebeditor.htm?id=content&style=coolblue" frameborder="0" scrolling="no" width="550" HEIGHT="350"></iframe></td>
    </tr>
    <tr class="lanyuqs">
      <td height="23" align="right"><p align="center">
	            <input type="submit" name="submit" value="修改">
          &nbsp;&nbsp;&nbsp;&nbsp;
          
        </p></td>
    </tr>
  </table>
</form>
<?php
}
elseif($_GET['act'] == "save")
{
    $content=$_POST['content'];
	$db->update("update about set content='".$content."' where id=1");  
	Error("编辑关于我们成功！","about.php?act=list");
    exit;
}
?>
</body>
</html>