<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>添加动态</title>
</head>
<body>

	
<form name="from1" action="?c=act&a=addActOk" method="post"  enctype="multipart/form-data">
	输入内容：<input type="textarea" name="actMsg" id="actMsg"><br>
	<?php 
			$num=-1;
			foreach($smiles as $key => $value){
				$num++;
				if ($num%6==0) {
					echo "<br>";
				}
				echo "<img src=\"images/smiles/".$value."\" style=\"cursor:pointer\" onclick=\"insertsmiley('".$value."')\"/> ";
				
			}
			   unset($smiles);
		?>
	
	<br/>
<div class="upload_btn" onclick="fileElem.click()">选择上传图片</div>

<input class="inputimg" type="file" id="file" name="uploads[]" multiple="multiple" accept="image/*" onkeyu="checkFiles()">
<input type="hidden" name="limits" value="freinds">
</div>

<br><input class="inputimg" type="submit" value="提交" name="Submit">
</form>
</body>
</html>
<script>
function $(id) {
	return document.getElementById(id);
}
function insertsmiley(icon) {  
	//icon=htmlspecialchars(icon);
	//var a='<img src="image/'+icon+'.gif"/>;
	//var b= document.getElementById('actMsg').innerHTML
	
 	 $('actMsg').value+=":"+icon+":"; 
 /// result.innerHTML=document.getElementById("actMsg").value;
 // var faceli = document.createElement("textarea");l
  // $('actMsg').innerHTML = '<img src="image/'+icon+'.gif"/>';  
}
</script>
