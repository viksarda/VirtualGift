<?php


	if(!defined("APP")) die();

	function settingsTableCreate(){
		GLOBAL $db;
		$db->query("
			CREATE TABLE IF NOT EXISTS `Settings` (
				`ID` int NOT NULL AUTO_INCREMENT,
				`Name` VARCHAR(100) NOT NULL UNIQUE,
				`Value` TEXT NOT NULL,
				PRIMARY KEY (`ID`)
			);
		");
	}




	function settingAdd($name, $value){
		GLOBAL $db;
		return $db->query("
			INSERT INTO `Settings` (
				`Name`, 
				`Value`
			)
			VALUES (" . 
				"\"" . $db->real_escape_string($name) . "\", " .
				"\"" . $db->real_escape_string($value) . "\")
			ON DUPLICATE KEY UPDATE `Value` = \"" . $db->real_escape_string($value) . "\";
		") !== false;
	}

	function settingsAll(){
		GLOBAL $db;
		$settings = array();
		$result = $db->query("SELECT * FROM `Settings`;");
		if($result !== false){
			while($row = $result->fetch_assoc()){
				$settings[] = (object)$row;
			}
		}
		$output = array();
		foreach ($settings as $setting) {
			$output[$setting->Name] = $setting->Value;
		}
		return $output;
	}

	$settings = array();
	function setting($name, $default = ""){
		GLOBAL $settings;
		if($settings === array()) $settings = settingsAll();
		if(array_key_exists($name, $settings)) return $settings[$name];
		return $default;
	}

	function settingsClear(){
		GLOBAL $db;
		return $db->query("
			DELETE FROM `Settings`;
		") !== false;
	}


	function fullreset(){
		GLOBAL $db;	
		$db->query("
		DROP table `Settings`;
		");
		$db->query("
		CREATE TABLE `Settings` (
			`ID` int NOT NULL AUTO_INCREMENT,
			`Name` VARCHAR(100) NOT NULL UNIQUE,
			`Value` TEXT NOT NULL,
			PRIMARY KEY (`ID`)
		);
		");
		$db->query("
		INSERT INTO `Settings` (`Name`, `Value`)
		SELECT `Name`, `Value` FROM `Defaultsettings`;
		");	
	}

?>