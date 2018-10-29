<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
if($_GET['cat']==2 and empty($_SESSION["username"]))
{
	Error("该部分只有本站会员才可浏览！","index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>作业_课程网站</title>
<meta name="keywords" content="作业,课程网站" />
<meta name="description" content="作业,课程网站" />
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
    <td><img src="images/body_top.gif" width="776" height="7" /></td>
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
                        <td class="font"><a href="sunshine.php?cat=1">布置作业</a></td>
                      </tr>
                      <tr>
                        <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                        <td class="font"><a href="sunshine.php?cat=2">作业</a></td>
                      </tr>
                  </table></td>
                </tr>
              </table>
          <?php include('inc/link.php'); ?></td>
        <td valign="top"><table width="571" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="571" height="29" background="images/inner-img2.gif"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="font">
<?php 

if($_GET['cat']=="" || $_GET['cat']==1)
{
  $cat=1;
}
else
{
  $cat=2;
}
?>
              <tr>
                <td width="40"><div align="center"><img src="images/inner-img3.gif" width="20" height="20" /></div></td>
                <td>您的当前位置：<a href="index.php">首页</a> &gt;&gt; <a href="sunshine.php">布置作业</a><?php
				  if($cat==1)
				  {
				    echo " &gt;&gt; 布置作业";
				   }
				  else
				  {
				    echo " &gt;&gt; 作业";
				   }
				?></td>
              </tr>
            </table></td>
          </tr>
        </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                          <tr>
                            <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                            <td width="130"><span class="STYLE2"><?php if($cat==1)
				  {
				    echo "布置作业";
				   }
				  elseif($cat==2)
				  {
				    echo "作业";
				   }
				   ?></span></td>
                            <td style="padding-right:18px;">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="257"><table width="100%" height="257" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td valign="top" class="font" style="padding:8px 8px 8px 8px;"><?php  
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=12;  
$total=$db->getcount("select * from `sunshine` where `cat`=$cat");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
//页码计算
$pagenum=ceil($total/$num);     //获得总页数,也是最后一页
$page=min($pagenum,$page);//获得首页
$prepg=$page-1;//上一页
$nextpg=($page==$pagenum ? 0 : $page+1);//下一页
$offset=($page-1)*$num;
$result=$db->query("select * from `sunshine` where `cat`=$cat order by id desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
                              ·<a href="showsunshine.php?id=<?php echo $row[id]; ?>"><?php echo $row[title]; ?></a><br />
                              <?php
}
?>
                            </td>
                          </tr>
                        </table></td>
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
