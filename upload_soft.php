<style>
<!--
body {font-size: 9pt;
margin:0px;
padding:0px;}
.p9{ font-size: 9pt; font-family: ����}
.tx { width: 200 ;height: 20px; font-size: 9pt; border: 1px solid; border-color: black black #000000; color: #0000FF}
.tx1 { width: 50 ;height: 20px; font-size: 9pt; border: 1px solid; border-color: black black #000000; color: #ff0000}
-->
</style>
<?
//�ϴ�ͼƬ   
//userfile   Ϊ�ϴ�ʱ�ļ�ѡ����name   
$up_img_path="./upfiles/jianli/";   
$tmp_name   = $_FILES['jianli']['tmp_name'];   
if(!empty($tmp_name))   
{   
  $newfile_type = $_FILES["jianli"]["type"];   
  $newfile_size = $_FILES["jianli"]["size"];   
  $newfile_name = $_FILES["jianli"]["name"];   
  $MAX_FILE_SIZE = 10240000;   
  $newname = explode(".",$newfile_name);   
  //$str = str_replace(" ","",$str);
  //$newname = date('YmdHi')."_".rand(10,99).$newname_new;
  //$welke = date('YmdHis')."_".rand(100,999);
  $welke = date('YmdHis').rand(100,999);
  if (($newfile_type == "application/zip")OR($newfile_type == "application/msword"))   
  {   
    if (($newfile_size) <= ($MAX_FILE_SIZE))   
    {   
     if (file_exists($tmp_name))   
     {   
      if (!file_exists('"'.$up_img_path.$newfile_name.'"')){   
        $path = $HTTP_SERVER_VARS["DOCUMENT_ROOT"];   
        $new_tmp_name = tempnam("$path/temp/","uploadpc");   
        move_uploaded_file($tmp_name,$new_tmp_name);   
        $tmp_name = $new_tmp_name;   
		if($newfile_type == "application/zip")   
          $ext = ".zip";  
		if($newfile_type == "application/msword")   
          $ext = ".doc";   
          $newname=strtolower($welke.$ext);   
          copy($tmp_name,$up_img_path.$newname);   
          chmod($up_img_path.$newname,0755);   
          list($x,$y)=GetImageSize($up_img_path.$newname);   
          //$uploadstat="�ļ��ϴ��ɹ�".$newname; 
		  $uploadstat="�ļ��ϴ��ɹ�"; 
          unlink($tmp_name);   
        }   
        else 
		{
		$uploadstat="-����:�ϴ��ļ��Ѿ�����";
		echo "<div style=padding-top:0px;padding-bottom:5px;><font color=red>".$uploadstat."</font> [<a href=upload_soft.htm>�����ϴ�</a>]</div>";
		die();
		}
       }   
       else 
	   {  
       $uploadstat="-����:�ϴ��ļ��Ѿ�����";  
		echo "<div style=padding-top:0px;padding-bottom:5px;><font color=red>".$uploadstat."</font> [<a href=upload_soft.htm>�����ϴ�</a>]</div>";
		die();
		}
      }   
      else   
	  {
        $uploadstat="-����:�ϴ��ļ�̫��";  
		echo "<div style=padding-top:0px;padding-bottom:5px;><font color=red>".$uploadstat."</font> [<a href=upload_soft.htm>�����ϴ�</a>]</div>";
		die();
		}
      }   
    else   
	  {
      $uploadstat= "-����:�ϴ��ļ�������doc,zip��ʽ";  
		echo "<div style=padding-top:0px;padding-bottom:5px;><font color=red>".$uploadstat."</font> [<a href=upload_soft.htm>�����ϴ�</a>]</div>";
		die();
		}
  }   
  else  
  { 
    $uploadstat="-����ѡ��Ҫ�ϴ����ļ�."; 
	echo "<div style=padding-top:0px;padding-bottom:5px;><font color=red>".$uploadstat."</font> [<a href=upload_soft.htm>�����ϴ�</a>]</div>";
	die();
   }
   
  //exit();
  echo "<div style=padding-top:0px;padding-bottom:5px;><font color=red>".$uploadstat."</font> [<a href=upload_soft.htm>�����ϴ�</a>]</div>";
  echo "<script language=javascript>";
  echo "parent.form1.jianli.value='".$newname."';";
  echo "</script>";
exit;
//echo $uploadstat;
?>
