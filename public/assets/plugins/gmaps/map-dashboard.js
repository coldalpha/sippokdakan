// In the following example, markers appear when the user clicks on the map.
// Each marker is labeled with a single alphabetical character.
const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
let labelIndex = 0;
let markers = [];
let map;

function initMap() {
    const lokasiku = { lat: -6.886230017917383, lng: 109.67687845230103 };
    const contentString =
        '<div id="content">' +
        '<div id="siteNotice">' +
        "</div>" +
        '<h3 id="firstHeading" class="firstHeading"></h3>' +
        '<div id="bodyContent">' +
        "<p>Jenis :" +
        "</p><p>Ikan : " +
        "</p><p>Oleh : " +
        '</p><p> Kunjungi ? <a href="http://maps.google.com/maps?q=">' +
        "Klik Disini</a></p>" +
        "</div>" +
        "</div>";
    const infowindow = new google.maps.InfoWindow({
        content: contentString,
    });
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: lokasiku,
    });
    // google.maps.event.addListener(map, "click", addLatLng);
    // This event listener calls addMarker() when the map is clicked.
    // markers.addListener("click", () => {
    //     infowindow.open({
    //         anchor: markers,
    //         map,
    //         shouldFocus: false,
    //     });
    // });
    // Add a marker at the center of the map.

    getAllMarker();
}

function setMapOnAll(map) {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}
// Adds a marker to the map.
function addMarker(location, map, item) {
    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.
    const contentString =
        '<div id="content">' +
        '<div id="siteNotice">' +
        "</div>" +
        '<h3 id="firstHeading" name="firstHeading" class="firstHeading">' +
        `${item.nama_kelompok}` +
        "</h3>" +
        '<div id="bodyContent">' +
        "<p >Ikan : " +
        `${item.ikan_nama}` +
        "</p><p>Oleh : " +
        `${item.User_nama}` +
        '</p><p> Detail ? <a href="http://localhost:8000/pokdakan/' +
        `${item.slug}` +
        '">' +
        "Klik Disini</a></p>" +
        "</div>" +
        "</div>";
    const infowindow = new google.maps.InfoWindow({
        content: contentString,
    });
    const marker = new google.maps.Marker({
        position: location,
        label: "",
        map: map,
        animation: google.maps.Animation.BOUNCE,
        icon: `http://maps.google.com/mapfiles/ms/icons/${item.warna}-dot.png`,
    });
    marker.addListener("click", () => {
        infowindow.open({
            anchor: marker,
            map,
            shouldFocus: false,
        });
        console.log(item);
        map.setZoom(15);
        map.setCenter(marker.getPosition());
    });
    markers.push(marker);
    setMapOnAll(map);
}

document
    .querySelector("#kategoriFilter")
    .addEventListener("change", getAllMarker);

document.querySelector("#ikanFilter").addEventListener("change", getAllMarker);
document
    .querySelector("#kecamatanFilter")
    .addEventListener("change", getAllMarker);

async function getAllMarker() {
    const res = await fetch("/api/view-marker");
    const data = await res.json();
    setMapOnAll(null);
    markers = [];
    const category_nama = document.querySelector("#kategoriFilter").value;
    const ikan_nama = document.querySelector("#ikanFilter").value;
    const kecamatan_nama = document.querySelector("#kecamatanFilter").value;

    // if (category_nama || ikan_nama || kecamatan_nama) {
    console.log(data);
    data.filter((item) => {
            if (category_nama && item.category_nama !== category_nama) return false;
            return true;
        })
        .filter((item) => {
            if (ikan_nama && item.ikan_nama !== ikan_nama) return false;
            return true;
        })
        .filter((item) => {
            if (kecamatan_nama && item.kecamatan_nama !== kecamatan_nama)
                return false;
            return true;
        })
        .forEach((item) => {
            const position = {
                lat: Number(item.latitude),
                lng: Number(item.longitude),
            };
            addMarker(position, map, item);
        });
    // }
}
// initMap();