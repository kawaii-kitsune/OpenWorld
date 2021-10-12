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
    <link rel="icon" href="/OpenWorld/assets/favico.png" type="image/x-icon" />
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
                <img src="/OpenWorld/assets/logo.png" alt="" width="60" height="48"
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
    
    <script src="/OpenWorld/js/three.js"></script>
    <!-- <script type="module" src="/OpenWorld/js/test.js"></script> -->
    <canvas id="c"></canvas>
    
    <script type="module">
    import * as THREE from 'https://threejsfundamentals.org/threejs/resources/threejs/r132/build/three.module.js';
    import {
        VRButton
    } from 'https://threejsfundamentals.org/threejs/resources/threejs/r132/examples/jsm/webxr/VRButton.js';
    import {
        OrbitControls
    } from 'https://threejsfundamentals.org/threejs/resources/threejs/r132/examples/jsm/controls/OrbitControls.js';
    import {
        GLTFLoader
    } from 'https://threejsfundamentals.org/threejs/resources/threejs/r132/examples/jsm/loaders/GLTFLoader.js';



    function main() {

        const canvas = document.querySelector('#c');
        const renderer = new THREE.WebGLRenderer({
            canvas
        });
        renderer.xr.enabled = true;
        document.body.appendChild(VRButton.createButton(renderer));
        document.getElementById('VRButton').style.background = 'rgb(0, 0, 0) none repeat scroll 0% 0%'

        const fov = 75;
        const aspect = 2; // the canvas default
        const near = 0.1;
        const far = 50;

        const camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
        camera.position.set(3.76, 1.60, 3.57);
        camera.rotation.set(0.00, 0.35, 0.00);
        const controls = new OrbitControls(camera, canvas);
        controls.target.set(0, 0, 0);
        controls.update();
        const scene = new THREE.Scene();
        // FirstPersonControls( camera,canvas);

        

        //GROUND-------------------------
        var groundTexture = new THREE.TextureLoader().load('/OpenWorld/assets/floor.png');
        groundTexture.wrapS = groundTexture.wrapT = THREE.RepeatWrapping;
        groundTexture.repeat.set(10000, 10000);
        groundTexture.anisotropy = 16;
        groundTexture.encoding = THREE.sRGBEncoding;
        var groundMaterial = new THREE.MeshStandardMaterial({
            map: groundTexture
        });

        var mesh = new THREE.Mesh(new THREE.PlaneBufferGeometry(10000, 10000), groundMaterial);
        mesh.position.y = 0.0;
        mesh.rotation.x = -Math.PI / 2;
        mesh.receiveShadow = true;
        scene.add(mesh);
        //GROUND END------------------------------------
        // CUBE ENVIRONMENT--------------------------------------------------------------------------
        {
            const loader = new THREE.CubeTextureLoader();
            const texture = loader.load([
                'https://threejsfundamentals.org/threejs/resources/images/grid-1024.png',
                'https://threejsfundamentals.org/threejs/resources/images/grid-1024.png',
                'https://threejsfundamentals.org/threejs/resources/images/grid-1024.png',
                'https://threejsfundamentals.org/threejs/resources/images/grid-1024.png',
                'https://threejsfundamentals.org/threejs/resources/images/grid-1024.png',
                'https://threejsfundamentals.org/threejs/resources/images/grid-1024.png',
            ]);
            scene.background = texture;
        }
        // END CUBE ENVIRONMENT--------------------------------------------------------------------------
        //add Model
        {
            const gltfLoader = new GLTFLoader();
            gltfLoader.load('<?php echo $MODELuRL ?>', (gltf) => {

                    const root = gltf.scene;
                    root.position.set(0, -1.2, 0);
                    root.rotation.set(-0.26, 0.9, 0.15);
                    scene.add(root);
                    gltf.scene; // THREE.Group
                    gltf.scenes; // Array<THREE.Group>
                    gltf.cameras; // Array<THREE.Camera>
                    gltf.asset; // Object

                },
                // called while loading is progressing
                function(xhr) {

                    console.log((xhr.loaded / xhr.total * 100) + '% loaded');

                },
                // called when loading has errors
                function(error) {

                    console.log('An error happened');

                });
        } {
            const color = 0xFFFFFF;
            const intensity = 2;
            const light = new THREE.DirectionalLight(color, intensity);
            light.position.set(-1, 2, 4);
            scene.add(light);
        }


        function resizeRendererToDisplaySize(renderer) {
            const canvas = renderer.domElement;
            const width = canvas.clientWidth;
            const height = canvas.clientHeight;
            const needResize = canvas.width !== width || canvas.height !== height;
            if (needResize) {
                renderer.setSize(width, height, false);
            }
            return needResize;
        }

        function render(time) {
            time *= 0.001;

            if (resizeRendererToDisplaySize(renderer)) {
                const canvas = renderer.domElement;
                camera.aspect = canvas.clientWidth / canvas.clientHeight;
                camera.updateProjectionMatrix();
            }



            renderer.render(scene, camera);
        }

        renderer.setAnimationLoop(render);

        const elem = document.querySelector('#screenshot');
        elem.addEventListener('click', () => {
            render();
            //   const canvas=document.getElementById("c");
            canvas.toBlob((blob) => {
                saveBlob(blob, `screencapture-${canvas.width}x${canvas.height}.png`);

            });
            count++;
        });

        const saveBlob = (function() {
            const a = document.createElement('a');
            document.body.appendChild(a);
            a.style.display = 'none';
            return function saveData(blob, fileName) {
                const url = window.URL.createObjectURL(blob);
                a.href = url;
                a.download = fileName;
                a.click();
            };
        }());
    }

    main();
    </script>
    <?php require 'card.php' ?>
</body>

</html>