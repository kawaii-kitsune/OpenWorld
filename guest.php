<?php
if(isset($_GET['accept-cookies'])){
 setcookie('accept-cookies','true',time()+31556925);
 header('Location:/OpenWorld/guest.php');
}
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "db_contact";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  ?>
<script>
console.log('COnnection not Successfull')
</script>
<?php
  die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="/OpenWorld/assets/images/favico.png" type="image/x-icon" />
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
        <style>
        .cookie-banner {
            display: none;
        }
        </style>
        <?php if(!isset($_COOKIE['accept-cookies'])){ ?>
        <section class="section cookie-banner has-background-dark">
            <div class=" columns  ">
            <div class="container">
                <div class="columns">
                    <p class="has-text-light">
                        We use cookies in this website, if you continue we'll assume that you constest to <a clss="text-link" href="">Cookie
                            Stuff</a>

                    </p>
                </div>
                <div class="columns">
                    <a type="button " class="button is-warning" href="?accept-cookies">OK, Continue</a>
                </div>
            </div>
        </section>
        <?php } ?>



        </div>
        <?php require 'php/views/partials/navbar.php'?>
        <?php require 'php/views/partials/hero.php'?>
        <section class="section" id="map-section">
            <div class="columns m-0">
                <?php require 'php/views/map.php'?>
                <?php require 'php/views/guest/control-box.php'?>

            </div>
        </section>
        <?php require 'php/views/partials/footer.php'?>
        <?php require 'php/views/partials/off-canvas.php'?>
    </main>
    <?php require 'php/views/partials/scripts.php'?>
    <?php require 'php/views/guest/loadPins.php'?>
    <?php
    
    
?>
</body>

</html>