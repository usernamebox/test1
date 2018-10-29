<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>人生导师申请_课程网站</title>
<meta name="keywords" content="人生导师,传承,课程网站" />
<meta name="description" content="人生导师,传承,课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.button {	BORDER-RIGHT: #666666 2px solid; BORDER-TOP: #666666 1px solid; FONT-SIZE: 12px; BACKGROUND: #ffffff; BORDER-LEFT: #666666 1px solid; COLOR: #333333; BORDER-BOTTOM: #666666 2px solid; HEIGHT: 18px
}
.con {	FONT-SIZE: 12px; BACKGROUND: #ffffff; COLOR: #666666
}
.input {	BORDER-RIGHT: #666666 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #666666 1px solid; PADDING-LEFT: 2px; FONT-SIZE: 12px; BACKGROUND: #f5f5f5; PADDING-BOTTOM: 2px; BORDER-LEFT: #666666 1px solid; COLOR: #666666; PADDING-TOP: 2px; BORDER-BOTTOM: #666666 1px solid
}
.table {	BACKGROUND: #eeeeee
}
.title {	FONT-SIZE: 12px; BACKGROUND: #f0f0f0; COLOR: #666666
}
.con1 {FONT-SIZE: 12px; BACKGROUND: #ffffff; COLOR: #666666
}
-->
</style>
<script language="JavaScript">
// 表单提交客户端检测
function doCheck(){
  if (document.form1.truename.value==""){
	   alert("<?=$sitename?>提醒您：\n真实姓名不能为空!");
	   form1.truename.focus();
	   return false;
  }
  if (document.form1.birth.value==""){
	   alert("<?=$sitename?>提醒您：\n出生年月不能为空!");
	   form1.birth.focus();
	   return false;
  }
  if (document.form1.yuanxi.value==""){
	   alert("<?=$sitename?>提醒您：\n院系不能为空!");
	   form1.yuanxi.focus();
	   return false;
  }
  if (document.form1.zhuanye.value==""){
	   alert("<?=$sitename?>提醒您：\n专业不能为空!");
	   form1.zhuanye.focus();
	   return false;
  }
  if (document.form1.xueli.value==""){
	   alert("<?=$sitename?>提醒您：\n学历不能为空!");
	   form1.xueli.focus();
	   return false;
  }
  if (document.form1.daima.value==""){
	   alert("<?=$sitename?>提醒您：\n班级代码不能为空!");
	   form1.daima.focus();
	   return false;
  }
  if (document.form1.xuehao.value==""){
	   alert("<?=$sitename?>提醒您：\n学号不能为空!");
	   form1.xuehao.focus();
	   return false;
  }
  if (document.form1.tel.value==""){
	   alert("<?=$sitename?>提醒您：\n联系电话不能为空!");
	   form1.tel.focus();
	   return false;
  }
  if (document.form1.email.value==""){
	   alert("<?=$sitename?>提醒您：\nE-mail不能为空!");
	   form1.email.focus();
	   return false;
  }
  if (document.form1.yiyuan.value==""){
	   alert("<?=$sitename?>提醒您：\n申请意愿不能为空!");
	   form1.yiyuan.focus();
	   return false;
  }
  if (document.form1.userid.value==""){
	   alert("<?=$sitename?>提醒您：\n导师不能为空!");
	   form1.userid.focus();
	   return false;
  }

}
</script>
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
                      <td>您的当前位置：<a href="index.php">首页</a> &gt;&gt; <a href="inheritance.php">传承</a> &gt;&gt;编辑人生导师申请</td>
                    </tr>
                  </table></td>
              </tr>
            </table>
<?php
if($_GET['act']== "")
{
?>
<form action="modupfile.php?act=step2" method="post" name="form1" onSubmit="return doCheck();">
            <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
                <tr>
                  <td height="25" align="middle" class="title"><strong>编辑人生导师申请</strong></td>
                </tr>
				<tr>
                  <td class="title" align="right" width="23%">请输入您的提取码：&nbsp;</td>
                  <td width="77%" colspan="2" class="con"><input name="pass" size="30" maxlength="30" type="text" class="input" />
                  </td>
                </tr>
                <tr>
                  <td class="title" align="right" colspan="3"><div align="center">
                      <input class="button" type="submit" value="下一步" name="Submit" />&nbsp;&nbsp;&nbsp;<input name='Cancel' class="button" type='button' style="cursor:hand;" onclick='window.location.href="./"' value=" 取消 " />
                    </div></td>
                </tr>
			</table>
</form>
<?php
}
if($_GET['act']== "step2")
{
$pass=SafeHtml($_POST['pass']); 
if(empty($pass))
{
  Error("对不起，你没有输入的提取码！","modupfile.php");
  exit;
}
$check_pass = $db->query("SELECT * FROM updaoshi where pass='".$pass."'");
	$row=$db->getarray($check_pass);
	if(!($row))
	{
		Error("对不起，你输入的提取码不存在或已经被删除！","modupfile.php");
		exit();
	}

?>
			<form action="modupfile.php?act=save" method="post" name="form1" onSubmit="return doCheck();">
			<input type="hidden" name="id" value="<?=$row['id']?>" />
            <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
              <tbody>
                <tr>
                  <td class="title" align="middle" height="25">&nbsp;</td>
                  <td width="60%" height="25" align="middle" class="title"><strong>人生导师申请</strong></td>
                  <td width="20%" align="right" class="title">&nbsp;</td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">真实姓名：&nbsp;</td>
                  <td colspan="2" class="con"><input type="text" name="truename" size="20" maxlength="20" class="input"  value="<?=$row['truename']?>" />
                    <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">出生年月：&nbsp;</td>
                  <td colspan="2" class="con"><input type="text" name="birth" size="20" maxlength="15" class="input" value="<?=$row['birth']?>" /> <font color="#ff0000">* </font>如：1900年01月01日</td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">院系：&nbsp;</td>
                  <td colspan="2" class="con"><input name="yuanxi" size="30" maxlength="30" type="text" class="input" value="<?=$row['yuanxi']?>" />
                    <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">专业：&nbsp;</td>
                  <td colspan="2" class="con"><input name="zhuanye" size="30" maxlength="30" type="text" class="input" value="<?=$row['zhuanye']?>" />
                    <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">学历：&nbsp;</td>
                  <td colspan="2" class="con"><select class="input" name="xueli">
                      <option value="1" <?=(($row['xueli']==1)?"selected":"")?>>本科</option>
                      <option value="2" <?=(($row['xueli']==2)?"selected":"")?>>硕士</option>
                      <option value="3" <?=(($row['xueli']==3)?"selected":"")?>>专业学位（EMBA MBA 工程硕士）</option>
                      <option value="4" <?=(($row['xueli']==4)?"selected":"")?>>博士</option>
                    </select>
                   <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%"><p>班级代码：&nbsp;</p></td>
                  <td colspan="2" class="con"><input name="daima" size="30" maxlength="30" type="text" class="input" value="<?=$row['daima']?>" />
                   <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%"><p>学号：&nbsp;</p></td>
                  <td colspan="2" class="con"><input name="xuehao" size="30" maxlength="30" type="text" class="input" value="<?=$row['xuehao']?>" />
                   <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%"><p>联系电话：&nbsp;</p></td>
                  <td colspan="2" class="con"><input type="text" name="tel" size="20" maxlength="20" class="input" value="<?=$row['tel']?>" /> <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%"><p>E－mail：&nbsp;</p></td>
                  <td colspan="2" class="con"><input type="text" name="email" size="20" maxlength="30" class="input" value="<?=$row['email']?>" /> <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%"><p>申请意愿：&nbsp;</p></td>
                  <td colspan="2" class="con"><textarea class="input" name="yiyuan" rows="5" cols="50" onpropertychange="if(value.length>150)value=value.substr(0,150)"><?=$row['yiyuan']?></textarea>
                   <font color="#ff0000">* </font></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">导师名单：&nbsp;</td>
                  <td colspan="2" class="con"><input type="text" name="userid" size="20" maxlength="30" class="input" value="<?=$row['userid']?>" />
                   (多个以，隔开)<font color="#ff0000">* </font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="javascript:window.open('daoshi.php','gouwu','width=450,height=350,toolbar=no, status=no, menubar=no, resizable=yes, scrollbars=yes');">查看导师信息</a></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">照片：&nbsp;</td>
                  <td colspan="2" class="con"><input name="photo" size="30" maxlength="200" type="text" class="input" value="<?=$row['photo']?>" />
                    <br />
                    <iframe frameborder="0" width="290" height="26" scrolling="No" src="upload_pic.htm"></iframe></td>
                </tr>
                <tr>
                  <td class="title" align="right" width="20%">简历：&nbsp;</td>
                  <td colspan="2" class="con"><input name="jianli" size="30" maxlength="200" type="text" class="input" value="<?=$row['jianli']?>" />
                    <br />
                    <iframe frameborder="0" width="290" height="26" scrolling="No" src="upload_soft.htm"></iframe></td>
                </tr>
                <tr>
                  <td class="title" align="right" colspan="3"><div align="center">
                      <input class="button" type="submit" value=" 提 交 " name="Submit" />
                    </div></td>
                </tr>
              </tbody>
            </table>
			</form>
<?php
}
elseif($_GET['act']== "save")
{
	if(empty($_POST['id']))
	{
		Error("非法操作...","sunshine.php?act=edit");
		die();
	}
	$truename = SafeHtml($_POST['truename']);
	$birth = SafeHtml($_POST['birth']);
	$yuanxi = SafeHtml($_POST['yuanxi']);
	$zhuanye = SafeHtml($_POST['zhuanye']);
	$xueli = SafeHtml($_POST['xueli']);
	$daima = SafeHtml($_POST['daima']);
	$xuehao = SafeHtml($_POST['xuehao']);
	$tel = SafeHtml($_POST['tel']);
	$yiyuan = nl2br($_POST['yiyuan']);
	$userid = SafeHtml($_POST['userid']);
	if(empty($truename) || empty($birth) || empty($yuanxi) || empty($zhuanye) || empty($xueli) || empty($daima) || empty($xuehao) || empty($tel) || empty($yiyuan) || empty($userid))
	{
		Error("资料不完整！","upfile.php");
	}
	$email = SafeHtml($_POST['email']);
	if(!empty($email)) {
	if(!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email))
	{
		Error("邮箱地址不正确！","upfile.php");
	}
	}
    $photo = SafeHtml($_POST['photo']);
    $jianli = SafeHtml($_POST['jianli']);
	$db->update("update updaoshi set truename='".$truename."',birth='".$birth."',yuanxi='".$yuanxi."',`zhuanye`='".$zhuanye."',xueli='".$xueli."',daima='".$daima."',xuehao='".$xuehao."',tel='".$tel."',email='".$email."',yiyuan='".$yiyuan."',userid='".$userid."',photo='".$photo."',jianli='".$jianli."' where id='".$_POST['id']."'");  
	Error("编辑成功！","inheritance.php?cat=1");
    exit;
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
