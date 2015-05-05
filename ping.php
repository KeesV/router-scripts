<?php
	date_default_timezone_set("Europe/Amsterdam");
	
	$i=0;
	while(1)
	{
		$output = array();
		exec("ping -c 1 -W 1 keesphone",$output);

		$statistics = array_pop($output);
		$exploded = explode(" ",$statistics);
		if($exploded[0] == "round-trip") {
			$times = explode("/",$exploded[3]);
			$min = $times[0];
			$avg = $times[1];
			$max = $times[2];
	
			//write the statistics to file
			$fh = fopen("/www_1/PingLog.txt","a");
			$stringdata = $i." Seen at: ".date("d-m-Y H:i:s");
			$stringdata.= ", response time: ".$avg."\n";
			fwrite($fh,$stringdata);
			fclose($fh);
		} else {
			$fh = fopen("/www_1/PingLog.txt","a");
			$stringdata = $i." Not seen at: ".date("d-m-Y H:i:s");
			$stringdata.= "\n";
			fwrite($fh,$stringdata);
			fclose($fh);
		}
		sleep(9);
		$i++;
	}

?>