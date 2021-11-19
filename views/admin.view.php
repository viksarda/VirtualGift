<?php  

if(!defined("APP")) die(); ?>

<?php require "views/header.view.php"; ?>

	<div class="card-columns">
	
		<div class="card">
			<form method="POST" enctype="multipart/form-data">
				<div class="card-header h3 mb-0 text-primary">Change Title</div>
				<div class="card-body">
					<div class="form-group">
						<label>Left Title</label>
						<input type="text" name="title" class="form-control" placeholder="Enter left title" value="<?php echox(setting("title")) ?>">
					</div>
					<div class="form-group">
						<label>Right Title</label>
						<input type="text" name="title2" class="form-control" placeholder="Enter right title" value="<?php echox(setting("title2")) ?>">
					</div>
					<div>
						<label>Background Color</label>
						<input type="text" name="title_color" class="form-control" placeholder="#000000" value="<?php echox(setting("title_color")) ?>">
					</div>
				</div>
				<div class="card-footer p-3">
					<input type="hidden" name="action" value="change_title">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	
		<div class="card">
			<form method="POST" enctype="multipart/form-data">
				<div class="card-header h3 mb-0 text-primary">Change Next Up Look</div>
				<div class="card-body">
					<div class="form-group">
						<label>Next Up Title</label>
						<input type="text" name="nextup_title" class="form-control" placeholder="Enter next up title" value="<?php echox(setting("nextup_title")) ?>">
					</div>
					<div class="form-group">
						<label>Next Up Background Color</label>
						<input type="text" name="nextup_color" class="form-control" placeholder="#000000" value="<?php echox(setting("nextup_color")) ?>">
					</div>
					<div>
						<label>Next Up Text Color</label>
						<input type="text" name="nextup_text_color" class="form-control" placeholder="#000000" value="<?php echox(setting("nextup_text_color")) ?>">
					</div>
				</div>
				<div class="card-footer p-3">
					<input type="hidden" name="action" value="change_nextup">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	
		<div class="card">
			<form method="POST" enctype="multipart/form-data">
				<div class="card-header h3 mb-0 text-primary">Change End Game Look</div>
				<div class="card-body">
					<div class="form-group">
						<label>End Game Title</label>
						<input type="text" name="endgame_title" class="form-control" placeholder="Enter End Game title" value="<?php echox(setting("endgame_title")) ?>">
					</div>
					<div class="form-group">
						<label>End Game Background Color</label>
						<input type="text" name="endgame_color" class="form-control" placeholder="#000000" value="<?php echox(setting("endgame_color")) ?>">
					</div>
					<div>
						<label>End Game Text Color</label>
						<input type="text" name="endgame_text_color" class="form-control" placeholder="#000000" value="<?php echox(setting("endgame_text_color")) ?>">
					</div>
				</div>
				<div class="card-footer p-3">
					<input type="hidden" name="action" value="change_endgame">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	
		<div class="card">
			<form method="POST" enctype="multipart/form-data">
				<div class="card-header h3 mb-0 text-primary">Change Header</div>
				<div class="card-body">
					<input type="file" name="header" class="form-control">
				</div>
				<div class="card-footer p-3">
					<input type="hidden" name="action" value="change_header">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	
		<div class="card">
            <form method="POST" enctype="multipart/form-data">
                <div class="card-header h3 mb-0 text-primary">Change Background</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Background Image</label>
                        <input type="file" name="background-cela-slika" class="form-control">
                    </div>
                    <div>
                        <label>Background Color</label>
                        <input type="text" name="color" class="form-control" placeholder="#000000" value="<?php echox(setting("color")) ?>">
                    </div>
                </div>
                <div class="card-footer p-3">
                    <input type="hidden" name="action" value="change_background">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

		<div class="card">
			<div class="card-header h3 mb-0 text-primary">Participants</div>
			<form method="POST">
				<ul class="list-group list-group-flush">
					<?php foreach(participantsAll() as $participant): ?>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<div>
								<?php echox($participant->Name); ?>
								<?php if($participant->Reward != false): ?>
									&bull; <span class="text-success"><?php echox($participant->RewardName); ?></span>
								<?php else: ?>
									&bull; <span class="text-muted">No Reward</span>
								<?php endif; ?>
							</div>
							<button type="submit" name="id" value="<?php echox($participant->ID); ?>" class="btn btn-sm btn-danger">Delete</button>
						</li>	
					<?php endforeach; ?>
					<input type="hidden" name="action" value="delete_participant">
				</ul>
			</form>
			<div class="card-footer p-3">
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" placeholder="Enter participant name">
					</div>
					<div class="d-flex justify-content-between">
						<button type="submit" name="action" value="add_participant" class="btn btn-success">Add</button>
						<button type="submit" name="action" value="clear_participants" class="btn btn-danger">Clear All</button>
					</div>
				</form>
				<form method="POST">
					<input type="hidden">
				</form>
			</div>
		</div>

		<div class="card">
            <div class="card-header h3 mb-0 text-primary">Export</div>
            <div class="card-body">
                Export the result
            </div>
            <form method="GET" action="Final_Rewards.csv">
             <?php $headers = array("Name", "Reward"); ?>
             <?php $fileOpen =fopen("static/FinalRewards/Final_Rewards.csv", "w") ?>
                <?php fputcsv($fileOpen, $headers)?>
                    <?php foreach(participantsAll() as $participant): ?>
                    <?php      $name = $participant->Name;
                            $present = $participant->RewardName;
                            $sname = strval( $name ); 
                            $spresent = strval( $present ); 
                            $data = array($sname, $spresent);?>
                                <?php if($participant->Reward != false): ?>
                                    <?php fputcsv($fileOpen, $data); ?>
                                       <?php else: ?>
                                    <?php    $data = array($sname, "no reward");?>
                                    <?php fputcsv($fileOpen, $data); ?>

                                <?php endif; ?>
                    <?php endforeach; ?>
                    <?php fclose($fileOpen)?>

                    <?php    alert("Successfully exported"); ?>

					<div class="card-footer p-3">
			
                    <a href="static/FinalRewards/Final_Rewards.csv" download="Final_Rewards.csv" class="btn btn-success text-white">Export</a> 
					</div>
                </form>
        </div>


	
		<div class="card">
			<div class="card-header h3 mb-0 text-primary">Rewards</div>
			<form method="POST">
				<ul class="list-group list-group-flush">
					<?php foreach(rewardsAll() as $reward): ?>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<div>
								<a href="static/rewards/<?php echox($reward->Picture); ?>"><?php echox($reward->Name); ?></a>
								&bull; <span style="color:<?php echox($reward->Color); ?>"><?php echox($reward->Color); ?></span>
								<?php if($reward->Known): ?>
									&bull; <span class="text-success">Opened</span>
								<?php else: ?>
									&bull; <span class="text-muted">Unopened</span>
								<?php endif; ?>
							</div>
							<button type="submit" name="id" value="<?php echox($reward->ID); ?>" class="btn btn-sm btn-danger">Delete</button>
						</li>	
					<?php endforeach; ?>
					<input type="hidden" name="action" value="delete_reward">
				</ul>
			</form>
			<div class="card-footer p-3">
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" placeholder="Enter reward name">
					</div>
					<div class="form-group">
						<label>Color</label>
						<input type="text" name="color" class="form-control" placeholder="Enter reward color">
					</div>
					<div class="form-group">
						<label>Picture</label>
						<input type="file" name="picture" class="form-control">
					</div>
					<div class="d-flex justify-content-between">
						<button type="submit"  name="action" value="clear_rewards" class="btn btn-danger">Clear All</button>
						<button type="submit"  name="action" value="reset_numbers" class="btn btn-alert">Reset numbers</button>
						<button type="submit" name="action" value="add_reward" class="btn btn-success">Add</button>
					</div>
				</form>
			</div>
		</div>

		
	
		<div class="card">
			<div class="card-header h3 mb-0 text-primary">Game</div>
			<div class="card-body">
				Reset or end the game
			</div>
			<div class="card-footer p-3">
				<form method="POST" class="d-flex justify-content-between">
					<button type="submit" name="action" value="endgame" class="btn btn-danger text-white">End Game</button>
					<button type="submit" name="action" value="reset" class="btn btn-warning text-white">Reset Game</button>
				</form>
			</div>
		</div>

		<div class="card">
			<form method="POST" enctype="multipart/form-data">
				<div class="card-header h3 mb-0 text-primary">Change box number color</div>
						<div class="card-body">


						<div>
							<label>Next Up Text Color</label>
						<input type="text" name="boxnum_color" class="form-control" placeholder="#000000" value="<?php echox(setting("nextup_text_color")) ?>">
						</div>
				</div>
				<div class="card-footer p-3">
					<input type="hidden" name="action" value="box_change">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			
			</form>
		</div>


		<div class="card">
			<form method="POST" enctype="multipart/form-data">
				<div class="card-header h3 mb-0 text-primary">Change box image</div>
				<div class="form-group">
				<br>
						<input type="file" name="box" class="form-control">
					</div>
					<div class="card-footer p-3">
					<input type="hidden" name="action" value="change_box">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
		</div>
		<div class="card">
			<form method="POST" enctype="multipart/form-data">
				<div class="card-header h3 mb-0 text-primary">RESET GAME TO DEFAULT</div>
				<div class="form-group">
				<br>

					</div>
					<div class="card-footer p-3">
					<input type="hidden" name="action" value="factory_reset">
					<button type="submit" class="btn btn-danger">FACTORY RESET</button>
				</div>
		</div>

					
				
			</form>
		</div>
	
	

	</div>
<?php require "views/footer.view.php"; ?>