<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
$id=$_GET["id"];
$show=$db->getfirst("select * from user where id='$id'");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��Ա��Ϣ_�γ���վ</title>
<meta name="keywords" content="�γ���վ" />
<meta name="description" content="�γ���վ" />
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
                <td align="left">���ĵ�ǰλ�ã�<a href="index.php">��ҳ</a> &gt;&gt; ��Ա��Ϣ</td>
              </tr>
            </table></td>
          </tr>
        </table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                    <tr>
                      <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                      <td width="130" align="left"><span class="STYLE2">��Ա��Ϣ</span></td>
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
                          <td colspan="3" align="left"><strong>�û�����</strong></td>
                          </tr>
                        <tr>
                          <td align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>��ʵ������</strong></td>
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
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>�������£�</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[birth]?></td>
                        </tr>
						<tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>��ϵ�绰��</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[tel]?></td>
						</tr>
						<tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>�ֻ���</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[mobile]?></td>
						</tr>
						<tr>
                          <td width="18%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>���棺</strong></td>
                          <td width="56%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[tax]?></td>
						</tr>
						<tr>
                          <td width="18%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>������</strong></td>
                          <td width="56%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><a href="upfiles/jianli/<?=$show[jianli]?>">�������</a></td>
						</tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>ͨѶ��ַ���ʱࣺ</strong></td>
                          <td colspan="2" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[address]?>(<?=$show[zip]?>)</td>
                          </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>���ڵ�λ��</strong></td>
                          <td colspan="2" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[com]?></td>
                          </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>ְ��</strong></td>
                          <td colspan="2" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[postion]?></td>
                          </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>��λ��飺</strong></td>
                          <td colspan="2" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[intro]?></td>
                          </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>������Ȥ���ã�</strong></td>
                          <td colspan="2" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[hoby]?></td>
                          </tr>
                      
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>�뽻ͨ��ѧ��ؽ���������</strong></td>
                          </tr>
						 <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[experience]?></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>������Ҫ����������</strong></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[job]?></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>�Խ����Ľ����������</strong></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><?=$show[expect]?></td>
                          </tr>
                        <tr>
                          <td colspan="3" align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>ϣ��Ϊ����У�ѻ��ṩ�ķ���</strong></td>
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
