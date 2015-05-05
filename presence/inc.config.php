<?php
	include('class.phone.php');
	include('class.config.php');

	//Root directory of the files
	define('CONF_ROOT_DIR','/www_1/presence/');

	//Telephones to monitor for presence
	$config = new Config();
	
	$config->addPhoneToMonitor("keesphone","10:2f:6b:d6:c8:f0","192.168.1.111");
	$config->addPhoneToMonitor("ingephone","f4:f1:5a:4b:6c:73","192.168.1.112");

	$config->setPresenceDBFileName("/www_1/presence/presence.db");
	$config->setVeraHost('vera.lan');
	$config->setVeraPort('3480');
	$config->setComingHomeSceneNum('13');
	$config->setLeavingHomeSceneNum('21');

?>