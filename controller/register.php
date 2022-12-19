<?php

class Register extends Controller
{
public function __construct()
{
parent::__construct();
}
function index(){
    $this->view->render('register/index');
}
function signup(){
$user_name=$_POST['user_name'];
$email_id=$_POST['email_id'];
$password=$_POST['password'];
$count=$this->model->check_user($user_name,$email_id);
if($count > 0){
echo 'This User Already Exists';
}
else{
$data = array(
'id' =>null,
'user_name' =>$_POST['user_name'],
'email_id' =>$_POST['email_id'],
'password' =>$_POST['password']
);
$this->model->insert_user($data);
}
header('location:index');
}

}