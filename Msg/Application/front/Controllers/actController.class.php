<?php
class actController extends BaseController{

	
 function indexAction(){	
		@session_start();	
		if ($handle = opendir('images/smiles')) {
   				 while (false !== ($file = readdir($handle))) {
     				 if (preg_match('/(.+?)[.]gif/ie',$file, $name)) {
      				  $smiles[$name[1]]=$file;
     			 	}
   			 	}
				    closedir($handle);
				   
			}		
		$obj=ModelFactory::M('actModel');
		$data=$obj->selectAllId();	
		if (!empty($_SESSION['userid'])) {
			$userid=$_SESSION['userid'];
		$obj2=ModelFactory::M('userModel');
		$data2=$obj2->countF($userid);		
		$obj3=ModelFactory::M('userModel');
		$data3=$obj3->countN($userid);	
		$c=count($data2);
		}
		
		include VIEW_PATH.'index_view.html';
	}
	function index1Action(){	
		@session_start();			
		$obj=ModelFactory::M('actModel');
		$data=$obj->selectAllId();	
		if (!empty($_SESSION['userid'])) {
			$userid=$_SESSION['userid'];
		$obj2=ModelFactory::M('userModel');
		$data2=$obj2->countF($userid);		
		$obj3=ModelFactory::M('userModel');
		$data3=$obj3->countN($userid);	
		$c=count($data2);
		}
		
		include VIEW_PATH.'maintopic_view.html';
	}
	
	function addActAction(){
		@session_start();
		if (!empty($_SESSION['userid'])) {
			//获取表情
			if ($handle = opendir('images/smiles')) {
   				 while (false !== ($file = readdir($handle))) {
     				 if (preg_match('/(.+?)[.]gif/ie',$file, $name)) {
      				  $smiles[$name[1]]=$file;
     			 	}
   			 	}
				    closedir($handle);
				   
			}
		include VIEW_PATH.'addAct_view.php';
			
		}else{
			$this->indexAction();
			echo "<script>window.confirm('请先登录')</script>";
		}
	}
	function addActOkAction(){
		session_start();
		$data['userId']=$_SESSION['userid'];
		$data['username']=$_SESSION['username'];
		$data['headphoto']=$_SESSION['headphoto'];
		$data['limits']=$_POST['limits'];
		$data['actMsg']=$_POST['actMsg'];
		$data['actPhoto'] ='0';
		//$data['actPhoto']=NULL;
		$file_list=$_FILES["uploads"];
		//($_FILES["uploads"]);
		//var_dump( $file_info['name']);
		if (empty($data['actMsg'])){
			$this->addActAction();
			echo "<script>window.confirm('文本不能为空')</script>";
		}else{
				
				$smile=htmlspecialchars('\\1');
		  		if(is_file('images/smiles/'.$smile.'.gif')) {
		    	$img='<img src="./images/smiles/'.$smile.'.gif" >';
		    	}
				$data['actMsg']=preg_replace("/[:](.+?)[:]/ies",'$img', $data['actMsg']); 
				$key1=0;								
				foreach( $file_list['name'] as $key => $key){
				if(!empty($file_list['name'][$key])){				
				$file_info['name']=$file_list['name'][$key];
				$file_info['type']=$file_list['type'][$key];
				$file_info['tmp_name']=$file_list['tmp_name'][$key];
				$file_info['error']=$file_list['error'][$key];
				$file_info['size']=$file_list['size'][$key];
				$t_upload = new Upload();				
				//echo $file_info['name'];
			// 设置一些属性				
					$t_upload->setUploadPath(ROOT . 'upload/actphoto/');// 上传目录
					$t_upload->setPrefix('actPhoto');// 前缀
			// 上传
					if($result = $t_upload->uploadFile($file_info)){
							if (empty($data['actPhoto'] )) {
									$data['actPhoto'] = $result;
							}else{
							$data['actPhoto'] =$data['actPhoto'].'|'. $result;
						}
					} else {
						$this->GoToURL('文件上传失败，原因是：' . $t_upload->getError(), '?p=front&c=act&a=addAct',3);

						die;
					}		
				}			
			}	
					$obj=ModelFactory::M('actModel');
					$result=$obj->addAct($data);	
					if ($result=='true') {
						$this->GotoUrl('添加动态成功！', '?', 3 );
					}else{
					$this->GotoUrl('添加动态失败！', '?', 3 );
					}
		}	
	} 	 
	function updateActAction(){
		$actId=$_GET['actId'];		
		$obj=ModelFactory::M('actModel');
		$data=$obj->selectByActId($actId);
		include VIEW_PATH.'updateAct_view.php';
	}
	function updateActOkAction(){
		$actId=$_POST['actId'];
		$actMsg=$_POST['actMsg'];
		$obj=ModelFactory::M('actModel');
		$data=$obj->updateByActId($actId,$actMsg);
		$this->GotoUrl('更新动态成功！', '?', 3 );
	}
	function deleteActAction(){
		$actId=$_GET['actId'];		
		$obj=ModelFactory::M('actModel');
		$result=$obj->deleteByActId($actId);
		$this->GotoUrl('删除成功！', '?', 3 );

	}
	function dissActAction(){
		$actId=$_GET['actId'];		
		$obj=ModelFactory::M('actModel');
		$data=$obj->selectByActId($actId);
		include VIEW_PATH.'dissAct_view.php';
	}
	function dissActOkAction(){
		$actId=$_GET['actId'];		
		$obj=ModelFactory::M('actModel');
		$data=$obj->selectByActId($actId);
		include VIEW_PATH.'dissAct_view.php';
	}
}
?>