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
<title><?=$sitename?>_母校新闻</title>
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
  if (document.form1.title.value==""){
	   alert("<?=$sitename?>提醒您：\n标题不能为空!");
	   form1.title.focus();
	   return false;
  }
  // getHTML()为eWebEditor自带的接口函数，功能为取编辑区的内容
  if (WebEditor1.getHTML()==""){
	  alert("<?=$sitename?>提醒您：\n内容不能为空!");
	  return false;
  }
}
</script>
</head>
<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<?php
//添加公告
if($_GET['act']== "add")
{
?>
<form action="news.php?act=addok" method="post" name="form1" onSubmit="return doCheck();">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">母校新闻发布</td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>标题:</td>
      <td height="23" align="left"><input type="text" name="title" maxlength="150" size="40"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">发布人:</td>
      <td height="23" align="left"><input type="text" name="author" maxlength="50" size="40" value="<?php echo $_SESSION['admin']; ?>"></td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">供稿者:</td>
      <td height="23" align="left"><input type="text" name="show" maxlength="50" size="40" value="<?php echo $_SESSION['admin']; ?>"></td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">关键字:</td>
      <td height="23" align="left"><input type="text" name="keywords" maxlength="50" size="40">&nbsp;&nbsp;<select name="keyword" onChange="document.form1.keywords.value=this.options[this.selectedIndex].text;">
<option value="" selected>选择关键字</option>
<?php
$total=$db->getcount("select * from tags");  
$result=$db->query("select * from tags order by id desc limit 0,$total");
while($row=$db->getarray($result)){
?>
<option value="<?=$row[title]?>"><?=$row[title]?></option>
<?php
}
?>
</select></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">发布时间:</td>
      <td height="23" align="left"><input type="text" name="ntime" maxlength="20" size="40" value="<?php echo date("y/m/d") ?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="46"  width="12%" align="right" valign="top"><font color="#FF0000">*</font>主要内容:</td>
      <td height="46" align="left"><textarea name="content" style="display:none"></textarea>
        <iframe ID="WebEditor1" src="../WebEditor/ewebeditor.htm?id=content&style=coolblue" frameborder="0" scrolling="no" width="550" HEIGHT="350"></iframe></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">浏览次数:</td>
      <td height="23" align="left"><input name="hits" type="text" value="0" size="10"></td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">属性:</td>
      <td height="23" align="left"><input name="istop" type="checkbox" id="istop" value="1" onClick="seeme();">
          头条</td>
	</tr>
	<tr class="lanyuds" id="top" style="display:none;">
      <td height="23"  width="12%" align="right">图片:</td>
      <td height="23" align="left" valign="middle"><input name="photo" size="30" maxlength="200" type="text"> 
      建议大小:105*73<br>
      <iframe frameborder="0" width="280" height="26" scrolling="No" src="../upload_pic.htm"></iframe></td>
	</tr>
<script> 
function seeme()
{
	if (document.form1.istop.checked==true) document.getElementById('top').style.display='';
	else document.getElementById('top').style.display='none';
}
</script> 
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	            <input type="submit" name="submit" value="发布">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="取消" onclick="document.location.href='news.php?act=list';">
        </p></td>
    </tr>
  </table>
</form>
<?php
}
//保存添加
elseif($_GET['act'] == "addok")
{
    $istop = isset($_POST["istop"]) ? 1 : 0;
    $title=SafeHtml($_POST['title']);
    $author=SafeHtml($_POST['author']);
	$show=SafeHtml($_POST['show']);
	$keywords=SafeHtml($_POST['keywords']);
    $ntime=SafeHtml($_POST['ntime']);
    $content=$_POST['content'];
    $hits=intval($_POST['hits']);
	$photo=SafeHtml($_POST['photo']);
	$result=$db->query("select * from news");
	$db->insert("INSERT INTO `news` ( `title` , `author` , `show` , `keywords` , `ntime` , `content` , `hits`, `istop`, `photo`) VALUES('".$title."','".$author."','".$show."','".$keywords."','".$ntime."','".$content."','".$hits."','".$istop."','".$photo."')");
	Error("添加成功！","news.php?act=list");
    echo "添加成功";
}
//列表
//elseif($act == "list" || $act == "default")
elseif($_GET['act']=="list")
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=30;  //每页记录数.
$total=$db->getcount("select * from news");
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
    <td height="20"  colspan="3">母校新闻管理</td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center">编号</div></td>
    <td width="62%" height="23"><div align="center">主题</div></td>
    <td width="26%"><div align="center">操作</div></td>
  </tr>
<?php  
$result=$db->query("select * from news order by id desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
  <tr class="lanyuds">
    <td height="23"  width="12%"><div align="center"><?php echo $row[id]; ?></div></td>
    <td width="62%" height="23"><div align="center"><?=$row[title]?><?=($row[istop]==1)?"(头条)":""?></div></td>
    <td width="26%"><div align="center"><a href="news.php?id=<?php echo $row[id]; ?>&act=del" onClick="{if(confirm('确定要删除吗？\n\n删除之后就无法还原!')){return true;}return false;}">删除</a>&nbsp;&nbsp;<a href="news.php?id=<?php echo $row[id]; ?>&act=edit">修改</a></div></td>
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
<?php
}
//修改部分
elseif($_GET['act'] == "edit")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","news.php?act=list");
		die();
	}
	$row = $db->query("SELECT * FROM news WHERE id='".$_GET['id']."'");
    //mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
   $edit=$db->getarray($row);
?>
<form action="news.php?act=editok" method="post" name="form1" onSubmit="return doCheck();">
  <table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
    <tr class="lanyuss">
      <td height="20"  colspan="2">母校新闻修改</td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right"><font color="#FF0000">*</font>标题:</td>
      <td height="23" align="left"><input type="text" name="title" maxlength="150" size="40" value="<?=$edit[title]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">发布人:</td>
      <td height="23" align="left"><input type="text" name="author" maxlength="50" size="40" value="<?=$edit[author]?>"></td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">供稿者:</td>
      <td height="23" align="left"><input type="text" name="show" maxlength="50" size="40" value="<?=$edit[show]?>"></td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">关键字:</td>
      <td height="23" align="left"><input type="text" name="keywords" maxlength="50" size="40" value="<?=$edit[keywords]?>">&nbsp;&nbsp;<select name="keyword" onChange="document.form1.keywords.value=this.options[this.selectedIndex].text;">
<option value="" selected>选择关键字</option>
<?php
$total=$db->getcount("select * from tags");  
$result=$db->query("select * from tags order by id desc limit 0,$total");
while($row=$db->getarray($result)){
?>
<option value="<?=$row[title]?>"><?=$row[title]?></option>
<?php
}
?>
</select></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">发布时间:</td>
      <td height="23" align="left"><input type="text" name="ntime" maxlength="20" size="40" value="<?=$edit[ntime]?>"></td>
    </tr>
    <tr class="lanyuds">
      <td height="46"  width="12%" align="right" valign="top"><font color="#FF0000">*</font>主要内容:</td>
      <td height="46" align="left"><textarea name="content" style="display:none"><?=$edit[content]?></textarea>
        <iframe ID="WebEditor1" src="../WebEditor/ewebeditor.htm?id=content&style=coolblue" frameborder="0" scrolling="no" width="550" HEIGHT="350"></iframe></td>
    </tr>
    <tr class="lanyuds">
      <td height="23"  width="12%" align="right">浏览次数:</td>
      <td height="23" align="left"><input name="hits" type="text" size="10" value="<?=$edit[hits]?>"></td>
    </tr>
	<tr class="lanyuds">
      <td height="23"  width="12%" align="right">属性:</td>
      <td height="23" align="left">
	  <input name="istop" type="checkbox" id="istop" value="1" onClick="seeme();" <?=($edit[istop] ? " checked" :"")?>>
          头条</td>
	</tr>
	<tr class="lanyuds" id="top" <?php if($edit[istop]==1){
	  echo  "style=display:block;";}
	  elseif($edit[istop]==0) {
	  echo  "style=display:none;";}
	  ?>>
      <td height="23"  width="12%" align="right">图片:</td>
      <td height="23" align="left" valign="middle"><input name="photo" size="30" maxlength="200" type="text" value="<?=$edit[photo]?>"> 
      建议大小:105*73<br>
      <iframe frameborder="0" width="280" height="26" scrolling="No" src="../upload_pic.htm"></iframe></td>
	</tr>
<script> 
function seeme()
{
	if (document.form1.istop.checked==true) document.getElementById('top').style.display='';
	else document.getElementById('top').style.display='none';
}
</script> 
    <tr class="lanyuqs">
      <td height="23" align="right" colspan="2"><p align="center">
	      <input type="hidden" name="id" value="<?=$edit[id]?>">
          <input type="submit" name="submit" value="修改">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="Submit2" value="取消" onclick="document.location.href='news.php?act=list';">
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
		Error("非法操作...","news.php?act=edit");
		die();
	}
	$id=$_POST['id'];
	$istop = isset($_POST["istop"]) ? 1 : 0;
    $title=SafeHtml($_POST['title']);
    $author=SafeHtml($_POST['author']);
	$show=SafeHtml($_POST['show']);
	$keywords=SafeHtml($_POST['keywords']);
    $ntime=SafeHtml($_POST['ntime']);
    $content=$_POST['content'];
    $hits=intval($_POST['hits']);
	$photo=SafeHtml($_POST['photo']);
	$result=$db->query("select * from news");
	$db->update("update `news` set title='".$title."',author='".$author."',`show`='".$show."',`keywords`='".$keywords."',ntime='".$ntime."',content='".$content."',hits='".$hits."',istop='".$istop."',`photo`='".$photo."' where id='".$id."'");  
	Error("修改成功！","news.php?act=list");
    echo "修改成功";
}
//删除部分
elseif($_GET['act'] == "del")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","news.php?act=list");
		die();
	}
	$rs = $db->query("delete from news where id='".$_GET['id']."'");
	Error("删除成功！","news.php?act=list");
    echo "删除成功";
}
?>
</body>
</html>