mapboxgl.accessToken =
  'pk.eyJ1IjoiYmFiaXMtc2FuIiwiYSI6ImNrdG80aTAwZTA5NTQyb21wMG43Z3dhaGYifQ.m3Vfng3x5-QJl42-tt_bsg';

const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/satellite-streets-v11',
  zoom: 18,
  center: [25.134144396166306, 35.34073423355571],
  pitch: 50,
  antialias: true // create the gl context with MSAA antialiasing, so custom layers are antialiased
});

map.on('load', () => {
  // Insert the layer beneath any symbol layer.
  const layers = map.getStyle().layers;
  const labelLayerId = layers.find(
    (layer) => layer.type === 'symbol' && layer.layout['text-field']
  ).id;

  // The 'building' layer in the Mapbox Streets
  // vector tileset contains building height data
  // from OpenStreetMap.
  map.addLayer(
    {
      'id': 'add-3d-buildings',
      'source': 'composite',
      'source-layer': 'building',
      'filter': ['==', 'extrude', 'true'],
      'type': 'fill-extrusion',
      'minzoom': 15,
      'paint': {
        'fill-extrusion-color': '#aaa',
        // 'fill-extrusion-pattern': 'raster',
        // Use an 'interpolate' expression to
        // add a smooth transition effect to
        // the buildings as the user zooms in.
        'fill-extrusion-height': [
          'interpolate',
          ['linear'],
          ['zoom'],
          15,
          0,
          15.05,
          ['get', 'height']
        ],
        'fill-extrusion-base': [
          'interpolate',
          ['linear'],
          ['zoom'],
          15,
          0,
          15.05,
          ['get', 'min_height']
        ],
        'fill-extrusion-opacity': 0.8
      }
    },
    labelLayerId
  );
});
map.addControl(new mapboxgl.NavigationControl());

map.on('click', function (e) {

  if (!document.getElementById("control-add").classList.contains("is-light")) {

    var coordinates = {
      "x": e.lngLat.lng,
      "y": e.lngLat.lat
    }
    bulmaToast.toast({
      message: '<p class="column">You clicked ' + coordinates.x + ' , ' + coordinates.y + '</p><p class="column"><button class="button is-info is-light" id="save-marker" onclick="activateModal(' + coordinates.x + "," + coordinates.y + ')">Wanna Save?</button></p>',
      duration: 10000,
      position: "bottom-right",
      animate: { in: 'fadeIn', out: 'fadeOut' }
    })

  }
});

$('#control-add').on('click', () => {
  if (document.getElementById("control-add").classList.contains("is-light")) {
    document.getElementById("control-add").classList.remove("is-light");
  }
  else if (document.getElementById("control-add").classList.contains("is-light") == false) {
    document.getElementById("control-add").classList.add("is-light");

  }

});

bulmaToast.setDefaults({
  duration: 1000,
  position: 'top-left',
  closeOnClick: false,
})



// if (L.Browser.ielt9) {
//   alert('Upgrade your browser, dude!');
// }

// document.addEventListener('DOMContentLoaded', () => {
//   (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
//     const $notification = $delete.parentNode;

//     $delete.addEventListener('click', () => {
//       $notification.parentNode.removeChild($notification);
//     });
//   });
// });




function goTo(x, y) {
  map.setCenter([x, y]);

}

function activateModal(x, y) {
  console.log(x, y);
  document.getElementById('modal').classList.add('is-active');
  document.getElementById('txtY').value = y;
  document.getElementById('txtΧ').value = x;
}
document.getElementById('modal-close').onclick = function () {
  if (document.getElementById('modal')) {
    document.getElementById('modal').classList.remove('is-active');
  }
}
document.getElementById('modal-close-2').onclick = function () {
  if (document.getElementById('modal-model')) {
    document.getElementById('modal-model').classList.remove('is-active');
  }
}

function loadModel(x, y, url, id) {
  const modelOrigin = [x, y];
  const modelAltitude = 0;
  const modelRotate = [Math.PI / 2, 0, 0];
  const modelAsMercatorCoordinate = mapboxgl.MercatorCoordinate.fromLngLat(
    modelOrigin,
    modelAltitude
    );
     
    // transformation parameters to position, rotate and scale the 3D model onto the map
    const modelTransform = {
    translateX: modelAsMercatorCoordinate.x,
    translateY: modelAsMercatorCoordinate.y,
    translateZ: modelAsMercatorCoordinate.z,
    rotateX: modelRotate[0],
    rotateY: modelRotate[1],
    rotateZ: modelRotate[2],
    /* Since the 3D model is in real world meters, a scale transform needs to be
    * applied since the CustomLayerInterface expects units in MercatorCoordinates.
    */
    scale: modelAsMercatorCoordinate.meterInMercatorCoordinateUnits() 
    };
     
    const THREE = window.THREE;
     
    // configuration of the custom layer for a 3D model per the CustomLayerInterface
    const customLayer = {
    id: '3d-model'+id,
    type: 'custom',
    renderingMode: '3d',
    onAdd: function (map, gl) {
    this.camera = new THREE.Camera();
    this.scene = new THREE.Scene();
     
    // create two three.js lights to illuminate the model
    const directionalLight = new THREE.DirectionalLight(0xffffff);
    directionalLight.position.set(0, x, y).normalize();
    this.scene.add(directionalLight);
     
    const directionalLight2 = new THREE.DirectionalLight(0xffffff);
    directionalLight2.position.set(0, 70, 100).normalize();
    this.scene.add(directionalLight2);
     
    // use the three.js GLTF loader to add the 3D model to the three.js scene
    const loader = new THREE.GLTFLoader();
    loader.load(
    url,
    (gltf) => {
    this.scene.add(gltf.scene);
    }
    );
    this.map = map;
     
    // use the Mapbox GL JS map canvas for three.js
    this.renderer = new THREE.WebGLRenderer({
    canvas: map.getCanvas(),
    context: gl,
    antialias: true
    });
     
    this.renderer.autoClear = false;
    },
    render: function (gl, matrix) {
    const rotationX = new THREE.Matrix4().makeRotationAxis(
    new THREE.Vector3(1, 0, 0),
    modelTransform.rotateX
    );
    const rotationY = new THREE.Matrix4().makeRotationAxis(
    new THREE.Vector3(0, 1, 0),
    modelTransform.rotateY
    );
    const rotationZ = new THREE.Matrix4().makeRotationAxis(
    new THREE.Vector3(0, 0, 1),
    modelTransform.rotateZ
    );
     
    const m = new THREE.Matrix4().fromArray(matrix);
    const l = new THREE.Matrix4()
    .makeTranslation(
    modelTransform.translateX,
    modelTransform.translateY,
    modelTransform.translateZ
    )
    .scale(
    new THREE.Vector3(
    modelTransform.scale,
    -modelTransform.scale,
    modelTransform.scale
    )
    )
    .multiply(rotationX)
    .multiply(rotationY)
    .multiply(rotationZ);
     
    this.camera.projectionMatrix = m.multiply(l);
    this.renderer.resetState();
    this.renderer.render(this.scene, this.camera);
    this.map.triggerRepaint();
    }
    };
     
    map.on('style.load', () => {
    map.addLayer(customLayer, 'waterway-label');
    });
}
function loadMarker(x, y, url, id, fldname) {
  var marker = new mapboxgl.Marker().setLngLat([x, y]).addTo(map);
  marker.setPopup(new mapboxgl.Popup().setHTML(
    '<div class="colums is-centered">' +
    // '<div class="column model-viewer">' +
    // '<model-viewer src=' + url + ' alt="A 3D model of an astronaut" ar ' +
    // 'ar-modes="webxr scene-viewer quick-look" environment-image="neutral" auto-rotate camera-controls id="model-viewer-' + id + '"> ' +

    // '</model-viewer>' +
    // '</div>' +
    '<div class="column">' +
    '<span class="is-size-6"id="name-' + id + '">' + fldname + '</span>' +
    '</div>' +
    '<div class="column is-centered">' +
    '<a href="/OpenWorld/php/views/3dXdom/model-view.php?modelId=' + id + '" target="_blank" class="is-centered" rel="noopener noreferrer">' +
    '<button class="button is-link is-centered" value="' + id + '">Navigate</button>' +
    '</a>' +

    '<button class="button is-outlined mx-2 model-info-button" onclick="openNav(this)" ' +
    'value=' + id + '><i class="fas fa-question mx-2"></i> info</button>' +
    '<a href="/OpenWorld/php/views/bonanza.php?modelId=' + fldname + '" target="_blank" class="is-centered" rel="noopener noreferrer">' +
    '<button class="button is-warning is-centered" value="' + id + '">Relics</button>' +
    '</a>' +
    '</div>' +
    '</div>').setMaxWidth("330px"));
}

function openNav(e) {
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("offcanvasCont").innerHTML = this.responseText;
        document.getElementById("mySidenav").style.width = "400px";
      }
    };
    xmlhttp.open("GET","/OpenWorld/php/controller/offcanvas.php?id="+e.value,true);
    xmlhttp.send();
  
  
  // document.getElementById("main").style.marginLeft = "400px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  // document.getElementById("main").style.marginLeft = "0";
}
function modelModal(e) {
  document.getElementById('locName').innerHTML = document.getElementById('pinPoint-tile-name-'+e.value).innerHTML;
  document.getElementById('modal-model').classList.add('is-active');
  document.getElementById("form-modal").action = 'php/controller/model.php?id=' + e.value;

}
