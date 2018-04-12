<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>好友列表</title>
</head>
<body>
我的好友：

<?php 
		foreach( $data as  $key =>$data )
		{
	?>
	<br>
	<hr>
	<?php echo $data['friendsname'];?>
	<a href="?p=front&c=user&a=showThisFriends&friendsid=<?php echo $data['friendsid'];?>">他的主页</a>
	<a href="?p=front&c=user&a=DelFreinds&friendsid=<?php echo $data['friendsid'];?>">删除好友</a>
		<?php } ?>
</body>
</html>