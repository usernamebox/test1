<?php 
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>课程网站</title>
<meta name="keywords" content="活动,课程网站" />
<meta name="description" content="活动,课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {font-size: 14px}
.STYLE4 {font-size: 14px; font-weight: bold; }
.STYLE6 {	font-size: 14px;
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
                      <td class="font"><a href="active.php?cat=1">讲坛</a></td>
                    </tr>
                    <tr>
                      <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                      <td class="font"><a href="active.php?cat=2">对话</a></td>
                    </tr>
                    <tr>
                      <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                      <td class="font"><a href="active.php?cat=3">沙龙</a></td>
                    </tr>
                    <tr>
                      <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
                      <td class="font"><a href="active.php?cat=4">年会</a></td>
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
                      <td>您的当前位置：<a href="index.php">首页</a> &gt;&gt; <a href="active.php">教师课件</a>
                        <?php
				if(!empty($_GET['cat'])) 
				{
				  if($_GET['cat']==1)
				  {
				    echo " &gt;&gt; 讲坛";
				   }
				  elseif($_GET['cat']==2)
				  {
				    echo " &gt;&gt; 对话";
				   }
				  elseif($_GET['cat']==3)
				  {
				    echo " &gt;&gt; 沙龙";
				   }
				  elseif($_GET['cat']==4)
				  {
				    echo " &gt;&gt; 年会";
				   }
				}
				?></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <?php 
if($_GET['cat']=="")
{
?>
            <table width="571" height="199" border="0" cellpadding="0" cellspacing="0" style="margin-top:8px;">
              <tr>
                <td valign="top" background="images/inner_bg1.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="130"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                          <tr>
                            <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                            <td class="STYLE2">教师课件</td>
                          </tr>
                        </table></td>
                      <td height="25" style="padding-right:18px;"><div align="right"><a href="active.php?cat=1"><img src="images/inner_more.gif" width="61" height="17" border="0" /></a></div></td>
                    </tr>
                    <tr class="font">
                      <td><table width="111" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="111" height="78" background="images/inner-img5.gif"><table width="111" height="78" border="0" cellpadding="0" cellspacing="5">
                                <tr>
                                  <?php  
$result=$db->getfirst("select * from active where istop=1 and cat=1 order by id desc");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
$topid=$result[id];
?>
                                  <td><p><a href="showactive.php?id=<?=$result['id']?>">
                                      <?php
if(empty($result[photo]))
{
?>
                                      <img src="images/inner-img6.gif" width="101" height="68" border="0" alt="<?=$result[title]?>" />
                                      <?php
}
else
{
?>
                                      <img src="<?=$result['photo']?>" width="101" height="68" border="0" alt="<?=$result[title]?>" />
                                      <?php
}
?>
                                      </a></p></td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr>
                            <td height="70"><table width="100%" height="60" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="25" valign="top"><img src="images/inner-img7.gif" width="20" height="16" /></td>
                                  <td valign="top"><a href="active.php?cat=1">点击查看更多</a></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                      <td height="174" valign="top" style="padding-left:8px; padding-right:15px;"><?php
if(empty($topid))
{
$result=$db->query("select id,title from active where cat=1 order by id desc limit 0,7");
}
else
{
$result=$db->query("select id,title from active where id <>$topid and cat=1 order by id desc limit 0,7");
}
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
                        ·<a href="showactive.php?id=<?=$row[id]?>">
                        <?=CutString($row[title],56)?>
                        </a><br />
                        <?php
}
?></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <table width="571" border="0" cellspacing="0" cellpadding="0" style="margin-top:8px;">
              <tr>
                <td width="571" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/inner_bg2.gif">
                    <tr>
                      <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                          <tr>
                            <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                            <td width="130"><span class="STYLE2">对话</span></td>
                            <td style="padding-right:18px;"><div align="right"><a href="active.php?cat=2"><img src="images/inner_more.gif" width="61" height="17" border="0" /></a></div></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td class="font" style="padding:8px 8px 8px 8px;" valign="top"><?php  
if($result=$db->getfirst("select * from active where istop=1 and cat=2 order by id desc"))
{
$topid=$result[id];
if(empty($result[photo]))
{
echo "·<a href=showactive.php?id=".$result[id].">".$result[title]."</a><br />";
}
else
{
?>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="125" align="center"><img src="<?=$result['photo']?>" width="105" height="73" /></td>
                                  <td class="font" style="padding-right:18px;"><span class="STYLE4">最新新闻：</span><a href="showactive.php?id=<?=$result[id]?>">
                                    <?=$result['title']?>
                                    </a>[
                                    <?=$result[ntime]?>
                                    ]<br />
                                    <a href="showactive.php?id=<?=$result[id]?>"><span class="STYLE6">[详细查看]</span></a></td>
                                </tr>
                              </table>
                              <?php
}
}

if(empty($topid))
{
$result=$db->query("select id,title from active where cat=2 order by id desc limit 0,7");
}
else
{
$result=$db->query("select id,title from active where id <>$topid and cat=2 order by id desc limit 0,7");
}
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
                              ·<a href="showactive.php?id=<?=$row[id]?>">
                              <?=CutString($row[title],80)?>
                              </a><br />
                              <?php
}
?>
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
                  <br />
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/inner_bg2.gif">
                    <tr>
                      <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                          <tr>
                            <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                            <td width="130"><span class="STYLE2">沙龙</span></td>
                            <td style="padding-right:18px;"><div align="right"><a href="active.php?cat=3"><img src="images/inner_more.gif" width="61" height="17" border="0" /></a></div></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td valign="top" class="font" style="padding:8px 8px 8px 8px;"><?php  
$result=$db->query("select id,title from active where cat=3 order by id desc limit 0,5");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
                              ·<a href="showactive.php?id=<?=$row[id]?>">
                              <?=CutString($row[title],80)?>
                              </a><br />
                              <?php
}
?></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/inner_bg2.gif">
                    <tr>
                      <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                          <tr>
                            <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                            <td width="130"><span class="STYLE2">年会</span></td>
                            <td style="padding-right:18px;"><div align="right"><a href="active.php?cat=4"><img src="images/inner_more.gif" width="61" height="17" border="0" /></a></div></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td valign="top" class="font" style="padding:8px 8px 8px 8px;"><?php  
$result=$db->query("select id,title from active where cat=4 order by id desc limit 0,5");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
                              ·<a href="showactive.php?id=<?=$row[id]?>">
                              <?=CutString($row[title],80)?>
                              </a><br />
                              <?php
}
?></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <?php
}
else
{
$cat=$_GET['cat'];
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=12;  
$total=$db->getcount("select * from active where cat='".$cat."'");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
if($result=$db->getfirst("select * from active where cat=$cat and istop=1 order by id desc"))
{
$total=$total-1;
}
//页码计算
$pagenum=ceil($total/$num);     //获得总页数,也是最后一页
$page=min($pagenum,$page);//获得首页
$prepg=$page-1;//上一页
$nextpg=($page==$pagenum ? 0 : $page+1);//下一页
$offset=($page-1)*$num;
?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                    <tr>
                      <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                      <td width="130"><span class="STYLE2">
                        <?php if($_GET['cat']==1)
				  {
				    echo "讲坛";
				   }
				  elseif($_GET['cat']==2)
				  {
				    echo "对话";
				   }
				  elseif($_GET['cat']==3)
				  {
				    echo "沙龙";
				   }
				  elseif($_GET['cat']==4)
				  {
				    echo "年会";
				   }
				   ?>
                        </span></td>
                      <td style="padding-right:18px;">&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td valign="top" class="font" style="padding:8px 8px 8px 8px;"><?php  
if($result=$db->getfirst("select * from active where cat=$cat and istop=1 order by id desc"))
{
$topid=$result[id];
if(empty($result[photo]))
{
echo "·<a href=showactive.php?id=".$result[id].">".$result[title]."</a><br />";
}
else
{
?>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="125" ><div align="center"><img src="<?=$result['photo']?>" width="105" height="73" /></div></td>
                      <td class="font" style="padding-right:18px;"><span class="STYLE4">最新新闻：</span><a href="showactive.php?id=<?=$result[id]?>">
                        <?=$result['title']?>
                        </a>[
                        <?=$result['ntime']?>
                        ]<br />
                        <a href="showactive.php?id=<?php echo $result[id]; ?>"><span class="STYLE6">[详细查看]</span></a></td>
                    </tr>
                  </table>
<?php
}
}

if(empty($topid))
{
$result=$db->query("select * from active where cat=$cat order by id desc limit $offset,$num");
}
else
{
$result=$db->query("select * from active where cat=$cat and id <>$topid order by id desc limit $offset,$num");
}
while($row=$db->getarray($result)){
?>
                        ·<a href="showactive.php?id=<?php echo $row[id]; ?>"><?php echo $row[title]; ?></a><br />
                        <?php
}
?>
				  </td>
              </tr>
            </table>
            <table width="571" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="25" align="center" class="fy">
<?php
include 'inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);

?></td>
              </tr>
            </table>
            <?php
}
?></td>
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
