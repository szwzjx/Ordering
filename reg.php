<?php
	require_once("config.php");
	echo "注册页面"."<br>";
	if(isset($_POST['submit']))
	{
		$username = str_replace(" ","",$_POST['username']);
		$password = md5($_POST['password'].SAFEITY);
		echo $username."  ".$password."<br>";
		$sql = "insert into sysaccount (name,password) values ('$username','$password')";
		$que = mysql_query($sql);
		$row = mysql_affected_rows($conn);
		if($row > 0)
		{
			echo "注册成功！";
			header("Location:login.php");
		}
		else
		{
			echo "注册失败！";
		}
	}
?>
<form action = "" method = "post" align = "center">
账  号：<input type = "text" name = "username"></br>
密  码：<input type = "password" name = "password"></br>
<input type = "submit" value = "注册" name = "submit">
</form>