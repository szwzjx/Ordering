<?php
	require_once("config.php");
	echo "登录页面";
	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "select * from sysaccount where  name = '$username'";
		$que = mysql_query($sql);
		$flag = is_array($row = mysql_fetch_array($que));
		$ok = $flag ? md5($password.SAFEITY) == $row['password'] : false;
		if($ok)
		{
			$_SESSION['name'] = $row['name'];
			$_SESSION['acc'] = $row['acc'];
			$_SESSION['user_acc'] = md5($row['name'].$row['password'].SAFEITY);
			//$_SESSION['times'] = mktime();
			echo "登录成功！";
			header("Location:index.php");
		}
		else
		{
?>
<script>
	alert("用户名或密码错误！");
</script>
<?php
			session_destroy();
		}
	}
?>
<!DOCTYPE html>
<html lang = "zh-cmn-Hans">
<head>
<meta charset = "utf-8">
<title>登录</title>
<meta name = "keywords" content = "">
<meta name = "description" content = "">
<meta name = "author" content = "">
<link rel = "stylesheet" href = "css/style.css" type = "text/css">
<meta >
</head>
<body>
<form action = "" method = "post" >
<table width = "300"  border = "0" align = "center" cellpadding = "5" cellspacing = "1" bgcolor="#C2C2C2"> 
<tr bgcolor="#FFFFFF" align = "center">
	<td>账  号：</td><td><input type = "text" name = "username"></td>
</tr>
<tr bgcolor="#FFFFFF" align = "center">
	<td>密  码：</td><td><input type = "password" name = "password"></td>
</tr>
<tr bgcolor="#FFFFFF" align = "center" >
	<td colspan = "2"><input type = "submit" value = "登录" name = "submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type = "button" value = "注册" name = "register" onClick = "location.href = 'reg.php'"></td>
</tr>
</table>
</form>
</body>
</html>