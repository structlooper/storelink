<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMDvqHDj39av4ewG1XTolhN3SxTs02gYM&callback=initMap&libraries=drawing&v=weekly"
            async defer
    ></script>


<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('edit_warehouse'); ?></h4>
        </div>
        <?php $attrib = ['data-toggle' => 'validator', 'role' => 'form'];
        echo admin_form_open_multipart('system_settings/edit_warehouse/' . $id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>

            <div class="form-group">
                <label class="control-label" for="code"><?php echo $this->lang->line('code'); ?></label>
                <?php echo form_input('code', $warehouse->code, 'class="form-control" id="code" required="required"'); ?>
            </div>
            <div class="form-group">
                <label class="control-label" for="name"><?php echo $this->lang->line('name'); ?></label>
                <?php echo form_input('name', $warehouse->name, 'class="form-control" id="name" required="required"'); ?>
            </div>
            <div class="form-group">
                <label class="control-label" for="price_group"><?php echo $this->lang->line('price_group'); ?></label>
                <?php
                $pgs[''] = lang('select') . ' ' . lang('price_group');
                foreach ($price_groups as $price_group) {
                    $pgs[$price_group->id] = $price_group->name;
                }
                echo form_dropdown('price_group', $pgs, $warehouse->price_group_id, 'class="form-control tip select" id="price_group" style="width:100%;"');
                ?>
            </div>
            <div class="form-group">
                <label class="control-label" for="phone"><?php echo $this->lang->line('phone'); ?></label>
                <?php echo form_input('phone', $warehouse->phone, 'class="form-control" id="phone"'); ?>
            </div>
            <div class="form-group">
                <label class="control-label" for="email"><?php echo $this->lang->line('email'); ?></label>
                <?php echo form_input('email', $warehouse->email, 'class="form-control" id="email"'); ?>
            </div>

            <div class="form-group">
                <label class="control-label" for="latitude"><?php echo $this->lang->line('latitude'); ?></label>
                <?php echo form_input('latitude', $warehouse->latitude, 'class="form-control" id="latitude" , onblur="resetMap()"'); ?>
            </div>
            <div class="form-group">
                <label class="control-label" for="longitude"><?php echo $this->lang->line('longitude'); ?></label>
                <?php echo form_input('longitude', $warehouse->longitude, 'class="form-control" id="longitude" , onblur="resetMap()"'); ?>
            </div>
            <div class="form-group">
                <label class="control-label" for="area"><?php echo $this->lang->line('Area'); ?></label>
                <!--<div class="pac-card" id="pac-card">
                    <div>
                        <div id="title">Autocomplete search</div>
                        <div id="type-selector" class="pac-controls">
                            <input
                                    type="radio"
                                    name="type"
                                    id="changetype-all"
                                    checked="checked"
                            />
                            <label for="changetype-all">All</label>

                            <input type="radio" name="type" id="changetype-establishment" />
                            <label for="changetype-establishment">Establishments</label>

                            <input type="radio" name="type" id="changetype-address" />
                            <label for="changetype-address">Addresses</label>

                            <input type="radio" name="type" id="changetype-geocode" />
                            <label for="changetype-geocode">Geocodes</label>
                        </div>
                        <div id="strict-bounds-selector" class="pac-controls">
                            <input type="checkbox" id="use-strict-bounds" value="" />
                            <label for="use-strict-bounds">Strict Bounds</label>
                        </div>
                    </div>
                    <div id="pac-container">
                        <input id="pac-input" type="text" placeholder="Enter a location" />
                    </div>
                </div>-->
                <input type="button" id="enablePolygon" value="Calculate Area" />
                <input type="button" id="resetPolygon" value="Reset" style="display: none;" />
                <div id="showonPolygon" style=""><!--<b>Area:</b>-->
                    <!--<span id="areaPolygon">&nbsp;</span>-->
                    <?php echo form_input('area', $warehouse->area, 'class="form-control" id="area"'); ?>
                </div>
                <div id="map_canvas" style="height: 200px;"></div>
                <div id="infowindow-content">
                    <img src="" width="16" height="16" id="place-icon" />
                    <span id="place-name" class="title"></span><br />
                    <span id="place-address"></span>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label" for="address"><?php echo $this->lang->line('address'); ?></label>
                <?php echo form_textarea('address', $warehouse->address, 'class="form-control" id="address" required="required"'); ?>
            </div>
            <div class="form-group">
                <?= lang('warehouse_map', 'image') ?>
                <input id="image" type="file" data-browse-label="<?= lang('browse'); ?>" name="userfile" data-show-upload="false" data-show-preview="false"
                       class="form-control file">
            </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_warehouse', lang('edit_warehouse'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
<?= $modal_js ?>

<script>
    var geocoder;
    var map;
    var all_overlays = [];
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    function initMap(selfLat,selfLon) {

        if(selfLat && selfLon){
            var map = new google.maps.Map(
                document.getElementById("map_canvas"), {
                    center: new google.maps.LatLng(selfLat, selfLon),
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
        }
        else{
            var map = new google.maps.Map(
                document.getElementById("map_canvas"), {
                    center: new google.maps.LatLng(23.991640594298975, 85.3657659908079),
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
        }

        var polyOptions = {
            strokeWeight: 0,
            fillOpacity: 0.45,
            editable: true,
            fillColor: '#FF1493'
        };
        var selectedShape;

        var drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.POLYGON,
            drawingControl: false,
            markerOptions: {
                draggable: true
            },
            polygonOptions: polyOptions
        });

        $('#enablePolygon').click(function() {
            drawingManager.setMap(map);
            drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON);
        });

        $('#resetPolygon').click(function() {
            if (selectedShape) {
                selectedShape.setMap(null);
            }
            drawingManager.setMap(null);
            //$('#showonPolygon').hide();
            $('#area').val('');
            $('#resetPolygon').hide();
        });
        google.maps.event.addListener(drawingManager, 'polygoncomplete', function(polygon) {
            var area = google.maps.geometry.spherical.computeArea(selectedShape.getPath());
            $('#area').val(area.toFixed(2)+' Sq meters');
            $('#resetPolygon').show();
        });

        function clearSelection() {
            if (selectedShape) {
                selectedShape.setEditable(false);
                selectedShape = null;
            }
        }


        function setSelection(shape) {
            clearSelection();
            selectedShape = shape;
            shape.setEditable(true);
        }

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
            all_overlays.push(e);
            if (e.type != google.maps.drawing.OverlayType.MARKER) {
                // Switch back to non-drawing mode after drawing a shape.
                drawingManager.setDrawingMode(null);

                // Add an event listener that selects the newly-drawn shape when the user
                // mouses down on it.
                var newShape = e.overlay;
                newShape.type = e.type;
                google.maps.event.addListener(newShape, 'click', function() {
                    setSelection(newShape);
                });
                setSelection(newShape);
            }
        });

















        /*const map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -33.8688, lng: 151.2195 },
            zoom: 13,
        });*/

        /*
 * declare map as a global variable
 */

        /*const drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.MARKER,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [
                    //google.maps.drawing.OverlayType.MARKER,
                    google.maps.drawing.OverlayType.CIRCLE,
                    /!*google.maps.drawing.OverlayType.POLYGON,
                    google.maps.drawing.OverlayType.POLYLINE,
                    google.maps.drawing.OverlayType.RECTANGLE,*!/
                ],
            },
            markerOptions: {
                icon:
                    "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
            },
            circleOptions: {
                fillColor: "#ffff00",
                fillOpacity: 1,
                strokeWeight: 5,
                clickable: false,
                editable: true,
                zIndex: 1,
            },
        });*/


        /*const card = document.getElementById("pac-card");
        const input = document.getElementById("pac-input");
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
        const autocomplete = new google.maps.places.Autocomplete(input);
        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo("bounds", map);
        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(["address_components", "geometry", "icon", "name"]);
        const infowindow = new google.maps.InfoWindow();
        const infowindowContent = document.getElementById("infowindow-content");
        infowindow.setContent(infowindowContent);
        const marker = new google.maps.Marker({
            map,
            anchorPoint: new google.maps.Point(0, -29),
        });
        autocomplete.addListener("place_changed", () => {
            infowindow.close();
            marker.setVisible(false);
            const place = autocomplete.getPlace();

            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17); // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
            let address = "";

            if (place.address_components) {
                address = [
                    (place.address_components[0] &&
                        place.address_components[0].short_name) ||
                    "",
                    (place.address_components[1] &&
                        place.address_components[1].short_name) ||
                    "",
                    (place.address_components[2] &&
                        place.address_components[2].short_name) ||
                    "",
                ].join(" ");
            }
            infowindowContent.children["place-icon"].src = place.icon;
            infowindowContent.children["place-name"].textContent = place.name;
            infowindowContent.children["place-address"].textContent = address;
            infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            const radioButton = document.getElementById(id);
            radioButton.addEventListener("click", () => {
                autocomplete.setTypes(types);
            });
        }
        setupClickListener("changetype-all", []);
        setupClickListener("changetype-address", ["address"]);
        setupClickListener("changetype-establishment", ["establishment"]);
        setupClickListener("changetype-geocode", ["geocode"]);
        document
            .getElementById("use-strict-bounds")
            .addEventListener("click", function () {
                console.log("Checkbox clicked! New state=" + this.checked);
                autocomplete.setOptions({ strictBounds: this.checked });
            });*/
        //drawingManager.setMap(map);
    }
</script>

<!--for setting latitude and lngitude as per textbox-->
<script>
    function resetMap(){
        var latitude=$('#latitude').val();
        var longitude=$('#longitude').val();

        console.log(longitude);
        console.log(latitude);

        if(latitude && longitude){
            initMap(latitude,longitude)
        }
    }
</script>
