<?php 
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');

$page=isset($_GET['page'])?intval($_GET['page']):1;        //�����ǻ�ȡpage=18�е�page��ֵ�����粻����page����ôҳ������1��
$num=12;  
$total=$db->getcount("select * from flavor");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
if($result=$db->getfirst("select * from flavor where istop=1 order by id desc"))
{
$total=$total-1;
}
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
<title>�γ���վ</title>
<meta name="keywords" content="���,�γ���վ" />
<meta name="description" content="���,�γ���վ" />
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
                      <td>���ĵ�ǰλ�ã�<a href="index.php">��ҳ</a> &gt;&gt; <a href="flavor.php">�ɹ�չʾ</a></td>
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
                            <td width="130"><span class="STYLE2">�ɹ�չʾ</span></td>
                            <td style="padding-right:18px;">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
					<tr>
					  <td class="font" style="padding:8px 8px 8px 8px;"><?php  
if($result=$db->getfirst("select * from flavor where istop=1 order by id desc"))
{
$topid=$result[id];
if(empty($result[photo]))
{
?>
��<a href="showflavor.php?id=<?=$result[id]?>"><?=$result[title]?></a><br />
<?php
}
else{
?>
					    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="125" ><div align="center"><img src="<?=$result['photo']?>" width="105" height="73" /></div></td>
                          <td class="font" style="padding-right:18px;"><span class="STYLE4">�������ţ�</span><a href="showflavor.php?id=<?php echo $result[id]; ?>"><?=$result['title']?></a>[<?=$result['ntime']?>]<br />
                            <a href="showflavor.php?id=<?php echo $result[id]; ?>"><span class="STYLE6">[��ϸ�鿴]</span></a></td>
                        </tr>
                      </table>
<?php
}
}
if(empty($topid)) 
{
$result=$db->query("select * from flavor order by id desc limit $offset,$num");
}
else
{
$result=$db->query("select * from flavor where id <>$topid order by id desc limit $offset,$num");
}
while($row=$db->getarray($result)){
?>
��<a href="showflavor.php?id=<?=$row[id]?>"><?=$row[title]?></a><br />
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
