<?php
	//Class to hold the configuration data
        class Config
        {
                private $phonesToMonitor;
		private $presenceDBFileName;
		private $veraHost;
		private $veraPort;
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

		public function setVeraHost($hostname)
		{
			$this->veraHost = $hostname;
		}
	
		public function getVeraHost()
		{
			return $this->veraHost;
		}

		public function setVeraPort($port)
		{
			$this->veraPort = $port;
		}

		public function getVeraPort()
		{
			return $this->veraPort;
		}

		public function getVeraUrl()
		{
			$host = $this->getVeraHost();
			$port = $this->getVeraPort();
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