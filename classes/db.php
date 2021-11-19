<?php


	if(!defined("APP")) die();

	$db = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

	if($db->connect_errno) die("Database error");

	require "models/settings.model.php";
	require "models/participants.model.php";
	require "models/rewards.model.php";

	participantsTableCreate();
	rewardsTableCreate();
	settingsTableCreate();

?>