<?php
require_once('users.php');
require_once('usersDb.php');

$objUserDb = new UserDb();

$client = new GearmanClient();
$client->addServer();

$limit = 100000;

$debug = false;

for($i=0; $i <= 90; $i++)
{	
	$offset = (100000 * $i);
	$resUsers = $objUserDb->getUsersList(array('offset'=>$offset, 'limit'=> $limit));
	if($resUsers->num_rows > 0) 
	{	
		while($row = $resUsers->fetch_assoc()) {
		   $arrUsersId[]  = $row['id'];
		   $details = array('to'=> $row['email'], 'content'=> User::getBody($row['email']));
		   $client->doBackground('sendNewsLetter', serialize($details));
		 }
		 
		if($debug)
		{
			$objUserDb->markEmailsSent($arrUsersId);
		}
	}
}


?>