<?php
	session_start();
	
	$mNickname = $_SESSION["mNickname"];
	$account = $_SESSION["account"];
	$new_password = $_SESSION["new_password"];
?>

<!doctype html>
<html>
  <head>
    <title>疫廚GO【修改結果】</title>
    <meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<style>
		
		table
		{
			width:25%;
			background-color:#E2DEDA;
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
				<td colspan="2"><h1 align="center">修改結果</h1></td>
			</tr>
			
			<tr>	
				<td colspan="2" align="center"><h3><?php echo $mNickname ?> 您好，您的資料修改結果如下</h3></td>
			</tr>
				
			<tr>
				<td class="account" align="right">帳號：</td>
				<td><?php echo $account ?></td>
			</tr>
			
			<tr>
				<td class="password" align="right">密碼：</td>
				<td><?php echo $new_password ?></td>
			</tr>
			
			<tr>	
				<td colspan="2" align="center"><button class="btn1" onclick="location.href='signIn.htm'" ><strong>返回登入頁面</strong></button></td>
			</tr>
		
		</table>
		
	
    </body>
</html>