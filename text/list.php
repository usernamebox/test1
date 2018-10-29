<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
$teachedit=$db->getfirst("select * from board where id='".$_GET["id"]."'");
$setting1=$teachedit[setting1];
if($setting1==1 and empty($_SESSION["username"]))
{
	Error("该部分只有本站会员才可浏览！","index.php");
	exit;
}
$bid=$teachedit[id];
$catname=$teachedit[catname];
$setting2=$teachedit[setting2];
$boardmaster=$teachedit[boardmaster];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>家园_课程网站</title>
<meta name="keywords" content="家园,课程网站" />
<meta name="description" content="家园,课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.cbg {
	PADDING-RIGHT: 3px;
	PADDING-LEFT: 3px;
	BACKGROUND: url(images/bgtt.gif);
	PADDING-BOTTOM: 3px;
	COLOR: #000000;
	PADDING-TOP: 3px
}
.cfont {
	COLOR: #ffffff
}
.f_one {
	BACKGROUND: #f7f7f7
}
.f_two {
	BACKGROUND: #efefef
}
.fnamecolor {
	COLOR: #003366
}
.head {
	PADDING-RIGHT: 3px;
	PADDING-LEFT: 3px;
	BACKGROUND: url(images/bg_menu.gif);
	PADDING-BOTTOM: 3px;
	COLOR: #ffffff;
	PADDING-TOP: 3px
}
.smalltxt {
	FONT-SIZE: 11px;
	FONT-FAMILY: Tahoma, Verdana
}
INPUT {
	BORDER-RIGHT: #ffffff 1px solid;
	BORDER-TOP: #707070 1px solid;
	FONT-WEIGHT: normal;
	FONT-SIZE: 12px;
	BACKGROUND: #f0f0f0;
	BORDER-LEFT: #707070 1px solid;
	COLOR: #000000;
	BORDER-BOTTOM: #ffffff 1px solid;
	FONT-FAMILY: Tahoma, Verdana
}
-->
</style>
</head>
<body>
<?php
include('header.php');
?>
<table cellspacing="1" cellpadding="5" width="776" align="center" bgcolor="#ffffff" style="margin-top:2px;">
  <tbody>
    <tr>
      <td colspan="5" align="left" background="images/bg_menu.gif" class="head">您的当前位置：<a href="index.php" class="blink">首页</a> &gt;&gt; <a href="home.php" class="blink">家园</a>&gt;&gt; <a href="list.php?id=<?=$bid?>" class="blink">
        <?=$catname?>
        </a></td>
    </tr>
    <tr align="middle" height="23">
      <td height="20" colspan="5" bgcolor="#EFEFEF"><table width="768" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="596"><div align="left"><strong>
                <?=$catname?>
                </strong> [版主：
                <?=$boardmaster?>
                ]</div></td>
            <td width="172">
<?php
if($bid=='3')
{
echo "";
}
else
{
?>
            <a href="post.php?bid=<?=$bid?>"><img src="images/post.gif" width="104" height="19" border="0" /></a>
<?php
}
?>            </td>
          </tr>
        </table></td>
    </tr>
    <tr class="cbg" align="middle" height="23">
      <td width="6%"></td>
      <td width="49%" >标题</td>
      <td width="16%">作者</td>
      <td width="13%">回复/查看</td>
      <td width="16%">最后发表</td>
    </tr>
<?php 
if($bid=='3')
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=12;
$total=$db->getcount("select * from topic where iselite='1'");
//页码计算
$pagenum=ceil($total/$num);     //获得总页数,也是最后一页
$page=min($pagenum,$page);//获得首页
$prepg=$page-1;//上一页
$nextpg=($page==$pagenum ? 0 : $page+1);//下一页
$offset=($page-1)*$num; 
if(($_SESSION['super']==3) || ($boardmaster==$_SESSION['username']))
{
$result=$db->query("select * from topic where iselite='1' order by istop desc,id desc limit $offset,$num");
}
else
{
$result=$db->query("select * from topic where iselite='1' and islock=0 order by istop desc,id desc limit $offset,$num");
}
while($row=$db->getarray($result)){
?>
    <tr>
      <td class="f_two" valign="center" align="middle"><img src="images/new.gif" width="33" height="25" /></td>
      <td class="f_one" onmouseover="this.className='f_two'" onmouseout="this.className='f_one'" align="left">&nbsp; <a class="fnamecolor" href="view.php?id=<?=$row[id]?>">
        <?=$row[title]?>
        </a>&nbsp;
        <?=(($row[islock]==1)?"[未审核]":"")?><?=(($row[iselite]==1)?"[精华]":"")?></td>
      <td align="left" class="f_one"><?=$row[username]?></td>
      <td class="f_two" align="middle"><?=$row[reviewcount]?>
        /
        <?=$row[hits]?></td>
      <td bgcolor="#f7f7f7" class="smalltxt"><?=$row[reviewtime]." by  ".$row[revieuser]?></td>
    </tr>
    <?php
}
?>
</table>
<table width="776" align="center" cellpadding="0" cellspacing="0" class="font" style="background-color:#FFFFFF;padding-left:2px;">
  <tr>
    <td><?php 
include 'inc/fy.php'; 
class mypage extends page
{
function mypage($array)
 {
  parent::page($array);
  $this->first_page='<<';
  $this->last_page=$this->totalpage;
  $this->set('format_left','');
  $this->set('format_right','');
 }
 
 function show()
 {
  $pagestr='<div id="lopage">页:';
  $pagestr.=$this->first_page().' ';
  $pagestr.=$this->nowbar('','curr');
  $pagestr.='<span class="break">...</span>';
  $pagestr.=$this->last_page();
  $pagestr.='   (总计<span class="num">'.$this->totalpage.'</span>页) </div>';
  $pagestr.='</div>';
  return $pagestr;
 }
}
$page=new mypage(array('total'=>$total,'perpage'=>$num));
echo $page->show();
}
else
{
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=12;
$total=$db->getcount("select * from topic where bid='".$bid."'");
//页码计算
$pagenum=ceil($total/$num);     //获得总页数,也是最后一页
$page=min($pagenum,$page);//获得首页
$prepg=$page-1;//上一页
$nextpg=($page==$pagenum ? 0 : $page+1);//下一页
$offset=($page-1)*$num; 
if(($_SESSION['super']==3) || ($boardmaster==$_SESSION['username']))
{
if($setting2==0)
{
$result=$db->query("select * from topic where bid='".$bid."' order by istop desc,id desc limit $offset,$num");
}
elseif($setting2==1)
{
$result=$db->query("select * from topic where bid='".$bid."' order by istop desc,reviewtime desc limit $offset,$num");
}
}
else
{
if($setting2==0)
{
$result=$db->query("select * from topic where bid='".$bid."' and islock=0 order by istop desc,id desc limit $offset,$num");
}
elseif($setting2==1)
{
$result=$db->query("select * from topic where bid='".$bid."' and islock=0 order by istop desc,reviewtime desc limit $offset,$num");
}
}
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row=$db->getarray($result)){
?>
    <tr>
      <td class="f_two" valign="center" align="middle"><img src="images/new.gif" width="33" height="25" /></td>
      <td class="f_one" onmouseover="this.className='f_two'" onmouseout="this.className='f_one'" align="left">&nbsp; <a class="fnamecolor" href="view.php?id=<?=$row[id]?>">
        <?=$row[title]?>
        </a>&nbsp;
        <?=(($row[islock]==1)?"[未审核]":"")?><?=(($row[iselite]==1)?"[精华]":"")?></td>
      <td align="left" class="f_one"><?=$row[username]?></td>
      <td class="f_two" align="middle"><?=$row[reviewcount]?>
        /
        <?=$row[hits]?></td>
      <td bgcolor="#f7f7f7" class="smalltxt"><?=$row[reviewtime]." by  ".$row[revieuser]?></td>
    </tr>
    <?php
}
?>
</table>
<table width="776" align="center" cellpadding="0" cellspacing="0" class="font" style="background-color:#FFFFFF;padding-left:2px;">
  <tr>
    <td><?php 
include 'inc/fy.php'; 
class mypage extends page
{
function mypage($array)
 {
  parent::page($array);
  $this->first_page='<<';
  $this->last_page=$this->totalpage;
  $this->set('format_left','');
  $this->set('format_right','');
 }
 
 function show()
 {
  $pagestr='<div id="lopage">页:';
  $pagestr.=$this->first_page().' ';
  $pagestr.=$this->nowbar('','curr');
  $pagestr.='<span class="break">...</span>';
  $pagestr.=$this->last_page();
  $pagestr.='   (总计<span class="num">'.$this->totalpage.'</span>页) </div>';
  $pagestr.='</div>';
  return $pagestr;
 }
}
$page=new mypage(array('total'=>$total,'perpage'=>$num));
echo $page->show();
}
?></td>
  </tr>
</table>
<table width="776" align="center" cellpadding="0" cellspacing="0" style="margin-top:5px;background-color:#FFFFFF;">
  <tr>
    <td><iframe id=user src="cp1.php" frameBorder="0" width="700" scrolling="no" height="30" allowTransparency="true"></iframe></td>
  </tr>
</table>
<?php
include('footer.php');
?>
</body>
</html>
