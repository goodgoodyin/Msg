<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的信息</title>
</head>
<style>
*{
	padding:0;
	margin:0;
	font-family:"微软雅黑";
	}
body{
	background:url(image/7.jpg);
	}
.wrap{
	background:url(image/9.PNG);
	margin:50px auto;
	width:500px;
	overflow:hidden;
	border-radius:10px;
	}
.file{
	padding-left:130px;
	}
.new{
     width:100px;
	 height:35px;
	}
</style>
<body>
<center>
<div class="wrap">
	<form name="form1" action="?p=front&c=user&a=updateUserOk" method="post"  enctype="multipart/form-data">
		头像：<img width="100" border="1" height="100" title="头像" style="border-radius:50%; cursor: pointer;margin-top:20px;"  alt="image" src="upload/headphoto/<?php echo $data['headphoto'];?>"><br><br>
		
        <div class="file">
		<input type="hidden" name="oldphoto" value="<?php echo  $_SESSION['username'];?>">
		<input type="file" size="35" name="headPhoto">
        </div>
        <br>
        姓&nbsp;&nbsp;&nbsp;名：<input type="text" value="<?php echo $data['brief'];?>"><br><br>
		简&nbsp;&nbsp;&nbsp;介：<input type="text" name="brief" value="<?php echo $data['brief'];?>"><br><br>
		性&nbsp;&nbsp;&nbsp;别：<input type="text" name="sex" value="<?php echo $data['sex'];?>"><br><br>
		电&nbsp;&nbsp;&nbsp;话：<input type="text"  name="phonenum" id="phonenum" value="<?php echo $data['phonenum'];?>" ><span id="tishi" ><br><br>
		邮&nbsp;&nbsp;&nbsp;箱：<input type="text"  name="emails" value="<?php echo $data['emails'];?>"><br><br>
		家庭住址:<input type="text" name="place"  value="<?php echo $data['place']?>"><br><br>
		<input type="submit" value="更新" class="new"><br><br>

	</form>
</div>
</center>

</body>
</html>

