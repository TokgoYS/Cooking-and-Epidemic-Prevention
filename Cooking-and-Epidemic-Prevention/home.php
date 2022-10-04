<?php
	require_once("dbtools.inc.php");
	$link = create_connection();
	$mNo = $_COOKIE["id"];
	
	$sql = "SELECT mNickname,mPhoto_filename FROM member WHERE mNO =".$mNo;
	$result = execute_sql($link, "db_c108193104", $sql);
	
	$row = mysqli_fetch_object($result);
	$nickname = $row->mNickname;
    $file_name = $row->mPhoto_filename;
?>

<!DOCTYPE html>
<html>
<head>
	<title>疫廚GO【首頁】</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:300,700,900&display=swap" rel="stylesheet">
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
	
		*{
			margin: 0;
			padding: 0;
			list-style: none;
			font-family: 'Noto Sans TC', sans-serif;
		}
		.banner
		{
			margin-top:165px;
			width: 100%;
			height: 700px;
			background-color: #ccc;
			background:
			   linear-gradient(115deg, #8F7B69 50%, transparent 50%) center center / 100% 100%,
			   url("./image/cook.gif") right center / auto 100%;
		}
		.container
		{
			width: 100%;
			max-width: 1440px;
			height: 100%;
			margin: auto;
		}
		.banner-txt
		{
			height: 100%;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: flex-start;
		}
		.banner-txt h1
		{
			font-size: 80px;
			border-bottom: 5px solid #333;
			font-weight: 900;
			padding-bottom: .3em;
			margin-bottom: .3em;
			color:#fff;
		}
		.banner-txt h1 small
		{
			display: block;
			font-size: 53px;
			font-weight: 700;
		}
		.banner-txt h2
		{
			font-size: 50px;
			font-weight: 700;
		}
		.banner-txt p
		{
			font-size: 20px;
			font-weight: 300;
		}
		
		span
		{
			color: white; 
			font-size: 60pt; 
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

<div class="banner" >
	<div class="container">
		<div class="banner-txt">
			<h1>生活&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h1>
			
			<h2>就要有<span>滋</span>有<span>味</span></h2>
			
		</div>
		
	</div>
		
</div>
	
</body>
</html>
