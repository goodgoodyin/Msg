<?php
class AdminModel extends BaseModel{

	public function AddAdminInfo($msg,$username) {
		$time=date("Y-m-d H:i:s");
		$sql="insert into message (时间,留言,username) values ('$time','$msg','$username')";
		// 获取，一行
		return $this->_dao->exec($sql);
	}//添加留言
	public function AddTopicInfo($msg,$type,$username) {
		$time=date("Y-m-d H:i:s");
		$sql="insert into topic (时间,留言,类型,username) values ('$time','$msg','$type','$username')";
		// 获取，一行
		return $this->_dao->exec($sql);
	}//添加话题留言
	public function ShowAdminInfo($db_name) {
		$sql="select * from $db_name order by Id desc";
		return $this->_dao->GetRows1($sql);
	}//获取数组
	/*public function ShowReplyAdminInfo($db_name) {
		$sql="select * from $db_name";
		return $this->_dao->GetRows1($sql);
	}*/
	public function ShowReplyTopicInfo2($id) {
		$sql="select * from topic_reply where main_id=$id";
		return $this->_dao->GetRows1($sql);
	}
	public function ShowReplyAdminInfo2($id) {
		$sql="select * from message_reply where main_id=$id";
		return $this->_dao->GetRows1($sql);
	}
	public function ShowReplyAdminInfo3($id) {
		$sql="select * from message_reply where main_id=$id";
		return $this->_dao->GetRows1($sql);
	}
	public function CommentAdminInfo($msg,$username) {
		$time=date("Y-m-d H:i:s");
		$sql="insert into message (时间,留言,username) values ('$time','$msg,'$username')";
		return $this->_dao->exec($sql);
	}//添加评论
	public function ReplyAdminInfo($message,$parent_id,$main_id,$level,$username,$main_username) {
		$time=date("Y-m-d H:i:s");
		$sql="insert into message_reply (parent_id,main_id,nickname,connect,time,level,main_username) values ($parent_id,$main_id,'$username','$message','$time',$level,'$main_username')";
		return $this->_dao->exec($sql);
	}//添加回复
	public function TReplyAdminInfo($message,$parent_id,$main_id,$level,$username) {
		$time=date("Y-m-d H:i:s");
		$sql="insert into topic_reply (parent_id,main_id,nickname,connect,time,level) values ($parent_id,$main_id,'$username','$message','$time',$level)";
		return $this->_dao->exec($sql);
	}//添加话题回复
	public function CountAdminInfo($db_name) {
		$sql="select count(*) from $db_name";
		return $this->_dao->GetOneData($sql);
	}//计数
	public function DelAdminInfo($id,$db_name) {
		$sql="delete from $db_name where Id=$id";
		return $this->_dao->exec($sql);
	}//删除
	public function ShowTopicInfo($db_name,$type) {
		$sql="select * from $db_name where 类型 = '$type' order by Id desc";
		return $this->_dao->GetRows1($sql);
	}
	public function UpReInfo($id,$db_name) {
		$sql="update $db_name set 状态 = '审核通过' where Id=$id";
		return $this->_dao->exec($sql);
	}
	public function UserInfo($username) {
		$sql="select * from _user where username = '$username' ";
		return $this->_dao->GetRows($sql);
	}
	public function UsernameInfo($main_id) {
		$sql="select username from message where id = $main_id";
		return $this->_dao->GetOneRow($sql);
	}
}