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
    <title>疫廚GO【刊登頁面】</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="bootstrap.css" type="text/css" />
	<script src="jquery.js"></script>
	<script type="text/javascript">
	
		function check_data()
		{
			if (document.myForm.dish.value.length == 0)
			{
				alert("請填寫「料理名稱」欄位");
				return false;
			}
			if (document.myForm.stuff.value.length == 0)
			{
				alert("請填寫「所需材料」欄位");
				return false;
			}
			if (document.myForm.myfile.value.length == 0)
			{
				alert("請務必上傳「照片」");
				return false;
			}
			
			myForm.submit();					
		}
    </script>
	
	<style>
 
		body{
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
			width:100px;height:40px;
			font-size:20px;
			background-color:#F04646;
			border:none;
			color:#FFF;
			font-weight:bold;
			margin:10px
		}
		
		table
		{
			width:35%;
			background-color:#E2DEDA;
			border:1px #DDD solid;
			padding:10px;
		}
		
		td
		{
			padding:5px;
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
	
  
    <div style="padding-top:150px">
    <form action="upload.php" method="post" name="myForm" enctype="multipart/form-data">
      <table align="center" >
        <tr align='center'><td bgcolor='#8F7B69' colspan='2' style='padding:20px'></td></tr>
		<tr>
			<td colspan="4"><h1 align="center"><strong>刊登頁面</strong></h1></td>
		</tr>
        <tr> 
          <td align="right">料理名稱：</td>
          <td colspan="3"><input name="dish" type="text" size="15" required></td>
        </tr>
		<tr> 
          <td align="right">難度：</td>
          <td colspan="3"> 
		  <select name="difficulty"> 
			<option value="低等">低等</option>
			<option value="中等">中等</option>
			<option value="高等">高等</option>
		  </select>
          </td>
        </tr>	
        <tr> 
          <td align="right">所需材料：</td>
          <td colspan="3"><textarea name="stuff" cols="50" rows="3"></textarea></td>
        </tr>
        <tr>
          <td align="right">備註說明：</td>
          <td colspan="3"><textarea name="remarks" cols="50" rows="5"></textarea></td>
        </tr> 
		<tr>
          <td align="right">照片：</td>
		  <td><input type="file" name="myfile" size="50" ><span style="font-size:15px">(請上傳照片)<span></td>
        </tr>
        <tr> 
          <td align="center" colspan="4" style="padding:20px"><input id="btn" type="button" value="刊登" onClick="check_data()"><input id="btn" type="reset" value="重新設定"></td>
        </tr>
      </table>
    </form>
	</div>
  </body>
</html>