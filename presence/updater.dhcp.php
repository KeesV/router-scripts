#!/usr/bin/php-cli
<?php
	include('inc.config.php');	

	$type = $argv[1];
	$mac = $argv[2];
	
	//in this case the phone is inside the house
	if($type == 'old' || $type == 'add')
	{
		//see if this is a phone we should monitor
		foreach($config->getPhonesToMonitor() as $phoneToMonitor)
		{
			if($phoneToMonitor->getMac() == $mac)
			{
				$name = $phoneToMonitor->getName();
				syslog(LOG_INFO,"$mac ($name) is in the house, updating presence");
				
				//update presence in DB
				exec(CONF_ROOT_DIR."updatepresence.php $name 1");
			} else {
				syslog(LOG_INFO,"$mac is not monitored, no action");
			}
		}
	}
	
	//in this case the phone is outside the house
	//at this time not reliable because of a bug in Android OS for DHCP
	//Android will not renew the DHCP lease if it still needs it after expiry
	//Therefore, the lease will get deleted if the phone is still in the house
	//ONLY DOING THIS FOR IPHONE
	if($type == 'del')
	{
		//see if this is a phone we should monitor
		foreach($config->getPhonesToMonitor() as $phoneToMonitor)
		{
			if($phoneToMonitor->getMac() == $mac)
			{
				$name = $phoneToMonitor->getName();
				syslog(LOG_INFO,"$mac ($name) has left the house, updating presence");

				//update presence in DB
				exec(CONF_ROOT_DIR."updatepresence.php $name 0");
			} else {
				syslog(LOG_INFO,"$mac is not monitored, no action");
			}
		}
	}
?>