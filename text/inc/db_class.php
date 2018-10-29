<?php

$db_username="root"; //连接数据库的用户名
$db_password="1111"; //连接数据库的密码
$db_database="jiaoda"; //数据库名
$db_hostname="localhost"; //服务器地址

class dbClass{ //开始数据库类
var $username;
var $password;
var $database;
var $hostname;
var $result;

function dbClass($username,$password,$database,$hostname="localhost"){
$this->username=$username;
$this->password=$password;
$this->database=$database;
$this->hostname=$hostname;
}
function connect(){ //这个函数用于连接数据库
$this->link=mysql_connect($this->hostname,$this->username,$this->password) or die("Sorry,can not connect to database");
return $this->link;
}


function select(){ //这个函数用于选择数据库
 mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
mysql_select_db($this->database,$this->link);
}

function query($sql){ //这个函数用于送出查询语句并返回结果，常用。
if($this->result=mysql_query($sql,$this->link))
{
 mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
 return $this->result;
}
else {
//这里是显示SQL语句的错误信息，主要是设计阶段用于提示。正式运行阶段可将下面这句注释掉。
//echo "SQL语句错误： <font color=red>$sql</font> <BR><BR>错误信息： ".mysql_error();
return false;
}
}
/*
　　以下函数用于从结果取回数组，一般与 while()循环、$db->query($sql) 配合使用，例如：
$result=$db->query("select * from xzy_teachfl order by tpx");
while($row=$db->getarray($result)){
echo "$row[id] ";
}
*/
function getarray($result){
 mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
return @mysql_fetch_array($result);
}

/*
　　以下函数用于取得SQL查询的第一行，一般用于查询符合条件的行是否存在，例如：
　　用户从表单提交的用户名$username、密码$password是否在用户表“user”中，并返回其相应的数组：
if($user=$db->getfirst("select * from user where username='$username' and password='$password' "))
echo "欢迎 $username ，您的ID是 $user[id] 。";
else
echo "用户名或密码错误！";
*/
function getfirst($sql){
mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
return @mysql_fetch_array($this->query($sql));

}

/*
　　以下函数返回符合查询条件的总行数，例如用于分页的计算等要用到，例如：
$totlerows=$db->getcount("select * from mytable");
echo "共有 $totlerows 条信息。";
*/
function getcount($sql){
return @mysql_num_rows($this->query($sql)); 
}

/*
　　以下函数用于更新数据库，例如用户更改密码：
$db->update("update user set password='$new_password' where userid='$userid' ");
*/
function update($sql){
return $this->query($sql);
}

/*
　　以下函数用于向数据库插入一行，例如添加一个用户：
$db->insert("insert into user (userid,username,password) values (null,'$username','$password')");
*/
function insert($sql){
return $this->query($sql);
}

//$db->del("delete from admin where user='".$user."'");
function del($sql){
return $this->query($sql);
}

function getid(){ //这个函数用于取得刚插入行的id
return mysql_insert_id();
}
}

/*
　　主要函数就是这些，如果你自己有另外的需要，也可以自己添加上去。
　　因为凡使用该类的都必须连接数据库，下面就连接并选择好数据库吧：
*/
$db=new dbClass("$db_username","$db_password","$db_database","$db_hostname");
$db->connect();
$db->select();

?>