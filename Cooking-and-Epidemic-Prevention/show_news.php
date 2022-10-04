<?php
	session_start();
	$id=$_GET['id'];
	$_SESSION["id"] = $id;
	
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>疫廚GO【詳細資訊】</title>
	<link rel="stylesheet" href="bootstrap.css" type="text/css" />
    <script src="jquery.js"></script>    
    <style type="text/css">
			nav
			{
				font-size:18px
			}
			
			body
			{
				font-size:18px
			}
			
			#btn1
			{
				width:100px;height:40px;
				font-size:20px;
				background-color:#F04646;
				border:none;
				color:#FFF;
				font-weight:bold;
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
			.data
			{
				text-align:right;
				
				
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
	
    <center style="margin-top:120px;margin-bottom:30px"><h1 style="font-weight:bold">詳細資訊</h1></center>
    
	
	<?php	
      require_once("dbtools.inc.php");
			
      //取得要顯示之記錄
      $id = $_GET["id"];
				
      //建立資料連接
      $link = create_connection();
			
      //執行SQL查詢
      $sql = "SELECT * FROM journal WHERE jNo = $id";
      $result = execute_sql($link, "db_c108193104", $sql);
	  
				
      echo "<table width='800'  align='center' style='padding:10px'>";
      
						  
      //顯示原討論主題的內容
      while ($row = mysqli_fetch_assoc($result))
      {
		$file_name1 = $row["jPhoto_filename"];
		$j_mId = $row["j_mId"];
		$sql2 = "SELECT mNickname FROM member WHERE mNo=".$j_mId;
		$result2 = execute_sql($link, "db_c108193104", $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		  
        echo "<tr align='center' style='font-weight:bold'>";
        echo "<td bgcolor='#C9B386' colspan='2' style='padding:10px'>料理名稱：" . $row["jDish"] . "&nbsp;&nbsp;&nbsp;";
        echo "教學者：" . $row2["mNickname"] . "　";
        echo "刊登時間：" . $row["jDate"] . "</td></tr>";				
        
		echo "<tr height='400'><td  width='400' style='background-color:#8F7B69;padding:0px'>";
		echo "<img src='Photo/food/$file_name1' alt='food' width='100%' style='border-width:1px'></td>";
		echo "<td  width='400' bgcolor='E2DEDA' style='padding:10px'>";
		echo "<table>";
		echo "<tr><td class='data'>難度：</td><td><input type='text' disabled value='".$row["jDifficulty"]."' style='width:275px'/></td></tr>";
		echo "<tr><td style='padding:5px'></td></tr>";
		echo "<tr><td class='data'>所需材料：</td><td><textarea cols='28' rows='4' disabled>".$row["jStuff"]."</textarea></td></tr>";
		echo "<tr><td style='padding:5px'></td></tr>";
		echo "<tr><td class='data'>備註說明：</td><td><textarea cols='28' rows='4' disabled>".$row["jRemarks"]."</textarea></td></tr>";
		echo "</table></td>";
		
		
		?>
		<tr>
		
		<td></td>
		
		<td align="right" style="padding-top:10px">
		<button id="btn1" value="add_data" onclick="location.href='apply.php'">申請</button>
		<button id="btn2" value="add_data" onclick="location.href='news.php'">返回</button>
		</td>
		</tr>
  <?php
      }	
      echo "</table>";		
	  
      //釋放 $result 佔用的記憶體空間
      mysqli_free_result($result);
      mysqli_close($link);  
    ?>
  </body>                                                                                 
</html>