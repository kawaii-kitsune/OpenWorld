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
<?php require 'php/views/partials/head.php'?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script>
$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
});
</script>

<body>
    <div class="se-pre-con"></div>
    <main>
        <?php require 'php/views/partials/navbar.php'?>
        <?php require 'php/views/partials/hero.php'?>
        <section class="section" id="map-section">
            <div class="columns m-0">
                <?php require 'php/views/map.php'?>
                <?php require 'php/views/control-box.php'?>

            </div>
        </section>
        <?php require 'php/views/modal.php'?>
        <?php require 'php/views/partials/quickview.php'?>
        <!-- ΠΑΙΖΕΙ ΝΑ ΓΙΝΕΙ ΚΑΤΙ ΑΥΤΟ ΣΤΟ UI
            <nav class="level">
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Tweets</p>
                    <p class="title">3,456</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Following</p>
                    <p class="title">123</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Followers</p>
                    <p class="title">456K</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Likes</p>
                    <p class="title">789</p>
                </div>
            </div>
        </nav> -->
        <?php require 'php/views/partials/footer.php'?>
        <?php require 'php/views/partials/off-canvas.php'?>
    </main>
    <?php require 'php/views/partials/scripts.php'?>
    <?php require 'php/views/loadPins.php'?>

</body>

</html>