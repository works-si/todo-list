<?php
	if ($_GET)
	{
		$controller = $_GET['controller'];
		$method = $_GET["method"];
		require_once "controller/" . $controller. ".php";
		$obj = new $controller();
		$obj->$method();
	}
	else
	{
		require_once "controller/user_controller.php";
		$UserController = new user_controller();
		$UserController->login();
	}
?>
