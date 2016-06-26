<?php

class User 
{
	/**
	* Returns the Content of the email body in HTML string
	* @param {String} $email Valid Email id of a user
	* @return {String} Content of the email
	*/
	public static function getBody($email)
	{
		return 'Welcome '.$email;
	}
}

?>