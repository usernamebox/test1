<?php
session_start();
include('inc/site.php');
include('inc/db_class.php');
include('inc/function.php');
if(empty($_SESSION["username"]))
{
	Error("该部分只有本站会员才可浏览！","index.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>会员中心_课程网站</title>
<meta name="keywords" content="会员中心,课程网站" />
<meta name="description" content="会员中心,课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.button {
	BORDER-RIGHT: #666666 2px solid;
	BORDER-TOP: #666666 1px solid;
	FONT-SIZE: 12px;
	BACKGROUND: #ffffff;
	BORDER-LEFT: #666666 1px solid;
	COLOR: #333333;
	BORDER-BOTTOM: #666666 2px solid;
	HEIGHT: 18px
}
.con {
	FONT-SIZE: 12px;
	BACKGROUND: #ffffff;
	COLOR: #666666
}
.input {
	BORDER-RIGHT: #666666 1px solid;
	PADDING-RIGHT: 2px;
	BORDER-TOP: #666666 1px solid;
	PADDING-LEFT: 2px;
	FONT-SIZE: 12px;
	BACKGROUND: #f5f5f5;
	PADDING-BOTTOM: 2px;
	BORDER-LEFT: #666666 1px solid;
	COLOR: #666666;
	PADDING-TOP: 2px;
	BORDER-BOTTOM: #666666 1px solid
}
.table {
	BACKGROUND: #eeeeee
}
.title {
	FONT-SIZE: 12px;
	BACKGROUND: #f0f0f0;
	COLOR: #666666
}
.con1 {
	FONT-SIZE: 12px;
	BACKGROUND: #ffffff;
	COLOR: #666666
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
<td valign="top" bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
              <td class="font"><a href="user.php?username=<?=$_SESSION["username"]?>">修改资料</a></td>
            </tr>
            <tr>
              <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
              <td class="font"><a href="user.php?username=<?=$_SESSION["username"]?>&act=modpass">修改密码</a></td>
            </tr>
            <tr>
              <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
              <td class="font"><a href="user.php?username=<?=$_SESSION["username"]?>&act=message">温馨祝福</a></td>
            </tr>
            <tr>
              <td height="26"><div align="center"><img src="images/inner-img9.gif" width="9" height="10" /></div></td>
              <td class="font"><a href="download.php">资料下载</a></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <?php include('inc/link.php'); ?></td>
  <td valign="top">
  <table width="571" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="571" height="29" background="images/inner-img2.gif"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="font">
          <tr>
            <td width="40"><div align="center"><img src="images/inner-img3.gif" width="20" height="20" /></div></td>
            <td>您的当前位置：<a href="index.php">首页</a> &gt;&gt; 会员中心</td>
          </tr>
        </table></td>
    </tr>
  </table>
  <?php
if($_GET['act']== "")
{
$username=$_SESSION["username"];
$show=$db->getfirst("select * from user where username='$username'");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
?>
  <form action="user.php?act=save" method="post" name="form1" onSubmit="return Validator.Validate(this,2)">
    <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
      <tbody>
        <tr>
          <td class="title" align="middle" colspan="2" height="25"><strong>资料修改</strong></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">真实姓名：&nbsp;</td>
          <td width="77%" class="con"><input type="hidden" name="id" value="<?=$show[id]?>" />
            <input type="text" name="truename" size="20" maxlength="20" require="false" dataType="Chinese" msg="姓名只允许中文" class="input" value="<?=$show[truename]?>" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">密码问题：&nbsp;</td>
          <td class="con"><input type="text" name="question" size="20" maxlength="20" dataType="Limit" msg="密码问题不符合规则" min="6" max="20" class="input" value="<?=$show[question]?>" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">问题答案：&nbsp;</td>
          <td class="con"><input type="text" name="answer" size="20" maxlength="20" dataType="Limit" msg="问题答案不符合规则" min="6" max="20" class="input" value="<?=$show[answer]?>" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">出生年月：&nbsp;</td>
          <td class="con"><input type="text" name="birth" size="20" maxlength="15" class="input" value="<?=$show[birth]?>" />
            如：1900年01月01日</td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">照片：&nbsp;</td>
          <td class="con"><input name="photo" size="30" maxlength="200" type="text" class="input" value="<?=$show[photo]?>" />
            <br />
            <iframe frameborder="0" width="290" height="26" scrolling="No" src="upload_pic.htm"></iframe></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">所在单位：&nbsp;</td>
          <td class="con"><input type="text" name="com" size="20" maxlength="50" class="input" value="<?=$show[com]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">职务：&nbsp;</td>
          <td class="con"><input type="text" name="postion" size="20" maxlength="20" class="input" value="<?=$show[postion]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>单位简介：&nbsp;</p></td>
          <td class="con"><input type="text" name="intro" size="20" maxlength="200" class="input" value="<?=$show[intro]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>通讯地址及邮编：&nbsp;</p></td>
          <td class="con"><input type="text" name="address" size="30" maxlength="100" class="input" value="<?=$show[address]?>" />
            &nbsp;&nbsp;
            <input type="text" name="zip" size="6" maxlength="6" require="false" dataType="Zip" msg="邮编不正确" class="input" value="<?=$show[zip]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>联系电话：&nbsp;</p></td>
          <td class="con"><input type="text" name="tel" size="20" maxlength="20" require="false" dataType="Phone" msg="电话号码不正确" class="input" value="<?=$show[tel]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>传真：&nbsp;</p></td>
          <td class="con"><input type="text" name="tax" size="20" maxlength="20" require="false" dataType="Phone" msg="传真号码不正确" class="input" value="<?=$show[tax]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>手机：&nbsp;</p></td>
          <td class="con"><input type="text" name="mobile" size="20" maxlength="12" require="false" dataType="Mobile" msg="手机号码不正确" class="input" value="<?=$show[mobile]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>E－mail：&nbsp;</p></td>
          <td class="con"><input type="text" name="email" size="20" maxlength="30" require="false" dataType="Email" msg="信箱格式不正确" class="input" value="<?=$show[email]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>与交通大学相关教育经历：&nbsp;</p></td>
          <td class="con"><textarea name="experience" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)" class="input"><?=$show[experience]?>
</textarea></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>个人主要工作经历：&nbsp;</p></td>
          <td class="con"><textarea name="job" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)" class="input"><?=$show[job]?>
</textarea></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>个人兴趣爱好：&nbsp;</p></td>
          <td class="con"><input type="text" name="hoby" size="40" maxlength="100" class="input" value="<?=$show[hoby]?>" /></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>对交大会的建议和期望：&nbsp;</p></td>
          <td class="con"><textarea name="expect" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)" class="input"><?=$show[expect]?>
</textarea></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%"><p>希望为交大校友会提供的服务：&nbsp;</p></td>
          <td class="con"><textarea name="hope" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)" class="input"><?=$show[hope]?>
</textarea></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">简历：&nbsp;</td>
          <td class="con"><input name="jianli" size="30" maxlength="200" type="text" class="input" value="<?=$show[jianli]?>" />
            <br />
            <iframe frameborder="0" width="290" height="26" scrolling="No" src="upload_soft.htm"></iframe></td>
        </tr>
        <tr>
          <td class="title" align="right" colspan="2"><div align="center">
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
	   echo ("<script type='text/javascript'>alert('非法操作...');history.go(-1);</script>");
	   exit;
	}	
	$email = SafeHtml($_POST['email']);
	if(!empty($email)) {
	if(!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email))
	{
		Error("邮箱地址不正确！","user.php?act=add");
	}
	}	
	$question = SafeHtml($_POST['question']);
	$answer = SafeHtml($_POST['answer']);
    $truename = SafeHtml($_POST['truename']);
	$birth = SafeHtml($_POST['birth']);
    $photo = SafeHtml($_POST['photo']);
    $com = SafeHtml($_POST['com']);
    $postion = SafeHtml($_POST['postion']);
    $intro = SafeHtml($_POST['intro']);
    $address = SafeHtml($_POST['address']);
	$zip = SafeHtml($_POST['zip']);
    $tel = SafeHtml($_POST['tel']);
    $tax = SafeHtml($_POST['tax']);
    $mobile = SafeHtml($_POST['mobile']);
    $experience = nl2br($_POST['experience']);
    $job = nl2br($_POST['job']);
    $hoby = SafeHtml($_POST['hoby']);
    $expect = nl2br($_POST['expect']);
    $hope = nl2br($_POST['hope']);
    $jianli = SafeHtml($_POST['jianli']);
	//echo $truename;
	//die();
	$db->update("update `user` set `question`='".$question."',`answer`='".$answer."',`email`='".$email."',`truename`='".$truename."',`birth`='".$birth."',`photo`='".$photo."',`com`='".$com."',`postion`='".$postion."',`intro`='".$intro."',`address`='".$address."',`zip`='".$zip."',`tel`='".$tel."',`tax`='".$tax."',`mobile`='".$mobile."',`experience`='".$experience."',`job`='".$job."',`hoby`='".$hoby."',`expect`='".$expect."',`hope`='".$hope."',`jianli`='".$jianli."' where `id`='".$_POST['id']."'");  
	echo ("<script type='text/javascript'>alert('资料修改成功...');history.go(-1);</script>");
    exit;
}
if($_GET['act']== "modpass")
{
$show=$db->getfirst("select * from user where username='".$_SESSION["username"]."'");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
?>
  <form action="user.php?act=modpassok" method="post" name="form1" onSubmit="return Validator.Validate(this,2)">
    <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
      <tbody>
        <tr>
          <td class="title" align="middle" colspan="2" height="25"><strong>密码修改</strong></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">用户名：&nbsp;</td>
          <td width="77%" class="con"><input type="hidden" name="id" value="<?=$show[id]?>" />
            <?=$show[username]?></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">旧密码：&nbsp;</td>
          <td class="con"><input type="password" name="olduserpass" size="20" maxlength="20" dataType="LimitB" msg="密码不符合安全规则" min="5" max="20" class="input" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">新密码：&nbsp;</td>
          <td class="con"><input type="password" name="userpass" size="20" maxlength="20" dataType="LimitB" msg="密码不符合安全规则" min="5" max="20" class="input" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" width="23%">确认新密码：&nbsp;</td>
          <td class="con"><input type="password" name="cuserpass" size="20" maxlength="20"  dataType="Repeat" to="userpass" msg="两次输入的密码不一致" class="input" />
            <font color="#ff0000">* </font></td>
        </tr>
        <tr>
          <td class="title" align="right" colspan="2"><div align="center">
              <input class="button" type="submit" value=" 提 交 " name="Submit" />
            </div></td>
        </tr>
      </tbody>
    </table>
  </form>
  <?php
}
elseif($_GET['act']== "modpassok")
{
	if(empty($_POST['id']))
	{
	   echo ("<script type='text/javascript'>alert('非法操作...');history.go(-1);</script>");
	   exit;
	}	
	$olduserpass = SafeHtml($_POST['olduserpass']);
	$userpass = SafeHtml($_POST['userpass']);
	$cuserpass = SafeHtml($_POST['cuserpass']);
	if(empty($olduserpass) || empty($userpass) || empty($cuserpass))
	{
		echo ("<script type='text/javascript'>alert('信息不完整');history.go(-1);</script>");
		exit;
	}
	#[判断两次输入的密码是否一致]
	if($userpass != $cuserpass)
	{
		echo ("<script type='text/javascript'>alert('新密码与确认密码不同!');history.go(-1);</script>");
		exit;
	}
	
	if(!$checkuser=$db->getfirst("select * from user where userpass='".md5($olduserpass)."' and id='".$_POST['id']."'"))
	  echo ("<script type='text/javascript'>alert('旧密码不正确!');history.go(-1);</script>");
	//$check=$db->getfirst("select * from user where id='".$_POST['id']."'");
	//if($check[userpass]!=md5($olduserpass))
	$db->update("update `user` set `userpass`='".md5($userpass)."' where `id`='".$_POST['id']."'");  
	echo ("<script type='text/javascript'>alert('密码修改成功...');history.go(-1);</script>");
    exit;
}
elseif($_GET['act']== "message")
{
$username=$_SESSION["username"];
$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=15; 
$total=$db->getcount("select * from `message` where username='".$username."' or jieshou='".$username."' or jieshou='all'");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
//页码计算
$pagenum=ceil($total/$num);     //获得总页数,也是最后一页
$page=min($pagenum,$page);//获得首页
$prepg=$page-1;//上一页
$nextpg=($page==$pagenum ? 0 : $page+1);//下一页
$offset=($page-1)*$num;  
?>
  <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
    <tr>
      <td height="25" colspan="3" align="middle" class="title"><strong>温馨祝福</strong></td>
      <td height="25" align="middle" class="title"><a href="user.php?act=sendmsg&username=<?=$username?>">发送祝福</a></td>
    </tr>
    <tr>
      <td width="18%" class="con">分类</td>
      <td width="29%" class="con">发送者</td>
      <td width="41%" class="con">接收者</td>
      <td width="12%" class="con">状态</td>
    </tr>
    <?php 
$result=$db->query("select * from `message` where username='".$username."' or jieshou='".$username."' or jieshou='all' order by id desc limit $offset,$num");
while($row=$db->getarray($result)){
?>
    <tr>
      <td class="con"><?=(($row['username']==$username)?"发送":"<font color='red'>接收</font>")?></td>
      <td class="con"><a href="user.php?act=showmsg&id=<?=$row['id']?>">
        <?=$row['username']?>
        </a></td>
      <td class="con"><?=$row['jieshou']?></td>
      <td class="con"><?php
	    if($row['jieshou']==$username || ($row['jieshou']=='all' && $row['username']!=$username))
		{
		if($row['islook']==0)
		{
		  echo "已阅";
		  }
		elseif($row['islook']==1)
		{
		  echo "<font color='red'>未阅</font>";
		  }
		}?>
        &nbsp;&nbsp;<a href="user.php?act=delmsg&id=<?=$row['id']?>">删除</a></td>
    </tr>
    <?php
}
?>
    <tr>
      <td colspan="4" align="right" class="title"><?php 
include 'inc/fy.php'; 
$page=new page(array('total'=>$total,'perpage'=>$num));
echo $page->show(3);
?></td>
    </tr>
  </table>
  <?php
}
elseif($_GET['act']== "sendmsg")
{
   if(empty($_GET['username']))
	{
		echo ("<script type='text/javascript'>alert('非法操作');history.go(-1);</script>");
		die();
	}
?>
  <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
  <form action="user.php?act=sendok" method="post" name="form1">  
    <tr>
      <td height="25" colspan="2" align="middle" class="title"><strong>发送祝福</strong></td>
    </tr>
    <tr>
      <td width="11%" class="con">发送者:</td>
      <td width="89%" class="con"><?=$_GET['username']?><input type="hidden" name="username" value="<?=$_GET['username']?>" /></td>
    </tr>
    <tr>
      <td class="con">接收者:</td>
      <td class="con"><select name="jieshou">
<option value="all" selected="selected">所有人</option>
<?php
$total=$db->getcount("select * from user where islock=0");
$result=$db->query("select * from user where islock=0 limit 0,$total");
while($row=$db->getarray($result)){
?>
      <option value="<?=$row[username]?>"><?=$row[username]?></option>
<?php
}
?>
      </select></td>
    </tr>
    <tr>
      <td valign="top" class="con">内容:</td>
      <td class="con"><textarea name="content" id="content" cols="45" rows="5" onpropertychange="if(value.length>255)value=value.substr(0,255)"></textarea></td>
    </tr>
<tr>
      <td colspan="2" align="right" class="title"><div align="center">
        <input class="button" type="submit" value=" 提 交 " name="Submit" />
      </div></td>
    </tr>
</form>
    </table>
<?php
}
elseif($_GET['act']== "sendok")
{
   $username = SafeHtml($_POST['username']);
   $jieshou = SafeHtml($_POST['jieshou']);
   $content = nl2br($_POST['content']);
   if(empty($username) || empty($jieshou) || empty($content))
	{
		echo ("<script type='text/javascript'>alert('信息不完整');history.go(-1);</script>");
	}
   $addtime=date("Y-m-d G:i:s");
   $result=$db->query("select * from `message`");
   $db->insert("INSERT INTO `message` (`username`,`jieshou`,`content`,`addtime`) VALUES('".$username."','".$jieshou."','".$content."','".$addtime."')");
   echo ("<script type='text/javascript'>alert('发送祝福成功!');history.go(-1);</script>");
	
	
	
}
elseif($_GET['act']== "showmsg")
{
   if(empty($_GET['id']))
	{
		echo ("<script type='text/javascript'>alert('非法操作');history.go(-1);</script>");
		die();
	}
	$db->update("update `message` set islook='0' where id='".$_GET['id']."'");
	$show=$db->getfirst("select * from `message` where id='".$_GET['id']."'");
?>
  <table class="table" cellspacing="1" cellpadding="4" width="100%" align="center">
    <tr>
      <td height="25" colspan="2" align="middle" class="title"><strong>温馨祝福</strong></td>
    </tr>
    <tr>
      <td width="11%" class="con">发送者:</td>
      <td width="89%" class="con"><?=$show['username']?></td>
    </tr>
    <tr>
      <td class="con">接收者:</td>
      <td class="con"><?=$show['jieshou']?></td>
    </tr>
    <tr>
      <td valign="top" class="con">内容:</td>
      <td class="con"><?=$show['content']?></td>
    </tr>
<tr>
      <td colspan="2" align="right" class="title"><?=$show['addtime']?></td>
    </tr>
    </table>
    <?php	
}
elseif($_GET['act']== "delmsg")
{
   if(empty($_GET['id']))
	{
		echo ("<script type='text/javascript'>alert('非法操作');history.go(-1);</script>");
		die();
	}
	$rs = $db->query("delete from `message` where id='".$_GET['id']."'");
	echo ("<script type='text/javascript'>alert('删除成功');history.go(-1);</script>");
}
?>
    </td>
    
    </tr>
    
  </table>
  </td>
  
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
<script>
  /*************************************************
	Validator v1.05
	code by 我佛山人
	wfsr@msn.com
*************************************************/
 Validator = {
	Require : /.+/,
	Email : /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/,
	Phone : /^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/,
	Mobile : /^((\(\d{2,3}\))|(\d{3}\-))?((13\d{9})|(15\d{9}))$/,
	Url : /^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/,
	IdCard : "this.IsIdCard(value)",
	Currency : /^\d+(\.\d+)?$/,
	Number : /^\d+$/,
	Zip : /^[1-9]\d{5}$/,
	QQ : /^[1-9]\d{4,8}$/,
	Integer : /^[-\+]?\d+$/,
	Double : /^[-\+]?\d+(\.\d+)?$/,
	English : /^[A-Za-z]+$/,
	Chinese :  /^[\u0391-\uFFE5]+$/,
	Username : /^[a-z]\w{3,}$/i,
	UnSafe : /^(([A-Z]*|[a-z]*|\d*|[-_\~!@#\$%\^&\*\.\(\)\[\]\{\}<>\?\\\/\'\"]*)|.{0,5})$|\s/,
	IsSafe : function(str){return !this.UnSafe.test(str);},
	SafeString : "this.IsSafe(value)",
	Filter : "this.DoFilter(value, getAttribute('accept'))",
	Limit : "this.limit(value.length,getAttribute('min'),  getAttribute('max'))",
	LimitB : "this.limit(this.LenB(value), getAttribute('min'), getAttribute('max'))",
	Date : "this.IsDate(value, getAttribute('min'), getAttribute('format'))",
	Repeat : "value == document.getElementsByName(getAttribute('to'))[0].value",
	Range : "getAttribute('min') < (value|0) && (value|0) < getAttribute('max')",
	Compare : "this.compare(value,getAttribute('operator'),getAttribute('to'))",
	Custom : "this.Exec(value, getAttribute('regexp'))",
	Group : "this.MustChecked(getAttribute('name'), getAttribute('min'), getAttribute('max'))",
	ErrorItem : [document.forms[0]],
	ErrorMessage : ["以下原因导致提交失败：\t\t\t\t"],
	Validate : function(theForm, mode){
		var obj = theForm || event.srcElement;
		var count = obj.elements.length;
		this.ErrorMessage.length = 1;
		this.ErrorItem.length = 1;
		this.ErrorItem[0] = obj;
		for(var i=0;i<count;i++){
			with(obj.elements[i]){
				var _dataType = getAttribute("dataType");
				if(typeof(_dataType) == "object" || typeof(this[_dataType]) == "undefined")  continue;
				this.ClearState(obj.elements[i]);
				if(getAttribute("require") == "false" && value == "") continue;
				switch(_dataType){
					case "IdCard" :
					case "Date" :
					case "Repeat" :
					case "Range" :
					case "Compare" :
					case "Custom" :
					case "Group" : 
					case "Limit" :
					case "LimitB" :
					case "SafeString" :
					case "Filter" :
						if(!eval(this[_dataType]))	{
							this.AddError(i, getAttribute("msg"));
						}
						break;
					default :
						if(!this[_dataType].test(value)){
							this.AddError(i, getAttribute("msg"));
						}
						break;
				}
			}
		}
		if(this.ErrorMessage.length > 1){
			mode = mode || 1;
			var errCount = this.ErrorItem.length;
			switch(mode){
			case 2 :
				for(var i=1;i<errCount;i++)
					this.ErrorItem[i].style.color = "red";
			case 1 :
				alert(this.ErrorMessage.join("\n"));
				this.ErrorItem[1].focus();
				break;
			case 3 :
				for(var i=1;i<errCount;i++){
				try{
					var span = document.createElement("SPAN");
					span.id = "__ErrorMessagePanel";
					span.style.color = "red";
					this.ErrorItem[i].parentNode.appendChild(span);
					span.innerHTML = this.ErrorMessage[i].replace(/\d+:/,"*");
					}
					catch(e){alert(e.description);}
				}
				this.ErrorItem[1].focus();
				break;
			default :
				alert(this.ErrorMessage.join("\n"));
				break;
			}
			return false;
		}
		return true;
	},
	limit : function(len,min, max){
		min = min || 0;
		max = max || Number.MAX_VALUE;
		return min <= len && len <= max;
	},
	LenB : function(str){
		return str.replace(/[^\x00-\xff]/g,"**").length;
	},
	ClearState : function(elem){
		with(elem){
			if(style.color == "red")
				style.color = "";
			var lastNode = parentNode.childNodes[parentNode.childNodes.length-1];
			if(lastNode.id == "__ErrorMessagePanel")
				parentNode.removeChild(lastNode);
		}
	},
	AddError : function(index, str){
		this.ErrorItem[this.ErrorItem.length] = this.ErrorItem[0].elements[index];
		this.ErrorMessage[this.ErrorMessage.length] = this.ErrorMessage.length + ":" + str;
	},
	Exec : function(op, reg){
		return new RegExp(reg,"g").test(op);
	},
	compare : function(op1,operator,op2){
		switch (operator) {
			case "NotEqual":
				return (op1 != op2);
			case "GreaterThan":
				return (op1 > op2);
			case "GreaterThanEqual":
				return (op1 >= op2);
			case "LessThan":
				return (op1 < op2);
			case "LessThanEqual":
				return (op1 <= op2);
			default:
				return (op1 == op2);            
		}
	},
	MustChecked : function(name, min, max){
		var groups = document.getElementsByName(name);
		var hasChecked = 0;
		min = min || 1;
		max = max || groups.length;
		for(var i=groups.length-1;i>=0;i--)
			if(groups[i].checked) hasChecked++;
		return min <= hasChecked && hasChecked <= max;
	},
	DoFilter : function(input, filter){
return new RegExp("^.+\.(?=EXT)(EXT)$".replace(/EXT/g, filter.split(/\s*,\s*/).join("|")), "gi").test(input);
	},
	IsIdCard : function(number){
		var date, Ai;
		var verify = "10x98765432";
		var Wi = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
		var area = ['','','','','','','','','','','','北京','天津','河北','山西','内蒙古','','','','','','辽宁','吉林','黑龙江','','','','','','','','上海','江苏','浙江','安微','福建','江西','山东','','','','河南','湖北','湖南','广东','广西','海南','','','','重庆','四川','贵州','云南','西藏','','','','','','','陕西','甘肃','青海','宁夏','新疆','','','','','','台湾','','','','','','','','','','香港','澳门','','','','','','','','','国外'];
		var re = number.match(/^(\d{2})\d{4}(((\d{2})(\d{2})(\d{2})(\d{3}))|((\d{4})(\d{2})(\d{2})(\d{3}[x\d])))$/i);
		if(re == null) return false;
		if(re[1] >= area.length || area[re[1]] == "") return false;
		if(re[2].length == 12){
			Ai = number.substr(0, 17);
			date = [re[9], re[10], re[11]].join("-");
		}
		else{
			Ai = number.substr(0, 6) + "19" + number.substr(6);
			date = ["19" + re[4], re[5], re[6]].join("-");
		}
		if(!this.IsDate(date, "ymd")) return false;
		var sum = 0;
		for(var i = 0;i<=16;i++){
			sum += Ai.charAt(i) * Wi[i];
		}
		Ai +=  verify.charAt(sum%11);
		return (number.length ==15 || number.length == 18 && number == Ai);
	},
	IsDate : function(op, formatString){
		formatString = formatString || "ymd";
		var m, year, month, day;
		switch(formatString){
			case "ymd" :
				m = op.match(new RegExp("^((\\d{4})|(\\d{2}))([-./])(\\d{1,2})\\4(\\d{1,2})$"));
				if(m == null ) return false;
				day = m[6];
				month = m[5]*1;
				year =  (m[2].length == 4) ? m[2] : GetFullYear(parseInt(m[3], 10));
				break;
			case "dmy" :
				m = op.match(new RegExp("^(\\d{1,2})([-./])(\\d{1,2})\\2((\\d{4})|(\\d{2}))$"));
				if(m == null ) return false;
				day = m[1];
				month = m[3]*1;
				year = (m[5].length == 4) ? m[5] : GetFullYear(parseInt(m[6], 10));
				break;
			default :
				break;
		}
		if(!parseInt(month)) return false;
		month = month==0 ?12:month;
		var date = new Date(year, month-1, day);
        return (typeof(date) == "object" && year == date.getFullYear() && month == (date.getMonth()+1) && day == date.getDate());
		function GetFullYear(y){return ((y<30 ? "20" : "19") + y)|0;}
	}
 }
</script>
