<?php 
session_start();
?>
<?php include('../inc/site.php');?>
<?php include('islogin.php'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title><?php echo $sitename; ?>_�����̨</title>
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
td  { font:normal 12px ����;}
img  { vertical-align:bottom; border:0px; }
a  { font:normal 12px ����; color:#000000; text-decoration:none; }
a:hover  { color:#428EFF;text-decoration:underline; }
.sec_menu  { border-left:1px solid white; border-right:1px solid white; border-bottom:1px solid white; overflow:hidden; background:#D6DFF7; }
.menu_title  { }
.menu_title span  { position:relative; top:0px; left:8px; color:#000000; font-weight:bold; }
.menu_title2  { }
.menu_title2 span  { position:relative; top:0px; left:8px; color:#999999; font-weight:bold; }
</style>
</head>

<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
  <tr class="lanyuss">
    <td height="20"  colspan="2">������������Ϣ</td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="17%" align="center">PHP�汾��</td>
    <td width="83%" height="23"><?=PHP_VERSION?></td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="17%" align="center">����ϵͳ��</td>
    <td height="23"><?=php_uname?></td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="17%" align="center">�Զ�����ȫ�ֱ�����</td>
    <td height="23">
<?=(get_cfg_var("register_globals")=="1" ? "<span style='font-weight:bold;color:green'>ON</span>" : "<span style='font-weight:bold;color:red'>OFF</span>")?></td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="17%" align="center">�Ƿ������ϴ��ļ���</td>
    <td height="23"><?=(get_cfg_var("file_uploads") ? "<span style='font-weight:bold;color:green'>������� ".get_cfg_var("upload_max_filesize")."</span>" : "<span style='font-weight:bold;color:red'>�������ϴ�����</span>")?></td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="17%" align="center">�ű���ʱ��</td>
    <td height="23"><?=get_cfg_var("max_execution_time")." ��"?></td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="17%" align="center">�ű���ʱ��</td>
    <td height="23"><?=get_cfg_var("max_execution_time")." ��"?></td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="17%" align="center">������ʱ�䣺</td>
    <td height="23"><?=date("Y��m��d�� Hʱi��s��")?></td>
  </tr>
  <tr class="lanyuds">
    <td height="23"  width="17%" align="center">����Ա/Ȩ�ޣ�</td>
    <td height="23"><?=$_SESSION['username']?>/<?=$_SESSION["super"]?></td>
  </tr>
</table>
</body>
</html>