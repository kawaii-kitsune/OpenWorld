<?php
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
<?php require '../php/views/guest/partials/head.php'?>
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
        <?php require '../php/views/partials/navbar.php'?>
        <?php require '../php/views/partials/hero.php'?>
        <section class="section" id="map-section">
            <div class="columns m-0">
                <?php require '../php/views/map.php'?>
                <?php require '../php/views/guest/control-box.php'?>

            </div>
        </section>
        <?php require '../php/views/partials/footer.php'?>
        <?php require '../php/views/guest/partials/off-canvas.php'?>
    </main>
    <?php require '../php/views/partials/scripts.php'?>
    <?php require '../php/views/guest/loadPins.php'?>
    <?php
    
    
?>
</body>

</html>