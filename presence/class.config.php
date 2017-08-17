<?php
	//Class to hold the configuration data
        class Config
        {
                private $phonesToMonitor;
		private $presenceDBFileName;
		private $domoticzHost;
		private $domoticzPort;
		private $comingHomeSceneNum;
		private $leavingHomeSceneNum;		


                function __construct()
                {
                        $this->phonesToMonitor = array();
                }

                public function getPhonesToMonitor()
                {
                        return $this->phonesToMonitor;
                }

                public function addPhoneToMonitor($name, $mac, $ip)
                {
                        $this->phonesToMonitor[] = new Phone($name,$mac,$ip);
                }

		public function setPresenceDBFileName($filename)
		{
			$this->presenceDBFileName = $filename;
		}

		public function getPresenceDBFileName()
		{
			return $this->presenceDBFileName;
		}

		public function setDomoticzHost($hostname)
		{
			$this->domoticzHost = $hostname;
		}
	
		public function getDomoticzHost()
		{
			return $this->domoticzHost;
		}

		public function setDomoticzPort($port)
		{
			$this->domoticzPort = $port;
		}

		public function getDomoticzPort()
		{
			return $this->domoticzPort;
		}

		public function getDomoticzUrl()
		{
			$host = $this->getDomoticzHost();
			$port = $this->getDomoticzPort();
			$url = $host.':'.$port;
			return $url;
		}

		public function setComingHomeSceneNum($num)
		{
			$this->comingHomeSceneNum = $num;
		}

		public function getComingHomeSceneNum()
		{
			return $this->comingHomeSceneNum;
		}

		public function setLeavingHomeSceneNum($num)
		{
			$this->leavingHomeSceneNum = $num;
		}

		public function getLeavingHomeSceneNum()
		{
			return $this->leavingHomeSceneNum;
		}

        }
?>
