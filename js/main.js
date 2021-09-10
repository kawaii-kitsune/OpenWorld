var map = new L.Map('map');
map.setView([35.34157717177266, 25.134487152099613], 16, false);

new L.TileLayer('https://api.mapbox.com/styles/v1/osmbuildings/cjt9gq35s09051fo7urho3m0f/tiles/256/{z}/{x}/{y}@2x?access_token=pk.eyJ1IjoiYmFiaXMtc2FuIiwiYSI6ImNrdDhhcjExZTEwY3kyd3J3eGpieGk0cDUifQ.khAFheEKkE9AwZZ7P8NoJQ', {
  attribution: '© Map <a href="https://mapbox.com">Mapbox</a>',
  maxZoom: 18,
  maxNativeZoom: 20
}).addTo(map);

var osmb = new OSMBuildings(map).load();

//********************************************************

var
  now,
  date, time,
  timeRange, dateRange,
  timeRangeLabel, dateRangeLabel;

function changeDate() {
  var Y = now.getFullYear(),
    M = now.getMonth(),
    D = now.getDate(),
    h = now.getHours(),
    m = 0;

  timeRangeLabel.innerText = pad(h) + ':' + pad(m);
  dateRangeLabel.innerText = Y + '-' + pad(M + 1) + '-' + pad(D);

  osmb.date(new Date(Y, M, D, h, m));
}

function onTimeChange() {
  now.setHours(this.value);
  now.setMinutes(0);
  changeDate();
}

function onDateChange() {
  now.setMonth(0);
  now.setDate(this.value);
  changeDate();
}

function pad(v) {
  return (v < 10 ? '0' : '') + v;
}

timeRange = document.getElementById('time');
dateRange = document.getElementById('date');
timeRangeLabel = document.querySelector('*[for=time]');
dateRangeLabel = document.querySelector('*[for=date]');

now = new Date;
changeDate();

// init with day of year
var Jan1 = new Date(now.getFullYear(), 0, 1);
dateRange.value = Math.ceil((now - Jan1) / 86400000);

timeRange.value = now.getHours();

timeRange.addEventListener('change', onTimeChange);
dateRange.addEventListener('change', onDateChange);
timeRange.addEventListener('input', onTimeChange);
dateRange.addEventListener('input', onDateChange);

//************************************************************

// load extra information
function ajax(url, callback) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState !== 4) {
      return;
    }
    if (!req.status || req.status < 200 || req.status > 299) {
      return;
    }

    callback(JSON.parse(req.responseText));
  };
  req.open('GET', url);
  req.send(null);
}

// formatted json output
function formatJSON(json) {
  var html = '';
  for (var key in json) {
    html += '<em>' + key + '</em> ' + json[key] + '<br>';
  }
  return html;
}

osmb.click(function (e) {
  var url = 'https://data.osmbuildings.org/0.2/uejws863/feature/' + e.feature + '.json';
  ajax(url, function (json) {
    var content = '<b>OSM ID ' + e.feature + '</b>';
    for (var i = 0; i < json.features.length; i++) {
      content += '<br><em>OSM Part ID</em> ' + json.features[i].id;
      content += '<br>' + formatJSON(json.features[i].properties.tags);
    }

    L.popup({ maxHeight: 200, autoPanPaddingTopLeft: [50, 50] })
      .setLatLng(L.latLng(e.lat, e.lon))
      .setContent(content)
      .openOn(map);
  });
});

map.on('click', function (e) {

  if (!document.getElementById("control-add").classList.contains("is-light")) {
    var coord = e.latlng;
    var coordinates = {
      "x": coord.lat,
      "y": coord.lng
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




function goTo(x, y) {
  map.setView(new L.LatLng(x, y), 20);
}

function activateModal(x, y) {
  console.log(x, y);
  document.getElementById('modal').classList.add('is-active');
  document.getElementById('txtY').value = y;
  document.getElementById('txtΧ').value = x;
}
document.getElementById('modal-close').onclick = function () {
  document.getElementById('modal').classList.remove('is-active');

}