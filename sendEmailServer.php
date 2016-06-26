<?php

require_once('communication.php');

$worker = new GearmanWorker();
$worker->addServer();
 
// Register the same function we invoked on the client
$worker->addFunction("sendNewsLetter", function (GearmanJob $job) {
	$arrData = unserialize($job->workload());
	Communication::sendEmail($arrData['to'], $arrData['content']);
});
 
// keep an infinite loop so the script won't die
while ($worker->work());
?>