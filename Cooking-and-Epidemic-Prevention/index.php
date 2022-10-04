<!DOCTYPE html>
<html>
<head>
	<title>疫廚GO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
			* 
			{
				box-sizing: border-box;
			}
			
			body 
			{
				font-family: Arial, Helvetica, sans-serif;
			}
			
			header 
			{
				background-color: #BF9347;
				padding: 1px;
				height: 50px;
			}
			
			nav 
			{
				float: left;
				width: 30%;
				height: 800px;
				background: #C9B386;
				padding: 20px;
			}
			
			nav ul 
			{
				list-style-type: none;
				padding: 0;
			}
			
			article 
			{
				font-size:20px;
				float: left;
				padding: 20px;
				width: 70%;
				background-color: #F3EBE0;
				height: 800px; 
			}
			
			
			section::after 
			{
				content: "";
				display: table;
				clear: both;
			}
			
			footer 
			{
				height: 200px;
				background-color: #BF9347;
				padding: 1px;
				color: white;
			}
			
			#title
			{
				font-size:50px;
				padding:10px;
			}
			
			dt
			{
				font-size:30px;	
			}
			
			a
			{
				color:#000;
				text-decoration:none;
			}
			
			a:hover
			{
				text-decoration:underline;
				
			}
			
			.li
			{
				font-size:20px;
				line-height: 35px;
			}
			
			.btn1
			{
				font-size:20px;
				width:100px;height:50px;
				background-color:#D9CEB8;
				border:none;
			}
			
			button:hover
			{
				background-color:#AAA;
	
			}
			
			.container
			{
				display: flex;
				justify-content:center;
				background-color: #F3EBE0;	
				
			}
			
			.item
			{
				display: flex;
				align-items: center; 
				flex-direction: column;
				
			}
			
	</style>
	
</head>

<body style="margin:0px;">
	
	<header></header>

	<section>
	
		<nav>
			<p align="center"><img src="image/brand.png" alt="brand" style="width:300px"></p>
			<h2 align="center">疫起下廚吧!</h2>
			<ul align="center">
			<li class="li"><a href="#">常見問題</a></li>
			<li class="li"><a href="#">聯絡我們</a></li>
			<li class="li"><a href="#">平台使用說明</a></li>
			<li class="li"><a href="join.php">註冊會員</a></li>
			</ul>
			<div align="center"><button class="btn1" onclick="location.href='signIn.htm'" ><strong>登入</strong></button></div>
		</nav>
		
		<div class="container2">
			<article>
				<div class="item">
					<div class="min" id="title">和美食談一場戀愛吧!</div>
					<div class="min" ><img src="image/cook.jpg" alt="cook" style="width:600px"></div>
					<div class="min">
					<div class="min">
						<dl >
							<dt align="center">—公告—</dt>
						</dl>
						<ul>
							<li><a href="#">【公告】 04月29日 例行維護公告</a></li>
							<li><a href="#">【公告】 04月19日 1.0.0.4677版本更新內容公告</a></li>
							<li><a href="#">【公告】 平台操作說明手冊</a></li>
						</ul>
					</div>
					</div>	
				</div>
			</article>
		</div>
	</section>

	<footer align="center">
		<p style="font-size:20px;font-weight:bold">聯絡資訊</p>
		<p>住址：高雄市楠梓區海專路142號</p>
		<p>電子信箱：root2330@nkust.edu.tw</p>
		<p>電話：07-3617141</p>
	</footer>

</body>
</html>
