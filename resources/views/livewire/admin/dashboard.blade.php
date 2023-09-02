<div class="min-h-full">
    <div class="flex flex-col gap-4 mx-auto">
        <h1>This is a responsive Map, Change screen size!</h1>
        @if (!isset($url))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">KML Errror</strong>
                <span class="block sm:inline">No Default KML Found</span>
            </div>
        @endif
        <div id="map" class="w-full" style="max-height: 640px; height:700px"></div>
    </div>
</div>


<script>
    var map;
    var kmlUrl = @json($url);

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-73.984939, 40.758874),
            zoom: 2,
            mapTypeId: 'terrain'
        });

        var kmlLayer = new google.maps.KmlLayer(kmlUrl, {
            suppressInfoWindows: true,
            preserveViewport: false,
            map: map
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google-api-key') }}&callback=initMap" async
    defer></script>
