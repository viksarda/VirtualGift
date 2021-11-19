<?php  
if(!defined("APP")) die(); ?>

<!DOCTYPE html>
<html lang="en">
	

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="shortcut icon" href="assets/icons/favicon.ico">

		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">


		<title>Virtual Gift Exchange</title>
		
	</head>

	<body data-isloggedin="<?php echox(isLoggedIn() ? "true" : "false"); ?>">

		
		<?php if(isset($alert) && $alert !== ""): ?>

			<div class="alert alert-primary alert-dismissable fade show rounded-0 text-center">
				<span><?php echo $alert; ?></span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		<?php endif; ?>
		
		<?php if(isLoggedIn()): ?>

			<div class="text-center mb-4">
				<span class="mb-0 bg-primary text-right p-2 m-2 text-white rounded">
					<a href="<?php echox("../game1"); ?>" class="text-white">Home</a>
					<!-- smeni tuka /game123456 -->
					<span>•</span>
					<a href="admin" class="text-white">Admin</a>
					<span>•</span>
					<a href="logout" class="text-white">Logout</a>
				</span>
			</div>

		<?php endif; ?>

		<div class="container">