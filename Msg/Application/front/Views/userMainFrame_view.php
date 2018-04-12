<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>我的主页</title>
</head>
<body>
<center>
<a href="?p=front&c=act&a=addAct">添加动态</a>&nbsp;  <br>
<a href="?p=front&c=user&a=updateUser">编辑信息</a><br>
<a href="?p=front&c=user&a=showFriends">我的好友<?php echo $data2['count'];?></a><br>
<a href="?p=front&c=user&a=friendsNotice&user=<?php echo $data['userid']?>">关注我的人<?php echo $data3['count'];?></a><br>
<a href="?p=front&c=user&a=myPhoto">我的相册</a>
当前时间：<?php echo  date("Y-m-d H:i:s");?><br>
<hr>
	<table>
	<?php 
	echo $_SESSION['username'];?>
	<br>
	我的资料:<br>
		姓名：<?php echo $data1['username'];?><br>
		头像：<img width="200" border="1" height="200" title="头像" style="cursor: pointer;"  alt="image" src="upload/headphoto/<?php echo $data1['headphoto'];?>"><br>
		简介：<?php if(!empty($data1['brief']))
						echo $data1['brief'];
					else
						echo "一句话介绍一下自己吧，让别人更加了解你";
		?><br>
		性别：<?php echo $data1['sex'];?><br>
		电话：<?php echo $data1['phonenum'];?><br>
		邮箱:<?php echo $data1['emails'];?><br>
		家庭住址:<?php echo $data1['place']?><br>
	<br>
	我的动态：<br>
	<?php 
		foreach( $data as  $key =>$data )
		{
	?>

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
	<input type="hidden" name="userId" value="<?php echo $data['userId'];?>">

	<a href="?p=front&c=act&a=deleteAct&actId=<?php echo $data['actId'];?>"  onclick='return queren()'>删除</a>&nbsp;  
	<a href="?p=front&c=act&a=discussAct&actId=<?php echo $data['actId'];?>">评论</a>&nbsp;   
	<a href="?p=front&c=act&a=updateAct&actId=<?php echo $data['actId'];?>">修改</a>
	<br>
	<hr>
	<?php }?>
	</table>
	</center>
</body>
</html>
<script>
	function queren(){
		return window.confirm("你真的要删除吗？");
	}
</script>