<!DOCTYPE html>
<html>
<head>
	<title>我的相册</title>
</head>
<body>
照片墙:<br>

<?php 
		foreach( $data as  $key =>$data )
		{
		if(!empty($data['actphoto'])) {
			$actPhoto = explode('|',$data['actphoto']); 
			$num=0;
			foreach( $actPhoto as  $key =>$p ){			
				$num++;
				echo '<img width="200" border="1" height="200" title="图片" style="cursor: pointer;"  alt="image" src="upload/actphoto/'.$p.'">';
				if ($num/5==0) {
				echo '<br>';
				}
			}
		}
		}
	?>
</body>
</html>