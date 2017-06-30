<?php
	require_once MODEL_PATH . 'sql_base.php';

	class user_model extends sql_base
	{
		private $db = 'suineg';
		private $tb = 'user';
		
		public function __construct()
		{
			
			parent::__construct($this->db, $this->tb);
		}
		
		public function login($email,$password)
		{
			$param = array("email");
			$param_value = array($email);
			$want = array("*");
			
			$res = $this->get_one($want, $param, $param_value);
			if($res["password"] === $password)
			{
				return $res;
			}
			else 
			{
				return false;
			}
		}
		
	}


?>
