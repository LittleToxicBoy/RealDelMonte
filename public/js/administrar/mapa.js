$(document).on("click", "#openModal", function () {
    setTimeout(() => {
        imprimirMapa();
    }, 500);
});

function imprimirMapa() {
    var map = L.map("map").setView(
        [20.14024166748934, -98.67254608536996],
        30
    );

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    var marker;
    map.on("click", function (e) {
        if (marker) {
            // check
            map.removeLayer(marker); // remove
        }
        marker = new L.Marker(e.latlng).addTo(map); // set
        Livewire.emit('getLatitudeForInput',e.latlng.lat);
        Livewire.emit('getLongitudeForInput',e.latlng.lng);
    });
}
