<?php 
session_start();
?>
<?php include('../inc/site.php');?>
<?php include('./islogin.php'); ?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title><?=$sitename?>����̨����</title>
<meta name="author" content="Alanliu">
<style type=text/css>
body  { background:#799AE1; font:Verdana 12px; 
SCROLLBAR-FACE-COLOR: #799AE1; SCROLLBAR-HIGHLIGHT-COLOR: #799AE1; 
SCROLLBAR-SHADOW-COLOR: #799AE1; SCROLLBAR-DARKSHADOW-COLOR: #799AE1; 
SCROLLBAR-3DLIGHT-COLOR: #799AE1; SCROLLBAR-ARROW-COLOR: #FFFFFF;
SCROLLBAR-TRACK-COLOR: #AABFEC;
}
table  { border:0px; }
td  { font:normal 12px Verdana, Arial, Helvetica, sans-serif;}
img  { vertical-align:bottom; border:0px; }
a  { font:normal 12px Verdana, Arial, Helvetica, sans-serif; color:#000000; text-decoration:none; }
a:hover  { color:#428EFF;text-decoration:underline; }
.sec_menu  { border-left:1px solid white; border-right:1px solid white; border-bottom:1px solid white; overflow:hidden; background:#D6DFF7; }
.menu_title  { }
.menu_title span  { position:relative; top:0px; left:8px; color:#000000; font-weight:bold; }
.menu_title2  { }
.menu_title2 span  { position:relative; top:0px; left:8px; color:#999999; font-weight:bold; }
</style>
<SCRIPT language=javascript1.2>
function showmenu_item(sid)
{
	which = eval("menu_item" + sid);
	if (which.style.display == "none")
	{
		var i = 1
		while(i<9){
			eval("menu_item"+ i +".style.display=\"none\";");
			eval("menuTitle"+ i +".background=\"images/title_bg_show.gif\";");
			i++;
		}
		eval("menu_item" + sid + ".style.display=\"\";");
		eval("menuTitle"+ sid + ".background=\"images/title_bg_hide.gif\";")
	}else{
		eval("menu_item" + sid + ".style.display=\"none\";");
		eval("menuTitle"+ sid + ".background=\"images/title_bg_show.gif\";")
	}
}
</SCRIPT>
<table width="158" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="158" height="38" background="images/title.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="151" height="16"></td>
        </tr>
        <tr>
          <td></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="25" class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background=images/title_bg_quit.gif bgcolor="#7898E0"><span><a href="admin.php" target="main"><strong>������ҳ</strong></a> 
      | <a href="logout.php" target="_top"><strong>�˳�</strong></a></span></td>
    </tr>
  </table>
  <br>
  <table cellpadding=0 cellspacing=0 width=158>
    <tr>
     <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/title_bg_show.gif" id=menuTitle1 onClick="showmenu_item(1)"><span>�γ̹���</span>    </td>
    </tr>
    <tr>
      <td style="display:none;" id='menu_item1'><div class=sec_menu style="width:158">
          <table width="97%"  border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="4"></td>
            </tr>
            <tr>
              <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="notice.php?act=add" target="main">��ӹ���</a></td>
            </tr>
            <tr>
              <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="notice.php?act=list" target="main">�������</a></td>
            </tr>
          </table>
      </div>
          <div  style="width:158">
            <table cellpadding=0 cellspacing=0 align=center width=135>
              <tr>
                <td height=20></td>
              </tr>
            </table>
        </div></td>
    </tr>
  </table>
      <table cellpadding=0 cellspacing=0 width=158>
        <tr>
          <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/title_bg_show.gif" id=menuTitle2 onClick="showmenu_item(2)"><span>�ɹ�չʾ</span>          </td>
        </tr>
        <tr>
          <td style="display:none" id='menu_item2'><div class=sec_menu style="width:158">
              <table width="97%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="4"></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="flavor.php?act=add" target="main">��ӳɹ�</a></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="flavor.php?act=list" target="main">�ɹ�����</a></td>
                </tr>
              </table>
          </div>
              <div  style="width:158">
                <table cellpadding=0 cellspacing=0 align=center width=135>
                  <tr>
                    <td height=20></td>
                  </tr>
                </table>
            </div></td>
        </tr>
      </table>
       <table cellpadding=0 cellspacing=0 width=158>
        <tr>
          <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/title_bg_show.gif" id=menuTitle3 onClick="showmenu_item(3)"><span>�������</span> 
          </td>
        </tr>
        <tr>
          <td style="display:none" id='menu_item3'><div class=sec_menu style="width:158">
              <table width="97%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="4"></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="news.php?act=add" target="main">�������</a></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="news.php?act=list" target="main">���Ź���</a></td>
                </tr>
              </table>
          </div>
              <div  style="width:158">
                <table cellpadding=0 cellspacing=0 align=center width=135>
                  <tr>
                    <td height=20></td>
                  </tr>
                </table>
            </div></td>
        </tr>
      </table>
<table cellpadding=0 cellspacing=0 width=158>
        <tr>
          <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/title_bg_show.gif" id=menuTitle4 onClick="showmenu_item(4)"><span>��ʦ�μ�</span>          </td>
        </tr>
        <tr>
          <td style="display:none" id='menu_item4'><div class=sec_menu style="width:158">
              <table width="97%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="4"></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="active.php?act=add" target="main">��ӿμ�</a></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="active.php?act=list" target="main">�μ�����</a></td>
                </tr>
              </table>
          </div>
              <div  style="width:158">
                <table cellpadding=0 cellspacing=0 align=center width=135>
                  <tr>
                    <td height=20></td>
                  </tr>
                </table>
            </div></td>
        </tr>
      </table>
<table cellpadding=0 cellspacing=0 width=158>
        <tr>
          <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/title_bg_show.gif" id=menuTitle5 onClick="showmenu_item(5)"><span>��ѧ���</span> 
          </td>
        </tr>
        <tr>
          <td style="display:none" id='menu_item5'><div class=sec_menu style="width:158">
              <table width="97%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="4"></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="inheritance.php?act=add" target="main">��Ӵ��</a></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="inheritance.php?act=list" target="main">��ٹ���</a></td>
                </tr>
				<tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="book.php?act=list" target="main">ѧ����������</a></td>
                </tr>
				<tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="daoshi.php?act=list" target="main">������ʦ����</a></td>
                </tr>
              </table>
          </div>
              <div  style="width:158">
                <table cellpadding=0 cellspacing=0 align=center width=135>
                  <tr>
                    <td height=20></td>
                  </tr>
                </table>
            </div></td>
        </tr>
      </table>
<table cellpadding=0 cellspacing=0 width=158>
        <tr>
          <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/title_bg_show.gif" id=menuTitle6 onClick="showmenu_item(6)"><span>������ҵ</span>          </td>
        </tr>
        <tr>
          <td style="display:none" id='menu_item6'><div class=sec_menu style="width:158">
              <table width="97%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="4"></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="sunshine.php?act=add" target="main">�����ҵ</a></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="sunshine.php?act=list" target="main">��ҵ����</a></td>
                </tr>
              </table>
          </div>
              <div  style="width:158">
                <table cellpadding=0 cellspacing=0 align=center width=135>
                  <tr>
                    <td height=20></td>
                  </tr>
                </table>
            </div></td>
        </tr>
      </table>	  
<table cellpadding=0 cellspacing=0 width=158>
        <tr>
          <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/title_bg_show.gif" id=menuTitle7 onClick="showmenu_item(7)"><span>��Ա����</span> 
          </td>
        </tr>
        <tr>
          <td style="display:none" id='menu_item7'><div class=sec_menu style="width:158">
              <table width="97%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="4"></td>
                </tr>
 <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="user.php?act=add" target=main>������Ա</a></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="user.php?act=list" target="main">��Ա�б�</a></td>
                </tr>
              </table>
          </div>
              <div  style="width:158">
                <table cellpadding=0 cellspacing=0 align=center width=135>
                  <tr>
                    <td height=20></td>
                  </tr>
                </table>
            </div></td>
        </tr>
      </table>
<table cellpadding=0 cellspacing=0 width=158>
        <tr>
          <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/title_bg_show.gif" id=menuTitle8 onClick="showmenu_item(8)"><span>�γ���Դ</span> 
          </td>
        </tr>
        <tr>
          <td style="display:none" id='menu_item8'><div class=sec_menu style="width:158">
              <table width="97%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="4"></td>
                </tr>
 <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="board.php?act=list" target=main>�������</a></td>
                </tr>
 
              </table>
          </div>
              <div  style="width:158">
                <table cellpadding=0 cellspacing=0 align=center width=135>
                  <tr>
                    <td height=20></td>
                  </tr>
                </table>
            </div></td>
        </tr>
      </table>	 
<table cellpadding=0 cellspacing=0 width=158>
        <tr>
          <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/title_bg_show.gif" id=menuTitle9 onClick="showmenu_item(9)"><span>��������</span> 
          </td>
        </tr>
        <tr>
          <td style="display:none" id='menu_item9'><div class=sec_menu style="width:158">
              <table width="97%"  border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="4"></td>
                </tr>
 <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="link.php?act=list" target=main>��������</a></td>
                </tr>
                <tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="about.php?act=list" target="main">��������</a></td>
                </tr>
		<tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="contact.php?act=list" target="main">��ϵ����</a></td>
                </tr>
<tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="tags.php?act=list" target="main">�ؼ�������</a></td>
                </tr>
<tr>
                  <td height="20"><img src="images/bullet.gif" alt width="15" height="20" border="0" align="absmiddle"><a href="download.php?act=list" target="main">��������</a></td>
                </tr>
              </table>
          </div>
              <div  style="width:158">
                <table cellpadding=0 cellspacing=0 align=center width=135>
                  <tr>
                    <td height=20></td>
                  </tr>
                </table>
            </div></td>
        </tr>
      </table>	  
     <br>            
<table width="158" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="158" height="25" background="images/admin_left_9.gif"><strong class="menu_title">&nbsp;��Ȩ����</strong></td>
    </tr>
    <tr valign="top">
      <td bgcolor="#D0D8F0"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="148" height="28" class="sec_menu">
 <table width="97%"  border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="4"></td>
                          </tr>
                          <tr>
                     <td height="20"><img src="images/bullet.gif" width="15" height="20" align="absmiddle">�ٷ���ҳ��<?php echo $sitename; ?></td>
                          </tr>
                          <tr>
              <td height="20"><img src="images/bullet.gif" width="15" height="20" align="absmiddle">��ǰ�汾��Version1.0</td>
                          </tr>
                     </table></td>
          </tr>
      </table></td>
    </tr>
  </table>
</body>
</html>
