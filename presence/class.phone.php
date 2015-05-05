<?php
	class Phone 
	{
		private $name;
		private $mac;
		private $ip;

		function __construct($name,$mac,$ip)
		{
			$this->name = $name;
			$this->mac = $mac;
			$this->ip = $ip;
		}
		
		public function getName()
		{
			return $this->name;
		}
	
		public function getMac()
		{
			return $this->mac;
		}
		
		public function getIp()
		{
			return $this->ip;
		}

	}
?>