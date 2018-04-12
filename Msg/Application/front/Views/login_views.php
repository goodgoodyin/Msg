<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>登录</title>
</head>
<body>
<form name='from1' action='?p=front&c=user&a=checkLogin' method="post">
	用户名：<input type="text" name="username" ><br>
	密码:<input type="password" name="pwd" value="<?php if(empty($_COOKIE['pwd']) ){echo null;}else{echo $_COOKIE['pwd'];}?>"><br>
   <!-- 
   验证码:<input type="text" class="capital" name="captcha"><br>
    <img width="145" border="1" height="20" title="看不清？点击更换另一个验证码。" style="cursor: pointer;" onclick="this.src='index.php?p=front&c=user&a=Captcha&'+Math.random()" alt="CAPTCHA" src="index.php?p=back&c=Admin&a=Captcha">
    -->
    <input type="checkbox" value="1" name="remember" id="remember" /><label for="remember">请保存我这次的登录信息。</label>
	<input type="submit" name="登录">
	<a href="">忘记密码</a>

</form>
</body>
</html>