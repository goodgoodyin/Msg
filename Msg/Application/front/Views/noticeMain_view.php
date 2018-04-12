<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $data['username'];?>的主页</title>
</head>
<body>
	
<a href="?p=front&c=user&a=noticeF&friendsid=<?php echo $data1['userId'];?>&friendsname=<?php echo $data['username'];?>">关注他</a>

<br>
<hr>
		姓名：<?php echo $data['username'];?><br>
		性别：<?php echo $data['sex'];?><br>
		电话：<?php echo $data['phonenum'];?><br>
		邮箱:<?php echo $data['emails'];?><br>
		家庭住址:<?php echo $data['place']?><br>

		ta的动态：<br>
	<?php 
		foreach( $data1 as  $key =>$data1)
		{
	?>

	写入时间:<?php echo $data1['atime']?><br>
	内容：<?php echo $data1['actMsg']; ?>&nbsp;<br>
	
	

	 
	<a href="?p=front&c=act&a=discussAct&actId=<?php echo $data1['actId'];?>">评论</a>&nbsp;   
	
	<br>
	<hr>
	<?php }?>
</body>
</html>