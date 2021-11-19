<?php  
if(!defined("APP")) die(); ?>

<?php require "views/header.view.php"; ?>

    </div>
	<style>
        body {
            background-color: <?php echox(setting("color")) ?>;
            background-image: url("assets/img/background.png");
            background-position: center top;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        @media only screen and (max-width: 600px) {
        body {
        background-image: none;
        }
        }
  }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <div class="row no-gutters justify-content-center" style="max-width:1580px; margin:auto;">


        <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 p-0" style="background-color:white; height:500px;">

            <img src="assets/img/header.jpg" alt="Header" class="img-fluid w-100">

            <div class="mx-md-3">
                <div class="card card-body border-white-medium rounded mx-md-5 mt-n4 py-4" style="background-color: <?php echox(setting("title_color", "#0b4f9f")); ?>">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <h2 class="text-white font-weight-bold mb-0 mobileTitle"><?php echox(setting("title", "WELCOME TO TODAY'S GAME!")); ?></h2>
                        <h3 class="text-white text-right mb-0 mobileTitle">
                            <?php echox(setting("title2", "Second Title")); ?>
                        </h3>
                    </div>
                </div>
            </div>

            <div id="partial" class="bg-white">

                <?php require "views/partial.view.php"; ?>

            </div>

        </div>

        

    </div>

    
        
<?php require "views/modals.view.php"; ?>

    <div>

<?php require "views/footer.view.php"; ?>