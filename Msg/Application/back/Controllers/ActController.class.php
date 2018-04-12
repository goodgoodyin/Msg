<?php
class ActController extends BaseController {
//留言
	
	
	public function MsgAction() {
		// 载入视图模板
		require VIEW_PATH .'index.html';
		$model = ModelFactory::M("AdminModel");
		$message_num = $model->CountAdminInfo('message');
		//统计message表ID数
		$reply_num = $model->CountAdminInfo('message_reply');
		//统计messagen_reply表ID数
		$admin_info = $model->ShowAdminInfo('message');
		$reply_data = $model->ShowAdminInfo('message_reply');
		include VIEW_PATH . 'connect.html';
	}
	public function AddAction() {
		$msg = $_POST['message'];
		$model = ModelFactory::M("AdminModel");
		@session_start();
		$username = $_SESSION['username'];
		$admin_info = $model->AddAdminInfo($msg,$username);
		if($admin_info){
			$this->GotoUrl("留言成功", "?p=back&c=Act&a=Msg", 2);
		}else{
			$this->GotoUrl("留言失败", "?p=back&c=Act&a=Msg", 2);
		}
	}
	public function DelAction() {
		$id = $_GET['id'];
		$model = ModelFactory::M("AdminModel");
		$admin_info = $model->DelAdminInfo($id,'message');
		if($admin_info){
			header('Location: index.php?p=back&c=Act&a=Msg');
		}
		else{
			//失败就提示，并可以自动跳转到登录界面
			$this->GotoUrl("删除失败", "?p=back&c=Act&a=Msg", 2);
		}
	}
	public function CommentAction(){
		$id = $_GET['id'];
		$message = $_POST['message'];
		$model = ModelFactory::M("AdminModel");
		@session_start();
		$username = $_SESSION['username'];
		$admin_info = $model->CommentAdminInfo($message,$username);
		if($admin_info){
			header('Location: index.php?p=back&c=Act&a=Msg');
		}
		else{
			//失败就提示，并可以自动跳转到登录界面
			$this->GotoUrl("删除失败", "?p=back&c=Act&a=Msg", 2);
		}
	}

	public function ReplyAction(){
		$id = $_GET['id'];
		$message = $_POST['message'];
		$parent_id = $_GET['parent_id'];
		$level = $_GET['level'];
		$main_id = $_GET['main_id'];
		@session_start();
		$username = $_SESSION['username'];
		$model = ModelFactory::M("AdminModel");
		$admin_info = $model->ReplyAdminInfo($message,$parent_id,$main_id,$level,$username);
		if($admin_info){
			header('Location: index.php?p=back&c=Act&a=Msg');
		}
		else{
			//失败就提示，并可以自动跳转到登录界面
			$this->GotoUrl("评论失败", "?p=back&c=Act&a=Msg", 2);
		}
	}
	public function Reply1Action(){
		
		$message = $_POST['message'];
		$parent_id = $_GET['parent_id'];
		$level = $_GET['level'];
		$main_id = $_GET['main_id'];
		@session_start();
		$username = $_SESSION['username'];
		$model = ModelFactory::M("AdminModel");
		$admin_info = $model->ReplyActInfo($message,$parent_id,$main_id,$level,$username);
		if($admin_info){
			header('Location: index.php');
		}
		else{
			//失败就提示，并可以自动跳转到登录界面
			$this->GotoUrl("评论失败", "", 2);
		}
	}
}