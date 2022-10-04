<?php
  require_once("dbtools.inc.php");
  session_start();
  header("Content-type: text/html; charset=utf-8");
  
  //取得表單資料
  $account = $_POST["account"]; 
  $email = $_POST["email"];

  //建立資料連接
  $link = create_connection();
			
  //檢查查詢的帳號是否存在
  $sql = "SELECT mNo,mNickname,mPassword FROM member WHERE mAccount = '$account' AND mEmail = '$email'";
  $result = execute_sql($link, "db_c108193104", $sql);
  
  
  //如果帳號不存在
  if (mysqli_num_rows($result) == 0)
  {
    //顯示訊息告知使用者，查詢的帳號並不存在
    echo "<script type='text/javascript'>
            alert('您所查詢的資料不存在，請檢查「帳號」與「電子信箱」是否輸入錯誤且相符。');
            history.back();
          </script>";
  }
  else  //如果帳號存在
  {
    $row1 = mysqli_fetch_object($result);
    $mNickname = $row1->mNickname;
    $password = $row1->mPassword;

	$_SESSION["mNickname"] = $mNickname;
	$_SESSION["account"] = $account;
	$_SESSION["password"] = $password;
  ?>
  
    <script>window.location.href='modify_pwd.php';</script>
	
  <?php  
  }

  //釋放 $result 佔用的記憶體
  mysqli_free_result($result);
		
  //關閉資料連接	
  mysqli_close($link);
?>