    var map = L.map('map').setView([35.34157717177266, 25.134487152099613], 20);
var cnt=0;
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

map.on('click', function(e){
  
  if(!document.getElementById("control-add").classList.contains("is-light")){
    var coord = e.latlng;
      var coordinates={
        "x":coord.lat,
        "y":coord.lng
      }
      bulmaToast.toast({ 
        message: '<p class="column">You clicked '+coordinates.x+' , '+coordinates.y+'</p><p class="column"><button class="button is-info is-light" id="save-marker" onclick="activateModal('+coordinates.x+","+coordinates.y+')">Wanna Save?</button></p>',
        duration: 10000,
        position: "bottom-right",
        animate: { in: 'fadeIn', out: 'fadeOut' }
    })
  
  }
      });

if (L.Browser.ielt9) {
  alert('Upgrade your browser, dude!');
}

document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    const $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});

document.getElementById("control-add").onclick=function(){
  if(document.getElementById("control-add").classList.contains("is-light")){
    document.getElementById("control-add").classList.remove("is-light");
  }
  else if(document.getElementById("control-add").classList.contains("is-light")==false){
    document.getElementById("control-add").classList.add("is-light");
    
  }
    
} 
bulmaToast.setDefaults({
  duration: 1000,
  position: 'top-left',
  closeOnClick: false,
})
function activateModal(x,y){
  console.log(x,y);
  document.getElementById('modal').classList.add('is-active');
  document.getElementById('txtY').value=y;
  document.getElementById('txtΧ').value=x;
}
document.getElementById('modal-close').onclick=function(){
  document.getElementById('modal').classList.remove('is-active')
  
}

var butt = document.getElementsByClassName("pinPointTile-button");

function goTo(x,y){
  map.setView(new L.LatLng(x, y), 20);
}

document.getElementById('control-add').click=function(){
  if(document.getElementById('pins-view').style.display='none'){
  document.getElementById('pins-view').style.display='block'}
  if(document.getElementById('pins-view').style.display='block'){
  document.getElementById('pins-view').style.display='none'}
}