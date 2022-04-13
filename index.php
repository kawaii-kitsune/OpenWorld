<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /OpenWorld/guest.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="/OpenWorld/assets/favico.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- mapBox-->
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.js"></script>
    
    <!-- THREE.js -->
    <script src="https://unpkg.com/three@0.126.0/build/three.min.js"></script>
    <script src="https://unpkg.com/three@0.126.0/examples/js/loaders/GLTFLoader.js"></script>
    <!--  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.0.0/animate.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- BULMA CSS js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script type="text/javascript" src="js/bulma.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap -->
    <title>OpenWorld</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script> -->

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
        <?php require 'php/views/partials/model-modal.php'?>
        
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