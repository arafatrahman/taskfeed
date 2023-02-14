<?php
	session_unset();
	require_once  'controller/listfeedController.php';		
    $controller = new listfeedController();	
    $controller->viewHandler();
?>