<?php
	include('inc.config.php');
	//first get current presence from disk
        if(file_exists($config->getPresenceDBFileName()))
        {
                $presence = unserialize(file_get_contents($config->getPresenceDBFileName()));
        } else {
                $presence = array();
        }
#	echo '<pre>';
#	echo print_r($presence);
#	echo '</pre>';

	if($_GET['q'])
	{
		$q = $_GET['q'];
		$present = $presence[$q]['ishome'];
		if($present) {
			echo '1';
		} else {
			echo '0';
		}
	} else {
		$present = 0;
		foreach($presence as $phone)
		{
			$present += $phone['ishome'];
		}
		if($present > 0)
		{
			echo '1';
		} else {
			echo '0';
		}
	}

?>