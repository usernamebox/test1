<?php 
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
if($_GET['act']=="")
{
$id=$_GET["id"];
$teachedit=$db->query("select * from news where id='$id'");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
$show=$db->getarray($teachedit);
$keywords=$show[keywords];
$hits=$show[hits]+1;
$db->update("update news set hits='$hits' where id='$id'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $show[title];?>_ĸУ����_�γ���վ</title>
<meta name="keywords" content="<?php echo $show[title];?>,ĸУ����,�γ���վ" />
<meta name="description" content="<?php echo $show[title];?>,ĸУ����,�γ���վ" />
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
                      <td>���ĵ�ǰλ�ã�<a href="index.php">��ҳ</a> &gt;&gt; <a href="news.php">ĸУ����</a> &gt;&gt; <?php echo $show[title];?></td>
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
                            <td align="middle" bgcolor="#efefef" height="24"><div align="center">�����ˣ�<?php echo $show[author];?>��   �����ߣ�<?php echo $show[show];?>�� �����������ڣ�<?php echo $show[ntime];?>��   �����<?php echo $show[hits];?>��   �Ƽ���<?php echo $show[times];?></div></td>
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
                            <td height="50"><div align="center" class="fy">��<a href="shownews.php?id=<?=$show[id]?>&act=show">�Ƽ�����</a>��&nbsp;��<a href="mailto:<?=$sitemail?>">��Ҫ����</a>��&nbsp;��<a href="javascript:window.print()">��ӡ</a>��&nbsp;��<a href="javascript:window.close()">�ر�</a>��</div></td>
                          </tr>
                        </table>
						<table width="571" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="24" bgcolor="#efefef" style="padding-left:8px;">������ӣ�</td>
                          </tr>
						  <tr>
                            <td bgcolor="#cccccc" colspan="2" height="1"></td>
                          </tr>
                          <tr>
                            <td height="25" class="font" style="padding:8px 8px 8px 8px;">
<?php  
$result=$db->query("select * from news where keywords like '%".$keywords."%' and id <>$id order by id desc limit 0,20");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
while($row1=$db->getarray($result)){
?>
							��<a href="shownews.php?id=<?=$row1[id]?>"><?=$row1[title]?></a><br />
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
		echo "�����Ƿ�...";
		die();
	}
	$id=$_GET["id"];
	$db->update("update `news` set `times`=`times`+1 where `id`='$id'");
	echo ("<script type='text/javascript'>alert('�Ƽ����ųɹ���');history.go(-1);</script>");
    exit;
}
?>
</body>
</html>