<?php


	if(!defined("APP")) die();

	if(session_id()){
		unset($_SESSION["Username"]);
		session_destroy();
	}

	redirect(".");

?>