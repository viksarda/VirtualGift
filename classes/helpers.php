<?php

	if(!defined("APP")) die();
		
	function RootURL(){
		$url = isset($_SERVER["HTTPS"]) ? "https://" : "http://";
		$url .= $_SERVER["HTTP_HOST"];
		$url .= ($_SERVER["SERVER_PORT"] === "80" || $_SERVER["SERVER_PORT"] === "443") ? "" : ":" . $_SERVER["SERVER_PORT"];
		$url .= str_replace($_SERVER["DOCUMENT_ROOT"], "", str_replace("\\", "/", dirname($_SERVER["SCRIPT_FILENAME"])));
		$url .= substr($url, -1) === "/" ? "" : "/";
		return $url;
	}

	function GUID(){
		if (function_exists('com_create_guid') === true){
			return strtolower(trim(com_create_guid(), '{}'));
		}else{
			return strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)));
		}
	}

	function redirect($url){
		header("Location: " . $url);
		die();
	}

	function diex($message){
		require "views/message.view.php";
		die();
	}

	$alert = "";
	function alert($msg){
		GLOBAL $alert;
		$alert = $msg;
	}

	function echox($text){
		echo htmlentities($text);
	}

	function echoPost($text){
		if(!isset($_POST[$text])) return;
		echo htmlentities($_POST[$text]);
	}

	function isPOST(){
		return $_SERVER["REQUEST_METHOD"] === "POST";
	}

	function isLoggedIn(){
		return isset($_SESSION["Username"]);
	}

?>