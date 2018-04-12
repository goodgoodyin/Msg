<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>默认页面</title>
</head>
<body>
<a href="?p=front&c=act&a=addAct">添加</a>&nbsp;  <br>
<?php 
	if (empty($_SESSION['userid'])) {
		echo '<a href="?p=front&c=user&a=login">登录</a>&nbsp;  <br>';
		echo '<a href="?p=front&c=user&a=addUser">注册</a><br>';
	}
?>
<form action="?p=front&c=user&a=search" method="post"\ name="form1">
<input type="text" name="searchkey" id="searchkey" value="请输入搜索内容" ></input>
<input type="submit" name="submit" id="submit" value="搜索" ">
</form>
<?php 
	if (!empty($_SESSION['userid'])) {
		echo '<a href="?p=front&c=user&a=userMainFrame">我的主页</a><br>';
		echo '<a href="?p=back&c=Act&a=Msg">留言</a><br>';
		echo '<a href="?p=back&c=TShow&a=Main">话题</a><br>';	

	}
?>
<a href="?p=front&c=user&a=unsetS">退出登录</a>&nbsp;  <br>
当前时间：<?php echo  date("Y-m-d H:i:s");?><br>
<hr>
	<table>
	<?php 
		if (empty($data)) {
			echo "错误界面";
		}else{
		foreach( $data as  $key =>$data )
		{
	?>
	姓名：<a href="?p=front&c=user&a=showThisFriends&friendsid=<?php echo $data['userId']?>"><?php echo $data['username'];?>
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
	<input type="hidden" name="userId" value="<?php echo $data['userId'];?>">  
	<a href="?p=front&c=act&a=discussAct&actId=<?php echo $data['actId'];?>">评论</a>&nbsp;   	
	<hr>
	<?php }
		}	
	?>
	</table>
</body>
</html>
 