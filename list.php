<?php
	require_once("config.php");
	echo "打印信息"."<br>";
?>
<form action = "" method = "post" align = "center">
	<table width = "300" align = "center" border = "0" bgcolor = "#c2c2c2">
		<tr bgcolor = "#FFFFCC">
			<th>用户名</th><th>订单</th>
		</tr>
		<tr bgcolor = "#FFFFFF">
			<th>种类</th><th>订单</th>
		</tr>
		<?php 
			$sql = "select * from sysaccount";
			$que = mysql_query($sql);
			while($row = mysql_fetch_assoc($que))
			{
				if($row['iteminfo'] != null && $row['iteminfo'] != "")
				{
		?>
		<tr bgcolor = "#FFFFFF">
			<td><?php echo $row['name'];?></td><td><?php echo $row['iteminfo'];?></td>
		</tr>
		<?php 
				}
			}
		?>
	</table>
</form>