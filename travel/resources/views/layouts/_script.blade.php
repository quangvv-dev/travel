<script>
    // GG Maps Lat_long

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 21.028511, lng: 105.804817},
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }

                var marker = new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                });
                console.log(marker.getPosition().lat());
                $('input[name="lat_rcm"]').val(marker.getPosition().lat());
                $('input[name="lng_rcm"]').val(marker.getPosition().lng());
            });
            map.fitBounds(bounds);
        });
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow;

        google.maps.event.addListener(map, 'click', function (event) {
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();

            var lat_long = event.latLng.lat() + ',' + event.latLng.lng();
            geocodeAddress(geocoder, map, lat_long, infowindow)
            $('input[name="lat_rcm"]').val(lat);
            $('input[name="lng_rcm"]').val(lng);

        });


        function geocodeAddress(geocoder, map, lat_long, infowindow) {
            var marker = '';
            console.log(lat_long);
            var input = lat_long;

            var latlngStr = input.split(',', 2);
            var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
            geocoder.geocode({'location': latlng}, function (results, status) {
                if (status === 'OK') {
                    marker = new google.maps.Marker({
                        map: map,
                        position: latlng
                    });

                    infowindow.setContent(results[0].formatted_address);
                    $("#pac-input").val(results[0].formatted_address);
                    infowindow.open(map, marker);
                }
            });
        }
    }
</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOYTBGlUxFOO0am9ZAsM3-q3Fv2GBWxys&libraries=places&callback=initMap"></script>
