<?php


	if(!defined("APP")) die();

	if(isLoggedIn() === false) redirect(".");

	if(isset($_POST["action"])){

		switch ($_POST["action"]) {

			case "change_title":
				if(isset($_POST["title"]) && isset($_POST["title2"]) && isset($_POST["title_color"])){
					if(settingAdd("title", $_POST["title"]) && settingAdd("title2", $_POST["title2"]) && settingAdd("title_color", $_POST["title_color"])){
						alert("Successfully updated title");
					}else{
						alert("Could not update title");
					}
				}
			break;

			case "change_nextup":
				if(
					isset($_POST["nextup_title"]) && 
					isset($_POST["nextup_color"]) && 
					isset($_POST["nextup_text_color"])
				){
					if(
						settingAdd("nextup_title", $_POST["nextup_title"]) && 
						settingAdd("nextup_color", $_POST["nextup_color"]) &&
						settingAdd("nextup_text_color", $_POST["nextup_text_color"])
					){
						alert("Successfully updated nextup");
					}else{
						alert("Could not update nextup");
					}
				}
			break;

			case "change_endgame":
				if(
					isset($_POST["endgame_title"]) && 
					isset($_POST["endgame_color"]) && 
					isset($_POST["endgame_text_color"])
		
				){
					if(
						settingAdd("endgame_title", $_POST["endgame_title"]) && 
						settingAdd("endgame_color", $_POST["endgame_color"]) &&
						settingAdd("endgame_text_color", $_POST["endgame_text_color"])
					){
						alert("Successfully updated endgame");
					}else{
						alert("Could not update endgame");
					}
				}
			break;

			case "change_header":
				if(isset($_FILES["header"]) && $_FILES["header"]["tmp_name"] != ""){
					if(move_uploaded_file($_FILES["header"]["tmp_name"], "assets/img/header.jpg") === true){
						alert("Successfully uploaded header");
					}else{
						alert("Could not upload header");
					}
				}
			break;

			case "change_background":
                if(isset($_FILES["background-cela-slika"]) && $_FILES["background-cela-slika"]["tmp_name"] != ""){
                    if(move_uploaded_file($_FILES["background-cela-slika"]["tmp_name"], "assets/img/background.png") === true){
                        alert("Successfully uploaded  background");
                    }else{
                        alert("Could not upload  background");
                    }
                }
                if(isset($_POST["color"]) && $_POST["color"] != ""){
                    if(settingAdd("color", $_POST["color"])){
                        alert("Successfully updated color");
                    }else{
                        alert("Could not update color");
                    }
                }
            break;

			case "add_participant":
				if(isset($_POST["name"]) && $_POST["name"] != ""){
					if(participantAdd($_POST["name"])){
						alert("Successfully added participant");
					}else{
						alert("Could not add participant");
					}
				}				
			break;

			case "delete_participant":
				if(isset($_POST["id"]) && $_POST["id"] != ""){
					if(participantDelete($_POST["id"])){
						alert("Successfully deleted participant");
					}else{
						alert("Could not delete participant");
					}
				}				
			break;

			case "clear_participants":
				if(participantsClear()){
					alert("Successfully added participant");
				}else{
					alert("Could not add participant");
				}
			break;

			case "add_reward":
				if(
					isset($_POST["name"]) && $_POST["name"] != "" &&
					isset($_POST["color"]) && $_POST["color"] != "" &&
					isset($_FILES["picture"]) && $_FILES["picture"]["tmp_name"] != ""
				){
					if(rewardAdd($_POST["name"], $_POST["color"], $_FILES["picture"])){
						alert("Successfully added reward");
					}else{
						alert("Could not add reward");
					}
				}				
			break;

			case "delete_reward":
				if(isset($_POST["id"]) && $_POST["id"] != ""){
					if(rewardDelete($_POST["id"])){
						alert("Successfully deleted reward");
					}else{
						alert("Could not delete reward");
					}
				}				
			break;

			case "clear_rewards":
				if(rewardsClear()){
					alert("Successfully cleared the rewards");
				}else{
					alert("Could not remove the rewards");
				}
			break;

			case "reset":
				if(rewardsReset() && participantsReset() && settingAdd("ended", false)){
					alert("Successfully resetted");
				}else{
					alert("Could not reset");
				}
			break;

			case "endgame":
				if(settingAdd("ended", true)){
					alert("Successfully ended game");
				}else{
					alert("Could not end game");
				}
			break;

			case "box_change":
			
			
				if(isset($_POST["boxnum_color"]) && $_POST["boxnum_color"] != ""){
					if(settingAdd("boxnum_color", $_POST["boxnum_color"])){
						alert("Successfully updated color");
					}else{
						alert("Could not update color");
					}
				}

			
			break;

			case "change_box":
			

				if(isset($_FILES["box"]) && $_FILES["box"]["tmp_name"] != ""){
					if(move_uploaded_file($_FILES["box"]["tmp_name"], "assets/img/box.png") === true){
						alert("Successfully update box pic");
					}else{
						alert("Could not upload box pic");
					}
				}
			break;


			case "reset_numbers":
				if(rewardNumberUpdate()){
						alert("Successfully resetted the numbers");
					}else{
						alert("Successfully resetted the numbers");
					}
				
			break;

			case "factory_reset":
				if(fullreset()){
					alert("Successfully changed settings");
				}else{
					alert("Successfully changed settings");
				}
			break;

		}

	}

	require "views/admin.view.php";

?>