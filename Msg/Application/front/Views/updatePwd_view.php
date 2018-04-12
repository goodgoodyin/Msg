
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
    <html>
     <head>
      <title>更改密码</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     </head>
     <body>
     <center>
      <h1>更改密码</h1>
      <form method="post" action="?p=front&c=user&a=updatepwdOk">
       <ul>
      
     
      <li>输入新密码：<input class="easyui-validatebox" required="true" missingMessage="密码必须填写" size="20" type="password" name="passwd" id="pwd1"></input></li>
      <li>重新输入一样的密码：<input class="easyui-validatebox" required="true" missingMessage="密码必须填写" size="20" type="password" name="passwd" id="pwd2" onkeyup="validate()"/><span id="tishi"></span></input></li>
      <input type="hidden" name="username" value="<?php echo $username;?>">
      <li><input type="submit" value="提交"><input type="reset" value="重新输入"></li>
       </ul>
      </form>
      <a href="?p=front&c=act&a=index">返回主菜单</a>
      </center>
    
     </body>
    </html>
  <script>
              function validate() {
                  var pwd1 = document.getElementById("pwd1").value;
                  var pwd2 = document.getElementById("pwd2").value;

        <!-- 对比两次输入的密码 -->
                  if(pwd1 == pwd2) {
                      document.getElementById("tishi").innerHTML="<font color='green'>两次密码相同</font>";
                      document.getElementById("submit").disabled = false;
                  }
                  else {
                      document.getElementById("tishi").innerHTML="<font color='red'>两次密码不相同</font>";
                    document.getElementById("submit").disabled = true;
                  }
              }
          </script>
