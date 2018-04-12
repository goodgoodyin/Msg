<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>关注我的人</title>
</head>
<body>
关注我的人：

<?php 
		foreach( $data as  $key =>$data )
		{
	?>
	<br>
	<hr>
	<?php echo $data['username'];?>
	<a href="?p=front&c=user&a=showThisFriends&friendsid=<?php echo $data['userid']?>">他的主页</a>
	<a href="?p=front&c=user&a=delNotice&noticeid=<?php echo $data['userid']?>">移除关注</a>
		<?php } ?>
</body>
</html>