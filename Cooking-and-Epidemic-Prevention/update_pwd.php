<?php
	require_once("dbtools.inc.php");
	$link = create_connection();
	session_start();
	
	$account = $_SESSION["account"];
	
	$new_password = $_POST["new_password"]; 
	$re_password = $_POST["re_password"];
	
	$_SESSION["new_password"] = $new_password;
		
		if($new_password == $re_password)
		{
			//執行SQL查詢
			$sql = "UPDATE member SET mPassword ='$new_password' WHERE mAccount = '$account'";
			execute_sql($link, "db_c108193104", $sql);
			
			mysqli_close($link);
			
			header("location:modify_pwdSuccess.php");
		}
		else
		{
			echo "<script type='text/javascript'>
					alert('「新密碼確認」欄位與「新密碼」欄位一定要相同。');
					history.back();
				</script>";
		}
?>