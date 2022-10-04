<?php
	session_start();
	$password = $_SESSION["password"];
?>

<!doctype html>
<html>
  <head>
    <title>疫廚GO【設定密碼】</title>
    <meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
	
		function check_data()
		{
			if (document.myForm.new_password.value.length < 8)
			{
				alert("「使用者密碼」不可以少於 8 個字元");
				return false;
			}
			
			if (document.myForm.new_password.value.length > 10)
			{
				alert("「使用者密碼」不可以超過 10 個字元");
				return false;
			}
			
			if (document.myForm.new_password.value != document.myForm.re_password.value)
			{
				alert("「新密碼確認」欄位與「新密碼」欄位一定要相同");
				return false;
			}
			
			myForm.submit();					
		}
    </script>
		
	<style>
		
		table
		{
			width:28%;
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
		input[type="text"]
		{
			width:150px;
			height:25px;
		}
		.btn1
		{
			width:250px;height:40px;
			font-size:20px;
			background-color:#F04646;
			border:none;
			color:#FFF;
			margin:10px;
			font-weight:bold;
		}
		
	</style>
	
	
  </head>
  <body style="background-color:#F3EBE0">
		
		<p align="center"><a href="index.php"><img src="image/brand.png" alt="brand" style="width:300px"></a></p>
  
		<form name="myForm" method="post" action="update_pwd.php">
		<table align="center">
			<tr>
				<td colspan="2"><h1 align="center">設定密碼</h1></td>
			</tr>
			
			<tr>	
				<td colspan="2" align="center"><h3>請您的設定新密碼</h3></td>
			</tr>
				
			<tr>
				<td class="password" align="right">舊密碼：</td>
				<td><?php echo $password ?></td>
			</tr>
			
			<tr>
				<td class="password" align="right">新密碼：</td>
				<td><input type="text" name="new_password" size="10"></td>
			</tr>
			
			<tr> 
				<td class="password" align="right">新密碼確認：</td>
				<td><input  type="text" name="re_password" type="re_password" size="15">
				(請再輸入一次密碼)</td>
			</tr>
			<tr> 
				<td style="height:10px"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input class="btn1" type="button" value="修改" onClick="check_data()">
				</td>
			</tr>
		</table>
    </body>
</html>