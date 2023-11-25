mapboxgl.accessToken = 'pk.eyJ1Ijoicml6a3kxNDA4MjAiLCJhIjoiY2xvaGF1aG55MTN0bjJrbzN6ZjRmMjNkYiJ9.hKJ_ryY0aczg9Q_-kLB-tg';
const defaultLngLat = [117.41358989412075, -8.47573120694598]; // Default longitude and latitude
const longitudeInput = document.getElementById('longitude');
const latitudeInput = document.getElementById('latitude');
const map = new mapboxgl.Map({
	container: 'map', // container ID
	style: 'mapbox://styles/mapbox/streets-v12', // style URL
	center: defaultLngLat, // starting position
	zoom: 9 // starting zoom
});
// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());
const marker = new mapboxgl.Marker({ color: '#FF0000' })
	.setLngLat(defaultLngLat)
	.addTo(map);
map.on('load', function() {
	map.addLayer({
		id: 'circle',
		type: 'circle',
		source: {
			type: 'geojson',
			data: {
				type: 'Feature',
				geometry: {
					type: 'Point',
					coordinates: defaultLngLat
				}
			}
		},
		paint: {
			'circle-radius': 20, // Increase the circle radius as desired
			'circle-color': '#FF0000'
		}
	});
});

function updateMap() {
	const lng = parseFloat(longitudeInput.value);
	const lat = parseFloat(latitudeInput.value);
	if (!isNaN(lng) && !isNaN(lat)) {
		map.setCenter([lng, lat]);
		marker.setLngLat([lng, lat]);
		updateCircleRadius(); // Call the function to update the circle radius
	}
}

function updateCircleRadius() {
	const radius = 20; // Set the desired circle radius
	map.setPaintProperty('circle', 'circle-radius', radius);
}

longitudeInput.addEventListener('input', updateMap);
latitudeInput.addEventListener('input', updateMap);
marker.on('dragend', () => {
	const lngLat = marker.getLngLat();
	longitudeInput.value = lngLat.lng.toFixed(6);
	latitudeInput.value = lngLat.lat.toFixed(6);
	updateCircleRadius(); // Call the function to update the circle radius
});
