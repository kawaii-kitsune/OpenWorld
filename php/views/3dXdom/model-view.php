<?php
// Initialize the session
session_start();
 
if(isset($_GET['accept-cookies'])){
    setcookie('accept-cookies','true',time()+31556925);
    
   }

$modelID= $_GET['modelId'];
$MODELuRL='';
$MODELnAME='';
$MODELiNFO='';
$count=0;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_contact";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM pinscoord WHERE id='$modelID'";
  
  $result = $conn->query($sql);
  $sql = "SELECT * FROM images WHERE id='$modelID'";
  $result2 = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $MODELuRL=$row["GLTF"];
        $MODELnAME=$row["fldName"];
        $MODELiNFO=$row["info"];
      }
      
    
    
  } else {
    echo "0 results";
  }
  $conn->close();
  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>OpenWorld 3DViewer</title>
    <link rel="icon" href="/OpenWorld/assets/images/favico.png" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <!-- Babylon JS -->
    <!-- <script src="https://cdn.babylonjs.com/babylon.js"></script>
        <script src="https://cdn.babylonjs.com/loaders/babylonjs.loaders.min.js"></script> -->
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>My first three.js app</title>
    <style>
    body {
        margin: 0;
    }
    </style>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/OpenWorld/index.php">
                <img src="/OpenWorld/assets/images/logo.png" alt="" width="60" height="48"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-link" aria-current="page" href="/OpenWorld/index.php"><i
                                class="fas fa-home mx-2"></i><strong>Home</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="text-link nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight"><i class="fas fa-info-circle mx-2"></i> <b
                                class=" mx-2">About</b> </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <style>
    html,
    body {
        height: 100%;
        margin: 0;
    }

    #c {
        width: 100%;
        height: 100%;
        display: block;
    }
    </style>

    <script type='module'src="/OpenWorld/js/test.js"></script>
    
    <canvas id="c"></canvas>
    
</body>

</html>