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
        '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
        '<div id="bodyContent">' +
        "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +
        "sandstone rock formation in the southern part of the " +
        "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
        "south west of the nearest large town, Alice Springs; 450&#160;km " +
        "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
        "features of the Uluru - Kata Tjuta National Park. Uluru is " +
        "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
        "Aboriginal people of the area. It has many springs, waterholes, " +
        "rock caves and ancient paintings. Uluru is listed as a World " +
        "Heritage Site.</p>" +
        '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
        "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
        "(last visited June 22, 2009).</p>" +
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
    const marker = new google.maps.Marker({
        position: location,
        label: "",
        map: map,
        // animation: google.maps.Animation.BOUNCE,
        icon: `http://maps.google.com/mapfiles/ms/icons/${item.warna}-dot.png`,
        // icon: `http://maps.google.com/mapfiles/ms/icons/red-dot.png`,
        // icon: `http://maps.google.com/mapfiles/ms/icons/${item.ikan.warna}-dot.png`,
    });
    marker.addListener("click", () => {
        console.log(item);
        var total_omzet = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
        }).format(item.total_omzet);
        var luas_lahan = new Intl.NumberFormat("de-DE").format(item.luas_lahan);
        map.setZoom(15);
        map.setCenter(marker.getPosition());
        $("#ViewModal").modal("show");
        document.querySelector("#title_nama").textContent = item.nama_kelompok;
        document.querySelector("#nama_kelompok").textContent =
            item.nama_kelompok;
        document.querySelector(
            "#User_nama"
        ).textContent = `Oleh ${item.User_nama}`;
        // document.querySelector(
        //     "#jenis_ikan"
        // ).textContent = `Jenis Ikan : ${item.ikan}`;
        document.querySelector(
            "#total_omzet"
        ).textContent = `Total Omzet : ${total_omzet}`;
        document.querySelector(
            "#luas_lahan"
        ).textContent = `Luas Lahan : ${luas_lahan}`;
        document.querySelector("#linkSlug").href = `/Data/${item.slug}`;
        document.querySelector("#photo").src = `/storage/${item.photo}`;
        document.querySelector(
            "#jumlah_anggota"
        ).textContent = `Jumlah Anggota : ${item.jumlah_anggota}`;
    });
    markers.push(marker);
    setMapOnAll(map);
}
// document.querySelector("#kategoriFilter").addEventListener("change", initMap);

// document.querySelector("#ikanFilter").addEventListener("change", initMap);
// document.querySelector("#kecamatanFilter").addEventListener("change", initMap);
document
    .querySelector("#kategoriFilter")
    .addEventListener("change", getKategoriMarker);

document.querySelector("#ikanFilter").addEventListener("change", getIkanMarker);
document
    .querySelector("#kecamatanFilter")
    .addEventListener("change", getAllMarker);

async function getAllMarker() {
    map.setZoom(12);
    const res = await fetch("/api/ikan-marker");
    // const res = await fetch("/api/ikan-marker");
    const data = await res.json();
    setMapOnAll(null);
    markers = [];
    const category_nama = document.querySelector("#kategoriFilter").value;
    const ikan_nama = document.querySelector("#ikanFilter").value;
    const kecamatan_nama = document.querySelector("#kecamatanFilter").value;
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
async function getIkanMarker() {
    map.setZoom(12);
    // const res = await fetch("/api/view-marker");
    const res = await fetch("/api/ikan-marker");
    const data = await res.json();
    setMapOnAll(null);
    markers = [];
    const category_nama = document.querySelector("#kategoriFilter").value;
    const ikan_nama = document.querySelector("#ikanFilter").value;
    const kecamatan_nama = document.querySelector("#kecamatanFilter").value;
    data.filter((item) => {
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
async function getKategoriMarker() {
    map.setZoom(12);
    // const res = await fetch("/api/view-marker");
    const res = await fetch("/api/kategori-marker");
    const data = await res.json();
    setMapOnAll(null);
    markers = [];
    const category_nama = document.querySelector("#kategoriFilter").value;
    const ikan_nama = document.querySelector("#ikanFilter").value;
    const kecamatan_nama = document.querySelector("#kecamatanFilter").value;
    data.filter((item) => {
            if (category_nama && item.category_nama !== category_nama) return false;
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
document.querySelector("#btnCloseModal").addEventListener("click", () => {
    $("#ViewModal").modal("hide");
});
// initMap();