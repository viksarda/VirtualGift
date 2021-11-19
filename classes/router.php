<?php


	if(!defined("APP")) die();

//	if(!isset($_SERVER["PATH_INFO"])) die();
//	$route = strtolower(ltrim($_SERVER["PATH_INFO"], '//'));
	if(!isset($_SERVER["QUERY_STRING"])) die();
	$route = strtolower(ltrim($_SERVER["QUERY_STRING"], '//'));
	switch($route) {

		case "":
			require "controllers/main.controller.php";
		break;

		case "admin":
			require "controllers/admin.controller.php";
		break;

		case "partial":
			require "views/partial.view.php";
		break;

		case "selection":
			require "controllers/selection.controller.php";
		break;

		case "login":
			require "controllers/login.controller.php";
		break;

		case "logout":
			require "controllers/logout.controller.php";
		break;

		default:
			diex("Error 404");
		break;

	}

?>