<?php 
	require_once("dbtools.inc.php");
	$link = create_connection();
	$mNo = $_COOKIE["id"];
	
	$sql1 = "SELECT mNickname,mPhoto_filename FROM member WHERE mNO =".$mNo;
	$result1 = execute_sql($link, "db_c108193104", $sql1);
	
	$row = mysqli_fetch_object($result1);
	$nickname = $row->mNickname;
    $file_name = $row->mPhoto_filename;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>疫廚GO【我的刊登】</title>
	<link rel="stylesheet" href="bootstrap.css" type="text/css" />
	<script src="jquery.js"></script>   
    <style type="text/css">
		body
		{
			height: 300px;
		}
		
		nav
		{
			font-size:18px
		}
		
		body
		{
			font-size:18px
		}
		
		#btn
		{
			position:relative;left:800px;top:20px;
		}
		
		#keyword
		{
			font-size:15px;
		}
		
		.headshot 
		{
			width: 40px;
			border-radius: 50%;
			border: 1px solid;
		}
		
		#btn2
		{
			width:100px;height:40px;
			font-size:20px;
			background-color:#F04646;
			border:none;
			color:#FFF;
			font-weight:bold;
		}
	</style>        
  </head>
  
  <body style="background-color:#F3EBE0">
	
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="collapse navbar-collapse navbar-ex1-collapse" style="background-color:#BF9347;padding:5px">
			
			<ul class="nav navbar-nav">
				<li><img src="image/brand.png" alt="brand" style="width:150px"></li>
				<li style="padding:10px"><a href="home.php" style="color:#FFF;font-weight:bold;font-size:20px">首頁</a></li>
				<li style="padding:10px"><a href="news.php" style="color:#FFF;font-weight:bold;font-size:20px">教學申請</a></li>
				<li style="padding:10px"><a href="add_news.php" style="color:#FFF;font-weight:bold;font-size:20px">刊登頁面</a></li>
			</ul>
			
			<form class="navbar-form navbar-left" role="search">
							
				<div class="form-group" style="padding:10px">		
					<input id="keyword" type="text" class="form-control" placeholder="請輸入關鍵字">
				</div>
												
				<button type="submit" class="btn btn-default" style="padding:5px;width:50px;height:30px;font-size:15px">搜尋</button>
			</form>
						
			<ul class="nav navbar-nav navbar-right">
				<li style="padding:5px"><a href="#" style="color:#FFF;font-weight:bold;font-size:20px"><?php echo  "<img src='Thumbnail/headshot/".$file_name."' class='headshot' alt='headshot' >"; ?> &nbsp &nbsp <?php echo $nickname; ?></a></li>
				<li style="padding:12px"><a href="member_data.php" style="color:#FFF;font-weight:bold;font-size:20px">個人首頁</a></li>	
				<li style="padding:12px"><a href="logout.php" style="color:#FFF;font-weight:bold;font-size:20px">登出</a></li>
				<li style="padding:12px"><a href="#" style="color:#FFF;font-weight:bold;font-size:20px"></a></li>
			</ul>
		</div>
	</nav>
	
	
    <p align="center" style="padding-top:150px;"><h1 align="center" style="font-weight:bold">我的刊登</h1></p>
	<p style="margin-bottom:30px"></p>
    
	<?php
      require_once("dbtools.inc.php");
			
      $records_per_page = 5;
			
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
				
      $link = create_connection();
					
      $sql = "SELECT * FROM journal WHERE j_mId = '$mNo' ORDER BY jDate DESC";
      $result = execute_sql($link, "db_c108193104", $sql);
	  
				
      //取得記錄數
      $total_records = mysqli_num_rows($result);
			
      //計算總頁數
      $total_pages = ceil($total_records / $records_per_page);
			
      //計算本頁第一筆記錄的序號
      $started_record = $records_per_page * ($page - 1);
			
      //將記錄指標移至本頁第一筆記錄的序號
      mysqli_data_seek($result, $started_record);

      echo "<table width='800' align='center' cellspacing='3'>";
			
      //使用 $bg 陣列來儲存表格背景色彩
      for($i=0;$i<5;$i++)
	  {
		  $bg1[$i] = "#C9B386";
	  }

	  for($i=0;$i<5;$i++)
	  {
		  $bg2[$i] = "#E2DEDA";
	  }					
	  
      //顯示記錄
      $j = 1;
      while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
      {
		$file_name = $row["jPhoto_filename"];
		$j_mId = $row["j_mId"];
		$sql2 = "SELECT mNickname FROM member WHERE mNo=".$j_mId;
		$result2 = execute_sql($link, "db_c108193104", $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		  
		echo "<table width='800' align='center' cellspacing='3' cellpadding='8'>";
        echo "<tr>";
        echo "<td width='120' align='center' rowspan='2' style='background-color:#8F7B69'><img src='Thumbnail/food/$file_name' style='border-width:1px'></td>";
        
		echo "<td bgcolor='" . $bg1[($j - 1)%5] . "' align='center'  style='padding:8px;font-weight:bold'>" . $row["jDish"] . "</td></tr>";
		echo "<tr>";
		echo "<td bgcolor='" . $bg2[($j - 1)%5] . "' style='padding:8px'>教學者：" . $row2["mNickname"] . "<br>";
        echo "刊登時間：" . $row["jDate"] . "<br>";
		echo "難度：" . $row["jDifficulty"] . "<br><hr style='border-top:2px dashed'/>";
		echo "<div align='right'><a href='show_myNews.php?id=";
        echo $row["jNo"] . "' style='color:#000;font-weight:bold'>詳細資訊</a></div></td></tr></table>";
		echo "<br>";		
        $j++;
      }
	  
	  ?>
		<table width="800" align="center" cellspacing="3">
		<tr>
		<td align="right" style="padding-top:10px" >
			<button id="btn2" value="add_data" onclick="location.href='member_data.php'">返回</button>
		</td>
		</tr>
		</table>
  <?php
      echo "</table>" ;
			
      //產生導覽列
      echo "<p align='center'>";
			
      if ($page > 1)
        echo "<a href='news.php?page=". ($page - 1) . "'>上一頁</a> ";
				
      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='news.php?page=$i'>$i</a> ";		
      }
			
      if ($page < $total_pages)
        echo "<a href='news.php?page=". ($page + 1) . "'>下一頁</a> ";			
				
      echo "</p>";
	  
	  echo "<p style='padding:10px'></p>";
			
      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($link);
    ?> 		
     
  </body>
</html>