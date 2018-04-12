<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>更新动态</title>
</head>
<body>
<center>
<center>
<form action="?c=act&a=updateActOk" method="post">
	更改内容：<input type="text" name="actMsg" value="<?php echo $data['actMsg']; ?>">
	<br/>
	<input type="hidden" name="actId" value="<?php echo $data['actId']; ?>">
	<input type="submit" value="更新" >

</form>
</center>
</body>
</html>