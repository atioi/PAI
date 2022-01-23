mapboxgl.accessToken = 'pk.eyJ1IjoibHVrYXMxMjMxMjMxMjMiLCJhIjoiY2t5YmI1OHFhMDZ6eTJwbXRpN2ttczhxbyJ9.HZVUTHp95APJHyzIEWQkJA';


/*
*   The Map object represents the map on your page.
*   It exposes methods and properties that enable you to programmatically change the map,
*   and fires events as users interact with it.
*
*   You create a Map by specifying a container and other options.
*   Then Mapbox GL JS initializes the map on the page and returns your Map object.
*
*   https://docs.mapbox.com/mapbox-gl-js/api/map/
*
* */

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [9, 53],
    zoom: 2
});

// The map uses one marker.
const marker = new mapboxgl.Marker({
    // Allows user to move the marker.
    draggable: true
});

marker.on('dragend', (position) => {


    console.log(position);
});


/*  A GeolocateControl control provides a button that uses the browser's geolocation API to locate the user on the map.
*   https://docs.mapbox.com/mapbox-gl-js/api/markers/#geolocatecontrol
*
*   example: https://docs.mapbox.com/mapbox-gl-js/example/locate-user/
*
* */

const geolocator = new mapboxgl.GeolocateControl({
    fitBoundsOptions: {
        maxZoom: 20
    },
    positionOptions: {
        enableHighAccuracy: true
    },
    // Prevents the geolocator to display its own mark and accuracy circle because a new marker is going to be added.
    trackUserLocation: false,
    showUserHeading: false,
    showUserLocation: false
});

geolocator.on('geolocate', (position) => {
    // When user click geolocator the 'geolocate' event occurs and
    // return the current user's position.

    const coords = [position.coords.longitude, position.coords.latitude];

    // When geolocator gets user's position it set marker there. User can move marker by themself.
    marker.setLngLat(coords).addTo(map);
});


/*
*   Mapbox-GL-Geocoder
*   https://github.com/mapbox/mapbox-gl-geocoder/blob/main/API.md
*
* */
const decoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl,
    // Search box will not
    marker: false
});

decoder.on('result', result => {
    const coords = result.result.geometry.coordinates;
    marker.setLngLat(coords).addTo(map);
})


map.addControl(decoder);
map.addControl(geolocator);


