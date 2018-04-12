<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $data['username'];?>的主页</title>
</head>
<body>
	<?php 
	@session_start();
	if($isfriends==0&$_SESSION['username']!=$data['username']){
		
	echo "<a href='?p=front&c=user&a=noticeF&friendsid=".$data['userid']."&friendsname=".$data['username']."'>关注他</a>";

	}
?>
<br>
<hr>
		姓名：<?php echo $data['username'];?><br>
		头像：<img width="200" border="1" height="200" title="头像" style="cursor: pointer;"  alt="image" src="upload/headphoto/<?php echo $data['headphoto'];?>"><br>
		简介：<?php if(!empty($data1['brief']))
						echo $data1['brief'];
					else
						echo "一句话介绍一下自己吧，让别人更加了解你";
		?><br>
		性别：<?php echo $data['sex'];?><br>
		电话：<?php echo $data['phonenum'];?><br>
		邮箱:<?php echo $data['emails'];?><br>
		家庭住址:<?php echo $data['place']?><br>

		ta的动态：<br>
	<?php 
		foreach( $data1 as  $key =>$data1)
		{
	

	 echo "写入时间:".$data1['atime']."<br>";
	 echo "内容：".$data1['actMsg']."&nbsp;<br>";
		if (!empty($data1['actphoto'])) {
			$actPhoto = explode('|',$data1['actphoto']); 
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
	echo '<a href="?p=front&c=act&a=discussAct&actId='.$data1['actId'].'">评论</a>&nbsp;<br><hr> ';
	}?>
	 
  
	
	<br>
	<hr>
	 
</body>
</html>