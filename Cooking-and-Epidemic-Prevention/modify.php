<?php
	require_once("dbtools.inc.php");
	$link = create_connection();
	$mNo = $_COOKIE["id"];
	
	$sql1 = "SELECT mNickname,mPhoto_filename FROM member WHERE mNO =".$mNo;
	$result1 = execute_sql($link, "db_c108193104", $sql1);
	
	$row = mysqli_fetch_object($result1);
	$nickname = $row->mNickname;
    $file_name = $row->mPhoto_filename;
	
  //檢查 cookie 中的 passed 變數是否等於 TRUE 
  $passed = $_COOKIE["passed"];
	
  //如果 cookie 中的 passed 變數不等於 TRUE
  //表示尚未登入網站，將使用者導向首頁 index.html
  if ($passed != "TRUE")
  {
    header("location:index.php");
    exit();
  }
	
  //如果 cookie 中的 passed 變數等於 TRUE
  //表示已經登入網站，取得使用者資料	
  else
  {
		
    $id = $_COOKIE["id"];
				
    //執行 SELECT 陳述式取得使用者資料
    $sql = "SELECT * FROM member WHERE mNo = $id";
    $result = execute_sql($link, "db_c108193104", $sql);
		
    $row = mysqli_fetch_assoc($result);  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>疫廚GO【修改個人資料】</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.css" type="text/css" />
    <script src="jquery.js"></script>
    <script type="text/javascript">
	
      function check_data()
      {
        myForm.submit();					
      }
    </script>

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
		
		#btn
		{
			position:relative;left:800px;top:20px;
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
	
	<p style="padding-top:150px"></p>
    <form name="myForm" method="post" action="member_update.php">
      <table align="center" width="800px">
	  <tr align='center'><td bgcolor='#8F7B69' colspan='2' style='padding:20px'></td></tr>
	  
	  <tr>
		<td align="center" colspan="2"><h1 style="font-weight:bold">修改個人資料</h1></td>
	  </tr>
		<tr> 
			<td style="height:20px"></td>
		</tr>
        <tr> 
          <td align="right">會員姓名：</td>
          <td><input type="text" name="name" size="8" value="<?php echo $row["mName"] ?>"></td>
        </tr>
		<tr> 
          <td align="right">會員暱稱：</td>
          <td><input type="text" name="nickname" size="8" value="<?php echo $row["mNickname"] ?>"></td>
        </tr>
        <tr> 
          <td align="right">會員性別：</td>
          <td> 
		  
		  <select name="sex"> 
			<option value="男">男</option>
			<option value="女">女</option>
		  </select>
          </td>
        </tr>
		<tr > 
          <td align="right">電子信箱：</td>
          <td><input type="text" name="email" size="30" value="<?php echo $row["mEmail"] ?>"></td>
        </tr>
        <tr > 
          <td align="right">生日：</td>
          <td>
            <input type="text" name="birthday"  value="<?php echo $row["mBirthday"] ?>"> 
          </td>
        </tr>
        <tr > 
          <td align="right">行動電話：</td>
          <td> 
            <input type="text" name="telephone" size="20" value="<?php echo $row["mPhone"] ?>">
            （請依照 09xx-xxx-xxx格式）
          </td>
        <tr > 
          <td align="right">住址：</td>
          <td><input type="text" name="address" size="45" value="<?php echo $row["mAddress"] ?>"></td>
        </tr>
		<tr > 
          <td align="right">個人簡介：</td>
          <td><textarea name="profile" cols="50" rows="4"><?php echo $row["mProfile"]?></textarea></td>
        </tr>
        <tr align="center"> 
          <td colspan="2" align="center" style="padding:15px"> 
            <input id="btn1" type="submit" value="修改資料" onClick="check_data()">
            <input id="btn2" type="button" value="返回" onclick="location.href='member_data.php'">
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
<?php
    //釋放資源及關閉資料連接
    mysqli_free_result($result);
    mysqli_close($link);
  }
?>