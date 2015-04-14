<?php
	session_start();
	$conn=@mysql_connect("localhost","root","123456");
	if($conn==null)
	{
		die("数据库连接失败");
	}
	mysql_query("set names 'utf8'");
	if(!mysql_select_db("BreakFast"))
	{
		die("数据库连接失败");
	}
	
	define("SAFEITY", "HTML5");
		
	function check_login($id, $status, $need)
	{
		$sql = "select * from sysaccount where id = $id";
		$que = mysql_query($sql);
		$flag = is_array($row = mysql_fetch_array($que));
		$status = $flag ? $status == md5($row['username'].$row['password'].SAFEITY) : false;
		if($status)
		{
			if($row['acc'] >= $need)
			{
				return $row;
			}
			else
			{
				echo "对不起，您的权限不足";
				exit();
			}
		}
		else
		{
			echo "对不起，您无权访问！";
			exit();
		}
	}
	
	function check_overtime($time)
	{
		
	}
?>