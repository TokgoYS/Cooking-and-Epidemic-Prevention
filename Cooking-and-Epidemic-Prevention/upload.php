<?php
  require_once("dbtools.inc.php");
  
  $dish = $_POST["dish"];
  $stuff = $_POST["stuff"]; 
  $difficulty = $_POST["difficulty"];
  $remarks = $_POST["remarks"];
  
  
  
  //建立資料連接
  $link = create_connection();
	  
  if (isset($_COOKIE["passed"]))
  {
	  
    $id = $_COOKIE["id"];
	
        //若檔案名稱不是空字串，表示上傳成功，將暫存檔案移至指定之目錄
        if ($_FILES["myfile"]["name"] != "")
        {
          $src_file = $_FILES["myfile"]["tmp_name"];
          $src_file_name = $_FILES["myfile"]["name"];
          $src_ext = strtolower(strrchr($_FILES["myfile"]["name"], "."));
          $desc_file_name = uniqid() . ".jpg";
	
          $photo_file_name = "./Photo/food/$desc_file_name";
          $thumbnail_file_name = "./Thumbnail/food/$desc_file_name";
	
          resize_photo($src_file, $src_ext, $photo_file_name, 600);
          resize_photo($src_file, $src_ext, $thumbnail_file_name, 150);
	        
          /*$sql = "insert into jphoto(jPhoto_name,jPhoto_filename,jPhoto_mId) values('$src_file_name', '$desc_file_name','$id')";
          execute_sql($link, "db_c108193104", $sql);*/
		  
		  $sql = "insert into journal(jDate,jDish,jStuff,jDifficulty,jRemarks,jPhoto_name,jPhoto_filename,j_mId) values(NOW(),'$dish','$stuff','$difficulty','$remarks','$src_file_name','$desc_file_name','$id')";
		  execute_sql($link, "db_c108193104", $sql);
		  
        }

    //關閉資料連接		
    mysqli_close($link);
  
    header("location:add_news.php");
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
