<html>

<head>
    <title>OpenWorld 3DViewer</title>
    <script type='text/javascript' src='http://www.x3dom.org/download/x3dom.js'> </script>
    <link rel='stylesheet' type='text/css' href='http://www.x3dom.org/download/x3dom.css'>
    </link>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
    body {
        width: 100%
    }

    /* The side navigation menu */
    .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        /* background-color: #f1f1f1; */
        z-index: 1;
        position: fixed;
        height: 100%;
        overflow: auto;
        align-items: center;
        justify-content: center;
    }

    /* Sidebar links */
    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Active/current link */


    /* Links on mouse-over */
    .sidebar a:hover {
        color: white;
        text-shadow: 2px 2px 4px #000000;
        cursor: pointer;
    }

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
    </style>
</head>

<body>

    <!-- The sidebar -->
    <div class="sidebar bg-transparent">
        <a class="navbar-brand" href="#">
            <img src="../../../assets/logo.png" alt="" class="d-inline-block align-text-top">
        </a>
        <a class="text-light">Home</a>
        <a class="text-light">News</a>
        <a class="text-light">Contact</a>
        <a class="text-light" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight"><i class="fas fa-info-circle mx-2"></i> <b class=" mx-2">About</b> </a>
        <a class="text-light btn btn-warning mx-5" href="#" id="btnTakeScreenshot"><i
                class="fas fa-camera mx-2"></i></a>

    </div>
    <div id="screenshots" class="border-light position-absolute float-right overflow-scroll mt-2"
        style="width:350px;height:200px;z-index:1; right:5%;overflow-x: hidden;">
        <b class="text-light position-fixed">Screenshots: <span class="badge bg-danger badge-pill"
                id="screenshotCount">0</span></b>
        <div id="screenshotPreviews">

        </div>
    </div>

    <x3d id="canvas" width='100%' height='100%' style="z-index:0;" showStat="false">
        <scene>
            <navigationInfo type='"walk"' id="navType"></navigationInfo>
            <inline url="../../../test-models\3xDom\naos.x3d"> </inline>

            <directionalLight direction='0 0 -1' intensity='1.0' shadowIntensity='0.7'>
            </directionalLight>
        </scene>

    </x3d>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
        id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel"><i class="fas fa-info-circle"></i> Όνομα Μνημείου</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row w-100">
                <model-viewer src="../../../test-models/naos.glb" alt="A 3D model of an astronaut" ar
                    ar-modes="webxr scene-viewer quick-look" environment-image="neutral" auto-rotate camera-controls
                    id="model-viewer">
                </model-viewer>
            </div>
            <div class="row w-100">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

            </div>
            <div class="row w-100">
                <div id="carouselExampleControls" class="carousel slide overflow-hidden" data-bs-ride="carousel">
                    <div class="carousel-inner  ">
                        <div class="carousel-item active ">
                            <img src="https://picsum.photos/200/300" class="d-block w-100 " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200/300" class="d-block w-100 " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200/300" class="d-block w-100 " alt="...">
                        </div>
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

    <script src="/OpenWorld/js/model-view.js"></script>
</body>

</html>