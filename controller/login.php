<?php

class Login extends Controller {

	function __construct() {
		parent::__construct();
		  Session::init();
	}
	
	
	function index() {
	
		$this->view->render('login/index');
	}
	
	function run()
	{
		$this->model->run();
		
	}
	
	
	/* logging out the user */
	function logout()
	{
		Session::destroy();
		header('location: index');
		exit;
	}
}