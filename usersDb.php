<?php

class UserDb 
{
	
	private $_dbConn = '';

	public function __construct()
	{
		$this->_dbConn = new mysqli('localhost', 'root', 'test', 'users');
	}

	/**
	* Gets the users from the database
	* @param array offset and limit to fetch users from database
	* @return usersResultSet
	*/
	public function getUsersList($arrData)
	{	
		$sql = 'select * from users order by id limit '.$arrData['offset'].','.$arrData['limit'];
		return $this->_dbConn->query($sql);
	}

	/**
	* marks sent as 1 for users whom email is sent
	* @param array  UserIdArray
	* @return boolean
	*/
	public function markEmailsSent($arrUsersId)
	{
		$sql = "update users SET sent = 1 where id IN ('".implode("','", $arrUsersId)."')";
		return $this->_dbConn->query($sql);
	}
}
?>