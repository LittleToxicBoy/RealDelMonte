$(document).on("click", "#openModal", function () {
    setTimeout(() => {
        mapInsert();
    }, 500);
});

window.addEventListener("closeModal", (event) => {
    $("#exampleModal").modal("hide");
});

function mapInsert() {
    document.getElementById("mapParent").innerHTML =
        '<div wire:ignore style="height: 230px;" id="map"></div>';
    var map = printMap("map");
    var marker;
    map.on("click", function (e) {
        if (marker) {
            // check
            map.removeLayer(marker); // remove
        }
        marker = new L.Marker(e.latlng).addTo(map); // set
        Livewire.emit("getLatitudeForInput", e.latlng.lat);
        Livewire.emit("getLongitudeForInput", e.latlng.lng);
    });
}

$(document).on("click", ".openEditModal", function () {
    setTimeout(() => {
        mapEdit();
    }, 1000);
});
window.addEventListener("closeEditModal", (event) => {
    $("#exampleModalEdit").modal("hide");
});

function mapEdit() {
    document.getElementById("mapEditParent").innerHTML =
        '<div wire:ignore style="height: 180px;" id="mapEditModal"></div>';
    const latitud = $("#latitudEdit").val();
    const longitud = $("#longitudEdit").val();
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

window.addEventListener("openDeleteModal", (event) => {
    $("#modal-delete").modal("show");
});
window.addEventListener("closeDeleteModal", (event) => {
    $("#modal-delete").modal("hide");
});

window.addEventListener("openEditModal", (event) => {
    $("#modal-edit").modal("show");
});
window.addEventListener("closeEditModal", (event) => {
    $("#modal-edit").modal("hide");
});
