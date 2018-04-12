<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
		if (empty($data)) {
			echo "没有东西";
		}else{
		foreach( $data as  $key =>$data )
		{
	?>
	姓名：<a href="?p=front&c=user&a=showThisFriends&friendsid=<?php echo $data['userId']?>"><?php echo $data['username']?>
	</a>&nbsp; 
	头像：<img width="100" border="1" height="100" title="头像" style="cursor: pointer;"  alt="image" src="upload/headphoto/<?php echo $data['headphoto'];?>">
	

	写入时间:<?php echo $data['atime']?><br>
	内容：<?php echo $data['actMsg']; ?>&nbsp;<br>
	
	<?php 

		if (!empty($data['actphoto'])) {
			$actPhoto = explode('|',$data['actphoto']); 
			echo "	图片：";
			$num=0;
			foreach( $actPhoto as  $key =>$p ){			
				$num++;
				echo '<img width="100" border="1" height="100" title="图片" style="cursor: pointer;"  alt="image" src="upload/actphoto/'.$p.'">';
				if ($num%3==0) {
				echo '<br>';
				}
			}
		}
	?>
	<?php }
		}	
	?>
</body>
</html>