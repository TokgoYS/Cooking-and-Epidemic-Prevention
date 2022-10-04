<?php
	require_once("dbtools.inc.php");
	$link = create_connection();
	session_start();
	$mNo = $_COOKIE["id"];
	
	$sql1 = "SELECT mNickname,mPhoto_filename FROM member WHERE mNO =".$mNo;
	$result1 = execute_sql($link, "db_c108193104", $sql1);
	
	$row = mysqli_fetch_object($result1);
	$nickname = $row->mNickname;
    $file_name = $row->mPhoto_filename;
	
	//檢查 cookie 中的 passed 變數是否等於 TRUE
	$passed = $_COOKIE["passed"];
		
	/* 如果 cookie 中的 passed 變數不等於 TRUE，
		表示尚未登入網站，將使用者導向首頁 index.html */
	if ($passed != "TRUE")
	{
		header("location:index.php");
		exit();
	}
	
	/* 如果 cookie 中的 passed 變數等於 TRUE，
		表示已經登入網站，則取得使用者資料 */
	else
	{
		//取得 modify.php 網頁的表單資料
		
		$dish = $_POST["dish"];
		$difficulty = $_POST["difficulty"];
		$stuff = $_POST["stuff"];
		$remarks = $_POST["remarks"];
		$jNo = $_SESSION["id"];
		
					
		//執行 UPDATE 陳述式來更新使用者資料
		$sql = "UPDATE journal SET jDish ='$dish',jDifficulty='$difficulty',jStuff='$stuff',jRemarks='$remarks' WHERE jNo =". $jNo;
		execute_sql($link, "db_c108193104", $sql);
			
		//關閉資料連接
		mysqli_close($link);
	}		
?>

<!DOCTYPE html>
<html>
  <head>
    <title align="center">疫廚GO【修改刊登】</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.css" type="text/css" />
    <script src="jquery.js"></script>
	<style>
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
		
		hr 
		{
            border: 0;
            clear:both;
            display:block;
            width: 10%;               
            background-color:#000000;
            height: 2px;
        }
		
		table
		{
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
	
	<p style="padding-top:150px"></p>
    <center>
		<table align="center" width="500px">
	  <tr align='center'><td bgcolor='#8F7B69' colspan='2' style='padding:20px'></td></tr>
		<tr> 
			<td style="height:20px"></td>
		</tr>
		<tr>
		<td align="center" colspan="2"><h1 style="font-weight:bold">資料修改成功</h1></td>
	  </tr>
		<tr>
			<td align="center" colspan="2"><h4 style="font-weight:bold" ><?php echo $nickname ?>，恭喜您資料修改成功</h4></td>
		</tr>
		<tr><td align="center" style='padding:20px'><button class="btn1" onclick="location.href='myNews.php'" ><strong>返回個人刊登頁面</strong></td></tr>
     </table>
    </center>        
  </body>
</html>