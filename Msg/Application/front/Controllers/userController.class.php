<?php
class userController extends BaseController{
	
	/*
	function showthisPAction(){
		session_start();
		$userid=$_SESSION['userid'];
		$friendsid=$_GET['friendsid'];
		$obj=ModelFactory::M('userModel');
		$isfriends=$obj->selectIsF($userid,$friendsid);
		include VIEW_PATH.'friendsMain_view.php';
	}
	//*/
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
	public function CaptchaAction() {
		// 通过 验证码工具类，完成即可！
		$t_captcha = new Captcha();
		$t_captcha->makeImage();
	}
	function searchAction(){
		
		$searchkey = explode(' ',$_POST['searchkey']); 	
		
		if (empty($searchkey[0])) {
			$this->indexAction();
			echo "<script>window.confirm('搜索不能为空')</script>";
		}else{
		$obj=ModelFactory::M('userModel');
		$data=$obj->select($searchkey);	
		include VIEW_PATH.'index_view.html';
		}
	}
	function searchbyIdAction(){
		$userid=$_GET['userid'];
		$searchkey = explode(' ',$_POST['searchkey']); 	
		
		if (empty($searchkey[0])) {
			$this->userMainFrameAction();
			echo "<script>window.confirm('搜索不能为空')</script>";
		}else{
		$obj=ModelFactory::M('userModel');
		$data=$obj->selectTA($searchkey,$userid);	
		include VIEW_PATH.'search_view.php';
		}
	}
	function searchbyIdMAction(){
		$userid=$_GET['userid'];
		$searchkey = explode(' ',$_POST['searchkey']); 	
		
		if (empty($searchkey[0])) {
			$this->showThisFriends1Action($userid);
			echo "<script>window.confirm('搜索不能为空')</script>";
		}else{
		$obj=ModelFactory::M('userModel');
		$data=$obj->selectTA($searchkey,$userid);	
		include VIEW_PATH.'search_view.php';
		}
	}
	function myPhotoAction(){
		
		$userid=$_GET['userid'];
		$obj=ModelFactory::M('userModel');
		$data=$obj->selectPhoto($userid);
		
		include VIEW_PATH.'Photo_view.html';
	}
	function unsetSAction(){
		@session_start();
			unset($_SESSION['username']);
			unset($_SESSION['pwd']);
			unset($_SESSION['userid']);
		$this->index1Action();
	}
	/*
	function forgetpwdAction(){

		include VIEW_PATH.'forgetpwd_view.php';
	}
	*/
	function updatepwdAction(){
		$username=$_POST['username1'];
		$phonenum=$_POST['phonenum1'];
		$obj=ModelFactory::M('userModel');
		$result=$obj->selectis($username,$phonenum);
		if ($result=='true') {
			include VIEW_PATH.'updatepwd_view.php';
		}
		else if($result=='usernamefalse'){
			include VIEW_PATH.'login_view.html';
			echo "<script>window.confirm('用户名错误，请重试')</script>";
		}elseif ($result=='phonenumfalse') {
			include VIEW_PATH.'login_view.html';
			echo "<script>window.confirm('手机号错误，请重试')</script>";
		}
	
	}
	function updatepwdOkAction(){
		$pwd=$_POST['passwd'];
		$username=$_POST['username'];
		$obj=ModelFactory::M('userModel');
		$result=$obj->updatePwd($username,$pwd);
		if ($result=='true') {
			//include VIEW_PATH.'index_view.php';
			$this->GotoUrl("更新密码成功","?p=front&c=act&a=index",3);
		}
		else {
			include VIEW_PATH.'updatepwd_view.php';
			echo "<script>window.confirm('更新失败，请重试')</script>";
		}
		
	}
	function noticeFAction(){
		session_start();
		$userid=$_SESSION['userid'];
		$username=$_SESSION['username'];
		$friendsid=$_GET['friendsid'];
		$friendsname=$_GET['friendsname'];
		$obj=ModelFactory::M('userModel');
		$result=$obj->addF($friendsid,$friendsname,$userid,$username);		
		$this->GotoUrl("添加好友成功！","?p=front&c=user&a=showThisFriends&friendsid=$friendsid",3);
	}
	function userMainFrameAction(){
		session_start();
		if (empty($_SESSION['userid'])) {
			echo "<script>window.confirm('请先登录')</script>";
			$this->indexAction();
		}else{
		$userid=$_SESSION['userid'];
		$obj=ModelFactory::M('actModel');
		$data=$obj->selectById($userid);
		$obj1=ModelFactory::M('userModel');
		$data1=$obj1->selectByid($userid);
		$obj2=ModelFactory::M('userModel');
		$data2=$obj2->countF($userid);		
		$obj3=ModelFactory::M('userModel');
		$data3=$obj3->countN($userid);	
		
		$c=count($data2);
		include VIEW_PATH.'userMainFrame_view.html';
	}
	}
	function delNoticeAction(){
		$friendsid=$_GET['noticeid'];
		$obj=ModelFactory::M('userModel');
		$result=$obj->deleteN($friendsid);
		$this->GotoUrl("移除成功","?p=front&c=act&a=index",3);
	}
	/*
	function showNoticeAction(){
		$friendsid=$_GET['noticeid'];
		$obj=ModelFactory::M('userModel');
		$data=$obj->selectNByid($friendsid);
		$obj1=ModelFactory::M('actModel');
		$data1=$obj1->selectById($friendsid);
		include VIEW_PATH.'friendsMain_view.php';
	}
	*/
	function friendsNoticeAction(){
		session_start();
		$userid=$_GET['userid'];
		$obj=ModelFactory::M('userModel');
		$data=$obj->selectNsById($userid);
		$obj1=ModelFactory::M('actModel');
		$data1=$obj1->selectById($userid);
		include VIEW_PATH.'myfriends1_view .html';
	}

	function DelFreindsAction(){
		$friendsid=$_GET['friendsid'];
		$obj=ModelFactory::M('userModel');
		$result=$obj->deleteF($friendsid);
		$this->GotoUrl("取消关注友成功","?p=front&c=user&a=showThisFriends&friendsid=$friendsid",3);

	}
	function showThisFriends1Action($friendsid){
		session_start();
		$userid=$_SESSION['userid'];
		if (empty($_SESSION['userid'])) {
			echo "<script>window.confirm('请先登录')</script>";
			$this->indexAction();
		}else{
		$obj=ModelFactory::M('userModel');
		$isfriends=$obj->selectIsF($userid,$friendsid);
		//$friendsid=$_GET['friendsid'];
		//$obj=ModelFactory::M('userModel');
		$data=$obj->selectFByid($friendsid);
		$obj1=ModelFactory::M('actModel');
		$data1=$obj1->selectById($friendsid);
		$obj3=ModelFactory::M('userModel');
		$data3=$obj3->countN($friendsid);
		$obj2=ModelFactory::M('userModel');
		$data2=$obj2->countF($friendsid);
		$c=count($data2);
		
		include VIEW_PATH.'friendsMain_view.html';
	}
	}
	function showThisFriendsAction(){
		session_start();
		
		if (empty($_SESSION['userid'])) {
			echo "<script>window.confirm('请先登录')</script>";
			$this->indexAction();
		}else{
			$userid=$_SESSION['userid'];
		$friendsid=$_GET['friendsid'];
		$obj=ModelFactory::M('userModel');
		$isfriends=$obj->selectIsF($userid,$friendsid);
		$data=$obj->selectFByid($friendsid);
		$obj1=ModelFactory::M('actModel');
		$data1=$obj1->selectById($friendsid);
		$obj3=ModelFactory::M('userModel');
		$data3=$obj3->countN($friendsid);
		$obj2=ModelFactory::M('userModel');
		$data2=$obj2->countF($friendsid);
		$c=count($data2);
		
		include VIEW_PATH.'friendsMain_view.html';
	}
	}
	function showFriendsAction(){
		session_start();
		$userid=$_GET['userid'];
		$obj=ModelFactory::M('userModel');
		$data=$obj->selectFsByid($userid);

		include VIEW_PATH.'myfriends_view.html';
	}
	function updateUserAction(){
		session_start();
		if (empty($_SESSION['userid'])) {
			
			echo "<script>window.confirm('请先登录')</script>";
			$this->index1Action();
		}else  {
		$userid=$_SESSION['userid'];
		$obj=ModelFactory::M('userModel');
		$data=$obj->selectByid($userid);
		include VIEW_PATH.'updateUser_views.php'; 
		}
		
	}
	function updateUserOkAction(){
		session_start();
		$data['userid']=$_SESSION['userid'];
		$data['emails']=$_POST['emails'];
		$data['phonenum']=$_POST['phonenum'];
		$data['sex']=$_POST['sex'];
		$data['place']=$_POST['place'];
		$data['brief']=$_POST['brief'];

			
		
		if (!empty($_FILES['headPhoto']['name'])) {
			
			$t_upload = new Upload();
		// 设置一些属性
		$t_upload->setUploadPath(ROOT . 'upload/headphoto/');// 上传目录
		$t_upload->setPrefix('headPhoto');// 前缀
		// 上传
		if ($result = $t_upload->uploadFile($_FILES['headPhoto'])) {
				$data['headPhoto'] = $result;
				$_SESSION['headphoto']=$result;
		} else {
			$this->GoToURL('文件上传失败，原因是：' . $t_upload->getError(), '?p=front&c=user&a=updateUser',3);
			die;
		}
		}else{
			$data['headPhoto'] =$_POST['oldphoto'];
		}
		
		$obj=ModelFactory::M('userModel');
		$result=$obj->updateUser($data);
		//var_dump($result);
		if($result=='true'){
			$this->GotoUrl("修改个人信息成功！","?p=front&c=act&a=index",3);
		}elseif ($result=='isemails') {
			include VIEW_PATH.'updateUser_views.php';
			echo "<script>window.confirm('emmial已经存在，请重试')</script>";
		}
		elseif ($result=='isphonenum') {
			include VIEW_PATH.'updateUser_views.php';
			echo "<script>window.confirm('手机号已经存在，请重试')</script>";
		}
		else{
		$this->GotoUrl("修改个人信息失败！","?p=front&c=act&a=index",3);
		}
	}
	function addUserAction(){
		include VIEW_PATH.'addUser_view.php'; 
	}
	function addUserOkAction(){
		$t_captcha = new Captcha();
		if (! $t_captcha->checkCode($_POST['captcha'])) {
			// 不正确，跳转到登陆页面，提示
			$this->GotoUrl("验证码不正确", "?p=front&c=user&a=addUser", 2);
			// 停止脚本执行！
			die;
		}

		$username=$_POST['username'];
		$pwd=$_POST['pwd'];
		$headPhoto="headPhotoindex.jpg";
		//$headPhoto_ori_=$_POST['headPhoto_ori'];
		// 处理上传图片
		//$t_upload = new Upload();
		// 设置一些属性
		//$t_upload->setUploadPath(ROOT . 'upload/headphoto/');// 上传目录
		//[$t_upload->setPrefix('headPhoto');// 前缀
		// 上传
		//if ($result = $t_upload->uploadFile($_FILES['headPhoto'])) {
		//	//	$headPhoto = $result;
		//} else {
		//	$this->GoToURL('文件上传失败，原因是：' . $t_upload->getError(), '?p=front&c=act&a=index',3);
		//	die;
		//}
		$obj=ModelFactory::M('userModel');
		$result=$obj->addUser($username,$pwd,$headPhoto);
		if ($result=='true') {
			$this->GotoUrl("添加用户成功！","?p=front&c=act&a=index",3);	
		}
		elseif($result=='isusername'){
			include VIEW_PATH.'login_view.html';
			echo "<script>window.confirm('姓名已经存在，请重试')</script>";
		}
		else{
		$this->GotoUrl("添加用户失败，请重试！","?p=front&c=act&a=index",3);
	}

	}
	function loginAction(){
	
		include VIEW_PATH.'login_view.html';
	}
	function checkLoginAction(){
		//验证验证码是否正确
		
		$username=$_POST['username'];
		$pwd=$_POST['pwd'];
		$obj=ModelFactory::M('userModel');
		$data=$obj->chenkLogin($username,$pwd);

		if ($username==$data['username']||$username==$data['emails']||$username=$data['phonenum']) {
			if ($pwd==$data['pwd']) {
			session_start();
			$_SESSION['data']=$data;
			$_SESSION['username']=$data['username'];
			$_SESSION['userid']=$data['userid'];
			$_SESSION['headphoto']=$data['headphoto'];	
			if (isset($_POST['remember'])) {				
				setcookie('username', $username , PHP_INT_MAX);
				setcookie('pwd', $pwd, PHP_INT_MAX);
				
			}
			//header('Location:index.php?p=front&c=act&a=index');
				if ($data['power']=="admin") {
					$this->GotoUrl("登陆成功","?p=back&c=Mge&a=Mge",3);	
				}else if($data['power']=="user"){
					$this->GotoUrl("登陆成功","?p=front&c=act&a=index",3);	
				}else if($data['power']=="superadmin"){

				}else
				
		 	$this->GotoUrl("登陆成功","?p=front&c=act&a=index",3);	
		 		}
		else{
			
			include VIEW_PATH.'login_view.html';
			echo "<script>window.confirm('密码错误，请重试')</script>";

		}
		}else{

			include VIEW_PATH.'login_view.html';
			echo "<script>window.confirm('账户错误,请重试')</script>";
	
	   }
	
}

}