@extends('layouts.app')
@section('title')
    add address
@endsection

@section('style')
<style>
    #map {
        min-width: 200px;
        min-height: 200px;
    }



</style>
@endsection
@section('content')
    <section class="account-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row no-gutters">
                        @include('user.profile_sidebar')
                        <div class="col-md-8">
                            <div class="card card-body account-right">
                                <div class="widget">
                                    <div class="section-header">
                                        <h5 class="heading-design-h5">
                                            Add Address
                                        </h5>
                                    </div>
                                    <form >
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Address type <span class="required">*</span></label>
                                                    <select name="address_type" class="form-control" id="address_type" >
                                                        <option value="">--Select address type--</option>
                                                        <option value="HOME">Home</option>
                                                        <option value="OFFICE">Office</option>
                                                        <option value="OTHER    ">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address line 1 <span class="required">*</span></label>
                                                    <input class="form-control border-form-control" value="" id="address_line_1" placeholder="Address line 1" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address line 2 <span class="required">*</span></label>
                                                    <input class="form-control border-form-control" value="" id="address_line_2" placeholder="Address line 2" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="" id="">
                                                    <label class="control-label">map location <span class="required">*</span></label>

                                                    <input  class="form-control border-form-control" id="pac-input" type="text" placeholder="Enter map location" />
                                                </div>
                                                <div id="map" style="display: none"></div>
                                                <input type="hidden" id="map_address">
                                                <input type="hidden" id="lat">
                                                <input type="hidden" id="lng">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Locality <small>(optional)</small> </label>
                                                    <textarea name="locality" id="locality" class="form-control" ></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12 text-right">
                                                <a href="{{ route('address') }}" class="btn btn-white btn-lg"> Cancel </a>
                                                <button type="button" class="btn  btn-lg btn-secondary" id="add_adderss_btn"> Add Address </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>

        function initMap() {
            var map = new google.maps.Map(document.getElementsByClassName('map'), {
                center: {
                    lat: -33.8688, lng: 151.2195},
                zoom: 13
            });
            var input = /** @type {!HTMLInputElement} */(
                document.getElementById('pac-input','sample'));


            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function() {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();

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
                    map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker.setIcon(/** @type {google.maps.Icon} */({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                var item_Lat =place.geometry.location.lat()
                var item_Lng= place.geometry.location.lng()
                var item_Location = place.formatted_address;
                $("#lat").val(item_Lat);
                $("#lng").val(item_Lng);
                $("#map_address").val(item_Location);
                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                // infowindow.open(map, marker);
            });

        }


        $('#add_adderss_btn').click(function (){
            let address_line_1 = $('#address_line_1').val()
            let address_line_2 = $('#address_line_2').val()
            let address_type = $('#address_type').val()
            let map_address = $('#map_address').val()
            let lat = $('#lat').val()
            let lng = $('#lng').val()
            let locality = $('#locality').val()
            let token;
            // alert(address_type)
            if (address_line_1 == '' || address_line_2 == '' ||  address_type == ''|| map_address == '' || lat == '' || lng == ''){
                alert('Please fill all required fields correctly')
            }else {
                @if(!is_null(Session::get('user_data')))
                    token = '{{ Session::get('user_data')['token'] }}'
                @else
                    token = 'null';
                @endif
                $.ajax({
                    method: "POST",
                    url: "{{ $data['image_url'].'api/User/address_add' }}",
                    data: {
                        Authorization: token,
                        address_line_1: address_line_1,
                        address_line_2: address_line_2,
                        map_address: map_address,
                        address_type: address_type,
                        lat: lat,
                        lng: lng,
                        locality: locality,
                    },
                    xhrFields: {
                        withCredentials: true
                    },
                    async: false,
                    crossDomain: true,
                    dataType: "json",

                    success: function (result) {
                        if (result.status == true) {
                            window.location.href = "{{ route('address') }}"
                        } else {
                            alert(result.msg)
                        }
                    },
                    error: function (fail) {
                        alert('internal server error please refresh page')
                        console.log("fail");
                        // console.log(fail.responseText);
                    },
                });
            }
        })
    </script>
@endsection
