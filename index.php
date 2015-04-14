<?php
	require_once("config.php");
	if(!$_SESSION['user_acc'])
	{
		header("Location:login.php");
	}
	$ARR = array();
	$sql = "select * from sysmeau";
	$rs = mysql_query($sql);
	while($row = mysql_fetch_assoc($rs))	
	{
		array_push($ARR,$row['name']);
	}
?>
<!DOCTYPE html>
<html lang = "zh-cmn-Hans">
<head>
<meta charset = "utf-8">
<title>早餐预定系统-HTML5</title>
<meta name = "keywords" content = "">
<meta name = "description" content = "">
<meta name = "author" content = "">
<link rel = "stylesheet" href = "css/style.css" type = "text/css">
<meta >
</head>
<?php
	if(isset($_POST['submit']))
	{
		$info = array();
		for($i = 0; $i < count($_POST['num']); $i++)
		{
			$info[urlencode($ARR[$i])] = $_POST['num'][$i];
		}
		$info = urldecode(json_encode($info));
		$name = $_SESSION['name'];
		$sql = "update sysaccount set iteminfo = '$info' where name = '$name'";
		mysql_query($sql);
		header("Location:index.php?id=ok");
	}
?>
<body>
<form name = "" action = "" method = "post" onsubmit = "" >
<table width = "300"  border = "0" align = "center" cellpadding = "5" cellspacing = "1" bgcolor="#C2C2C2"> 
	<tr>
		<th bgcolor = "#FFFF00">
			<?php
				$sql="select * from systitle";
				$rs=mysql_query($sql);
				$row=mysql_fetch_assoc($rs);
				echo $row["title"];
			?>
		</th>
	</tr>
<?php 
	for($i = 0; $i < count($ARR); $i++)
	{
?>
	<tr>
		<td bgcolor="#FFFFFF">&nbsp;&nbsp;<label><?php echo $ARR[$i] ?></label><input name = "num[]" type = "number" value = "0" min = "0" max = "100" style = "float:right"></input></td>
	</tr>
<?php 
	}
?>
	<tr>
		<td bgcolor="#FFFFFF" align = "center" ><input type = "submit" name = "submit" value = "确定"></td>
	</tr>
</table>
</form>
<?php 
	if(isset($_GET["id"]) && ($_GET["id"]=="ok")){
?>
<table width = "300" border = "0" align = "center" cellpadding = "5" cellspacing = "1" bgcolor = "#c2c2c2">
	<tr>
		<th bgcolor = "#FFFFCC" colspan = '2'>
			您今天的订单
		</th>
	</tr>
	<tr>
		<td bgcolor = "#FFFFFF" align = "center">
			用户
		</td>
		<td bgcolor = "#FFFFFF" align = "center">
			<?php 
				echo $_SESSION['name'];
			?>
		</td>
	</tr>
	<tr>
		<td bgcolor = "#FFFFFF" align = "center">
			内容
		</td>
		<td bgcolor = "#FFFFFF" align = "center">
		<?php 
			$name = $_SESSION['name'];
			$sql="select * from sysaccount where name = '$name'";
			$ss = mysql_fetch_assoc(mysql_query($sql));
			$con = json_decode($ss['iteminfo'],true);
			$view = "";
			foreach($con as $key => $value)
			{
				$view = $view.$key."*".$value." ";
			}
			echo $view;
		?>
		</td>
	</tr>
</table>
<?php 
}
?>
</body>
</html>