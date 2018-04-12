<?php
class MgeController extends BaseController {

	public function MgeAction() {
		// 载入视图模板
		$model = ModelFactory::M("AdminModel");
		$reply_data = $model->ShowAdminInfo('message');
		$topic_data = $model->ShowAdminInfo('topic');
		include VIEW_PATH . 'mge.html';
	}
	public function SelAction() {
		// 载入视图模板
		$root = $_GET['root'];
		if($root=='所有模块'){
			header('Location: index.php?p=back&c=Mge&a=Mge');
		}else{
			$model = ModelFactory::M("AdminModel");
			$reply_data = $model->ShowAdminInfo('message');
			$topic_data = $model->ShowAdminInfo('topic');
			include VIEW_PATH . 'mge.html';
		}
		
	}
	public function DelAction(){
		// 载入视图模板
		$id = $_GET['id'];
		$db_name = $_GET['db_name'];
		$model = ModelFactory::M("AdminModel");
		$result = $model->DelAdminInfo($id,$db_name);
		if($result){
			header('Location: index.php?p=back&c=Mge&a=Mge');
		}
		else{
			//失败就提示，并可以自动跳转到登录界面
			$this->GotoUrl("删除失败", "?p=back&c=Mge&a=Mge", 2);
		}
	}
	public function ReviewAction(){
		// 载入视图模板
		$id = $_GET['id'];
		$db_name = $_GET['db_name'];
		$model = ModelFactory::M("AdminModel");
		$result = $model->UpReInfo($id,$db_name);
		if($result){
			header('Location: index.php?p=back&c=Mge&a=Mge');
		}
		else{
			//失败就提示，并可以自动跳转到登录界面
			$this->GotoUrl("删除失败", "?p=back&c=Mge&a=Mge", 2);
		}
	}
}