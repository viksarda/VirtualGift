<?php  
if(!defined("APP")) die(); ?>

<?php 

	$participants = participantsAll(true); 
	$ended = setting("ended", false) || $participants === false || count($participants) === 0;

?>

<?php if($ended): ?>
	<div id  ="finished">
	<!-- tuka menjam i dodavam brisi ako ne raboti -->
		<canvas id="confeti"  name="confeti" class="active confetiend">
        </canvas>
	<!-- do tuka --></div>	
	<div class="card card-body border-dark rounded bg-brand-alt py-4 m-4 text-center" id="finished">
	<META HTTP-EQUIV="refresh" CONTENT="4">
		<h2 class="text-white font-weight-bold mb-0">GAME FINISHED</h2>
	</div>


<?php else: ?>

	<div class="row p-4">
		<div class="col-6 col-md-3">
			<div class="card card-body rounded py-4" style="background-color: <?php echox(setting("nextup_color", "#b0cf43")); ?>">
				<h4 class="text-white font-weight-bold"><?php echox(setting("nextup_title", "NEXT UP")); ?></h4>
				<p class="font-weight-bold mb-0" style="color: <?php echox(setting("nextup_text_color", "#b0cf43")); ?>"><?php echox(participantFirst(true)) ?></p>
			</div>
		</div>
		<div class="col-6 col-md-9">
			<h5 class="text-brand-alt" >PARTICIPANTS</h5>
			<button class="scroll-left strelki" style="border:none; padding=0; background:none; font-size:40px; font-weight:600; position:absolute; margin:0px; height:0%; padding:0px; color:#8E8E93">&#8249;</button>		
			<ol class="breadcrumb bg-white p-0 d-block" style="overflow-x: scroll; white-space: nowrap; height:4; width:95%; margin-left:4%;">
			<?php foreach($participants as $participant): ?>
					<li  id="box-wrapper" class="breadcrumb-item d-inline">
					<?php echox($participant->Name); ?>
				</li>
				<?php endforeach; ?>
				<button class="scroll-right strelki "  style="border:none; padding=0; background:none; font-size:40px; font-weight:600; right:0%; position:absolute; margin:0px; padding:0px; color:#8E8E93">&#8250;</button>
			</ol>
		
			
			<?php if(isLoggedIn()): ?>
				<button type="button"  id="endgame" class="btn btn-sm btn-primary btn-block font-weight-bold" style="margin-top:20px; padding-bottom:4px; background-color: <?php echox(setting("endgame_color", "#b0cf43")); ?>; border-color: <?php echox(setting("endgame_color", "#b0cf43")); ?>; color: <?php echox(setting("endgame_text_color", "#b0cf43")); ?>">End the Game</button>
			<?php endif; ?>
		</div>
	</div>

<?php endif; ?>

<div class="row p-4 mb-5">
	
	<?php foreach(rewardsAll() as $index => $reward): ?>

		<?php $closed = !($ended || $reward->Strikes >= 3); ?>

		<?php if (($reward->Known) && ($reward->Strikes != 2)): ?>

			<div class="col-6 col-md-3 text-center mb-4 <?php echo (count($participants) > 0 && isLoggedIn() && $reward->Strikes != 2) ? "cursor-pointer" : "" ?> reward" data-known="true" data-picture="static/rewards/<?php echox($reward->Picture); ?>" data-reward="<?php echox($reward->Name); ?>" data-id="<?php echox($reward->ID); ?>" data-participant="<?php echox(participantFirst(true)) ?>" data-strikes="<?php echox($reward->Strikes); ?>" data-holder="<?php echox($reward->ParticipantName); ?>">
				<div class="rounded-top mx-3 py-2 <?php echo $closed ? "bg-light-alt text-white" : "bg-light text-brand-alt" ?>"><?php echox($reward->ParticipantName); ?></div>
				<div class="rounded p-3 <?php echo $closed ? "bg-brand-third" : "bg-light-third text-dark" ?>">
					<img class="img-fluid mb-2" src="static/rewards/<?php echox($reward->Picture); ?>">
					<h6 style="height: 40px;"><?php echox($reward->Name); ?></h6>
				</div>
				<div class="rounded-bottom mx-3 py-2 <?php echo $closed ? "bg-light-alt text-white" : "bg-light text-dark" ?>">
					<h4 class="d-inline"><?php echox($reward->ID); ?></h4>
					<?php if($closed): ?>
						<div class="d-inline ml-2">
							<?php for ($i = 0; $i < 3; $i++): ?>
								<?php if($i < $reward->Strikes): ?>
									<h4 class="d-inline font-weight-bold text-dark">X</h4>
								<?php else: ?>					
									<h4 class="d-inline font-weight-bold text-white">X</h4>
								<?php endif; ?>					
							<?php endfor; ?>
						</div>				
					<?php endif; ?>					
				</div>
			</div>

			<!-- proba za alert kopce dodeka ima samo 2 strikes -->
			<?php elseif (($reward->Known) && ($reward->Strikes == 2)): ?>
			<div class="col-6 col-md-3 text-center mb-4 <?php echo (count($participants) > 0 && isLoggedIn() && $reward->Strikes =2) ? "cursor-pointer" : "" ?> reward" data-known="true" data-picture="static/rewards/<?php echox($reward->Picture); ?>" data-reward="<?php echox($reward->Name); ?>" data-id="<?php echox($reward->ID); ?>" data-participant="<?php echox(participantFirst(true)) ?>" data-strikes="<?php echox($reward->Strikes); ?>">
				<div class="rounded-top mx-3 py-2 <?php echo $closed ? "bg-light-alt text-white" : "bg-light text-brand-alt" ?>"><?php echox($reward->ParticipantName); ?></div>
				<div class="rounded p-3 <?php echo $closed ? "bg-brand-third" : "bg-light-third text-dark" ?>">
					<img class="img-fluid mb-2" src="static/rewards/<?php echox($reward->Picture); ?>">
					<h6 style="height: 40px;"><?php echox($reward->Name); ?></h6>
				</div>
				<div class="rounded-bottom mx-3 py-2 <?php echo $closed ? "bg-light-alt text-white" : "bg-light text-dark" ?>">
					<h4 class="d-inline"><?php echox($reward->ID); ?></h4>
					<?php if($closed): ?>
						<div class="d-inline ml-2">
							<?php for ($i = 0; $i < 3; $i++): ?>
								<?php if($i < $reward->Strikes): ?>
									<h4 class="d-inline font-weight-bold text-dark">X</h4>
								<?php else: ?>					
									<h4 class="d-inline font-weight-bold text-white">X</h4>
								<?php endif; ?>					
							<?php endfor; ?>
						</div>				
					<?php endif; ?>					
				</div>
			</div>
			<!-- do tuka -->
			
		<?php else: ?>

			<div class="col-6 col-md-3 text-center mb-4  <?php echo (count($participants) > 0 && isLoggedIn() && $reward->Strikes < 3) ? "cursor-pointer" : "" ?> reward" data-known="false" data-id="<?php echox($reward->ID); ?>" data-participant="<?php echox(participantFirst(true)) ?>" data-strikes="<?php echox($reward->Strikes); ?>">
				<div class="rounded-top mx-3 py-2 bg-light">Choose</div>
				<div class="rounded p-3" style="background-color: <?php echox($reward->Color); ?>">
					<img class="img-fluid py-4 mb-2" src="./assets/img/box.png">
					<h1 class="display-4 position-absolute text-brand-alt" style="top: 45%; left: 50%; transform: translate(-50%, -30%); color: <?php echox(setting("boxnum_color")); ?>"><?php echox($reward->ID); ?></h1>
				</div>
				<div class="rounded-bottom mx-3 py-2 bg-light">
					<h4 class="d-inline">&nbsp;</h4>
				</div>
			</div>	

		<?php endif; ?>

	<?php endforeach; ?>

</div>
