<?php 
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
if($_GET['act']=="")
{
$id=$_GET["id"];
$teachedit=$db->query("select * from flavor where id='$id'");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
$show=$db->getarray($teachedit);
$keywords=$show[keywords];
$hits=$show[hits]+1;
$db->update("update flavor set hits='$hits' where id='$id'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $show[title];?>_风采_课程网站</title>
<meta name="keywords" content="<?php echo $show[title];?>,风采,课程网站" />
<meta name="description" content="<?php echo $show[title];?>,风采,课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {font-size: 14px}
.STYLE4 {font-size: 14px; font-weight: bold; }
.STYLE6 {
	font-size: 14px;
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
          <td width="202" height="437" valign="top"><table width="195" border="0" align="center" cellpadding="0" cellspacing="0">
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
            <?php include('inc/link.php'); ?></td>
          <td valign="top"><table width="571" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="571" height="29" background="images/inner-img2.gif"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="font">
                    <tr>
                      <td width="40"><div align="center"><img src="images/inner-img3.gif" width="20" height="20" /></div></td>
                      <td>您的当前位置：<a href="index.php">首页</a> &gt;&gt; <a href="flavor.php">风采</a> &gt;&gt; <?php echo $show[title];?></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <table width="571" border="0" cellspacing="0" cellpadding="0" style="margin-top:8px;">
              <tr>
                <td width="571" height="285" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="257" valign="top"><table cellspacing="0" cellpadding="0" width="100%">
                          <tr>
                            <td height="50" colspan="2" align="middle" class="menu"><div align="center" class="STYLE2"><?php echo $show[title];?></div></td>
                          </tr>
                          <tr>
                            <td align="middle" bgcolor="#efefef" height="24"><div align="center">发布人：<?php echo $show[author];?>　   供稿者：<?php echo $show[show];?>　 　　更新日期：<?php echo $show[ntime];?>　   浏览：<?php echo $show[hits];?>　   推荐：<?php echo $show[times];?></div></td>
                          </tr>
                          <tr>
                            <td bgcolor="#cccccc" colspan="2" height="1"></td>
                          </tr>
                          <tr>
                            <td align="middle" colspan="2" height="20">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="con img"><div>
                                <p><?php echo $show[content];?></p>
                              </div></td>
                          </tr>
                        </table>
                        <table width="571" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="50"><div align="center" class="fy">【<a href="showflavor.php?id=<?=$show[id]?>&act=show">推荐新闻</a>】&nbsp;【<a href="mailto:<?=$sitemail?>">我要纠错</a>】&nbsp;【<a href="javascript:window.print()">打印</a>】&nbsp;【<a href="javascript:window.close()">关闭</a>】</div></td>
                          </tr>
                        </table>
						<table width="571" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="24" bgcolor="#efefef" style="padding-left:8px;">相关链接：</td>
                          </tr>
						  <tr>
                            <td bgcolor="#cccccc" colspan="2" height="1"></td>
                          </tr>
                          <tr>
                            <td height="25" class="font" style="padding:8px 8px 8px 8px;">
<?php  
$result=$db->query("select * from flavor where keywords like '%".$keywords."%' and id <>$id order by id desc limit 0,20");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row1=$db->getarray($result)){
?>
							·<a href="showflavor.php?id=<?=$row1[id]?>"><?=$row1[title]?></a><br />
<?php
}
?>
							</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><img src="images/body_bottom.gif" width="776" height="7" /></td>
  </tr>
</table>
<?php
include('footer.php');
}
elseif($_GET['act']=="show")
{
	if(empty($_GET['id']))
	{
		echo "操作非法...";
		die();
	}
	$id=$_GET["id"];
	$db->update("update `flavor` set `times`=`times`+1 where `id`='$id'");
	echo ("<script type='text/javascript'>alert('推荐新闻成功！');history.go(-1);</script>");
    exit;
}
?>
</body>
</html>
