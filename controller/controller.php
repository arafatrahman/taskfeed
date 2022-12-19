<?php
require_once('models/models.php');
class Controllers
{
	public function __construct()
	{
		$this->models = new Model();
	}

	public function invoke(){
        $result = $this->models->getLogins();
        if($result == 'login') { include('views/login/index.php'); }
        else { include('views/register/index.php'); }
    } 
		
}