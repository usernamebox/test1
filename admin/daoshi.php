<?php 
session_start();
include('../inc/site.php');
include('./islogin.php');
include('../inc/db_class.php');
include('../inc/function.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="Content-Language" content="zh-CN">
<title><?=$sitename?>_人生导师申请</title>
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
if($_GET['act']=="list")
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=8;  //每页记录数.
$total=$db->getcount("select * from updaoshi");
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
    <td height="20">人生导师申请管理</td>
  </tr>
  <tr class="lanyuds">
    <td height="23">
<?php  
$result=$db->query("select * from updaoshi order by id desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#ffffff" style="padding:0 0 0 4px;">
                                <tr bgcolor="#E4EDF9">
                                  <td height="24" colspan="3"><strong>真实姓名：</strong>                                    <?=$row[truename]?></td>
                                  <td width="23%" rowspan="5" bgcolor="#FFF8EE" align="center">
<?php 
if(empty($row[photo]))
{
?>
<img src="../images/man.gif" width="100" height="100" border="0">
<?php
}
else 
{
?>
<img src="../<?=$row[photo]?>" width="100" height="100" border="0">
<?php
}?></td>
                                </tr>
                                <tr>
                                  <td width="10%" bgcolor="#FFF8EE"><strong>出生年月：</strong></td>
                                  <td colspan="2" bgcolor="#FFF8EE"><?=$row[birth]?></td>
                                </tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>院&nbsp;&nbsp;&nbsp;&nbsp;系：</strong></td>
                                  <td colspan="2" bgcolor="#FFF8EE"><?=$row[yuanxi]?></td>
                                </tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>专&nbsp;&nbsp;&nbsp;&nbsp;业：</strong></td>
                                  <td colspan="2" bgcolor="#FFF8EE"><?=$row[zhuanye]?></td>
                                </tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>学&nbsp;&nbsp;&nbsp;&nbsp;历：</strong></td>
                                  <td colspan="2" bgcolor="#FFF8EE"><?php
                                  if($row[xueli]=='1')
								    echo "本科";
								  elseif($row[xueli]=='2')
								    echo "硕士";
								  elseif($row[xueli]=='3')
								    echo "专业学位（EMBA MBA 工程硕士）";
								  elseif($row[xueli]=='4')
								    echo "博士";
									?></td>
                                </tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>班级代码：</strong></td>
                                  <td width="55%" bgcolor="#FFF8EE"><?=$row[daima]?></td>
                                  <td width="12%" bgcolor="#FFF8EE"><strong>学&nbsp;&nbsp;&nbsp;号：</strong></td>
                                  <td bgcolor="#FFF8EE"><?=$row[xuehao]?></td>
								</tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>联系电话：</strong></td>
                                  <td bgcolor="#FFF8EE"><?=$row[tel]?></td>
                                  <td bgcolor="#FFF8EE"><strong>E－mail：</strong></td>
                                  <td bgcolor="#FFF8EE"><?=$row[email]?></td>
								</tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>导&nbsp;&nbsp;&nbsp;&nbsp;师：</strong></td>
                                  <td bgcolor="#FFF8EE"><?=$row[userid]?></td>
                                  <td bgcolor="#FFF8EE"><strong>简&nbsp;&nbsp;&nbsp;历：</strong></td>
                                  <td bgcolor="#FFF8EE">
                                  <?php
								  if(empty($row[jianli]))
								    echo "尚未上传简历.";
								  else
                                    echo "<a href='..\/".$row[jianli]."'>点击下载</a>";
								  ?>
									</td>
								</tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>申请意愿：</strong></td>
                                  <td colspan="3" bgcolor="#FFF8EE">&nbsp;</td>
                                </tr>
								<tr>
                                  <td colspan="4" bgcolor="#FFF8EE"><?=$row[yiyuan]?></td>
                                </tr>
								 <tr>
                                  <td height="22" colspan="3" align="right" bgcolor="#E4EDF9">提取码：<?=$row[pass]?></td>
                                  <td bgcolor="#E4EDF9" align="right" height="22"> &nbsp;<a href="daoshi.php?id=<?=$row[id]?>&act=del" onClick="{if(confirm('确定要删除吗？\n\n删除之后就无法还原!')){return true;}return false;}">删除</a>&nbsp;&nbsp;</td>
							    </tr>
      </table>
<?php
}
?>
<br></td>
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
//删除部分
elseif($_GET['act'] == "del")
{
	if(empty($_GET['id']))
	{
		Error("非法操作...","daoshi.php?act=list");
		die();
	}
	$rs = $db->query("delete from updaoshi where id='".$_GET['id']."'");
	Error("删除成功！","daoshi.php?act=list");
    echo "删除成功";
}
?>


</body>
</html>
