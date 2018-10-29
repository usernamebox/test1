<?php
echo '<style type="text/css">
<!--
body {margin:0;}
table{font: 12px;}
-->
</style>';
echo "<title>上传信息</title>\n";
$act=$_GET['act'];
$max_size=$_POST['max_file_size'];    //获取浏览器设置的最大允许上传字节数
$pic=$_FILES['pic'];                //获取文件信息数组
$file_dir='./upfiles/';                   //定义保存文件的目录
$file_type=array(jpg,swf,gif,png,rar,zip,doc,mp3,ppt,txt,wma,mp3,mp4,wav,rmvb,rm,asf,dat,mdb,exe,rar,tar,rpm,db);        //定义允许上传的文件类型
$err_msg=array();               //定义错误信息数组
function fmax()
{
//检查文件是否超过8M
        global $pic;
        if(count($pic)==0){      //当上传文件大于8M时表单没有信息传递过来
                return false;
        }
        return true;
}

function check_type()
{
//获取并检查文件类型
        global $pic,$err_msg,$ext,$file_type;
        $ext_name=explode('.',$pic['name']);      //以.为分界断开文件名,取得数组$ext_name
        $ext1=array_slice($ext_name,-1,1);
        if(count($ext_name)==1 or $ext1[0]==""){      //防止名为jpg等但没有扩展名的文件以及文件名不全的文件上传
                $err_msg[]="没有输入文件名或扩展名。";
                return false;
        }else{
                $ext_name=array_slice($ext_name,-1,1);     //数组中只留下最后一个值为扩展名的字符串
                $ext=strtolower($ext_name[0]);             //取得扩展名,并转换为小写,以免识别有误
                if(in_array($ext,$file_type)){             //检查扩展名是否包含在数组$file_type中
                        return true;
                }else{
                        $err_msg[]="系统不支持.{$ext}文件上传。";
                        return false;
        }
    }
}

function check_size()
{
//检查文件大小
        global $pic,$err_msg,$max_size;
        $maxsize=floor($max_size/1024);        //转换为KB便于显示
        if($pic['size']==0){
                if($pic['error']==2){          //文件信息数组$pic[size]为0,$pic[error]为2时,应该是文件太大
                        $err_msg[]="要上传的文件大小超过{$maxsize}K。";
                        return false;
                }else{                         //文件信息数组$pic[size]为0,$pic[error]为其它值时会有这两种情况
                        $err_msg[]="要上传的文件不存在，或者大小为0字节。";
                        return false;
                }
        }elseif($pic['size']>$max_size){                        //为了防止绕过服务器提供的表单上传大文件
                $err_msg[]="要上传的文件大小超过{$maxsize}K。";
                return false;
        }
        return true;
}

function new_name()
{
//上传文件重新命名
        global $pic,$ext,$file_dir,$newname;
        //$seq=0;
        //$uptime=filectime($pic['tmp_name']);              //获取文件时间
		$uptime = date('YmdHis').rand(100,999);
        while(file_exists($file_dir.$uptime.'.'.$ext)){     //以时间命名文件,后面附加数字防止重名
                $seq++;
        }
        $newname=$file_dir.$uptime.'.'.$ext;
        return $newname;
}

echo"<table width=300 align=center>\n";
if(fmax()){                                 //调用fmax()检查文件是否超过8M
        $check_type=check_type();
        $check_size=check_size();
        if($check_type and $check_size){              //检查全部通过,处理上传文件
                if(move_uploaded_file($pic['tmp_name'],new_name())){  //检查文件是否通过POST上传,并把文件移到指定目录
                        echo"<tr><td><b>上传文件成功</b>";
				        if($act=='down')
						{
						  echo "<script language=javascript>";
                          echo "parent.form1.url.value='".$newname."';";
                          echo "</script>";
						 }
						 elseif($act=='photo')
						{
						  echo "<script language=javascript>";
                          echo "parent.form1.photo.value='".$newname."';";
                          echo "</script>";
						 }
						 elseif($act=='jianli')
						{
						  echo "<script language=javascript>";
                          echo "parent.form1.jianli.value='".$newname."';";
                          echo "</script>";
						 }
                }else{
                        echo"<tr><td><font color=red><b>错误信息</b></font></td></tr>\n<tr><td>\n";
                        echo"非法的上传方式。";
                }
        }else{                                        //输出错误信息
                $msg=count($err_msg);
                $n=0;
                echo"<tr><td><font color=red><b>错误信息</b></font></td></tr>\n<tr><td>\n";
                while($msg>$n){
                        echo $n+1,"、",$err_msg[$n],"<br>\n";
                        $n++;
                }
        }
}else{
        echo"<tr><td><font color=red><b>错误信息</b></font></td></tr>\n<tr><td>\n";
        echo"要上传的文件太大了。";
}
echo"&nbsp;&nbsp;<a href=\"#\" onclick=\"history.go(-1)\">返回</a></td></tr>\n";
echo"</table>";
?>