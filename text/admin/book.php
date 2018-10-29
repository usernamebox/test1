<?php 
session_start();
include('../inc/site.php');
include('./islogin.php');
include('../inc/db_class.php');
include('../inc/function.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title><?=$sitename?>_学子心声</title>
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
<SCRIPT>
<!--
function is_email(str)
{ if((str.indexOf("@")==-1)||(str.indexOf(".")==-1)){
	
	return false;
	}
	return true;
}
function CheckForm(theForm)
{
if (theForm.title.value.length == 0)
	{
		alert("请输入标题！")
		theForm.title.focus()
		return false
	}
if (document.form1.title.value.indexOf("<")!=-1 || document.form1.title.value.indexOf(">")!=-1)
{
		alert("您输入的标题中包含非法字符 (<,>) ");
		document.form1.title.focus();
		return false;
	}
	if (document.form1.title.value.indexOf("'")!=-1)
   {
		alert("您输入的标题中包含非法字符 (') ");
		document.form1.title.focus();
		return false;
	}
	if(!empty(form1.email.value)) {
	if(!is_email(form1.email.value))
	{ alert("非法的EMail地址！");
		form1.email.focus();
	return false;
	}
}
if (theForm.content.value.length == 0)
	{
		alert("请输入内容！")
		theForm.content.focus()
		return false
	}
if (document.form1.content.value.indexOf("<")!=-1 || document.form1.content.value.indexOf(">")!=-1)
{
		alert("您输入的内容中包含非法字符 (<,>) ");
		document.form1.content.focus();
		return false;
}
if (document.form1.content.value.indexOf("'")!=-1)
{
		alert("您输入的内容中包含非法字符 (') ");
		document.form1.content.focus();
		return false;
}
return true;
}
//-->
</SCRIPT>
</head>

<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<?php
//列表
if($_GET['act']=="list")
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=8;  //每页记录数.
$total=$db->getcount("select * from book");
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
    <td height="20">学子心声管理</td>
  </tr>
  <tr class="lanyuds">
    <td height="23">
<?php  
$result=$db->query("select * from book order by id desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
	<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#ffffff" style="padding:0 0 0 4px;">
                                <tr bgcolor="#E4EDF9">
                                  <td width="63%" height="24">作者：<?=$row[yname]?>[<?=($row[hidden]==0?"公开":"悄悄话")?>]</td>
                                  <td width="37%">发表时间：
                                    <?=$row[utime]?>
                                  &nbsp;&nbsp;&nbsp;<img src="../images/icon_tel.gif" width="16" height="16" border="0" alt="<?=$row[yname]?>的电话是<?=$row[tel]?>">&nbsp;&nbsp;<img src="../images/icon_email.gif" width="16" height="16" border="0" alt="<?=$row[yname]?>的E-mail是<?=$row[email]?>">&nbsp;&nbsp;<img src="../images/icon_ip.gif" width="16" height="16" border="0" alt="<?=$row[yname]?>来自<?=$row[ip]?>"></td>
                                </tr>
                                <tr>
                                  <td colspan="2" bgcolor="#FFF8EE">主题：
                                    <?=$row[title]?>
                                    <br />
                                    <?=$row[content]?>
                                    <?php
if(!(empty($row[review])))
{
echo "<br>------------------------------------------------------------------------------------------------------<br>";
echo "站长回复：".$row[review];
}
?>
                                  </td>
                                </tr>
								 <tr>
                                  <td colspan="2" bgcolor="#E4EDF9" align="right" height="22"><?php
								  if($row[islock]==1)
								  {
								  echo "<a href='book.php?id=".$row[id]."&act=lock'>锁定</a>";
								  }
								  elseif($row[islock]==0)
								  {
								  echo "<a href='book.php?id=".$row[id]."&act=unlock'>审核</a>";
								  }
								  ?> &nbsp;<a href="book.php?id=<?=$row[id]?>&act=review">回复</a> &nbsp;<a href="book.php?id=<?=$row[id]?>&act=edit">编辑</a> &nbsp;<a href="book.php?id=<?=$row[id]?>&act=del" onClick="{if(confirm('确定要删除吗？\n\n删除之后就无法还原!')){return true;}return false;}">删除</a>&nbsp;&nbsp;</td>
                                </tr>
                              </table><br>
                              <?php
}
?>	  							  
							  
							  </td>
  </tr>

  <tr class="lanyuqs">
      <td height="23" align="right"><?php 
include '../inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);
echo '[共'.$pagenum.'页]';
?>	  </td>
    </tr>
</table>
<?php
}
//修改部分
elseif($_GET['act'] == "edit")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","book.php?act=list");
		die();
	}
	$row = $db->query("SELECT * FROM book WHERE id='".$_GET['id']."'");
    //mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
   $edit=$db->getarray($row);
?>
<form action="book.php?act=editok" method="post" name="form1" onSubmit="return CheckForm(this);">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">学子心声修改</td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">姓名:</td>
      <td height="23" align="left"><?=$edit[yname]?></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">电话:</td>
      <td height="23" align="left"><input type="text" name="tel" maxlength="15" size="40" value="<?=$edit[tel]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">E-mail:</td>
      <td height="23" align="left"><input type="text" name="email" maxlength="30" size="40" value="<?=$edit[email]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font  color="#FF0000">*</font>留言标题:</td>
      <td height="23" align="left"><input type="text" name="title" maxlength="150" size="40" value="<?=$edit[title]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="46"  width="12%" align="right" valign="top"><font color="#FF0000">*</font>留言内容:</td>
      <td height="46" align="left"><textarea name="content" cols="40" rows="10" id="content"><?=$edit[content]?></textarea></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">留言性质:</td>
      <td height="23" align="left"><input name="hidden" type="radio" value="0" <?=($edit[hidden]==0?"checked":"")?>>公开
       <input type="radio" name="hidden" value="1" <?=($edit[hidden]==1?"checked":"")?>>悄悄话</td>
    </tr>
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	      <input type="hidden" name="id" value="<?=$edit[id]?>">
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
		Error("非法操作...","book.php?act=edit");
		die();
	}
$tel=SafeHtml($_POST['tel']);
$email=SafeHtml($_POST['email']);
$title=SafeHtml($_POST['title']);
$content=nl2br($_POST['content']);
if(empty($title) || empty($content))
{
   Error("留言主题或内容为空！","book.php?act=edit");
}
if(!empty($email)) {
   if(!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email))
   {
	 Error("邮箱地址不正确！","book.php?act=edit");
   }
}
$hidden=$_POST['hidden'];
	$db->update("update book set tel='".$tel."',email='".$email."',title='".$title."',content='".$content."',hidden='".$hidden."' where id='".$_POST['id']."'");  
	Error("修改成功！","book.php?act=list");
    echo "修改成功";
}
//回复部分
elseif($_GET['act'] == "review")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","book.php?act=list");
		die();
	}
	$row = $db->query("SELECT * FROM book WHERE id='".$_GET['id']."'");
    //mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
   $edit=$db->getarray($row);
?>
<form action="book.php?act=reviewok" method="post" name="form1" onSubmit="return CheckForm(this);">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">回复留言</td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">留言主题:</td>
      <td height="23" align="left"><?=$edit[title]?>[作者:<?=$edit[yname]?>]</td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">留言内容:</td>
      <td height="23" align="left"><?=$edit[content]?></td>
    </tr>
    <tr class="lanyuds">
      <td height="46"  width="12%" align="right" valign="top"><font color="#FF0000">*</font>回复内容:</td>
      <td height="46" align="left"><textarea name="review" cols="40" rows="10" id="review"></textarea></td>
    </tr>
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	      <input type="hidden" name="id" value="<?=$edit[id]?>">
          <input type="submit" name="submit" value="回复">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="取消">
        </p></td>
    </tr>
  </table>
</form>
<?php
}
elseif($_GET['act'] == "reviewok")
{
	if(empty($_POST['id']))
	{
		Error("非法操作...","book.php?act=list");
		die();
	}
$review=nl2br($_POST['review']);
$rtime=date("Y-m-d G:i:s");
if(empty($review))
{
   Error("回复内容为空！","book.php?act=list");
}
	$db->update("update book set review='".$review."',rtime='".$rtime."' where id='".$_POST['id']."'");  
	Error("回复成功！","book.php?act=list");
    die();
}
//删除部分
elseif($_GET['act'] == "del")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","book.php?act=list");
		die();
	}
	$rs = $db->query("delete from book where id='".$_GET['id']."'");
	Error("删除成功！","book.php?act=list");
    echo "删除成功";
}
//审核
elseif($_GET['act'] == "unlock")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","book.php?act=list");
		die();
	}
	$db->update("update book set `islock`='1' where id='".$_GET['id']."'");  
	Error("审核成功！","book.php?act=list");
    exit;
}
//锁定
elseif($_GET['act'] == "lock")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","book.php?act=list");
		die();
	}
	$db->update("update book set `islock`='0' where id='".$_GET['id']."'");  
	Error("锁定成功！","book.php?act=list");
    exit;
}
?>

</body>
</html>
