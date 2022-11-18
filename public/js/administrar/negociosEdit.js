$(document).ready(function () {
    setTimeout(() => {
        mapInsert();
    }, 500);
});

function mapInsert(e) {
    document.getElementById("mapParent").innerHTML = '<div wire:ignore style="height: 400px;" id="map"></div>';
    var map = printMap("map");
    var marker;
    map.on("click", function (e) {
        if (marker) {
            // check
            map.removeLayer(marker); // remove
        }
        marker = new L.Marker(e.latlng).addTo(map); // set
        Livewire.emit("setEditLatitude", e.latlng.lat);
        Livewire.emit("setEditLongitude", e.latlng.lng);
    });
}

function printMap(name) {
    const map = L.map(name).setView(
        [20.14024166748934, -98.67254608536996],
        30
    );
    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);
    return map;
}
