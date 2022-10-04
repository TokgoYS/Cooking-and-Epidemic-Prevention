<?php
  require_once("dbtools.inc.php");
  session_start();
  header("Content-type: text/html; charset=utf-8");
	
  $account = $_POST["account"]; 	
  $password = $_POST["password"];

  $link = create_connection();
					
  $sql = "SELECT * FROM member WHERE mAccount = '$account' AND mPassword = '$password'";
  
  
  $result = execute_sql($link, "db_c108193104", $sql);
  	

  if (mysqli_num_rows($result) == 0)
  {
    mysqli_free_result($result);
	
    mysqli_close($link);
		
    echo "<script type='text/javascript'>";
    echo "alert('帳號密碼錯誤，請查明後再登入');";
    echo "history.back();";
    echo "</script>";
  }
	
  else
  {
    $id = mysqli_fetch_object($result)->mNo;
	$name = mysqli_fetch_object($result)->mName;
	
    mysqli_free_result($result);
    mysqli_close($link);


    setcookie("id", $id);
    setcookie("passed", "TRUE");		
    header("location:home.php");		
  }
?>