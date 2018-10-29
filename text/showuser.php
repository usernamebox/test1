<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
$id=$_GET["id"];
$show=$db->getfirst("select * from user where id='$id'");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>会员信息_课程网站</title>
<meta name="keywords" content="课程网站" />
<meta name="description" content="课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {font-size: 14px}
.STYLE3 {color: #FF0000}
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
    <td bgcolor="#FFFFFF"><table width="100%" height="560" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="560" valign="top" align="center"><table width="99%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="29" background="images/inner-img02.gif"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="font">
              <tr>
                <td width="40"><div align="center"><img src="images/inner-img3.gif" width="20" height="20" /></div></td>
                <td align="left">您的当前位置：<a href="index.php">首页</a> &gt;&gt; 会员信息</td>
              </tr>
            </table></td>
          </tr>
        </table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                    <tr>
                      <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                      <td width="130" align="left"><span class="STYLE2">会员信息</span></td>
                      <td style="padding-right:18px;">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="257"><table width="100%" height="257" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="top" class="font" style="padding:8px 8px 8px 8px;" align="center">
					  <table width="92%" border="0" cellspacing="2" cellpadding="0" bgcolor="#fdeacc">
                        <tr>
                          <td colspan="3" align="left"><strong>用户资料</strong></td>
                          </tr>
                        <tr>
                          <td align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>真实姓名：</strong></td>
                          <td align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[truename]?></td>
						  <td width="26%" rowspan="6" align="left" bgcolor="#ffffff" style="padding:0px 8px;">
<?php 
if(empty($show[photo]))
{
?>
<img src="images/man.gif" width="150" height="200" border="0">
<?php
}
else 
{
?>
<img src="upfiles/photo/<?=$show[photo]?>" border="0" width="150" height="200" />
<?php
}?>
                          </td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>出生年月：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[birth]?></td>
                        </tr>
						<tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>联系电话：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[tel]?></td>
						</tr>
						<tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>手机：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[mobile]?></td>
						</tr>
						<tr>
                          <td width="18%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>传真：</strong></td>
                          <td width="56%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[tax]?></td>
						</tr>
						<tr>
                          <td width="18%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>简历：</strong></td>
                          <td width="56%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><a href="upfiles/jianli/<?=$show[jianli]?>">点击下载</a></td>
						</tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>通讯地址及邮编：</strong></td>
                          <td colspan="2" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[address]?>(<?=$show[zip]?>)</td>
                          </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>所在单位：</strong></td>
                          <td colspan="2" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[com]?></td>
                          </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>职务：</strong></td>
                          <td colspan="2" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[postion]?></td>
                          </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>单位简介：</strong></td>
                          <td colspan="2" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[intro]?></td>
                          </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>个人兴趣爱好：</strong></td>
                          <td colspan="2" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[hoby]?></td>
                          </tr>
                      
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>与交通大学相关教育经历：</strong></td>
                          </tr>
						 <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[experience]?></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>个人主要工作经历：</strong></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[job]?></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>对交大会的建议和期望：</strong></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[expect]?></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>希望为交大校友会提供的服务：</strong></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[hope]?></td>
                          </tr>
                      </table>
					  </td>
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
?>
</body>
</html>
