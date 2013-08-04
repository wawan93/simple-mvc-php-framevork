<?php
	header('Content-Type: text/html; charset=utf-8', true);
	define('SITE_ROOT', dirname(__FILE__));
	define('APP',true);
	define('MODE', 'dev');

	include_once "app/config.php";
	include_once "system/db.php";
	include_once "system/model.php";
	include_once "system/controller.php";

	// http://gallery.loc/index.php?do=main/index

	$url = $_SERVER['REQUEST_URI'];
	$url = explode ('/', $url);

	// delete first '/'
	if($url[0] == '') array_shift($url);
	// and delete 'index.php'
	if($url[0] == 'index.php') array_shift($url); 

	$controller = array_shift($url);

	if (!preg_match('#^[a-zA-Z0-9.,-]*$#', $controller))
		throw new Exception('Invalid path');

	$path = 'app/controllers/' . $controller . '.php';
	if (file_exists($path)) {
		include_once $path;
		$controller = new $controller();

		if (empty($url) || empty($url[0])) {
			$controller->index();
		} else {
			if (empty($url))
				$method = 'index';
			else
				$method = array_shift($url);
			if (method_exists($controller, $method)) {
				// dbg($url);
				if (empty($url))
					$controller->$method();
				else
					call_user_func_array (array($controller,$method), $url);
			} else
				die('Error 404');
		}
	} else {
		header("HTTP/1.0 404 Not Found");
		echo "Not found!";
	}
