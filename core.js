// We’ll add a tile layer to add to our map, in this case it’s a OSM tile layer.
// Creating a tile layer usually involves setting the URL template for the tile images
var osmUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
    osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    osm = L.tileLayer(osmUrl, {
        maxZoom: 18,
        attribution: osmAttrib
    });

// initialize the map on the "map" div with a given center and zoom
var map = L.map('map').setView([40.6384046, 15.79353333], 12).addLayer(osm);

// Script for adding marker on map click
function onMapClick(e) {

    var marker = L.marker(e.latlng, {
        draggable: true,
        title: "Resource location",
        alt: "Resource Location",
        riseOnHover: true
    }).addTo(map)
        .bindPopup(e.latlng.toString()).openPopup();

    // Update marker on changing it's position
    marker.on("dragend", function(ev) {

        var chagedPos = ev.target.getLatLng();
        this.bindPopup(chagedPos.toString()).openPopup();

    });
}

/* 	map.on('click', onMapClick); */

var theMarker = {};

map.on('click', function(e) {
    lat = e.latlng.lat;
    lon = e.latlng.lng;

    document.getElementById("lat").value = lat;
    document.getElementById("lon").value = lon;
    console.log("You clicked the map at LAT: " + lat + " and LONG: " + lon);
    //Clear existing marker,

    if (theMarker != undefined) {
        map.removeLayer(theMarker);
    };

    //Add a marker to show where you clicked.
    theMarker = L.marker([lat, lon]).addTo(map);
});

var options = {
    key: '285c20d1f69346e98a2fae4e2c4ac464',
    limit: 10,
    proximity: '51.52255, -0.10249' // favour results near here
};

var control = L.Control.openCageSearch(options).addTo(map);
