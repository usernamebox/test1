<?php 
include('./inc/site.php');
include('./inc/db_class.php');
include('./inc/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>会员注册_课程网站</title>
<meta name="keywords" content="课程网站" />
<meta name="description" content="课程网站" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {font-size: 14px}
.STYLE3 {color: #FF0000}
-->
</style>
<script language="javascript">
function CheckName(gotoURL) {
   var ssn=document.all.username.value.toLowerCase();
	   var open_url = gotoURL + "?username=" + ssn;
	   window.open(open_url,'','status=0,directories=0,resizable=0,toolbar=0,location=0,scrollbars=0,width=150,height=80');
}
</script>
</head>

<body>
<?php
include('header.php');
if($_GET['act']== "")
{
?>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:6px;">
  <tr>
    <td><img src="images/body_top.gif" width="776" height="7" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" height="560" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="560" valign="top" align="center"><table width="99%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="29" background="images/inner-img02.gif"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="font">
              <tr>
                <td width="40"><div align="center"><img src="images/inner-img3.gif" width="20" height="20" /></div></td>
                <td align="left">您的当前位置：<a href="index.php">首页</a> &gt;&gt; <a href="reg.php">会员注册</a></td>
              </tr>
            </table></td>
          </tr>
        </table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="28"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="menu">
                    <tr>
                      <td width="25"><div align="center"><img src="images/inner-img4.gif" width="15" height="15" /></div></td>
                      <td width="130" align="left"><span class="STYLE2">注册新会员</span></td>
                      <td style="padding-right:18px;">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="257"><table width="100%" height="257" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="top" class="font" style="padding:8px 8px 8px 8px;" align="center">
					  <form action="reg.php?act=save" method="post" name="form1" onSubmit="return Validator.Validate(this,2)">
					  <table width="90%" border="0" cellspacing="2" cellpadding="0" bgcolor="#fdeacc">
                        <tr>
                          <td colspan="2" align="left"><strong>* 填写资料</strong></td>
                          </tr>
                        <tr>
                          <td width="39%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>用户名：</strong><br />
长度限制为4－12字节,并以字母开头.</td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;">
                            <input type="text" name="username" size="20" maxlength="12" dataType="Username" msg="用户名不符合规定" />
                            <span class="STYLE3">*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:CheckName('checkname.php')">检测用户名是否可用</a></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>密码(至少5位)：</strong><br />请输入密码，<br />
请不要使用任何类似 '*'、' ' 或 HTML 字符</td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="password" name="userpass" size="20" maxlength="20" dataType="LimitB" msg="密码不符合安全规则" min="5" max="20" />
                            <span class="STYLE3">*</span></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>确认密码：</strong><br />请再输一遍确认</td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="password" name="cuserpass" size="20" maxlength="20" dataType="Repeat" to="userpass" msg="两次输入的密码不一致" />
                            <span class="STYLE3">*</span></td>
                        </tr>
						<tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>密码问题：</strong><br />当您忘记密码时可由此找回密码。<br />长度限制为6－20字节</td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="question" size="20" maxlength="20" dataType="Limit" msg="密码问题不符合规则" min="6" max="20" />
                            <span class="STYLE3">*</span></td>
                        </tr>
						<tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>问题答案：</strong><br />当您忘记密码时可由此找回密码。<br />长度限制为6－20字节</td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="answer" size="20" maxlength="20" dataType="Limit" msg="问题答案不符合规则" min="6" max="20" />
                            <span class="STYLE3">*</span></td>
                        </tr>
						<tr>
                          <td width="39%" align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>真实姓名：</strong></td>
                          <td width="61%" align="left" bgcolor="#ffffff" style="padding:0px 8px;">
                            <input type="text" name="truename" size="20" maxlength="20" dataType="Chinese" msg="姓名只允许中文" />
                            <span class="STYLE3">*</span></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>出生年月：</strong><br />如：1900年01月01日</td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="birth" size="20" maxlength="15" /></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>照片：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input name="photo" size="30" maxlength="200" type="text" /><br /><iframe frameborder="0" width="290" height="26" scrolling="No" src="upload_pic.htm"></iframe></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>所在单位：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="com" size="20" maxlength="50" /></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>职务：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="postion" size="20" maxlength="20" /></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>单位简介：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="intro" size="20" maxlength="200" /></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>通讯地址及邮编：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="address" size="20" maxlength="100" />&nbsp;&nbsp;<input type="text" name="zip" size="6" maxlength="6" require="false" dataType="Zip" msg="邮编不正确" /></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>联系电话：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="tel" size="20" maxlength="20" require="false" dataType="Phone" msg="电话号码不正确" /></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>传真：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="tax" size="20" maxlength="20" require="false" dataType="Phone" msg="传真号码不正确" /></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>手机：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="mobile" size="20" maxlength="12" require="false" dataType="Mobile" msg="手机号码不正确" /></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><strong>E－mail：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="email" size="20" maxlength="30" require="false" dataType="Email" msg="信箱格式不正确" /></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>与交通大学相关教育经历：</strong><br />毕业院系，所在专业，所在班级，毕业时间</td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><label>
                            <textarea name="experience" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"></textarea>
                          </label></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>个人主要工作经历：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><textarea name="job" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"></textarea></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>个人兴趣爱好：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input type="text" name="hoby" size="40" maxlength="100" /></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>对交大会的建议和期望：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><textarea name="expect" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"></textarea></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>希望为交大校友会提供的服务：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><textarea name="hope" cols="40" rows="10" onpropertychange="if(value.length>255)value=value.substr(0,255)"></textarea></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" bgcolor="#ffffff" style="padding:0px 8px;"><strong>简历：</strong></td>
                          <td align="left" bgcolor="#ffffff" style="padding:0px 8px;"><input name="jianli" size="30" maxlength="200" type="text" /><br /><iframe frameborder="0" width="290" height="26" scrolling="No" src="upload_soft.htm"></iframe></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" bgcolor="#ffffff">
                            <input type="submit" name="Submit" value="提交" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="reset" name="Submit2" value="取消" />
                          </td>
                          </tr>
                      </table>
					  </form></td>
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
<?php
}
elseif($_GET['act']== "save")
{
	$username = SafeHtml($_POST['username']);
	$userpass = SafeHtml($_POST['userpass']);
	$cuserpass = SafeHtml($_POST['cuserpass']);
	if(empty($username) || empty($userpass) || empty($cuserpass))
	{
		Error("会员名或密码为空！","reg.php");
	}
	#[判断两次输入的密码是否一致]
	if($userpass != $cuserpass)
	{
		Error("两次输入的密码不一致！","reg.php");
	}
	$email = SafeHtml($_POST['email']);
	if(!empty($email)) {
	if(!ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email))
	{
		Error("邮箱地址不正确！","reg.php");
	}
	}
	$question = SafeHtml($_POST['question']);
	$answer = SafeHtml($_POST['answer']);
    if(empty($question) || empty($answer))
	{
		Error("密码问题或问题答案为空！","reg.php");
	}
	
    $truename = SafeHtml($_POST['truename']);
	if(empty($truename)) 
	{
	  Error("真实姓名不能为空！","reg.php");
	}
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
$islock=1;
	$check_user = $db->query("SELECT * FROM `user` where `username`='".$username."'");
	$row=$db->getarray($check_user);
	if($row)
	{
		Error("用户名已经存在！","reg.php");
		exit;
	}
	$db->insert("INSERT INTO `user` (`username`,`userpass`,`question`,`answer`,`email`,`truename`,`birth`,`photo`,`com`,`postion`,`intro`,`address`,`zip`,`tel`,`tax`,`mobile`,`experience`,`job`,`hoby`,`expect`,`hope`,`jianli`,`islock`) VALUES('".$username."','".md5($userpass)."','".$question."','".$answer."','".$email."','".$truename."','".$birth."','".$photo."','".$com."','".$postion."','".$intro."','".$address."','".$zip."','".$tel."','".$tax."','".$mobile."','".$experience."','".$job."','".$hoby."','".$expect."','".$hope."','".$jianli."','".$islock."')");
	$_SESSION['username']=$row['username'];
	$_SESSION["super"] =0;
	Error("注册成功！请等待管理员验证","index.php");
    exit;
}
include('footer.php');
?>
</body>
</html>
