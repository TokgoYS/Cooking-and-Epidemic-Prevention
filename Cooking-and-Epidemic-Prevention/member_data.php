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
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>疫廚GO【個人首頁】</title>
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
		
		#btn
		{
			width:100px;height:40px;
			font-size:20px;
			background-color:#F04646;
			border:none;
			color:#FFF;
			font-weight:bold;
			margin:10px
		}
		
		#keyword
		{
			font-size:15px;
		}
		
		.data
		{
			text-align:right;
			
		}
		
		td
		{
			font-size:20px;
			padding:2px;
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
			
			width:150px;height:40px;
			font-size:20px;
			background-color:#F04646;
			border:none;
			color:#FFF;
			font-weight:bold;
		}
		
		.headshot 
		{
			width: 40px;
			border-radius: 50%;
			border: 1px solid;	
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
	
    <center style="margin-top:120px;margin-bottom:30px"><h1 style="font-weight:bold">會員資料</h1></center>
    
	
	<?php	
      
			
      //取得要顯示之記錄
      $id = $_COOKIE["id"];
     
      //執行SQL查詢
      $sql = "SELECT * FROM member WHERE mNo = $id";
      $result = execute_sql($link, "db_c108193104", $sql);
	  
				
      echo "<table width='800'  align='center' style='padding:10px'>";
      
						  
      //顯示原討論主題的內容
      while ($row = mysqli_fetch_assoc($result))
      {
		$file_name = $row["mPhoto_filename"];
		  
        echo "<tr align='center'>";
        echo "<td bgcolor='#C9B386' colspan='2' style='padding:20px'></td></tr>";				
		echo "<tr height='400'><td  width='400' style='background-color:#8F7B69;padding:0px'>";
		echo "<img src='Photo/headshot/$file_name' width='100%' style='border-width:1px'></td>";
		echo "<td  width='400' align='center' bgcolor='E2DEDA' style='padding:10px'>";
		echo "<table>";
		echo "<tr><td class='data'>會員姓名：</td><td><input type='text' disabled value='".$row["mName"]."'/> </td></tr>";
		echo "<tr><td class='data'>會員暱稱：</td><td><input type='text' disabled value='".$row["mNickname"]."'/> </td></tr>";
		echo "<tr><td class='data'>會員性別：</td><td><input type='text' disabled value='".$row["mSex"]."'/> </td></tr>";
		echo "<tr><td class='data'>電子信箱：</td><td><textarea cols='23' rows='2' disabled>".$row["mEmail"]."</textarea></td></tr>";
		echo "<tr><td class='data'>生日：</td><td><input type='text' disabled value='".$row["mBirthday"]."'/> </td></tr>";
		echo "<tr><td class='data'>行動電話：</td><td><input type='text' disabled value='".$row["mPhone"]."'/> </td></tr>";
		echo "<tr><td class='data'>住址：</td><td><textarea cols='23' rows='2' disabled>".$row["mAddress"]."</textarea></td></tr>";
		echo "<tr><td class='data'>個人簡介：</td><td><textarea cols='23' rows='3' disabled>".$row["mProfile"]."</textarea></td></tr>";
		echo "<tr><td class='data'>加入日期：</td><td><input type='text' disabled value='".$row["mJoinDate"]."'/> </td></tr>";
		echo"</table>";
		?>
		<tr>
		
		<td></td>
		
		<td align="right" style="padding-top:10px">
		<button id="btn1" value="edit_data" onclick="location.href='myNews.php'">我的刊登</button>
		<button id="btn2" value="edit_data" onclick="location.href='modify.php'">修改個人資料</button>
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