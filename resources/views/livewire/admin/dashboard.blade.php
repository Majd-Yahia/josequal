<div class="min-h-full">
    <div class="flex gap-4 mx-auto">
        <!-- Main 3 column grid -->
        <!-- Left column -->
        <div id="map" class="w-1/2 h-96"></div>
        <h1>test</h1>
    </div>
</div>


<script>
    var map;
    var src = 'https://developers.google.com/maps/documentation/javascript/examples/kml/westcampus.kml';

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-19.257753, 146.823688),
            zoom: 2,
            mapTypeId: 'terrain'
        });

        var kmlLayer = new google.maps.KmlLayer(src, {
            suppressInfoWindows: true,
            preserveViewport: false,
            map: map
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google-api-key') }}&callback=initMap" async
    defer></script>
