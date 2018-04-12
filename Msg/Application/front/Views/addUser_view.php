<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>注册用户</title>
</head>
<body>
<center>
	<form name="form1" action="?p=front&c=user&a=addUserOk" method="post" enctype="multipart/form-data">
		姓名：<input type="text" name="username"><br>
		上传头像： <input type="file" size="35" name="headPhoto"><br>
		密码:<input type="password" name="pwd"><br>
		验证码：<input type="text" class="capital" name="captcha"><br>
		 <img width="200" border="1" height="60" title="看不清？点击更换另一个验证码。" style="cursor: pointer;" onclick="this.src='index.php?p=front&c=user&a=Captcha&'+Math.random()" alt="CAPTCHA" src="index.php?p=front&c=user&a=Captcha"><br>
		<input type="submit" name="提交">

	</form>
</center>	
</body>
</html>