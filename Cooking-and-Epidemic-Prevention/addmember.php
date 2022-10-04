<?php
  require_once("dbtools.inc.php");
  session_start();
  
  $account = $_POST["account"];
  $password = $_POST["password"]; 
  $name = $_POST["name"];
  $nickName = $_POST["nickName"];  
  $mId = $_POST["mId"];
  $sex = $_POST["sex"];
  $birthday = $_POST["birthday"]; 
  $telephone = $_POST["telephone"]; 	
  $address = $_POST["address"];
  $email = $_POST["email"]; 
  $job = $_POST["job"];
  //$joinDate = "CURDATE()";
  
  $_SESSION["account"] = $account;
  $_SESSION["password"] = $password;

  $link = create_connection();
		
  $sql = "SELECT * FROM member WHERE mAccount = '$account'";
  $result = execute_sql($link, "db_c108193104", $sql);

	

  if (mysqli_num_rows($result) != 0)
  {
    mysqli_free_result($result);
		
    echo "<script type='text/javascript'>";
    echo "alert('您所指定的帳號已經有人使用，請使用其它帳號');";
    echo "history.back();";
    echo "</script>";
  }
	
  else
  {
	
	if(($_FILES["myfile"]["name"])!= "")
	{
		$src_file = $_FILES["myfile"]["tmp_name"];
		$src_file_name = $_FILES["myfile"]["name"];
		$src_ext = strtolower(strrchr($_FILES["myfile"]["name"], "."));
		$desc_file_name = uniqid() . ".jpg";
		
		$photo_file_name = "./Photo/headshot/$desc_file_name";
		$thumbnail_file_name = "./Thumbnail/headshot/$desc_file_name";
		
		resize_photo($src_file, $src_ext, $photo_file_name, 600);
		resize_photo($src_file, $src_ext, $thumbnail_file_name, 150);
		
		$sql1 = "insert into member(mAccount,mPassword,mName,mNickName,mId,mSex,mBirthday,mPhone,mAddress,mEmail,mJob,mJoinDate,mPhoto_name,mPhoto_filename) VALUES('$account','$password','$name','$nickName','$mId','$sex','$birthday','$telephone','$address','$email','$job',CURDATE(),'$src_file_name','$desc_file_name')";
		
		execute_sql($link, "db_c108193104", $sql1);
	}
	
	header("location:joinSuccess.php");
	
  }
	
	function resize_photo($src_file, $src_ext, $dest_name, $max_size)
	{
		switch ($src_ext)
		{
			case ".jpg":
				$src = imagecreatefromjpeg($src_file);
				break;
			case ".png":
				$src = imagecreatefrompng($src_file);
				break;
			case ".gif":
				$src = imagecreatefromgif($src_file);
				break;
		}
		
		$src_w = imagesx($src);
		$src_h = imagesy($src);
		
		//建立新的空圖片
		if($src_w > $src_h)
		{
			$thumb_w = $max_size;
			$thumb_h = intval($src_h / $src_w * $thumb_w);
		}
		else
		{
			$thumb_h = $max_size;
			$thumb_w = intval($src_w / $src_h * $thumb_h);
		}
	
		$thumb = imagecreatetruecolor($thumb_w, $thumb_h);
		
		//進行複製並縮圖
		imagecopyresized($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);
		
		//儲存相片
		imagejpeg($thumb, $dest_name, 100);
		
		//釋放影像佔用的記憶體
		imagedestroy($src);
		imagedestroy($thumb); 
   }	
  
?>
