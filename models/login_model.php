<?php

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		Session::init();
	}

	public function run()
	{
		
		$user_name=$_POST['user_name'];
		$password=md5($_POST['password']);
		
		$res= $this->db->select("SELECT * FROM `register` WHERE username = '".$username."' AND password = '".$password."'");
		$count = count($res);
		
		if ($count > 0) {
			
			Session::init();
			Session::set('role', "user");
			Session::set('loggedIn', true);
			Session::set('user_name', $user_name);
			Session::set('password', $res[0]['password']);
			header('location: '.URL.'login/index');
		} 
		   else {
			Session::set('loggedIn', false);
			header('location: '.URL);
		}
		
		
	}
		
}