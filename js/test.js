import * as THREE from "https://cdn.skypack.dev/three@0.133.1";
import { VRButton } from "https://cdn.skypack.dev/three@0.133.1/examples/jsm/webxr/VRButton.js";
import { OrbitControls } from "https://cdn.skypack.dev/three@0.133.1/examples/jsm/controls/OrbitControls.js";
import { FirstPersonControls } from "https://cdn.skypack.dev/three@0.133.1/examples/jsm/controls/FirstPersonControls.js";
import { GLTFLoader } from "https://cdn.skypack.dev/three@0.133.1/examples/jsm/loaders/GLTFLoader.js";
import { TTFLoader } from "https://cdn.skypack.dev/three@0.133.1/examples/jsm/loaders/TTFLoader.js";
import { FontLoader } from "https://cdn.skypack.dev/three@0.133.1/examples/jsm/loaders/FontLoader.js";
// import { XRControllerModelFactory } from '../js/XRControllerModelFactory.js';
import { XRControllerModelFactory } from "https://cdn.skypack.dev/three@0.133.1/examples/jsm/webxr/XRControllerModelFactory.js";
import * as BABYLON from "https://cdn.babylonjs.com/babylon.js";

var canvas = document.querySelector("#c");
var renderer = new THREE.WebGLRenderer({
  canvas,
  antialias: true,
});
var scene = new THREE.Scene();
const fov = 75;
const aspect = 2; // the canvas default
const near = 0.1;
const far = 50;
var camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
const dolly = new THREE.Object3D();
dolly.position.z = 0.1;
dolly.add(camera);
// scene.add(dolly);
var dummyCam = new THREE.Object3D();
camera.add(dummyCam);

// var controls;
var clock = new THREE.Clock();
var camControls = new FirstPersonControls(camera, canvas);
camera.position.set(3.76, 1.6, 3.57);
camera.rotation.set(0.0, 0.35, 0.0);
const controllers = null;
const tempMatrix = new THREE.Matrix4();
const raycaster = new THREE.Raycaster();
var mesh, intersects, controls, quaternion;

function setCamControls() {
  renderer.outputEncoding = THREE.sRGBEncoding;
  camControls.lookSpeed = 0.2;
  camControls.movementSpeed = 1;
  camControls.noFly = true;
  camControls.lookVertical = true;
  camControls.constrainVertical = true;
  camControls.verticalMin = 1.0;
  camControls.verticalMax = 2.0;
  camControls.lon = -150;
  camControls.lat = 120;
}

function enableXR() {
  renderer.xr.enabled = true;
  document.body.appendChild(VRButton.createButton(renderer));
  document.getElementById("VRButton").style.background =
    "rgb(0, 0, 0) none repeat scroll 0% 0%";
  const controllers = buildControllers();
  // camera.add(controllers);
  const self = this;

  function onSelectStart() {
    this.userData.selectedPressed = true;
  }

  function onSelectEnd() {
    this.userData.selectedPressed = false;
  }
  function onSqueezStart() {
    this.userData.squeezePressed = true;
  }

  function onSqueezEnd() {
    this.userData.squeezePressed = false;
  }
  controllers.forEach((controller) => {
    controller.addEventListener("selectstart", onSelectStart);

    controller.addEventListener("selectend", onSelectEnd);
    controller.addEventListener("squeezestart", onSqueezStart);

    controller.addEventListener("squeezeend", onSqueezEnd);
    // console.log(controller)
  });
}

function buildControllers() {
  const controllerModelFactory = new XRControllerModelFactory();
  const geometry = new THREE.BufferGeometry().setFromPoints([
    new THREE.Vector3(0, 0, 0),
    new THREE.Vector3(0, 0, -1),
  ]);
  const line = new THREE.Line(geometry);
  line.name = "line";
  line.scale.z = 0;
  const controllers = [];

  for (let i = 0; i < 2; i++) {
    const controller = renderer.xr.getController(i);
    controller.add(line.clone());
    controller.userData.selectPressed = false;

    scene.add(controller);
    controllers.push(controller);
    controller.name = "controller-" + i;
    const grip = renderer.xr.getControllerGrip(i);
    grip.add(controllerModelFactory.createControllerModel(grip));
    // console.log(grip);
    dolly.add(grip);
    dolly.add(controller);
    scene.add(dolly);
  }

  return controllers;
}
function handleController(controller, delta) {
  if (controller.userData.squeezePressed) {
    const speed = 0.5;
    dummyCam.updateMatrixWorld();
    const quaternion = dolly.quaternion.clone();
    dummyCam.matrixWorld.decompose(
      dummyCam.position,
      dolly.quaternion,
      dummyCam.scale
    );
    dolly.translateZ(-delta * speed);
    dolly.position.y = 0;
    dolly.quaternion.copy(quaternion);
  } else {
  }

  if (controller.userData.selectedPressed) {
    controller.children[0].scale.z = 10;
    tempMatrix.identity().extractRotation(controller.matrixWorld);

    raycaster.ray.origin.setFromMatrixPosition(controller.matrixWorld);
    raycaster.ray.direction.set(0, 0, -1).applyMatrix4(tempMatrix);
    intersects = raycaster.intersectObjects(scene.children, false);
    if (intersects.length > 0) {
      controller.children[0].scale.z = intersects[0].distance;
    }
    // console.log(intersects);
  } else {
    controller.children[0].scale.z = 0;
  }
}

function addGround() {
  var groundTexture = new THREE.TextureLoader().load(
    "/OpenWorld/assets/floor.png"
  );
  groundTexture.wrapS = groundTexture.wrapT = THREE.RepeatWrapping;
  groundTexture.repeat.set(10000, 10000);
  groundTexture.anisotropy = 16;
  groundTexture.encoding = THREE.sRGBEncoding;
  var groundMaterial = new THREE.MeshStandardMaterial({
    map: groundTexture,
  });
  mesh = new THREE.Mesh(
    new THREE.PlaneBufferGeometry(10000, 10000),
    groundMaterial
  );
  mesh.position.y = 0.0;
  mesh.rotation.x = -Math.PI / 2;
  mesh.receiveShadow = true;
  mesh.name = "floor";
  scene.add(mesh);
}

function createCube() {
  const loader = new THREE.CubeTextureLoader();
  const texture = loader.load([
    "https://threejsfundamentals.org/threejs/resources/images/grid-1024.png",
    "https://threejsfundamentals.org/threejs/resources/images/grid-1024.png",
    "https://threejsfundamentals.org/threejs/resources/images/grid-1024.png",
    "https://threejsfundamentals.org/threejs/resources/images/grid-1024.png",
    "https://threejsfundamentals.org/threejs/resources/images/grid-1024.png",
    "https://threejsfundamentals.org/threejs/resources/images/grid-1024.png",
  ]);
  scene.background = texture;
}

async function getUrl() {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const modelId = urlParams.get("modelId");
  $.ajax({
    url: "/OpenWorld/php/controller/getModel.php?id=" + modelId,
    type: "GET",
    success: function (data) {
      addModel(data);
    },
  });
}

function addLight() {
  const color = 0xffffff;
  const intensity = 2;
  const light = new THREE.DirectionalLight(color, intensity);
  light.position.set(-1, 2, 4);
  light.name = "DirectionalLight" + color;
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

function render() {
  var delta = clock.getDelta();
  if (!renderer.xr.isPresenting) {
    if (resizeRendererToDisplaySize(renderer)) {
      const canvas = renderer.domElement;
      camera.aspect = canvas.clientWidth / canvas.clientHeight;
      camera.updateProjectionMatrix();
      // camControls.update(delta);
    }
    camControls.update(delta);
    renderer.render(scene, camera);
    renderer.setAnimationLoop(render);
  } else {
    if (controllers != null) {
      controllers.forEach((controller) => {
        handleController(controller, delta);
      });
    } else {
      const controllers = buildControllers();
      // camera.add(controllers);
      controllers.forEach((controller) => {
        handleController(controller, delta);
      });
    }
    renderer.render(scene, camera);
    renderer.xr.setAnimationLoop(render);
  }
}

document.onkeyup = function (e) {
  if (e.which == 77) {
    render();
    canvas.toBlob((blob) => {
      saveBlob(blob, `screencapture-${canvas.width}x${canvas.height}.png`);
    });
  }
  if (e.which == 84) {
    if (camControls.enabled) {
      camControls.enabled = false;
      controls = new OrbitControls(camera, canvas);
      // controls.target.set(0, 0, 0);
      controls.update();
    } else {
      camControls = new FirstPersonControls(camera);
      camControls.lookSpeed = 0.2;
      camControls.movementSpeed = 1;
      camControls.noFly = true;
      camControls.lookVertical = true;
      camControls.constrainVertical = true;
      camControls.verticalMin = 1.0;
      camControls.verticalMax = 2.0;
      camControls.lon = -150;
      camControls.lat = 120;
      camControls.enabled = true;
      controls.enabled = false;
    }
  }
};
function addModel(data) {
  const loader = new GLTFLoader();

  loader.load(
    data,
    function (gltf) {
      gltf.scene.position.set(0, -1.2, 0);
      gltf.scene.rotation.set(-0.26, 0.9, 0.15);
      scene.add(gltf.scene);
    },
    // called while loading is progressing
    function (xhr) {
      console.log((xhr.loaded / xhr.total) * 100 + "% loaded");
    },
    // called when loading has errors
    function (error) {
      console.log("An error happened");
    }
  );
}
// const elem = document.querySelector('#screenshot');
// elem.addEventListener('click', () => {
//     render();
//     //   const canvas=document.getElementById("c");
//     canvas.toBlob((blob) => {
//         saveBlob(blob, `screencapture-${canvas.width}x${canvas.height}.png`);

//     });
// });

function saveBlob() {
  const a = document.createElement("a");
  document.body.appendChild(a);
  a.style.display = "none";
  return function saveData(blob, fileName) {
    const url = window.URL.createObjectURL(blob);
    a.href = url;
    a.download = fileName;
    a.click();
  };
}

async function animate() {
  setCamControls();
  enableXR();
  createCube();
  addGround();
  addLight();
  // await getUrl();
  render();
}

window.addEventListener("load", (event) => {
  animate();
});
