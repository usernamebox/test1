<?php 
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>课程网站</title>
<meta name="keywords" content="传承,课程网站" />
<meta name="description" content="传承,课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {font-size: 14px}
.STYLE4 {font-size: 14px; font-weight: bold; }
.STYLE6 {	font-size: 14px;
	color: #669900;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<?php
include('header.php');
?>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:6px;">
  <tr>
    <td width="776"><img src="images/body_top.gif" width="776" height="7" /></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="202" height="566" valign="top"><table width="195" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="images/inner-img1.gif" width="195" height="100" /></td>
          </tr>
        </table>
            <table height="200" width="195" border="0" align="center" cellpadding="0" cellspacing="0" background="images/inner_member.gif">
              <tr>
                <td height="40">&nbsp;</td>
              </tr>
              <tr>
                <td><iframe id=user src="cp.php" frameBorder="0" width="100%" scrolling="no" height="160" allowTransparency="true"></iframe></td>
              </tr>
            </table>
          <table width="195" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:8px;">
                <tr>
                  <td height="260" valign="top" background="images/inner_lmdh.gif"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="30" height="38">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                        <td class="font"><a href="inheritance.php?cat=1">人生导师</a></td>
                      </tr>
                      <tr>
                        <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                        <td class="font"><a href="inheritance.php?cat=2">创业导航</a></td>
                      </tr>
                      <tr>
                        <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                        <td class="font"><a href="book.php">学子心声</a></td>
                      </tr>
                  </table></td>
                </tr>
              </table>
          <?php include('inc/link.php'); ?></td>
        <td valign="top"><table width="571" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="571" height="29" background="images/inner-img2.gif"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="font">
              <tr>
                <td width="40"><div align="center"><img src="images/inner-img3.gif" width="20" height="20" /></div></td>
                <td>您的当前位置：<a href="index.php">首页</a> &gt;&gt;教学大纲<a href="inheritance.php"></a><?php
				if(!empty($_GET['cat'])) 
				{
				  if($_GET['cat']==1)
				  {
				    echo " &gt;&gt; 人生导师";
				   }
				  elseif($_GET['cat']==2)
				  {
				    echo " &gt;&gt; 创业导航";
				   }
				}
				?></td>
              </tr>
            </table></td>
          </tr>
        </table>
<?php 
if($_GET['cat']=="")
{
?>
              <table width="571" height="199" border="0" cellpadding="0" cellspacing="0" style="margin-top:8px;">
                <tr>
                  <td valign="top" background="images/inner_bg1.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/inner_bg2.gif">
                      <tr>
                        <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                            <tr>
                              <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                              <td width="130"><span class="STYLE2">教学大纲</span></td>
                              <td style="padding-right:18px;"><div align="right"><a href="inheritance.php?cat=1"><img src="images/inner_more.gif" width="61" height="17" border="0" /></a></div></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="257"><table width="100%" height="257" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td valign="top" class="font" style="padding:8px 8px 8px 8px;">
<?php  
if($result=$db->getfirst("select * from inheritance where istop=1 and cat=1 order by id desc"))
{
$topid=$result[id];
if(empty($result[photo]))
{
?>
·<a href=showinheritance.php?id=<?=$result[id]?>><?=$result[title]?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a href="upfile.php">我要申请</a>]<br />
<?php
}
else
{
?>
							  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="125" ><div align="center"><img src="<?=$result['photo']?>" width="105" height="73" /></div></td>
                                    <td class="font" style="padding-right:18px;"><span class="STYLE4">最新项目：</span><a href="showinheritance.php?id=<?=$result[id]?>"><?=$result['title']?></a>[<?=$result[ntime]?>]<br />
                                        <a href="showinheritance.php?id=<?=$result[id]?>"><span class="STYLE6">[详细查看]</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a href="upfile.php">我要申请</a>]</td>
                                  </tr>
                              </table>
<?php
}
}
if(empty($topid))
{
$result=$db->query("select id,title from inheritance where cat=1 order by id desc limit 0,8");
}
else
{
$result=$db->query("select id,title from inheritance where id <>$topid and cat=1 order by id desc limit 0,8");
}
while($row=$db->getarray($result)){
?>
						·<a href="showinheritance.php?id=<?=$row[id]?>"><?=CutString($row[title],80)?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a href="upfile.php">我要申请</a>]<br />
<?php
}
?>
							  
							  </td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
              </table>
          <table width="571" border="0" cellspacing="0" cellpadding="0" style="margin-top:8px;">
                <tr>
                  <td width="571" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/inner_bg2.gif">
                      <tr>
                        <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                            <tr>
                              <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                              <td width="130"><span class="STYLE2">创业导航</span></td>
                              <td style="padding-right:18px;"><div align="right"><a href="inheritance.php?cat=2"><img src="images/inner_more.gif" width="61" height="17" border="0" /></a></div></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="257"><table width="100%" height="257" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td valign="top" class="font" style="padding:8px 8px 8px 8px;">
<?php  
if($result=$db->getfirst("select * from inheritance where istop=1 and cat=2 order by id desc"))
{
$topid=$result[id];
if(empty($result[photo]))
{
echo "·<a href=showinheritance.php?id=".$result[id].">".$result[title]."</a><br />";
}
else
{
?>
							  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="125" ><div align="center"><img src="<?=$result['photo']?>" width="105" height="73" /></div></td>
                                    <td class="font" style="padding-right:18px;"><span class="STYLE4">最新新闻：</span><a href="showinheritance.php?id=<?=$result[id]?>"><?=$result['title']?></a>[<?=$result[ntime]?>]<br />
                                        <a href="showinheritance.php?id=<?=$result[id]?>"><span class="STYLE6">[详细查看]</span></a></td>
                                  </tr>
                              </table>
<?php
}
}
if(empty($topid))
{
$result=$db->query("select id,title from inheritance where cat=2 order by id desc limit 0,8");
}
else
{
$result=$db->query("select id,title from inheritance where id <>$topid and cat=2 order by id desc limit 0,8");
}
while($row=$db->getarray($result)){
?>
						·<a href="showinheritance.php?id=<?=$row[id]?>"><?=CutString($row[title],80)?></a><br />
<?php
}
?>
							  </td>
                            </tr>
                        </table></td>
                      </tr>
                  </table>
                    
                  </td>
                </tr>
              </table>
<?php
}
else
{
$cat=$_GET['cat'];
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=12;  
$total=$db->getcount("select * from inheritance where cat=$cat");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
if($result=$db->getfirst("select * from inheritance where cat=$cat and istop=1 order by id desc"))
{
$total=$total-1;
}
//页码计算
$pagenum=ceil($total/$num);     //获得总页数,也是最后一页
$page=min($pagenum,$page);//获得首页
$prepg=$page-1;//上一页
$nextpg=($page==$pagenum ? 0 : $page+1);//下一页
$offset=($page-1)*$num;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                          <tr>
                            <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                            <td width="130"><span class="STYLE2"><?php if($_GET['cat']==1)
				  {
				    echo "人生导师";
				   }
				  elseif($_GET['cat']==2)
				  {
				    echo "创业导航";
				   }
				   ?></span></td>
                            <td style="padding-right:18px;">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
					<tr>
					  <td valign="top" class="font" style="padding:8px 8px 8px 8px;">
<?php  
if($result=$db->getfirst("select * from inheritance where cat=$cat and istop=1 order by id desc"))
{
$topid=$result[id];
if(empty($result[photo]))
{
echo "·<a href=showinheritance.php?id=".$result[id].">".$result[title]."</a><br />";
}
else
{
?>
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="125" ><div align="center"><img src="<?=$result['photo']?>" width="105" height="73" /></div></td>
                          <td class="font" style="padding-right:18px;"><span class="STYLE4"><?=($_GET['cat']==1)?"最新项目":"最新新闻"?>：</span><a href="showinheritance.php?id=<?php echo $result[id]; ?>"><?=$result['title']?></a>[<?=$result['ntime']?>]<br />
                            <a href="showinheritance.php?id=<?php echo $result[id]; ?>"><span class="STYLE6">[详细查看]</span></a><?=($cat==1)?"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a href=upfile.php>我要申请</a>]":""?></td>
                        </tr>
                      </table>
<?php
}
}
if(empty($topid))
{
$result=$db->query("select id,title from inheritance where cat=$cat order by id desc limit $offset,$num");
}
else
{
$result=$db->query("select id,title from inheritance where id <>$topid and cat=$cat order by id desc limit $offset,$num");
}
while($row=$db->getarray($result)){
?>
						·<a href="showinheritance.php?id=<?=$row[id]?>"><?=CutString($row[title],80)?></a><?=($cat==1)?"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a href=upfile.php>我要申请</a>]":""?><br />
<?php
}
?>
					  </td>
					 </tr>
                  </table>
            <table width="571" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="25" align="center" class="fy"><?php 
include 'inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);
?></td>
              </tr>
            </table>
<?php
}
?>
</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="images/body_bottom.gif" width="776" height="7" /></td>
  </tr>
</table>
<?php
include('footer.php');
?>
</body>
</html>
