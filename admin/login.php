<?php 
session_start();
?>
<?php include('../inc/site.php');?>
<html>
<head>
<title><?php echo $sitename; ?>管理登陆</title>
<meta http-equiv="content-type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<link href="images/Admin_Css.css" rel="stylesheet" type="text/css">
<script language=javascript>
  function checkform()
  {
      if (document.form1.user.value==""){
	      alert("<?php echo $sitename; ?>\n请输入用户名？")
		  document.form1.user.focus();
		  return false
		    }
	  if (document.form1.pass.value==""){
	      alert("<?php echo $sitename; ?>\n请输入密码？");
		  document.form1.pass.focus();
		  return false
		  } 
          if (document.form1.number.value==""){
	      alert("<?php echo $sitename; ?>\n请输入验证码？");
		  document.form1.number.focus();
		  return false
		  }
		  return true
  }
</script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="document.form1.user.focus();">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="ffffff">
  <tr>
    <td><form name="form1" method="post" action="login_chk.php" onSubmit="return checkform()">
      <table width="582" height="285" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="157" colspan="2" background="images/login2_1.gif">　</td>
        </tr>
        <tr>
          <td width="449" height="91" background="images/login2_2.gif"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="60" rowspan="2">&nbsp;&nbsp;&nbsp;</td>
                <td width="120" align="left" valign="middle"><img src="images/user.gif" width="31" height="24" align="absmiddle">用户名:</td>
                <td width="120" align="left"><img src="images/password.gif" width="31" height="24" align="absmiddle">密 码:</td>
                <td width="120" align="left"><img src="images/yzm.gif" width="31" height="24" align="absmiddle">验证码:</td>
                <td rowspan="2">　</td>
              </tr>
              <tr>
                <td height="26"><table width="85%"  border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="26" background="images/user2.gif"><input name="user" type="text" id="user" maxlength="20" style="width:110px; BORDER-RIGHT: #F7F7F7 0px solid; BORDER-TOP: #F7F7F7 0px solid; FONT-SIZE: 9pt; BORDER-LEFT: #F7F7F7 0px solid; BORDER-BOTTOM: #c0c0c0 1px solid; HEIGHT: 16px; BACKGROUND-COLOR: #F7F7F7" onMouseOver="this.style.background='#ffffff';" onMouseOut="this.style.background='#F7F7F7'" onFocus="this.select();"></td>
                    </tr>
                </table></td>
                <td><table width="85%"  border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="26" background="images/user2.gif"><input name="pass"  type="password" id="pass" style="width:110px; BORDER-RIGHT: #F7F7F7 0px solid; BORDER-TOP: #F7F7F7 0px solid; FONT-SIZE: 9pt; BORDER-LEFT: #F7F7F7 0px solid; BORDER-BOTTOM: #c0c0c0 1px solid; HEIGHT: 16px; BACKGROUND-COLOR: #F7F7F7;"  onFocus="this.select();" onMouseOver="this.style.background='#ffffff';" onMouseOut="this.style.background='#F7F7F7'" maxLength="20"></td>
                    </tr>
                </table></td>
                <td><table width="85%"  border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="26" background="images/user2.gif"><input name='number' size='6' maxlength='6' style='width:50px; BORDER-RIGHT: #F7F7F7 0px solid; BORDER-TOP: #F7F7F7 0px solid; FONT-SIZE: 9pt; BORDER-LEFT: #F7F7F7 0px solid; BORDER-BOTTOM: #c0c0c0 1px solid; HEIGHT: 16px; BACKGROUND-COLOR: #F7F7F7' onMouseOver="this.style.background='#ffffff';" onMouseOut="this.style.background='#F7F7F7'" onFocus='this.select();'>&nbsp;<b><img src="../inc/checknumber.php?act=init"></b>
		      </td>
                    </tr>
                </table></td>
              </tr>
          </table></td>
          <td width="133"><input type='image' name='Submit' src="images/login2_3.gif"></td>
        </tr>
        <tr>
          <td height="37" colspan="2" background="images/login2_4.gif"><table width="90%"  border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><div align="center"><b>版权所有:<a href="<?php echo $siteurl; ?>" target="_blank"><?php echo $sitename; ?></a>&nbsp;&nbsp;&nbsp;技术支持：<a href="http://www.coov.cn" target="_blank">中国酷网</a></b></div></td>
              </tr>
          </table></td>
        </tr>
      </table>
    </form>
	</td>
  </tr>
</table>
<script language="javascript" type="text/JavaScript">
<!--
function CheckBrowser()
{
  var app=navigator.appName;
  var verStr=navigator.appVersion;
  if (app.indexOf('Netscape') != -1) {
    alert("友情提示:\n   你使用的是Netscape浏览器，可能会导致无法使用后台的部分功能。建议您使用 IE6.0 或以上版本。");
  }
  else if (app.indexOf('Microsoft') != -1) {
    if (verStr.indexOf("MSIE 3.0")!=-1 || verStr.indexOf("MSIE 4.0") != -1 || verStr.indexOf("MSIE 5.0") != -1 || verStr.indexOf("MSIE 5.1") != -1)
      alert("友情提示:\n   您的浏览器版本太低，可能会导致无法使用后台的部分功能。建议您使用 IE6.0 或以上版本。");
  }
}
CheckBrowser();
//-->
</script>
</body>
</html>