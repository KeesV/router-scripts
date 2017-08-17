<?php
	include('class.phone.php');
	include('class.config.php');

	//Root directory of the files
	define('CONF_ROOT_DIR','/opt/share/www/router-scripts/presence/');

	//Telephones to monitor for presence
	$config = new Config();
	
	$config->addPhoneToMonitor("keesphone","18:65:90:2B:3E:F0","192.168.1.111");
	$config->addPhoneToMonitor("ingephone","f4:f1:5a:4b:6c:73","192.168.1.112");

	$config->setPresenceDBFileName("/opt/share/www/router-scripts/presence/presence.db");
	$config->setDomoticzHost('home.lan');
	$config->setDomoticzPort('8080');
	$config->setComingHomeSceneNum('1');
	$config->setLeavingHomeSceneNum('2');

?>
