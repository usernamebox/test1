<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" align="center">
	<select name="select" onChange="if (this.options(this.selectedIndex).value!='#') window.open(this.options(this.selectedIndex).value);">
        <option value="#" selected="selected">=== У�ڻ������� ===</option>
<?php
$result=$db->query("select * from linking where cat=0 order by id desc");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
while($row=$db->getarray($result)){
?>
        <option value="<?=$row[url]?>"><?=$row[title]?></option>
<?php } ?>
      </select>
    </td>
  </tr>
  <tr>
    <td height="30" align="center">
	<select name="select2" onChange="if (this.options(this.selectedIndex).value!='#') window.open(this.options(this.selectedIndex).value);">
        <option value="#" selected="selected">=== У��������� ===</option>
<?php
$result1=$db->query("select * from linking where cat=1 order by id desc");
//mysql_query("set names 'gb2312'");//�����ָ�����ݿ��ַ�����һ������������ݿ�����ϵ��
while($row1=$db->getarray($result1)){
?>
        <option value="<?=$row1[url]?>"><?=$row1[title]?></option>
<?php } ?>
      </select>
    </td>
  </tr>
</table>