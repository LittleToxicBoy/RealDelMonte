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
        console.log(e.latlng.lat);
        console.log(e.latlng.lng);
        document.getElementById("latitud").value = e.latlng.lat;
        document.getElementById("longitud").value = e.latlng.lng;
    });
}
