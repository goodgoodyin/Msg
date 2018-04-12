<?php

class BaseModel{
	//这个，用于存储数据库工具类的实例（对象）
	protected $_dao = null;

	function __construct(){
		$config = array(
			'host' => "127.0.0.1",
			'port' => "127.0.0.1",
			'user' => "root",
			'pass' => "root",
			'charset' => "utf8",
			'dbname' => "_message"
		);
		$this->_dao = MySQLDB::GetInstance($config);
	}

}
