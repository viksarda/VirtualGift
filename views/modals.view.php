<?php 
if(!defined("APP")) die(); ?>


<div class="modal fade" id="modal-confirm">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content rounded-circle">
			<div class="modal-body rounded-circle bg-brand-fourth border-white-thick text-center text-white p-5">
				<h5 class="font-weight-bold" id="modal-confirm-participant">Mya Roberts</h5>
				<h5 class="font-weight-bold">selects...</h5>
				<img style="width: 40%;" class="my-4" src="./assets/img/box.png">
				<h1 class="display-3 position-absolute text-brand-alt" style="top: 50%; left: 50%; transform: translate(-50%, -20%); color: <?php echox(setting("boxnum_color")); ?>" id="modal-confirm-id">1</h1>
				<div class="mt-4">
					<button type="button" class="d-inline btn btn-light modal-confirm-button" data-id="">Confirm Selection</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-confirm-known">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content rounded-circle">
			<div class="modal-body rounded-circle bg-brand-fourth border-white-thick text-center text-white p-5">
				<h5 class="font-weight-bold" id="modal-confirm-known-participant">Mya Roberts</h5>
				<h5 class="font-weight-bold">selects...</h5>
				<img style="width: 40%;" class="my-4" src="./assets/img/ipad.png" id="modal-confirm-known-picture">
				<h5 id="modal-confirm-known-reward">iPad Pro</h5>
				<div class="mt-4">
					<button type="button"  class="d-inline btn btn-light modal-confirm-button" data-id="">Confirm Selection</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-confirm-known-last">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content rounded-circle">
			<div class="modal-body rounded-circle bg-brand-fourth border-white-thick text-center text-white p-5">
				<h5 class="font-weight-bold" id="modal-confirm-known-participant-last">Mya Roberts</h5>
				<h5 class="font-weight-bold">WINS...</h5>
				<img style="width: 40%;" class="my-4" src="./assets/img/ipad.png" id="modal-confirm-known-picture-last">
				<h5 id="modal-confirm-known-reward-last">iPad Pro</h5>
				<div class="mt-4">
					<button type="button" onclick="Alert()" class="d-inline btn btn-light modal-confirm-button" data-id="">Confirm Selection</button>
			
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-won">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content rounded-circle">
			<div class="modal-body rounded-circle bg-brand-fourth border-white-thick text-center text-white p-5">
				<?php require "views/celebration.view.php"; ?>
				<div class="position-relative">
					<h5 class="font-weight-bold mt-3" id="modal-won-participant">Mya Roberts</h5>
					<h5 class="font-weight-bold">just won</h5>
					<img style="width: 50%;" class="my-3" src="./assets/img/ipad.png" id="modal-won-picture">
					<h5 id="modal-won-reward">iPad Pro</h5>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="assets/js/AlertReward.js"></script>
