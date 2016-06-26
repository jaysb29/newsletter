<?php
class Communication {
	
	/**
	* Makes the API call to the SMTP server to send an email.
	* Takes in 
	* @param String $to Valid Email id of a user
	* @param String $body Content of the email in HTML string
	* @return void
	*/
	public static function sendEmail($to, $body)
	{
		//here code will be there to send email
		//echo $body." sent to ".$to;
	}
}

?>