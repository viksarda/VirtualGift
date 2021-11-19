<?php


	if(!defined("APP")) die();

	if(isLoggedIn()){
		if(isset($_POST["id"])){
			$participant = participantFirst();
			$reward = rewardGet($_POST["id"]);
			if($participant !== false && $reward !== false){
				if($reward->Strikes < 3){
					rewardUpdate($reward->ID);
					if($reward->Known) rewardUpdateStrikes($reward->ID);
					participantsResetByReward($reward->ID);
					participantUpdate($participant->ID, $reward->ID);
				}
			}
		}
	}
	
?>