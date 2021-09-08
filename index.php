<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /OpenWorld/php/views/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'php/partials/head.php'?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script>
    $(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
	
<body >
<div class="se-pre-con"></div>
    <main>
        <?php require 'php/partials/navbar.php'?>
        <?php require 'php/partials/hero.php'?>
        <section class="section" id="map-section">
            <div class="columns m-0">
                <?php require 'php/control-box.php'?>
                <?php require 'php/map.php'?>
            </div>
        </section>
        <?php require 'php/views/modal.php'?>
        <?php require 'php/partials/quickview.php'?>
        <?php require 'php/partials/footer.php'?>

    </main>
    <?php require 'php/partials/scripts.php'?>
    <?php require 'php/views/loadPins.php'?>
    
</body>

</html>