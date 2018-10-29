<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" align="center">
	<select name="select" onChange="if (this.options(this.selectedIndex).value!='#') window.open(this.options(this.selectedIndex).value);">
        <option value="#" selected="selected">=== 校内机构链接 ===</option>
<?php
$result=$db->query("select * from linking where cat=0 order by id desc");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
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
        <option value="#" selected="selected">=== 校外机构链接 ===</option>
<?php
$result1=$db->query("select * from linking where cat=1 order by id desc");
//mysql_query("set names 'gb2312'");//这就是指定数据库字符集，一般放在连接数据库后面就系了
while($row1=$db->getarray($result1)){
?>
        <option value="<?=$row1[url]?>"><?=$row1[title]?></option>
<?php } ?>
      </select>
    </td>
  </tr>
</table>