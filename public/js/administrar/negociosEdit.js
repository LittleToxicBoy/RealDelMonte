window.addEventListener('loadMap', function(e) {
    mapEdit(e.detail.lat, e.detail.lng);
});

$(document).ready(function () {
    setTimeout(function(){
        latitude = document.getElementById("latitude").value;
        longitude = document.getElementById("longitude").value;
        mapEdit(latitude, longitude);
    }, 500);
});
function mapEdit(latitud,longitud) {
    document.getElementById("mapEditParent").innerHTML =
        '<div wire:ignore style="height: 380px;" id="mapEditModal"></div>';
    var map2 = printMap("mapEditModal", latitud, longitud);
    var marker2 = L.marker([latitud, longitud]).addTo(map2);
    map2.on("click", function (e) {
        if (marker2) {
            // check
            map2.removeLayer(marker2); // remove
        }
        marker2 = new L.Marker(e.latlng).addTo(map2); // set
        Livewire.emit("setEditLatitude", e.latlng.lat);
        Livewire.emit("setEditLongitude", e.latlng.lng);
    });
}

function printMap(
    name,
    latitud = 20.14024166748934,
    longitud = -98.67254608536996
) {
    const map = L.map(name).setView([latitud, longitud], 30);
    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);
    return map;
}

window.addEventListener('openAddHotel', function(e) {
    $('#modalAgregarHotel').modal('show');
});