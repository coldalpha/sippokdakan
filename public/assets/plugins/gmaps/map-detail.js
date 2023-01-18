// In the following example, markers appear when the user clicks on the map.
// Each marker is labeled with a single alphabetical character.
const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
let labelIndex = 0;
const markers = [];
let map;

function initMap() {
    const lokasiku = { lat: -6.886230017917383, lng: 109.67687845230103 };
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: lokasiku,
    });
    // google.maps.event.addListener(map, "click", addLatLng);
    // This event listener calls addMarker() when the map is clicked.
    google.maps.event.addListener(map, "click", (event) => {
        setMapOnAll(null);
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        $("#latitude").val(lat);
        $("#longitude").val(lng);
        //alert(lat +" dan "+lng);
        addMarker(event.latLng, map);
    });

    // Add a marker at the center of the map.
}

function setMapOnAll(map) {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}
// Adds a marker to the map.
function addMarker(location, map) {
    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.
    const marker = new google.maps.Marker({
        position: location,
        label: "O",
        map: map,
    });
    markers.push(marker);
}