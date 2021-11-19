<?php  
if(!defined("APP")) die(); ?>

<?php require "views/header.view.php"; ?>

	<div class="row justify-content-center">
		<div class="col-md-5">
			<form method="POST">
				<h1 class="display-4 text-primary text-center mt-5 mb-4">Login</h1>
				<div class="form-group">
					<label for="username" class="text-primary">Username</label>
					<input type="text" name="username" id="username" required class="form-control" placeholder="Username">
				</div>
				<div class="form-group">
					<label for="password" class="text-primary">Password</label>
					<input type="password" name="password" id="password" required class="form-control" placeholder="***********">
				</div>
				<div">
					<button type="submit" class="btn btn-primary px-4">Login</button>
				</div>
			</form>
		</div>
	</div>

<?php require "views/footer.view.php"; ?>