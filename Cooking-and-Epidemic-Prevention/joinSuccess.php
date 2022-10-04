<?php
	session_start();
	$account = $_SESSION["account"];
	$password = $_SESSION["password"];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>疫廚GO【註冊】</title>
	<style>
		
		table
		{
			width:25%;
			background-color:#E2DEDA	;
			border:1px #DDD solid;
			padding:10px;
		}
		
		td
		{
			padding:5px;
		}
		
		.btn1
		{
			font-size:20px;
			color:#FFF;
			width:200px;height:50px;
			background-color:#F04646;
			border:none;
			margin-top:30px;
			font-weight:bold
			
		}
		
		button:hover
		{
			background-color:#AAA;

		}
		
		.account
		{
			font-size:20px;
		}
		
		.password
		{
			font-size:20px;
		}
		
	</style>
  </head>
  
  
  <body style="background-color:#F3EBE0">
	<p align="center"><a href="index.php"><img src="image/brand.png" alt="brand" style="width:300px"></a></p>
	
    <table align="center">
		<tr>
			<td colspan="2"><h1 align="center">註冊成功</h1></td>
		</tr>
		
		<tr>	
			<td colspan="2" align="center"><h3>恭喜您已經註冊成功了，您的資料如下</h3></td>
		</tr>
			
		<tr>
			<td class="account" align="right">帳號：</td>
			<td><?php echo $account ?></td>
		</tr>
		
		<tr>
			<td class="password" align="right">密碼：</td>
			<td><?php echo $password ?></td>
		</tr>
		
		<tr>	
			<td colspan="2" align="center"><button class="btn1" onclick="location.href='signIn.htm'" >返回登入頁面</button></td>
		</tr>
		
	</table>
  </body>
</html>