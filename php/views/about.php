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

<head>
    <link rel="icon" href="https://drive.google.com/uc?id=1shUIVy_QdEeVXB0C3jFL8I5QKGqKigF" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.0.0/animate.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- BULMA CSS js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script type="text/javascript" src="/OpenWorld/assets/js/bulma.js"></script>
    <!-- <link rel="stylesheet alternate" href="css/light-theme.css" id="light" title="Light"> -->
    <!-- <link rel="stylesheet alternate" href="css/dark-theme.css"  id="dark"  title="Dark"> -->
    <link rel="stylesheet" href="/OpenWorld/assets/css/style.css">
    <!-- bootstrap -->
    <title>OpenWorld</title>
</head>

<body>
    <main>
        <?php require 'partials/navbar.php'?>




        <?php require 'partials/footer.php'?>
    </main>
    </script>
    <!-- model-viewer -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script type="text/javascript" src="/OpenWorld/assets/js/main.js"></script>
</body>

</html>