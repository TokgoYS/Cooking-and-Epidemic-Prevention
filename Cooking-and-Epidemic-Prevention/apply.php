<?php
	require_once("dbtools.inc.php");
	session_start(); 
	date_default_timezone_set('Asia/Taipei');
	
	$link = create_connection();
	
	$mNo = $_COOKIE["id"];
	$sql = "SELECT mNickname,mPhoto_filename FROM member WHERE mNO =".$mNo;
	$result = execute_sql($link, "db_c108193104", $sql);
	
	$row = mysqli_fetch_object($result);
	$nickname = $row->mNickname;
    $file_name = $row->mPhoto_filename;
	
	$jNo = $_SESSION["id"];
	
	if(isset($_POST['btn-save']))  //判斷有無被碰過
	{
		$aDate = $_POST["aDate"];
		$aTime = $_POST["aTime"];
		$aContact = $_POST["aContact"];
		
		//執行SQL查詢
		$sql1 = "INSERT INTO applys(aDate,aTime,aContact,reply_jNo,reply_mNo) VALUES('$aDate','$aTime','$aContact','$jNo','$mNo')";
		execute_sql($link, "db_c108193104", $sql1);
		
		header("location:show_news.php?id=" . $jNo);
		exit();
	}
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset = "utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>疫廚GO【申請頁面】</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
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
		
		hr 
		{
            border: 0;
            clear:both;
            display:block;
            width: 10%;               
            background-color:#000000;
            height: 2px;
        }
		
		#btn
		{
			position:relative;left:800px;top:20px;
		}
		
		table
		{
			width:20%;
			background-color:#E2DEDA;
			border:1px #DDD solid;
			padding:10px;
		}
		
		td
		{
			padding:5px;
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


	<center>
		<div id="body" style="padding-top:150px">
			<div id="content">
				<form name="myForm" method="post" action="">
					<table align="center" style="cellspacing:20px">
						<tr align='center'><td bgcolor='#8F7B69' colspan='2' style='padding:20px'></td></tr>
						<tr>
							<td align="center" colspan="2"><h1 style="font-weight:bold">申請頁面</h1></td>
						</tr>
						<tr>
							<td align="center" colspan="2"><h4 style="font-weight:bold" >跟我約個時間吧!</h4></td>
						</tr>
						
						<tr>
							<td class="account" align="right">預約日期：</td>
							<td><input type="date" name="aDate" placeholder="日期" required /></td>
						</tr>
						<tr>
							<td class="account" align="right">預約時間：</td>
							<td><input type="time" name="aTime" placeholder="時間" required /></td>
						</tr>
						<tr>
							<td class="account" align="right">聯絡電話：</td>
							<td><input type="text" name="aContact" placeholder="聯絡電話" required /></td>
						</tr>
						<tr>
							<td align="center" colspan="2" style="padding:20px">
								<button id="btn1" type="submit" name="btn-save"><strong>提交</strong></button>
							    <button id="btn2"  name="btn-cancel" onclick="location.href='news.php'"><strong>取消</strong></button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</center>
</body>
</html>