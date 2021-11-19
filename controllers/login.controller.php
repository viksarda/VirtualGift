<?php


	if(!defined("APP")) die();

	if(isset($_POST["username"]) && isset($_POST["password"])){
		if($_POST["username"] === ADMIN_USER && $_POST["password"] === ADMIN_PASS){
			$_SESSION["Username"] = ADMIN_USER;
			alert("Successfully logged in");
			redirect(".");
		}else{
			alert("Incorrect username or password");
		}
	}

	require "views/login.view.php";

?>