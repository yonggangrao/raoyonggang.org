<?php 

	require_once  MODEL_PATH . 'user.php';

	class user extends controller
	{
		public function login()
		{
			$action = get_response('action');
			switch ($action)
			{
				case 'login':
					$email = get_response('email');
					$password = get_response('password');
					$o_user = new user_model();
					$res = $o_user->login($email, $password);
					
					if(empty($res))
					{
						echo json_encode(array('ret'=>'error'));
					}
					else
					{
						set_session($res['id'], $res['email'], $res['name']);
						echo json_encode(array('ret'=>'success'));
					}
					
					break;
					
				default:
					$this->render('login');
					
			}
		}
	}
?>