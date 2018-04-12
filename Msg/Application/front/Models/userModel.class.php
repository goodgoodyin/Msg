<?php
class userModel extends BaseModel{

	public function chenkLogin($username,$pwd){
		$sql="SELECT * from _user where username='$username' or emails='$username' or phonenum='$username'";
		$data=$this->_dao->getOneRow($sql);
		
		return $data;
	}
	function selectTA($searchkey,$userid){
		$len=count($searchkey)-1;
		$sql="SELECT * from _act where userid=$userid and ";
		foreach ($searchkey as $key => $value) {
			if ($key==$len) {
				$sql.=" actMsg LIKE '%$value%' ";
			}else{
			
			$sql.=" actMsg LIKE '%$value%' or ";
			}
		}
		$sql.=" ";
		$data=$this->_dao->getRows($sql);
		return $data;
	}
	function select($searchkey){
		$len=count($searchkey)-1;
		$sql="SELECT * from _act where ";
		foreach ($searchkey as $key => $value) {
			if ($key==$len) {
				$sql.="username LIKE '%$value%' or actMsg LIKE '%$value%' ";
			}else{
			
			$sql.="username LIKE '%$value%' or actMsg LIKE '%$value%' or ";
			}
		}
		$data=$this->_dao->getRows($sql);
		return $data;

	}
	function selectPhoto($userid){
		$sql="SELECT actphoto from _act where userId=$userid";
		$data=$this->_dao->getRows($sql);
		return $data;
	}
	function updatePwd($username,$pwd){
		$sql="UPDATE  _user set pwd='$pwd' where username='$username'";
		$result=$this->_dao->exec($sql);
		return $result;
	}

	function selectis($username,$phonenum){
		$sql="SELECT * from _user where username='$username'";
		$data=$this->_dao->getOneRow($sql);
		if ($data['username']==$username) {
			if ($data['phonenum']==$phonenum) {
				return 'true';
			}else{
				return 'phonenumfalse';
			}
			
		}else{
			return 'usernamefalse';
		}
	}
	function selectIsF($userid,$friendsid){
		$sql="SELECT * from  _friends where userid=$userid and friendsid=$friendsid ";
		$sql1="SELECT * from  _friends where userid=$userid ";
		$data=$this->_dao->getOneRow($sql1);
		$data1=$this->_dao->getOneRow($sql);
		if (empty($data1)&&empty($data2)) {
			$isfriends=0;
		}
		else {
				$isfriends=1;
		}
		return $isfriends;
	}
	function addF($friendsid,$friendsname,$userid,$username){
		$sql="INSERT into _friends (friendsid,friendsname,userid,username) values ($friendsid,'$friendsname',$userid,'$username')";
		$result=$this->_dao->exec($sql);
		return $result;

	}
	function selectNById($userid){
		$sql="SELECT * from _user where userid=$userid ";
		$data=$this->_dao->getOneRow($sql);
		return $data;
	}
	function deleteN($friendsid){
	 	$sql="DELETE from _friends where userid=$friendsid";
	 	$result=$this->_dao->exec($sql);
	 	return $result;
	 }
	 function selectNsByid($friendsid){
		$sql="SELECT * from _friends where friendsid=$friendsid ";
		$data=$this->_dao->getRows($sql);
		return $data;	
	}
	 function deleteF($friendsid){
	 	$sql="DELETE from _friends where friendsid=$friendsid";
	 	$result=$this->_dao->exec($sql);
	 	return $result;
	 }
	  function countF($userid){
		$sql="SELECT *  from _friends where userid=$userid";
		$data=$this->_dao->getRows($sql);
		return $data;	
	}
	 function countN($userid){
		$sql="SELECT count(*) as count from _friends where friendsid=$userid";
		$data=$this->_dao->getOneRow($sql);
		return $data;	
	}
	 function selectFByid($friendsid){
		$sql="SELECT * from _user where userid=$friendsid  ";
		$data=$this->_dao->getOneRow($sql);
		return $data;	
	}
	 function selectFsByid($userid){
		$sql="SELECT * from _friends where userid=$userid";
		$data=$this->_dao->GetRows($sql);
		return $data;
	}
	function addUser($username,$pwd,$headPhoto){
		$sql1="SELECT * from _user where username='$username'";
		$data1=$this->_dao->getOneRow($sql1);
		if ($data1['username']==$username) {
			$result='isusername';
		}else{
		$sql="INSERT into _user (username,pwd,headphoto) values ('$username','$pwd','$headPhoto')";
		$result=$this->_dao->exec($sql);
			}
		return $result;
	}
	function updateUser($data){
		$userid=$data['userid'];
		$sex=$data['sex'];
		$phonenum=$data['phonenum'];
		$emails=$data['emails'];
		$place=$data['place'];
		$headphoto=$data['headPhoto'];
		$brief=$data['brief'];
		
		$sql2="SELECT * from _user where emails='$emails'";
		$data2=$this->_dao->getOneRow($sql2);
		$sql3="SELECT * from _user where phonenum='$phonenum'";
		$data3=$this->_dao->getOneRow($sql3);

			if ($data2['userid']!=$userid&&$data2['emails']==$emails) {
				 $result='isemails';	
			}else if($data3['phonenum']==$phonenum&&$data3['userid']!=$userid){
				 $result='isphonenum';
			}else{
				$sql="UPDATE _user set sex='$sex',phonenum='$phonenum',emails='$emails',place='$place',headphoto='$headphoto',brief='$brief' where userid=$userid";
				$sql4="UPDATE _act set headphoto='$headphoto' where userid=$userid";
				$s=$this->_dao->exec($sql4);
				$result=$this->_dao->exec($sql);
			}
		return $result;
	}
	function selectByid($userid){
		$sql="SELECT * from _user where userid=$userid";
		$data=$this->_dao->getOneRow($sql);
		return $data;
	}

}
?>