import {
	GLTFLoader
} from "https://cdn.jsdelivr.net/npm/three@0.121.1/examples/jsm/loaders/GLTFLoader.js";

import * as THREE from 'https://cdn.skypack.dev/three@0.120.0/build/three.module.js'
import {
	OrbitControls
} from 'https://cdn.skypack.dev/three@0.120.0/examples/jsm/controls/OrbitControls.js'


function renderModel(e){
	const scene= new THREE.Scene();
	// scene.background = new THREE.Color(0x555500);
	const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );
	const renderer = new THREE.WebGLRenderer({ alpha: true });

	renderer.setSize(window.innerWidth / 2, window.innerHeight / 2);

	
	e.appendChild(renderer.domElement);
	camera.aspect = window.innerWidth / window.innerHeight;
	camera.position.z = 200;
	camera.position.x = 0;
	camera.position.y = 0;

	var controls = new OrbitControls(camera, renderer.domElement);
	controls.update();
	var abint = new THREE.AmbientLight(0x555500, 3);
	scene.add(abint)
	renderer.setClearColor(0x000000, 0);
	const loader = new GLTFLoader();
	loader.load('test-models/matilda/scene.gltf', function (gltf) {
		
		scene.add(gltf.scene);
	}, undefined, function (error) {
		console.error(error);
	});
	animate()
}
	


function animate() {
	requestAnimationFrame(animate);
	renderer.render(scene, camera);
};

