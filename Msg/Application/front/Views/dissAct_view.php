<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>添加留言</title>
</head>
<body>
<form action="?c=act&a=dissActOK" method="post">
	<br>
	<?php echo $data['userNmae'];?>
	<?php echo $data['actMsg'];?>
	<hr>
	<input type="textarea" name="Actdiss">
	<input type="submit" value="回复" >
</form>
</body>
</html>