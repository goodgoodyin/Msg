<?php
class TShowController extends BaseController {

	public function MainAction() {
		// 载入视图模板
		require VIEW_PATH .'topic.html';
	}
	public function T1Action() {
		// 载入视图模板
		@session_start();	
		if ($handle = opendir('images/smiles')) {
   				 while (false !== ($file = readdir($handle))) {
     				 if (preg_match('/(.+?)[.]gif/ie',$file, $name)) {
      				  $smiles[$name[1]]=$file;
     			 	}
   			 	}
				    closedir($handle);
				   
			}	
		$model = ModelFactory::M("AdminModel");
		$message_num = $model->CountAdminInfo('topic');
		//统计topic表ID数
		$reply_num = $model->CountAdminInfo('topic_reply');
		//统计topic_reply表ID数
		$admin_info = $model->ShowTopicInfo('topic','topic1');
		$reply_data = $model->ShowAdminInfo('topic_reply');
		include VIEW_PATH . 'topic1.html';
	}
	public function T2Action() {
		// 载入视图模板
		@session_start();	
		if ($handle = opendir('images/smiles')) {
   				 while (false !== ($file = readdir($handle))) {
     				 if (preg_match('/(.+?)[.]gif/ie',$file, $name)) {
      				  $smiles[$name[1]]=$file;
     			 	}
   			 	}
				    closedir($handle);
				   
			}	
		$model = ModelFactory::M("AdminModel");
		$message_num = $model->CountAdminInfo('topic');
		//统计topic表ID数
		$reply_num = $model->CountAdminInfo('topic_reply');
		//统计topic_reply表ID数
		$admin_info = $model->ShowTopicInfo('topic','topic2');
		$reply_data = $model->ShowAdminInfo('topic_reply');
		include VIEW_PATH . 'topic2.html';
	}
	public function T3Action() {
		// 载入视图模板
		@session_start();	
		if ($handle = opendir('images/smiles')) {
   				 while (false !== ($file = readdir($handle))) {
     				 if (preg_match('/(.+?)[.]gif/ie',$file, $name)) {
      				  $smiles[$name[1]]=$file;
     			 	}
   			 	}
				    closedir($handle);
				   
			}	
		$model = ModelFactory::M("AdminModel");
		$message_num = $model->CountAdminInfo('topic');
		//统计topic表ID数
		$reply_num = $model->CountAdminInfo('topic_reply');
		//统计topic_reply表ID数
		$admin_info = $model->ShowTopicInfo('topic','topic3');
		$reply_data = $model->ShowAdminInfo('topic_reply');
		include VIEW_PATH . 'topic3.html';
	}
	public function AddAction() {
		$com = $_POST['comment'];
		$type = $_GET['type'];
		$model = ModelFactory::M("AdminModel");
		//$info_num = $model->CountAdminInfo('topic');
		//统计ID数
		@session_start();
		$username = $_SESSION['username'];

				$smile=htmlspecialchars('\\1');
		  		if(is_file('images/smiles/'.$smile.'.gif')) {
		    	$img='<img src="./images/smiles/'.$smile.'.gif" >';
		    	}
		    	var_dump($smile); die;
				$com=preg_replace("/[:](.+?)[:]/ies",'$img', $com);
		$admin_info = $model->AddTopicInfo($com,$type,$username);
		if($admin_info){
			if($type=='topic1'){
				$this->GotoUrl("留言成功", "?p=back&c=TShow&a=T1", 2);
			}elseif ($type=='topic2') {
				$this->GotoUrl("留言成功", "?p=back&c=TShow&a=T2", 2);
			}elseif ($type=='topic3') {
				$this->GotoUrl("留言成功", "?p=back&c=TShow&a=T3", 2);
			}
			
		}else{
			if($type=='topic1'){
				$this->GotoUrl("留言失败", "?p=back&c=TShow&a=T1", 2);
			}elseif ($type=='topic2') {
				$this->GotoUrl("留言失败", "?p=back&c=TShow&a=T2", 2);
			}elseif ($type=='topic3') {
				$this->GotoUrl("留言失败", "?p=back&c=TShow&a=T3", 2);
			}
		}
	}
	public function DelAction() {
		$id = $_GET['id'];
		$model = ModelFactory::M("AdminModel");
		$admin_info = $model->DelAdminInfo($id,'topic');
		if($admin_info){
			header('Location: index.php?p=back&c=TShow&a=T1');
		}
		else{
			//失败就提示，并可以自动跳转到登录界面
			$this->GotoUrl("删除失败", "?p=back&c=TShow&a=T1", 2);
		}
	}
	public function ReplyAction(){
		$message = $_POST['message'];
		$parent_id = $_GET['parent_id'];
		$level = $_GET['level'];
		$main_id = $_GET['main_id'];
		@session_start();
		$username = $_SESSION['username'];
		$model = ModelFactory::M("AdminModel");
		$admin_info = $model->TReplyAdminInfo($message,$parent_id,$main_id,$level,$username);
		if($admin_info){
			header('Location: index.php?p=back&c=TShow&a=T1');
		}
		else{
			//失败就提示，并可以自动跳转到登录界面
			$this->GotoUrl("评论失败", "?p=back&c=TShow&a=T1", 2);
		}
	}
}