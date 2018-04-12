<?php
class actModel extends BaseModel{

	function addAct($data){
		$userId=$data['userId'];
		$username=$data['username'];
		$actMsg=$data['actMsg'];
		$limits=$data['limits'];
		$actPhoto=$data['actPhoto'];
		$headphoto=$data['headphoto'];
		$time=date("Y-m-d H:i:s");
		$sql="INSERT INTO _act (userId,username,actMsg,limits,atime,actphoto,headphoto) values ($userId,'$username','$actMsg','$limits','$time','$actPhoto','$headphoto');";
		$result=$this->_dao->exec($sql);
		return $result;

	}
	function selectAllId(){
		$sql="SELECT * from _act order by actId desc";
		$data=$this->_dao->GetRows($sql);
		return $data;
	}
	function selectById($userId){
		$sql="SELECT * from _act where userId=$userId  order by actId desc";
		$data=$this->_dao->GetRows($sql);
		return $data;
	}
	function selectByActId($actId){
		$sql="SELECT * from _act where actId=$actId   order by actId desc";
		$data=$this->_dao->GetOneRow($sql);
		return $data;
		
	}
	function updateByActId($actId,$actMsg){
		$sql="UPDATE _act set actMsg='$actMsg' where actId=$actId";
		$data=$this->_dao->exec($sql);
		return $data;
	}
	function deleteByActId($actId){
		$sql="DELETE from _act where actId = $actId";
		$result=$this->_dao->exec($sql);
		return $result; 
	}
}
?>