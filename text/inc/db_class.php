<?php

$db_username="root"; //�������ݿ���û���
$db_password="1111"; //�������ݿ������
$db_database="jiaoda"; //���ݿ���
$db_hostname="localhost"; //��������ַ

class dbClass{ //��ʼ���ݿ���
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
function connect(){ //������������������ݿ�
$this->link=mysql_connect($this->hostname,$this->username,$this->password) or die("Sorry,can not connect to database");
return $this->link;
}


function select(){ //�����������ѡ�����ݿ�
 mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
mysql_select_db($this->database,$this->link);
}

function query($sql){ //������������ͳ���ѯ��䲢���ؽ�������á�
if($this->result=mysql_query($sql,$this->link))
{
 mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
 return $this->result;
}
else {
//��������ʾSQL���Ĵ�����Ϣ����Ҫ����ƽ׶�������ʾ����ʽ���н׶οɽ��������ע�͵���
//echo "SQL������ <font color=red>$sql</font> <BR><BR>������Ϣ�� ".mysql_error();
return false;
}
}
/*
�������º������ڴӽ��ȡ�����飬һ���� while()ѭ����$db->query($sql) ���ʹ�ã����磺
$result=$db->query("select * from xzy_teachfl order by tpx");
while($row=$db->getarray($result)){
echo "$row[id] ";
}
*/
function getarray($result){
 mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
return @mysql_fetch_array($result);
}

/*
�������º�������ȡ��SQL��ѯ�ĵ�һ�У�һ�����ڲ�ѯ�������������Ƿ���ڣ����磺
�����û��ӱ��ύ���û���$username������$password�Ƿ����û���user���У�����������Ӧ�����飺
if($user=$db->getfirst("select * from user where username='$username' and password='$password' "))
echo "��ӭ $username ������ID�� $user[id] ��";
else
echo "�û������������";
*/
function getfirst($sql){
mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
return @mysql_fetch_array($this->query($sql));

}

/*
�������º������ط��ϲ�ѯ���������������������ڷ�ҳ�ļ����Ҫ�õ������磺
$totlerows=$db->getcount("select * from mytable");
echo "���� $totlerows ����Ϣ��";
*/
function getcount($sql){
return @mysql_num_rows($this->query($sql)); 
}

/*
�������º������ڸ������ݿ⣬�����û��������룺
$db->update("update user set password='$new_password' where userid='$userid' ");
*/
function update($sql){
return $this->query($sql);
}

/*
�������º������������ݿ����һ�У��������һ���û���
$db->insert("insert into user (userid,username,password) values (null,'$username','$password')");
*/
function insert($sql){
return $this->query($sql);
}

//$db->del("delete from admin where user='".$user."'");
function del($sql){
return $this->query($sql);
}

function getid(){ //�����������ȡ�øղ����е�id
return mysql_insert_id();
}
}

/*
������Ҫ����������Щ��������Լ����������Ҫ��Ҳ�����Լ������ȥ��
������Ϊ��ʹ�ø���Ķ������������ݿ⣬��������Ӳ�ѡ������ݿ�ɣ�
*/
$db=new dbClass("$db_username","$db_password","$db_database","$db_hostname");
$db->connect();
$db->select();

?>