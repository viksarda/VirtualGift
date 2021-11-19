<?php



	if(!defined("APP")) die();

	function participantsTableCreate(){
		GLOBAL $db;
		$db->query("
			CREATE TABLE IF NOT EXISTS `Participants` (
				`ID` int NOT NULL AUTO_INCREMENT,
				`Name` TEXT NOT NULL,
				`Added` TEXT NOT NULL,
				`Reward` INT NOT NULL,
				PRIMARY KEY (`ID`)
			);
		");
	}

	function participantAdd($name){
		GLOBAL $db;
		return $db->query("
			INSERT INTO `Participants` (
				`Name`, 
				`Added`,
				`Reward`
			)
			VALUES (" . 
				"\"" . $db->real_escape_string($name) . "\", " .
				"\"" . $db->real_escape_string(date("d.m.Y H:i:s")) . "\", " .
				"\"" . $db->real_escape_string("") . "\");
		") !== false;
	}

	function participantUpdate($id, $reward){
		GLOBAL $db;
		return $db->query("
			UPDATE `Participants`
			SET `Reward` = \"" . $db->real_escape_string($reward) . "\"
			WHERE `ID` = \"" . $db->real_escape_string($id) . "\";
		") !== false;
	}

	function participantsResetByReward($reward){
		GLOBAL $db;
		return $db->query("
			UPDATE `Participants`
			SET `Reward` = \"\"
			WHERE `reward` = \"" . $db->real_escape_string($reward) . "\";
		") !== false;
	}

	function participantsReset(){
		GLOBAL $db;
		return $db->query("
			UPDATE `Participants`
			SET `Reward` = \"\";
		") !== false;
	}

	function participantDelete($id){
		GLOBAL $db;
		return $db->query("
			DELETE FROM `Participants`
			WHERE `ID` = \"" . $db->real_escape_string($id) . "\";
		") !== false;
	}

	function participantExists($id){
		GLOBAL $db;
		$result = $db->query("
			SELECT * FROM `Participants` 
			WHERE `ID` = \"" . $db->real_escape_string($id) . "\";
		");
		if($result === false) return false;
		return $result->num_rows > 0;
	}

	function participantsAll($nonRewardOnly = false){
		GLOBAL $db;
		$participants = array();
		$query = "
			SELECT 
				`Participants`.*,
				`Rewards`.`ID` AS `Reward`,
				`Rewards`.`Name` AS `RewardName`
			FROM `Participants`
			LEFT JOIN `Rewards` 
			ON `Participants`.`Reward` = `Rewards`.`ID`
			" . ($nonRewardOnly ? " WHERE `Reward` = '' " : "") . ";
		";
		$result = $db->query($query);
		if($result !== false){
			while($row = $result->fetch_assoc()){
				$participants[] = (object)$row;
			}
		}
		return $participants;
	}

	function participantFirst($name = false){
		GLOBAL $db;
		$result = $db->query("
			SELECT * FROM `Participants` 
			WHERE `Reward` = ''
			ORDER BY `ID` 
			LIMIT 1;
		");
		if($result === false) return false;
		if($result->num_rows === 0) return false;
		$participant = $result->fetch_assoc();
		if($participant === false) return false;
		if($name){
			return $participant["Name"];
		}else{
			return (object)$participant;
		}
	}

	function participantsClear(){
		GLOBAL $db;
		return $db->query("
			DELETE FROM `Participants`;
		") !== false;
	}

?>