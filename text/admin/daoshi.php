<?php 
session_start();
include('../inc/site.php');
include('./islogin.php');
include('../inc/db_class.php');
include('../inc/function.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="Content-Language" content="zh-CN">
<title><?=$sitename?>_������ʦ����</title>
<meta name="author" content="Alanliu">
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
<script language="JavaScript">
// ���ύ�ͻ��˼��
function doCheck(){
  if (document.form1.title.value==""){
	   alert("<?=$sitename?>��������\n���ⲻ��Ϊ��!");
	   form1.title.focus();
	   return false;
  }
  // getHTML()ΪeWebEditor�Դ��Ľӿں���������Ϊȡ�༭��������
  if (WebEditor1.getHTML()==""){
	  alert("<?=$sitename?>��������\n���ݲ���Ϊ��!");
	  return false;
  }
}
</script>
</head>
<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<?php
if($_GET['act']=="list")
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //�����ǻ�ȡpage=18�е�page��ֵ�����粻����page����ôҳ������1��
$num=8;  //ÿҳ��¼��.
$total=$db->getcount("select * from updaoshi");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
//ҳ�����
$pagenum=ceil($total/$num);     //�����ҳ��,Ҳ�����һҳ
$page=min($pagenum,$page);//�����ҳ
$prepg=$page-1;//��һҳ
$nextpg=($page==$pagenum ? 0 : $page+1);//��һҳ
$offset=($page-1)*$num;
?>
<table width="98%" align="center" border="1" cellspacing="0" cellpadding="4" class="lanyubk" style="border-collapse: collapse">
  <tr class="lanyuss">
    <td height="20">������ʦ�������</td>
  </tr>
  <tr class="lanyuds">
    <td height="23">
<?php  
$result=$db->query("select * from updaoshi order by id desc limit $offset,$num");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
while($row=$db->getarray($result)){
?>
<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#ffffff" style="padding:0 0 0 4px;">
                                <tr bgcolor="#E4EDF9">
                                  <td height="24" colspan="3"><strong>��ʵ������</strong>                                    <?=$row[truename]?></td>
                                  <td width="23%" rowspan="5" bgcolor="#FFF8EE" align="center">
<?php 
if(empty($row[photo]))
{
?>
<img src="../images/man.gif" width="100" height="100" border="0">
<?php
}
else 
{
?>
<img src="../<?=$row[photo]?>" width="100" height="100" border="0">
<?php
}?></td>
                                </tr>
                                <tr>
                                  <td width="10%" bgcolor="#FFF8EE"><strong>�������£�</strong></td>
                                  <td colspan="2" bgcolor="#FFF8EE"><?=$row[birth]?></td>
                                </tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>Ժ&nbsp;&nbsp;&nbsp;&nbsp;ϵ��</strong></td>
                                  <td colspan="2" bgcolor="#FFF8EE"><?=$row[yuanxi]?></td>
                                </tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>ר&nbsp;&nbsp;&nbsp;&nbsp;ҵ��</strong></td>
                                  <td colspan="2" bgcolor="#FFF8EE"><?=$row[zhuanye]?></td>
                                </tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>ѧ&nbsp;&nbsp;&nbsp;&nbsp;����</strong></td>
                                  <td colspan="2" bgcolor="#FFF8EE"><?php
                                  if($row[xueli]=='1')
								    echo "����";
								  elseif($row[xueli]=='2')
								    echo "˶ʿ";
								  elseif($row[xueli]=='3')
								    echo "רҵѧλ��EMBA MBA ����˶ʿ��";
								  elseif($row[xueli]=='4')
								    echo "��ʿ";
									?></td>
                                </tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>�༶���룺</strong></td>
                                  <td width="55%" bgcolor="#FFF8EE"><?=$row[daima]?></td>
                                  <td width="12%" bgcolor="#FFF8EE"><strong>ѧ&nbsp;&nbsp;&nbsp;�ţ�</strong></td>
                                  <td bgcolor="#FFF8EE"><?=$row[xuehao]?></td>
								</tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>��ϵ�绰��</strong></td>
                                  <td bgcolor="#FFF8EE"><?=$row[tel]?></td>
                                  <td bgcolor="#FFF8EE"><strong>E��mail��</strong></td>
                                  <td bgcolor="#FFF8EE"><?=$row[email]?></td>
								</tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>��&nbsp;&nbsp;&nbsp;&nbsp;ʦ��</strong></td>
                                  <td bgcolor="#FFF8EE"><?=$row[userid]?></td>
                                  <td bgcolor="#FFF8EE"><strong>��&nbsp;&nbsp;&nbsp;����</strong></td>
                                  <td bgcolor="#FFF8EE">
                                  <?php
								  if(empty($row[jianli]))
								    echo "��δ�ϴ�����.";
								  else
                                    echo "<a href='..\/".$row[jianli]."'>�������</a>";
								  ?>
									</td>
								</tr>
								<tr>
                                  <td bgcolor="#FFF8EE"><strong>������Ը��</strong></td>
                                  <td colspan="3" bgcolor="#FFF8EE">&nbsp;</td>
                                </tr>
								<tr>
                                  <td colspan="4" bgcolor="#FFF8EE"><?=$row[yiyuan]?></td>
                                </tr>
								 <tr>
                                  <td height="22" colspan="3" align="right" bgcolor="#E4EDF9">��ȡ�룺<?=$row[pass]?></td>
                                  <td bgcolor="#E4EDF9" align="right" height="22"> &nbsp;<a href="daoshi.php?id=<?=$row[id]?>&act=del" onClick="{if(confirm('ȷ��Ҫɾ����\n\nɾ��֮����޷���ԭ!')){return true;}return false;}">ɾ��</a>&nbsp;&nbsp;</td>
							    </tr>
      </table>
<?php
}
?>
<br></td>
  </tr>

  <tr class="lanyuqs">
      <td height="23" align="right"><?php 
include '../inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);
echo '[��'.$pagenum.'ҳ]';
?>	  </td>
    </tr>
</table>
<?php
}
//ɾ������
elseif($_GET['act'] == "del")
{
	if(empty($_GET['id']))
	{
		Error("�Ƿ�����...","daoshi.php?act=list");
		die();
	}
	$rs = $db->query("delete from updaoshi where id='".$_GET['id']."'");
	Error("ɾ���ɹ���","daoshi.php?act=list");
    echo "ɾ���ɹ�";
}
?>


</body>
</html>
