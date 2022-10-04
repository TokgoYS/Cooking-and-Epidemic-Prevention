<!DOCTYPE html>
<html>
  <head>
    <title>疫廚GO【註冊】</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script type="text/javascript">
      function check_data()
      {
        if (document.myForm.account.value.length == 0)
        {
          alert("請填寫「使用者帳號」欄位");
          return false;
        }
		if (document.myForm.account.value.length < 8)
        {
          alert("「使用者帳號」不可以少於 8 個字元");
          return false;
        }
        if (document.myForm.account.value.length > 10)
        {
          alert("「使用者帳號」不可以超過 10 個字元");
          return false;
        }
		if (document.myForm.password.value.length < 8)
        {
          alert("「使用者密碼」不可以少於 8 個字元");
          return false;
        }
        if (document.myForm.password.value.length == 0)
        {
          alert("請填寫「使用者密碼」欄位");
          return false;
        }
        if (document.myForm.password.value.length > 10)
        {
          alert("「使用者密碼」不可以超過 10 個字元");
          return false;
        }
        if (document.myForm.re_password.value.length == 0)
        {
          alert("請填寫「密碼確認」欄位");
          return false;
        }
        if (document.myForm.password.value != document.myForm.re_password.value)
        {
          alert("「密碼確認」欄位與「使用者密碼」欄位一定要相同");
          return false;
        }
        if (document.myForm.name.value.length == 0)
        {
          alert("請填寫「真實姓名」欄位");
          return false;
        }
		if (document.myForm.nickName.value.length == 0)
        {
          alert("請填寫「暱稱」欄位");
          return false;
        }	
		if (document.myForm.mId.value.length == 0)
        {
          alert("請填寫「身分證字號」欄位");
          return false;
        }	
        if (document.myForm.birthday.value.length == 0)
        {
          alert("請填寫「生日」欄位");
          return false;
        }
		if (document.myForm.email.value.length == 0)
        {
          alert("請填寫「電子信箱」欄位");
          return false;
        }
		if (document.myForm.myfile.value.length == 0)
        {
          alert("請務必上傳「大頭照」");
          return false;
        }
        	
        myForm.submit();					
      }
    </script>

	<style>
 
		input::-webkit-input-placeholder 
		{
			font-size: 15px;
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
		
	</style>
  </head>
  
  
  <body style="background-color:#F3EBE0">
	<p align="center"><a href="index.php"><img src="image/brand.png" alt="brand" style="width:300px"></a></p>
  
    <form action="addmember.php" method="post" name="myForm" enctype="multipart/form-data">
      <table align="center">
        <tr>
			<td colspan="2"><h1 align="center">會員註冊</h1></td>
		</tr>
		
		<tr> 
          <td colspan="2" bgcolor="#F04646" align="center"> 
            <font color="#FFFFFF">請填入下列資料 (標示「*」欄位請務必填寫)</font>
          </td>
        </tr>
		
		<tr> 
			<td style="height:20px"></td>
		</tr>
        <tr> 
          <td align="right">*使用者帳號：</td>
          <td><input name="account" type="text" size="15" required>
          (請使用英文或數字鍵)</td>
        </tr>
        <tr> 
          <td align="right">*使用者密碼：</td>
          <td><input name="password" type="password" size="15" required>
          (請使用英文或數字鍵)</td>
        </tr>
        <tr> 
          <td align="right">*密碼確認：</td>
          <td><input name="re_password" type="password" size="15" required>
          (再輸入一次密碼)</td>
        </tr>
        <tr>
          <td align="right">*真實姓名：</td>
          <td><input name="name" type="text" size="8" required></td>
        </tr> 
		<tr>
          <td align="right">*暱稱：</td>
          <td><input name="nickName" type="text" size="8" required></td>
        </tr>
		<tr>
          <td align="right">*身分證字號：</td>
          <td><input name="mId" type="text" size="10" required></td>
        </tr> 
        <tr> 
          <td align="right">*性別：</td>
          <td> 
		  
		  <select name="sex"> 
			<option value="男">男</option>
			<option value="女">女</option>
		  </select>
          </td>
        </tr>
        <tr> 
          <td align="right">*生日：</td>
          <td>
            <input type="date" name="birthday" placeholder="日期" required />
          </td>
        </tr>
        <tr> 
          <td align="right">電話：</td>
          <td><input name="telephone" type="text" size="20">&nbsp&nbsp(請依照09xx-xxx-xxx格式)</td>
        </tr>
        <tr> 
          <td align="right">地址：</td>
          <td><input name="address" type="text" size="45"></td>
        </tr>
        <tr>
          <td align="right">*電子信箱：</td>
          <td><input name="email" type="text" size="30"></td>
        </tr>
        <tr> 
          <td align="right">職業：</td>
          <td><input name="job" type="text"  size="50"></td>
        </tr>
		<tr>
          <td align="right">*大頭照：</td>
		  <td><input type="file" name="myfile" size="50"></td>
		  
        </tr>
		
		<tr> 
			<td style="height:20px"></td>
		</tr>
		
        <tr> 
          <td align="center" colspan="2">  
            <input type="button" value="註冊" onClick="check_data()" style="width:400px;height:40px;font-size:20px;background-color:#F04646;border:none;color:#FFF;font-weight:bold">
          </td>
        </tr>
		
		<tr > 
			<td align="center" colspan="2">
			已經有帳號？&nbsp <a href="signIn.htm">登入</a>
			</td>
		</tr>
      </table>
    </form>
  </body>
</html>