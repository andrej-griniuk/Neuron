<?php
if (!isset($editable)) {
    $editable = true;
}
if (!isset($latInput)) {
    $latInput = 'lat';
}
if (!isset($lngInput)) {
    $lngInput = 'lng';
}
?>
<div id="entity-map"></div>
<?= $this->element('Js' .  DS . 'leaflet') ?>
<?php $this->append('script'); ?>
    <script type="text/javascript">
        var map;
        var markersArray = [];
        var $lat = $('input[name="<?= $latInput ?>"]');
        var $lng = $('input[name="<?= $lngInput ?>"]');

        $(function(){
            map = L.map('entity-map').setView([-33.869, 151.2094], 14);
            L.tileLayer('//{s}.tiles.mapbox.com/v3/jt987.lp09bdfp/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
                maxZoom: 18
            }).addTo(map);

            if ($lat.val() != '' && $lng.val() != '') {
                placeMarker([$lat.val(), $lng.val()]);
            }

            <?php if ($editable): ?>
            map.on('click', function(e) {
                placeMarker([e.latlng.lat, e.latlng.lng], true);
            });
            <?php endif; ?>
        });

        function placeMarker(location, rewriteLocation) {
            if (typeof(rewriteLocation) != 'undefined' && rewriteLocation) {
                clearOverlays();
                $('input[name="lat"]').val(location[0]);
                $('input[name="lng"]').val(location[1]);
            }

            var marker = L.marker(location).addTo(map);
            markersArray.push(marker);
            map.setView(location);
        }

        function clearOverlays(){
            if (markersArray){
                for (i in markersArray){
                    map.removeLayer(markersArray[i]);
                }
            }
        }
    </script>
<?php $this->end(); ?>
