<?php
// Initialize the session
session_start();
 


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
<html>

<head>
    <title>OpenWorld 3DViewer</title>
    <link rel="icon" href="/OpenWorld/assets/favico.png" type="image/x-icon" />
    <!-- A-Frame -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aframe/1.2.0/aframe.js"
        integrity="sha512-E71Id1i5xBlc2EftiH5s+mmpPbNJ2+XiCZy+iVb91pHKkCZmxS9WcGHpg/tyAp0mFo/9CuNFg1ey5T03kgP1bA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aframe-environment-component/dist/aframe-environment-component.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v6.1.1/dist/aframe-extras.min.js"></script>
    <script src="https://rawgit.com/fernandojsg/aframe-teleport-controls/master/dist/aframe-teleport-controls.min.js">
    </script>
    <script src="https://unpkg.com/super-hands@^3.0.1/dist/super-hands.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aframe-event-set-component@5.0.0/dist/aframe-event-set-component.min.js"
        integrity="sha256-gNJF898AiKbrvX4TfMUh7swgjAU9yVdo3+NfIhLvWiM=" crossorigin="anonymous"></script>



    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <!-- Model-Viewer -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
    body {
        width: 100%
    }

    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(/OpenWorld/assets/Preloader_11.gif) center no-repeat #fff;
    }

    /* The side navigation menu */
    /* .sidebar {
        margin: 0;
        padding: 0;
        width: 200px; */
    /* background-color: #f1f1f1; */
    /* z-index: 1;
        position: fixed;
        height: 100%;
        overflow: auto;
        align-items: center;
        justify-content: center;
    } */

    /* Sidebar links */
    /* .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
    } */

    /* Active/current link */


    /* Links on mouse-over */
    /* .sidebar a:hover {
        color: white;
        text-shadow: 2px 2px 4px #000000;
        cursor: pointer;
    } */

    #demo_table {
        border: 0;
    }

    #demo_table img {
        width: 128px;
        height: 128px;
    }

    #demo_table td img {
        border: 1px solid grey;
        text-decoration: none;
    }

    #screenshotPreviews>img {
        width: 250px;
        margin-left: 25px;
        margin-right: 25px;
    }

    #screenshots::-webkit-scrollbar {
        display: none;
    }


    #controller-hoverable {
        display: block;
    }

    #controller-hoverable:hover {
        cursor: help;
    }

    #controller-image {
        display: none;
        position: absolute;
        top: 40%;
        left: 30%;

    }

    #controller-image img {
        width: 100%;
        position: relative;
        -webkit-filter: drop-shadow(5px 5px 5px #222);
        filter: drop-shadow(5px 5px 5px #222);


    }

    .hand-container {
        display: none;
    }
    </style>
</head>


<body>

    <!-- The sidebar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-transparent">
        <div class="container-fluid">
            <a class="navbar-brand" href="/OpenWorld/index.php">
                <img src="/OpenWorld/assets/logo.png" alt="" width="30" height="24"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="/OpenWorld/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight"><i class="fas fa-info-circle mx-2"></i> <b
                                class=" mx-2">About</b> </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <a-scene>
        <a-assets>
            <img id="sky" src="/OpenWorld/assets/sky.jpg" alt="/OpenWorld/assets/sky.jpg">
            <a-asset-item id="base-model" src="<?php echo $MODELuRL?>"></a-asset-item>
            <a-asset-item id="matilda" src="/OpenWorld/test-models/matilda/scene.gltf"></a-asset-item>
            <!-- <audio id="temple-sound" src="../assets/audio/bbc_scandinavi_07054162.mp3"></audio> -->
            <!-- <audio id="sound" crossorigin="anonymous" preload="auto" src="some-audio-file.mp3"></audio> -->
        </a-assets>
        <!-- 3D Navigable Scene -->

        <a-entity id="cameraRig">
            <a-entity proggressive-controls></a-entity>
            <!-- camera -->
            <a-entity id="head" camera wasd-controls look-controls position="-4.801 1.530 10"></a-entity>
            <!-- hand controls -->
            <a-entity id="left-hand" menu-listener vive-controls="hand: left"
                teleport-controls="cameraRig: #cameraRig; teleportOrigin: #head; button:trigger;"></a-entity>
            <a-entity id="right-hand" menu-listener vive-controls="hand: right"
                teleport-controls="cameraRig: #cameraRig; teleportOrigin: #head; button:trigger;"></a-entity>
        </a-entity>


        <a-entity environment="preset: forest; groundColor: #445; grid: cross"></a-entity>
        <a-entity class="model" gltf-model="#base-model" position="0 0 0" rotation="-5 0 -2" scale="1 1 1"></a-entity>
        <a-entity class="model" gltf-model="#matilda" position="-2 0.3 3" rotation="-5 -40 -2" scale="0.007 0.007 0.007"
            grabbable></a-entity>
    </a-scene>

    <div id="controller-image"><img src="/OpenWorld/assets/controller/controller.png"></div>


    <!-- controls-card -->
    <div id="control-card" class="card m-2  w-25 d-xs-none d-sm-none d-md-block"
        style="position: absolute; bottom: 0; left: 0;z-index:101;">
        <div class="card-head mt-2 container">
            <div class="row">
                <div class="container col-8">
                    <h5>VR control picker <span><i class="fas fa-vr-cardboard"></i></span> </h5>

                </div>
                <div class="container col-4">
                    <h6 id='controller-hoverable'>Controller <small><i class="far fa-question-circle"></i></small>
                    </h6>
                </div>
            </div>


        </div>
        <div class="card-body mt-0">
            <div class="row my-2">

                <div class="container col-12">
                    <div class="row ">

                        <div class="container col-6 ">
                            <div class="row">
                                <div class="container col-12 my-2">
                                    <h6><i class="fas fa-hand-paper" style="transform: scaleX(-1);"></i> Left
                                        Hand</h6>
                                </div>


                            </div>
                            <div class="row">
                                <div class="container col-12">
                                    <div class="form-check">
                                        <input class="form-check-input hand-left" type="radio" name="left-hand"
                                            id="left-hand-1">
                                        <label class="form-check-label" for="left-hand-1">
                                            Hand Mode
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input tele-left" type="radio" name="left-hand"
                                            id="left-hand-2" checked>
                                        <label class="form-check-label" for="left-hand-2">
                                            Teleport
                                        </label>
                                    </div>
                                    <?php // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    ?>
                                    <div class="form-check">
                                        <input class="form-check-input tele-left" type="radio" name="left-hand"
                                            id="left-hand-3" disabled>
                                        <label class="form-check-label" for="left-hand-3">
                                            Laser <strong><small class="badge bg-success">BETA</small></strong>
                                        </label>
                                    </div>

                                    <?php
}else{ ?>
                                    <div class="form-check">
                                        <input class="form-check-input tele-left" type="radio" name="left-hand"
                                            id="left-hand-3">
                                        <label class="form-check-label" for="left-hand-3">
                                            Laser <strong><small class="badge bg-success">BETA</small></strong>
                                        </label>
                                    </div>

                                    <?php }?>
                                </div>
                                <div class="row left-opions-teleport-container" id="left-opions-teleport-container">
                                    <label for="TeleportOptions text-align-left">Teleport Options</label>
                                    <select class="form-control w-75" id="TeleportOptionsLeft">
                                        <option class="option-left" id="option-left-trigger" value="Trigger">Trigger
                                        </option>
                                        <option class="option-left" id="option-left-trackpad" value="Trackpad">
                                            Trackpad
                                        </option>
                                        <option class="option-left" id="option-left-menu" value="Menu" disabled>Menu
                                        </option>
                                        <option class="option-left" id="option-left-grip" value="Grip">Grip</option>
                                    </select>
                                </div>
                                <div class="row left-opions-hand-container hand-container"
                                    id="left-opions-hand-container">
                                    <label for="handOptions text-align-left">Hand Options</label>
                                    <select class="form-control w-75" id="handOptionsLeft">
                                        <option class="option-left" id="option-left-lowpoly" value="lowPoly">lowPoly
                                        </option>
                                        <option class="option-left" id="option-left-toon" value="toon">toon</option>
                                        <option class="option-left" id="option-left-highpoly" value="highPoly">
                                            highPoly
                                        </option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="container col-6 ">
                            <div class="row">
                                <div class="row w-100">
                                    <div class="container col-12 my-2">
                                        <h6><i class="fas fa-hand-paper"></i> Right Hand</h6>
                                    </div>

                                </div>
                                <div class="container col-12"></div>
                                <div class="form-check">
                                    <input class="form-check-input hand-right" type="radio" name="right-hand"
                                        id="right-hand-1">
                                    <label class="form-check-label" for="right-hand-1">
                                        Hand Mode
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input tele-right" type="radio" name="right-hand"
                                        id="right-hand-2" checked>
                                    <label class="form-check-label" for="right-hand-2">
                                        Teleport
                                    </label>
                                </div>
                                <?php // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    ?>
                                <div class="form-check">
                                    <input class="form-check-input tele-right" type="radio" name="right-hand"
                                        id="right-hand-3" disabled>
                                    <label class="form-check-label" for="right-hand-3">
                                        Laser <strong><small class="badge bg-success">BETA</small></strong>
                                    </label>
                                </div>

                                <?php
}else{ ?>
                                <div class="form-check">
                                    <input class="form-check-input tele-right" type="radio" name="right-hand"
                                        id="right-hand-3">
                                    <label class="form-check-label" for="right-hand-3">
                                        Laser <strong><small class="badge bg-success">BETA</small></strong>
                                    </label>
                                </div>

                                <?php }?>

                            </div>
                            <div class="row right-opions-teleport-container" id="right-opions-teleport-container">
                                <label for="TeleportOptions text-align-right">Teleport Options</label>
                                <select class="form-control w-75" id="TeleportOptionsRight">
                                    <option class="option-right" id="option-right-trigger" value="Trigger">Trigger
                                    </option>
                                    <option class="option-right" id="option-right-trackpad" value="Trackpad">
                                        Trackpad
                                    </option>
                                    <option class="option-right" id="option-right-menu" value="Menu" disabled>Menu
                                    </option>
                                    <option class="option-right" id="option-right-grip" value="Grip">Grip</option>
                                </select>
                            </div>
                            <div class="row right-opions-hand-container hand-container"
                                id="right-opions-hand-container">
                                <label for="handOptions text-align-right">Hand Options</label>
                                <select class="form-control w-75" id="handOptionsright">
                                    <option class="option-right" id="option-right-lowpoly" value="lowPoly">lowPoly
                                    </option>
                                    <option class="option-right" id="option-right-toon" value="toon">toon</option>
                                    <option class="option-right" id="option-right-highpoly" value="highPoly">
                                        highPoly
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class=" my-2 w-100">
            <div class="row my-2">
                <div class="row">
                    <div class="container col-12">
                        <h5>Desktop controls <span><i class="fas fa-desktop"></i></i></span> </h5>

                    </div>
                </div>
                <div class="container col-6">
                    <div class="row">
                        <h6>Keyboard <span><i class="fas fa-keyboard"></i></span></h6>
                    </div>

                    <div class="row">
                        <h6><span><i class="fas fa-chevron-circle-up"></i></span> or <strong>W</strong>
                            :Forward
                        </h6>
                    </div>
                    <div class="row">
                        <h6><span><i class="fas fa-chevron-circle-down"></i></span> or
                            <strong>S</strong>
                            :Backward
                        </h6>
                    </div>
                    <div class="row">
                        <h6><span><i class="fas fa-chevron-circle-left"></i></span> or
                            <strong>A</strong> :Left
                        </h6>
                    </div>
                    <div class="row">
                        <h6><span><i class="fas fa-chevron-circle-right"></i></span> or
                            <strong>D</strong>
                            :Right
                        </h6>
                    </div>

                </div>
                <div class="cotainer col-6">
                    <div class="row">
                        <div class="col-12">
                            <h6> Mouse <i class="fas fa-mouse-pointer"></i></h6>
                        </div>
                    </div>

                    <div class="row">
                        <h6><strong>Click</strong> :Enter FPS Camera</h6>

                    </div>
                    <div class="row my-1">
                        <h6 class="text-muted">Take a Shot</h6>
                    </div>
                    <div class="row" onclick="takeScreenshot()">
                        <div class="col-6" onclick="takeScreenshot()">
                            <a class="text-light btn btn-warning " href="#" id="btnTakeScreenshot" onclick="takeScreenshot()"><i
                                    class="fas fa-camera mx-2"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--  -->
    <!-- Info OffCanvas -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
        id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel"><i class="fas fa-info-circle"></i> <?php echo $MODELnAME; ?></h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row w-100">
                <model-viewer src="<?php echo $MODELuRL?>" alt="<?php echo $MODELnAME; ?>" ar
                    ar-modes="webxr scene-viewer quick-look" environment-image="neutral" auto-rotate camera-controls
                    id="model-viewer">
                </model-viewer>
            </div>
            <div class="row w-100">
                <h8><?php echo $MODELiNFO ?></h8>

            </div>
            <div class="row w-100">
                <div id="carouselExampleControls" class="carousel slide overflow-hidden" data-bs-ride="carousel">
                    <div class="carousel-inner  ">
                        <?php while($row = mysqli_fetch_array($result2)) {?>
                        <?php if( $count==0){?>
                        <div class="carousel-item active">
                            <img src="<?php echo $row['url']?>" class="d-block w-100 " alt="...">
                        </div>
                        <?php $count=$count+1; } else {?>

                        <div class="carousel-item ">
                            <img src="<?php echo $row['url']?>" class="d-block w-100 " alt="...">
                        </div>
                        <?php } ?>

                        <?php } ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="/OpenWorld/js/model-view.js"></script>
</body>

</html>