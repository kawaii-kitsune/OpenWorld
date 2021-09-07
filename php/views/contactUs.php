<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /project/php/views/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require '../partials/head.php'?>
<body>
  <main>
    <?php require '../partials/navbar.php'?>
<div class="container">
    <fieldset class="card columns is-8 is-half" style="margin-top:5%;margin-bottom:10%;">
        <div class="card-content column">
            <legend class="title column">Contact Form</legend>
            <hr>
            <form name="frmContact column" method="post" action="../controller/contactUs.php">
            <p>
            <label for="Name column" class="subtitle is-3">Name </label>
            <input class="input column is-half" type="text" name="txtName" id="txtName">
            </p>
            <p>
            <label for="email column" class="subtitle is-3" >Email</label>
            <input class="input column is-half" type="text" name="txtEmail" id="txtEmail">
            </p>
            <p>
            <label for="phone column" class="subtitle is-3">Phone</label>
            <input class="input column is-half" type="text" name="txtPhone" id="txtPhone">
            </p>
            <p>
            <label for="message column" class="subtitle is-3">Message</label>
            <textarea class="input column is-full" name="txtMessage" id="txtMessage" style="height:50%;"></textarea>
            </p>
            <p>&nbsp;</p>
            <p>
            <input class="button column is-info" type="submit" name="Submit" id="Submit" value="Submit">
            </p>
            </form>
        </div>
    
    </fieldset>
</div>
 
<?php require '../partials/footer.php'?>
</main>
  <script src="https://cdn.osmbuildings.org/4.1.1/OSMBuildings.js"></script>

  <!-- CUSTOM CDN  -->
  <script src="js/3dLoading.js"></script>
  <script src="js/three.js"></script>
  <script src="js/main.js"></script>
  <script src="js/bulma.js"></script>
</body>
</html>