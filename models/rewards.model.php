<?php


	if(!defined("APP")) die();

	function rewardsTableCreate(){
		GLOBAL $db;
		$db->query("
			CREATE TABLE IF NOT EXISTS `Rewards` (
				`ID` int NOT NULL AUTO_INCREMENT,
				`Name` TEXT NOT NULL,
				`Color` TEXT NOT NULL,
				`Picture` TEXT NOT NULL,
				`Known` TINYINT(1) NOT NULL,
				`Strikes` INT(1) NOT NULL,
				`Added` TEXT NOT NULL,
				PRIMARY KEY (`ID`)
			);
		");
	}

	function rewardAdd($name, $color, $picture){
		GLOBAL $db;
		$pictureName = GUID() . "." . pathinfo($picture["name"], PATHINFO_EXTENSION);
		$picturePath = "static/rewards/" . $pictureName;
		if(move_uploaded_file($picture["tmp_name"], $picturePath) != true) return false;
		return $db->query("
			INSERT INTO `Rewards` (
				`Name`, 
				`Color`,
				`Picture`,
				`Known`,
				`Strikes`,
				`Added`
			)
			VALUES (" . 
				"\"" . $db->real_escape_string($name) . "\", " .
				"\"" . $db->real_escape_string($color) . "\", " .
				"\"" . $db->real_escape_string($pictureName) . "\", " .
				"\"" . $db->real_escape_string("0") . "\", " .
				"\"" . $db->real_escape_string("0") . "\", " .
				"\"" . $db->real_escape_string(date("d.m.Y H:i:s")) . "\");
		") !== false;
	}

	function rewardUpdate($id, $known = true){
		GLOBAL $db;
		return $db->query("
			UPDATE `Rewards`
			SET `Known` = \"" . $db->real_escape_string($known) . "\"
			WHERE `ID` = \"" . $db->real_escape_string($id) . "\";
		") !== false;
	}

	function rewardUpdateStrikes($id){
		GLOBAL $db;
		return $db->query("
			UPDATE `Rewards`
			SET `Strikes` = `Strikes` + \"1\"
			WHERE `ID` = \"" . $db->real_escape_string($id) . "\";
		") !== false;
	}

	function rewardsReset(){
		GLOBAL $db;
		return $db->query("
			UPDATE `Rewards`
			SET `Known` = \"0\",
			`Strikes` = \"0\";

		") !== false;
	}

	function rewardDelete($id){
		GLOBAL $db;
		$reward = rewardGet($id);
		if($reward === false) return false;
		unlink("static/rewards/" . $reward->Picture);
		return $db->query("
			DELETE FROM `Rewards`
			WHERE `ID` = \"" . $db->real_escape_string($id) . "\";
		") !== false;
	}

	function rewardGet($id){
		GLOBAL $db;
		$result = $db->query("SELECT * FROM `Rewards` WHERE `ID` = \"" . $db->real_escape_string($id) . "\";");
		if($result === false) return false;
		if($result->num_rows == 0) return false;
		return (object)$result->fetch_assoc();
	}

	function rewardExists($id){
		GLOBAL $db;
		$result = $db->query("SELECT * FROM `Rewards` WHERE `ID` = \"" . $db->real_escape_string($id) . "\";");
		if($result === false) return false;
		return $result->num_rows > 0;
	}

	function rewardsAll(){
		GLOBAL $db;
		$rewards = array();
		$result = $db->query("
			SELECT 
				`Rewards`.*, 
				`Participants`.`ID` AS `Participant`,
				`Participants`.`Name` AS `ParticipantName`
			FROM `Rewards`
			LEFT JOIN `Participants` 
			ON `Participants`.`Reward` = `Rewards`.`ID`
			ORDER BY `ID`;
		");
		if($result !== false){
			while($row = $result->fetch_assoc()){
				$rewards[] = (object)$row;
			}
		}
		return $rewards;
	}

	function rewardsClear(){
		GLOBAL $db;
		array_map("unlink", glob("static/rewards/*"));
		return $db->query("
			TRUNCATE TABLE `Rewards`;
		") !== false;
	}

	function rewardNumberUpdate(){
		GLOBAL $db;	
		$db->query("
		CREATE TABLE  `Privremena` (
			`ID` int NOT NULL AUTO_INCREMENT,
			`Name` TEXT NOT NULL,
			`Color` TEXT NOT NULL,
			`Picture` TEXT NOT NULL,
			`Known` TINYINT(1) NOT NULL,
			`Strikes` INT(1) NOT NULL,
			`Added` TEXT NOT NULL,
			PRIMARY KEY (ID)
		);
		
		");
		$db->query("
		INSERT INTO `Privremena` (`Name`, `Color`, `Picture`, `Known`, `Strikes`, `Added`)
		SELECT `Name`, `Color`, `Picture`, `Known`, `Strikes`, Added FROM `rewards`;
		");
		$db->query("
		Drop table `Rewards`;
		");
		$db->query("
		CREATE TABLE  `Rewards` (
			`ID` int NOT NULL AUTO_INCREMENT,
			`Name` TEXT NOT NULL,
			`Color` TEXT NOT NULL,
			`Picture` TEXT NOT NULL,
			`Known` TINYINT(1) NOT NULL,
			`Strikes` INT(1) NOT NULL,
			`Added` TEXT NOT NULL,
			PRIMARY KEY (ID)
		);
		");
		$db->query("
		INSERT INTO `Rewards` (`Name`, `Color`, `Picture`, `Known`, `Strikes`, `Added`)
		SELECT `Name`, `Color`, `Picture`, `Known`, `Strikes`, Added FROM `Privremena`;
		");
		$db->query("
		Drop table `Privremena`;
		");
		
	}
?>