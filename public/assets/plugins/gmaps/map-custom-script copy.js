// google map scripts
var map;

function initMap() {
    // // Basic map
    // map = new google.maps.Map(document.getElementById("simple-map"), {
    //     center: {
    //         lat: -7.0249205810592725,
    //         lng: 109.58029580559835,
    //     },
    //     // center: new google.maps.LatLng(-7.0249205810592725, 109.58029580559835)
    //     zoom: 8,
    // });
    // marker map
    var myLatLng = {
        lat: -6.886230017917383,
        lng: 109.67687845230103,
    };
    var map = new google.maps.Map(document.getElementById("marker-map"), {
        zoom: 15,
        center: myLatLng,
    });
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: "Hello World!",
    });
}
// routes map
// style map
