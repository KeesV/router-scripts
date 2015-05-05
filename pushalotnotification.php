<?php
include('pushalot_api.php');
include('pushalot_config.php');

$title = $_GET['title'];
$message = $_GET['message'];

$pushalot = new Pushalot($apikey);

$success = $pushalot->sendMessage(array(
	'Title'=>$title,
	'Body'=>$message,
	//'LinkTitle'=>'Pushalot.com',
	//'Link'=>'http://www.pushalot.com',
	'IsImportant'=>true,
	'IsSilent'=>false,
	//'Image'=>'http://www.iconsdb.com/icons/preview/black/home-5-xxl.png',
	'Source'=>'Home'
));
echo $success?'The message was submitted.':$pushalot->getError();
?>