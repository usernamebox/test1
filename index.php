<?php 
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<title>课程网站管理系统</title>
<meta name="keywords" content="课程网站" />
<meta name="description" content="课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
        <td height="560" valign="top"><div align="center">
          <table width="195" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="195" height="179" valign="top">
<table class="dl" width="195" border="0" cellspacing="0" cellpadding="0" background="images/member.gif"; style="
background-repeat:no-repeat;">
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
  <tr>
    <td><iframe id=user src="cp.php" frameBorder="0" width="100%"  scrolling="no" height="190" no-repeat allowTransparency="true"></iframe>
			  </td>
  </tr>
</table></td>
            </tr>
            <tr>
              <td height="3" valign="top"></td>
            </tr>
            <tr>
            
              <td height="480" valign="top" background="images/left_bg.gif"><table width="185" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="26" align="left" class="menu" style="padding-left:20px;">教学大纲</td>
                </tr>
                <tr class="font">
                  <td align="left" valign="top">
<?php  
if($result=$db->getfirst("select * from inheritance where istop=1 order by id desc"))
{
$topid=$result[id];
if(empty($result[photo]))
{
echo "·<a href=showinheritance.php?id=".$result[id].">".$result[title]."</a><br />";
}
else
{
?>
				  <a href="showinheritance.php?id=<?=$result[id]?>"><img src="images/inner-img1.gif" width="195" height="100" border="0" alt="<?=$result[title]?>" /></a>
<?php
}
}
if(empty($topid))
{
$result=$db->query("select * from inheritance order by id desc limit 0,5");
}
else
{
$result=$db->query("select * from inheritance where id <>$topid order by id desc limit 0,5");
}
while($row=$db->getarray($result)){
?>
                        ·<a href="showinheritance.php?id=<?=$row[id]?>"><?=$row[title]?></a><br />
                        <?php
}
?>
				  </td>
                </tr>
                <tr>
                  <td height="10"></td>
                </tr>
                <tr>
                  <td><?php include('inc/link.php'); ?></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div></td>
        <td width="570" valign="top"><table width="570" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="570" height="112"><div align="right">
			  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="570" height="112">
                <param name="movie" value="images/flash/banner.swf" />
                <param name="quality" value="high" />
                <embed src="images/flash/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="570" height="112"></embed>
			    </object>
            </div></td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><table width="288" height="233" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top" background="images/bg.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="26"><table width="90%" height="26" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="60" class="menu"><div align="center">教师课件</div></td>
                          <td class="font"><div align="right"><a href="active.php">更多&gt;&gt;</a></div></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="207" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="8" class="font">
                        <tr>
                          <td><?php  
if($result=$db->getfirst("select * from active where istop=1 order by id desc"))
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
                                  <td width="94"><img src="images/inner-img6.gif" width="101" height="68" /></td>
                                  <td style="padding-left:8px;"><span style="font-size: 14px;font-weight: bold;"><a href="showactive.php?id=<?=$result[id]?>">
                                    <?=CutString($result['title'],18)?>
                                    </a></span><br />
                                  <a href="showactive.php?id=<?=$result[id]?>" style="font-size: 14px;font-weight: bold;"><font color="#ff9933">[详细查看]</font></a></td>
                                </tr>
                            </table>
<?php
}
}
if(empty($topid))
{
$result=$db->query("select * from active order by id desc limit 0,5");
}
else
{
$result=$db->query("select * from active where id <>$topid order by id desc limit 0,5");
}
while($row=$db->getarray($result)){
?>
                        ·<a href="showactive.php?id=<?=$row[id]?>"><?=CutString($row[title],32)?></a><br />
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
              <td><table width="278" height="233" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td background="images/bg2.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="26"><table width="90%" height="26" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="60" class="menu"><div align="center">课程公告</div></td>
                          <td class="font"><div align="right"><a href="notice.php">更多&gt;&gt;</a></div></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="207" valign="top" ><table width="100%" border="0" cellpadding="0" cellspacing="8" class="font">
                        <tr>
                          <td>
<?php  
$result=$db->query("select nid,title from notice order by nid desc limit 0,8");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
						  ·<a href="shownotice.php?id=<?php echo $row[nid]; ?>"><?=CutString($row[title],32)?></a><br />
<?php
}
?></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td><table width="288" height="233" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top" background="images/bg.gif"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="26"><table width="90%" height="26" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="60" class="menu"><div align="center">课程资源</div></td>
                            <td class="font"><div align="right"><a href="home.php">更多&gt;&gt;</a></div></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="207" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="8" class="font">
                          <tr>
                            <td>
<?php  
$result=$db->getfirst("select * from topic order by id desc");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
$topid=$result[id];
?>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="94"><img src="images/01.gif" width="94" height="58" /></td>
                                  <td style="padding-left:8px;"><span style="font-size: 14px;font-weight: bold;"><a href="view.php?id=<?=$topid?>"><?=CutString($result['title'],18)?></a></span><br />
                                    <a href="view.php?id=<?=$topid?>" style="font-size: 14px;font-weight: bold;"><font color="#ff9933">[详细查看]</font></a></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td>
<?php  
$result=$db->query("select id,title from topic where id <>$topid order by id desc limit 0,5");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
 echo "·<a href=\"view.php?id=".$row[id]."\">".CutString($row[title],32)."</a><br />";
}
?></td>
                          </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
              </table></td>
              <td><table width="278" height="233" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td background="images/bg2.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="26"><table width="90%" height="26" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="60" class="menu"><div align="center">成果展示 </div></td>
                            <td class="font"><div align="right"><a href="flavor.php">更多&gt;&gt;</a></div></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="207" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="8" class="font">
                          <tr>
                            <td>
<?php  
if($result=$db->getfirst("select * from flavor where istop=1 order by id desc"))
{
$topid=$result[id];
if(empty($result[photo]))
{
echo "·<a href=showflavor.php?id=".$result[id].">".$result[title]."</a><br />";
}
else
{
?>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="94"><img src="images/img01.gif" width="121" height="77" /></td>
                                  <td style="padding-left:8px;"><span style="font-size: 14px;font-weight: bold;"><a href="showflavor.php?id=<?php echo $result[id]; ?>"><?=CutString($result['title'],18)?></a></span><br />
                                    <a href="showflavor.php?id=<?php echo $result[id]; ?>" style="font-size: 14px;font-weight: bold;"><font color="#ff9933">[详细查看]</font></a></td>
                                </tr>
                            </table>
<?php
}
}

if(empty($topid))
{
$result=$db->query("select * from flavor order by id desc limit 0,5");
}
else
{
$result=$db->query("select * from flavor where id <>$topid order by id desc limit 0,5");
}
while($row=$db->getarray($result)){
?>
                        ·<a href="showflavor.php?id=<?=$row[id]?>"><?=CutString($row[title],32)?></a><br />
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
<meta name="renderer" content="webkit">
<meta name="renderer" content="ie-comp">
<meta name="renderer" content="ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=8">
