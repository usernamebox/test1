<?php
echo '<style type="text/css">
<!--
body {margin:0;}
table{font: 12px;}
-->
</style>';
echo "<title>�ϴ���Ϣ</title>\n";
$act=$_GET['act'];
$max_size=$_POST['max_file_size'];    //��ȡ��������õ���������ϴ��ֽ���
$pic=$_FILES['pic'];                //��ȡ�ļ���Ϣ����
$file_dir='./upfiles/';                   //���屣���ļ���Ŀ¼
$file_type=array(jpg,swf,gif,png,rar,zip,doc,mp3,ppt,txt,wma,mp3,mp4,wav,rmvb,rm,asf,dat,mdb,exe,rar,tar,rpm,db);        //���������ϴ����ļ�����
$err_msg=array();               //���������Ϣ����
function fmax()
{
//����ļ��Ƿ񳬹�8M
        global $pic;
        if(count($pic)==0){      //���ϴ��ļ�����8Mʱ��û����Ϣ���ݹ���
                return false;
        }
        return true;
}

function check_type()
{
//��ȡ������ļ�����
        global $pic,$err_msg,$ext,$file_type;
        $ext_name=explode('.',$pic['name']);      //��.Ϊ�ֽ�Ͽ��ļ���,ȡ������$ext_name
        $ext1=array_slice($ext_name,-1,1);
        if(count($ext_name)==1 or $ext1[0]==""){      //��ֹ��Ϊjpg�ȵ�û����չ�����ļ��Լ��ļ�����ȫ���ļ��ϴ�
                $err_msg[]="û�������ļ�������չ����";
                return false;
        }else{
                $ext_name=array_slice($ext_name,-1,1);     //������ֻ�������һ��ֵΪ��չ�����ַ���
                $ext=strtolower($ext_name[0]);             //ȡ����չ��,��ת��ΪСд,����ʶ������
                if(in_array($ext,$file_type)){             //�����չ���Ƿ����������$file_type��
                        return true;
                }else{
                        $err_msg[]="ϵͳ��֧��.{$ext}�ļ��ϴ���";
                        return false;
        }
    }
}

function check_size()
{
//����ļ���С
        global $pic,$err_msg,$max_size;
        $maxsize=floor($max_size/1024);        //ת��ΪKB������ʾ
        if($pic['size']==0){
                if($pic['error']==2){          //�ļ���Ϣ����$pic[size]Ϊ0,$pic[error]Ϊ2ʱ,Ӧ�����ļ�̫��
                        $err_msg[]="Ҫ�ϴ����ļ���С����{$maxsize}K��";
                        return false;
                }else{                         //�ļ���Ϣ����$pic[size]Ϊ0,$pic[error]Ϊ����ֵʱ�������������
                        $err_msg[]="Ҫ�ϴ����ļ������ڣ����ߴ�СΪ0�ֽڡ�";
                        return false;
                }
        }elseif($pic['size']>$max_size){                        //Ϊ�˷�ֹ�ƹ��������ṩ�ı��ϴ����ļ�
                $err_msg[]="Ҫ�ϴ����ļ���С����{$maxsize}K��";
                return false;
        }
        return true;
}

function new_name()
{
//�ϴ��ļ���������
        global $pic,$ext,$file_dir,$newname;
        //$seq=0;
        //$uptime=filectime($pic['tmp_name']);              //��ȡ�ļ�ʱ��
		$uptime = date('YmdHis').rand(100,999);
        while(file_exists($file_dir.$uptime.'.'.$ext)){     //��ʱ�������ļ�,���渽�����ַ�ֹ����
                $seq++;
        }
        $newname=$file_dir.$uptime.'.'.$ext;
        return $newname;
}

echo"<table width=300 align=center>\n";
if(fmax()){                                 //����fmax()����ļ��Ƿ񳬹�8M
        $check_type=check_type();
        $check_size=check_size();
        if($check_type and $check_size){              //���ȫ��ͨ��,�����ϴ��ļ�
                if(move_uploaded_file($pic['tmp_name'],new_name())){  //����ļ��Ƿ�ͨ��POST�ϴ�,�����ļ��Ƶ�ָ��Ŀ¼
                        echo"<tr><td><b>�ϴ��ļ��ɹ�</b>";
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
                        echo"<tr><td><font color=red><b>������Ϣ</b></font></td></tr>\n<tr><td>\n";
                        echo"�Ƿ����ϴ���ʽ��";
                }
        }else{                                        //���������Ϣ
                $msg=count($err_msg);
                $n=0;
                echo"<tr><td><font color=red><b>������Ϣ</b></font></td></tr>\n<tr><td>\n";
                while($msg>$n){
                        echo $n+1,"��",$err_msg[$n],"<br>\n";
                        $n++;
                }
        }
}else{
        echo"<tr><td><font color=red><b>������Ϣ</b></font></td></tr>\n<tr><td>\n";
        echo"Ҫ�ϴ����ļ�̫���ˡ�";
}
echo"&nbsp;&nbsp;<a href=\"#\" onclick=\"history.go(-1)\">����</a></td></tr>\n";
echo"</table>";
?>