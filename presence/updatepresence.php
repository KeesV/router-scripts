<?php
//	require_once('inc.config.php');
	
	function updatepresence($config, $phone_to_update, $present)
	{
	
	//$phone_to_update = $argv[1];
	//$present = $argv[2];
	
	syslog(LOG_INFO, "Updating presence for ".$phone_to_update);
	
	//first get current presence from disk
	if(file_exists($config->getPresenceDBFileName()))
	{
		$presence = unserialize(file_get_contents($config->getPresenceDBFileName()));
	} else {
		$presence = array();
	}
	echo "Current presence:\n";
	print_r($presence);
	echo "\n\n";
	
	//First see if someone was already home
	$washome = 0;
	foreach($presence as $phone)
	{
		$washome += $phone['ishome'];
	}
	if($washome > 0)
	{
		$washome = 1;
	}

	//Now update the database with the data we just got
	$presence[$phone_to_update]['ishome'] = $present;
	file_put_contents($config->getPresenceDBFileName(), serialize($presence));

	//Now see if somebody is currently home
	$ishome = 0;
	foreach($presence as $phone)
	{
		$ishome += $phone['ishome'];
	}
	if($ishome > 0)
	{
		$ishome = 1;
	}
	
	echo "New presence:\n";
	print_r($presence);

	//Now take action accordingly
	if($ishome == 1)
	{
		if($washome == 0)
		{
			//now home, turn on the lights!
			syslog(LOG_INFO,"$phone_to_update is now home, was not before: Turning on the lights!");
			$veraurl = $config->getVeraUrl();
			$sceneNum = $config->getComingHomeSceneNum();
			$requestUrl = 'http://'.$veraurl.'/data_request?id=lu_action&serviceId=urn:micasaverde-com:serviceId:HomeAutomationGateway1&action=RunScene&SceneNum='.$sceneNum;
			syslog(LOG_INFO,"Using request URL: ".$requestUrl);
			file_get_contents($requestUrl);

		}
		if($washome == 1)
		{
			//situation hasn't changed, do nothing
		}
	}
	if($ishome == 0)
	{
		if($washome == 0)
		{
			//nobody was home, and still nobody is home: do nothing
		}
		if($washome == 1)
		{
			//we have left the building
			syslog(LOG_INFO,"$phone_to_update is not home anymore: Turning off the lights!");
			$veraurl = $config->getVeraUrl();
			$sceneNum = $config->getLeavingHomeSceneNum();
			$requestUrl = 'http://'.$veraurl.'/data_request?id=lu_action&serviceId=urn:micasaverde-com:serviceId:HomeAutomationGateway1&action=RunScene&SceneNum='.$sceneNum;
			syslog(LOG_INFO,"Using request URL: ".$requestUrl);
			file_get_contents($requestUrl);
		}

	}
	}
?>