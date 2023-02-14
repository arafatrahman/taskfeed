<?php
    require 'model/configModel.php';
    require_once 'config.php';   

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    
	class listfeedController 
	{

 		function __construct() 
		{          
			$this->lfconfig = new config();
			$this->lfsm =  new configModel($this->lfconfig);
		}
        // mvc handler request
		public function viewHandler() 
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
            echo $act;
            
			switch ($act) 
			{
                case 'add' :                    
					$this->insert();
					break;						
				case 'update':
					$this->update();
					break;				
				case 'delete' :					
					$this->delete();
					break;
                case 'list' :					
					$this->list();
					break;	
                case 'signup' :					
					$this->signup();
					break;	        								
				default:
                    $this->home();
			}
		}		
        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}	
        
        public function list(){
            $result=$this->lfsm->selectRecord(0);
            include "view/list.php";                                        
        }
        public function signup(){            
            include "view/home/signup.php";                                        
        }
        public function home(){  
            include "view/home/home.php";                                        
        }
    }
		
	
?>