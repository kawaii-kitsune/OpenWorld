<?php
// Initialize the session
session_start();
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
    <script type="text/javascript" src="/OpenWorld/js/bulma.js"></script>
    <link rel="stylesheet" href="/OpenWorld/css/style.css">
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
        <?php require '../../views/partials/navbar.php'?>
        
        
        <?php require '../../views/partials/footer.php'?>
        
    </main>
    

</body>

</html>