<?php  
if(!defined("APP")) die(); ?>

<?php require "views/header.view.php"; ?>
	
	<div class="text-center mt-5">
		<h1 class="display-3 text-primary text-center"><?php echo $message; ?></h1>
		<h3><a href="." class="lead text-no-decoration">Go Home</a></h3>
	</div>

<?php require "views/footer.view.php"; ?>