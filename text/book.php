<?php 
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
if($_GET['act']=='')
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //�����ǻ�ȡpage=18�е�page��ֵ�����粻����page����ôҳ������1��
$num=5;  
$total=$db->getcount("select * from book where islock=1");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
//ҳ�����
$pagenum=ceil($total/$num);     //�����ҳ��,Ҳ�����һҳ
$page=min($pagenum,$page);//�����ҳ
$prepg=$page-1;//��һҳ
$nextpg=($page==$pagenum ? 0 : $page+1);//��һҳ
$offset=($page-1)*$num;  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ѧ������_����_�γ���վ</title>
<meta name="keywords" content="ѧ������,����,�γ���վ" />
<meta name="description" content="ѧ������,����,�γ���վ" />
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
if (theForm.yname.value.length == 0)
	{
		alert("�����ǿ���Ц�ɣ������ֶ���������ģ�")
		theForm.yname.focus()
		return false
	}
if (document.form1.yname.value.indexOf("<")!=-1 || document.form1.yname.value.indexOf(">")!=-1)
{
		alert("�����а����Ƿ��ַ� (<,>) ");
		document.form1.yname.focus();
		return false;
	}
if (document.form1.yname.value.indexOf("'")!=-1)
{
		alert("�û����а����Ƿ��ַ� (') ");
		document.form1.yname.focus();
		return false;
	}
if (theForm.title.value.length == 0)
	{
		alert("��������⣡")
		theForm.title.focus()
		return false
	}
if (document.form1.title.value.indexOf("<")!=-1 || document.form1.title.value.indexOf(">")!=-1)
{
		alert("������ı����а����Ƿ��ַ� (<,>) ");
		document.form1.title.focus();
		return false;
	}
	if (document.form1.title.value.indexOf("'")!=-1)
   {
		alert("������ı����а����Ƿ��ַ� (') ");
		document.form1.title.focus();
		return false;
	}
	if(!empty(form1.email.value)) {
	if(!is_email(form1.email.value))
	{ alert("�Ƿ���EMail��ַ��");
		form1.email.focus();
	return false;
	}
}
if (theForm.content.value.length == 0)
	{
		alert("���������ݣ�")
		theForm.content.focus()
		return false
	}
if (document.form1.content.value.indexOf("<")!=-1 || document.form1.content.value.indexOf(">")!=-1)
{
		alert("������������а����Ƿ��ַ� (<,>) ");
		document.form1.content.focus();
		return false;
}
if (document.form1.content.value.indexOf("'")!=-1)
{
		alert("������������а����Ƿ��ַ� (') ");
		document.form1.content.focus();
		return false;
}
return true;
}
//-->
</SCRIPT>
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
			<table width="195" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:8px;">
                <tr>
                  <td height="260" valign="top" background="images/inner_lmdh.gif"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="30" height="38">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                        <td class="font"><a href="inheritance.php?cat=1">������ʦ</a></td>
                      </tr>
                      <tr>
                        <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                        <td class="font"><a href="inheritance.php?cat=2">��ҵ����</a></td>
                      </tr>
                      <tr>
                        <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                        <td class="font"><a href="book.php">ѧ������</a></td>
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
                      <td>���ĵ�ǰλ�ã�<a href="index.php">��ҳ</a> &gt;&gt; <a href="inheritance.php">����</a> &gt;&gt; <a href="book.php">ѧ������</a></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <table width="571" border="0" cellspacing="0" cellpadding="0" style="margin-top:8px;">
              <tr>
                <td width="571" height="285" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                          <tr>
                            <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                            <td width="130"><span class="STYLE2">ѧ������</span></td>
                            <td style="padding-right:18px;">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="257"><table width="100%" height="257" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td valign="top" class="font" style="padding:8px 0px 8px 0px;"><?php  
$result=$db->query("select * from book where islock=1 order by id desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
while($row=$db->getarray($result)){
?>
                              <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#f6b443" style="padding:0 0 0 4px;">
                                <tr bgcolor="#fdeacc">
                                  <td width="51%">���ߣ�
                                    <?=$row[yname]?></td>
                                  <td width="49%">����ʱ�䣺
                                    <?=$row[utime]?>
                                  &nbsp;&nbsp;&nbsp;<img src="images/icon_tel.gif" width="16" height="16" border="0" alt="<?=$row[yname]?>�ĵ绰��<?=$row[tel]?>">&nbsp;&nbsp;&nbsp;<img src="images/icon_email.gif" width="16" height="16" border="0" alt="<?=$row[yname]?>��E-mail��<?=$row[email]?>">&nbsp;&nbsp;&nbsp;<img src="images/icon_ip.gif" width="16" height="16" border="0" alt="<?=$row[yname]?>����<?=$row[ip]?>"></td>
                                </tr>
                                <tr>
                                  <td colspan="2" bgcolor="#FFF8EE">���⣺
<?php
if($row[hidden]==0)
{
?>
                                    <?=$row[title]?>
                                    <br />
                                    <?=$row[content]?>
                                    <?php
}
elseif($row[hidden]==1)
{
 echo "���������������أ�ֻ�й���Ա�ſɼ�.";
}?>
                                    <?php
if(!(empty($row[review])))
{
echo "<br>------------------------------------------------------------------------------------------------------<br>";
echo "վ���ظ���".$row[review];
}
?>
                                  </td>
                                </tr>
                              </table>
                              <?php
}
?>
                            </td>
                          </tr>
						  <tr>
						  <td align="right"><?php 
include 'inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);
?></td>
</tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
			<form name="form1" action="book.php?act=save" method="post" onsubmit="return CheckForm(this);">
                                <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#f6b443" style="padding:4px;">
                                  <tr bgcolor="#fdeacc">
                                    <td colspan="2">�������ԣ�</td>
                                  </tr>
                                  <tr>
                                    <td width="13%" align="right" bgcolor="#FFF8EE"><font  color="#FF0000">*</font>����������</td>
                                    <td width="87%" bgcolor="#FFF8EE"><input type="text" name="yname" maxlength="10"></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#FFF8EE" align="right">�绰���룺</td>
                                    <td bgcolor="#FFF8EE"><input type="text" name="tel" maxlength="15"></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#FFF8EE" align="right">E-mail��</td>
                                    <td bgcolor="#FFF8EE"><input type="text" name="email" maxlength="30"></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#FFF8EE" align="right"><font  color="#FF0000">*</font>���Ա��⣺</td>
                                    <td bgcolor="#FFF8EE"><input type="text" name="title" maxlength="150"></td>
                                  </tr>
                                  <tr>
                                    <td align="right" valign="top" bgcolor="#FFF8EE"><font  color="#FF0000">*</font>�������ݣ�</td>
                                    <td bgcolor="#FFF8EE"><textarea name="content" cols="40" rows="10" id="content"></textarea></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#FFF8EE" align="right">�������ʣ�</td>
                                    <td bgcolor="#FFF8EE"><input name="hidden" type="radio" value="0" checked>
                                      ����
                                      <input type="radio" name="hidden" value="1">
                                      ���Ļ�</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" align="left" bgcolor="#FFF8EE" style="padding-left:80px;"><input type="submit" name="Submit" value="�ύ">
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <input type="reset" name="Submit2" value="ȡ��">
                                    </td>
                                  </tr>
                                </table>
                              </form>
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
}
if($_GET['act']=='save')
{
$yname=SafeHtml($_POST['yname']);
$tel=SafeHtml($_POST['tel']);
$email=SafeHtml($_POST['email']);
$title=SafeHtml($_POST['title']);
$content=nl2br($_POST['content']);
if(empty($yname) || empty($title) || empty($content))
{
   Error("�������������������Ϊ�գ�","book.php");
}
if(!empty($email)) {
   if(!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email))
   {
	 Error("�����ַ����ȷ��","book.php");
   }
}
$hidden=$_POST['hidden'];
$utime=date("Y-m-d G:i:s");
$ip=@getip($realip);
$db->insert("INSERT INTO `book` ( `yname` , `tel` , `email` , `title` , `content` , `hidden` , `utime` , `ip`) VALUES('".$yname."','".$tel."','".$email."','".$title."','".$content."','".$hidden."','".$utime."','".$ip."')");
Error("��ӳɹ���","book.php");
exit();
}
?>
</body>
</html>
