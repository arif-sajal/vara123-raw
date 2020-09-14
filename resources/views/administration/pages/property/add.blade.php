@extends('administration.layout')
@section('mainContent')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header border-bottom-danger">
                <h4 class="card-title">Add Property</h4>
            </div>
            <div class="card-body">
                <form class="ajax-form" action="" method="POST">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Property Type</label>
                                    <select name="property_type" class="select2" style="width:100%;">
                                        <option value="">Select Property Type</option>
                                        @forelse(\App\Models\PropertyType::all() as $pt)
                                            <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                        @empty
                                            <option value="">No Property Type Found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Property Name</label>
                                    <input type="text" class="form-control" placeholder="Property Name" name="name">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="6" placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" class="form-control" placeholder="Phone"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" class="form-control" placeholder="Email"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Amenities</label>
                                    <select name="amenities[]" class="select2" style="width:100%;" multiple>
                                        <option value="">Select Amenities</option>
                                        @forelse(\App\Models\Amenity::all() as $amenity)
                                            <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                        @empty
                                            <option value="">No Amenity Found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>City</label>
                                    <select name="city" class="select2" style="width:100%;">
                                        <option value="">Select City</option>
                                        @forelse(\App\Models\City::all() as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}, {{ $city->state->name }}, {{ $city->country->name }}</option>
                                        @empty
                                            <option value="">No Country Found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="address">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" class="form-control" placeholder="Latitude" name="lat">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" class="form-control" placeholder="Longitude" name="lng">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3" id="map" style="height: 400px; width: 100%;"></div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Featured Image</label>
                                    <input type="file" class="form-control dropify" placeholder="Longitude" name="featured_image">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Always Open</label>
                                    <fieldset>
                                        <div class="float-left">
                                            <input type="checkbox" class="switch-alternative" name="is_always_open"/>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="col-md-12">
                                @foreach(\App\Models\Day::all() as $day)
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Day</label>
                                                <input type="text" class="form-control" value="{{ $day->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>From</label>
                                                <input type="time" class="form-control" placeholder="Longitude" name="timings[{{ $day->id }}][opening]">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>To</label>
                                                <input type="time" class="form-control" placeholder="Longitude" name="timings[{{ $day->id }}][closing]">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Is Closed</label>
                                                <fieldset>
                                                    <div class="float-left">
                                                        <input type="checkbox" class="switch" checked="checked" name="timings[{{ $day->id }}][is_off_day]"/>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="pull-right mt-2">
                        <button type="submit" class="btn btn-primary">Add Property</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection

@push('title')
    Add Property
@endpush

@push('page.vendor.js')
    <script src="{{ asset('administration/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}" type="text/javascript"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZDni5W-iV-mDZmL44FwTFqhWbv7YgMGI&callback=initMap"></script>
@endpush

@push('page.vendor.css')
    <link href="{{ asset('administration/app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css') }}" type="text/javascript"></link>
@endpush

@push('page.js')
    <script>

        $(".select2").select2();

        $('.switch').checkboxpicker({
            html: true,
            offLabel: 'Close',
            onLabel: 'Open'
        });

        $('.switch-alternative').checkboxpicker({
            html: true,
            offLabel: 'No',
            onLabel: 'yes'
        });

        $('.dropify').dropify();

        var map, markers = [];

        function initMap() {
            var pos = {lat: 23.7731224, lng: 90.3758928};

            navigator.geolocation.getCurrentPosition(function(position){
                var pos = {lat: position.coords.latitude, lng: position.coords.longitude};
            })

            map = new google.maps.Map(
                document.getElementById('map'), {
                    zoom: 15,
                    center: pos,
                    mapTypeControl: false,
                    streetViewControl: false,
                }
            );

            map.addListener('click', function(e) {
                setValues(e);
                clearMarkers();
                addMarker(e.latLng);
            });
        }

        function addMarker(location) {
            var marker = new google.maps.Marker({
                map: map,
                position: location
            });
            markers.push(marker);
        }

        function clearMarkers() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];
        }

        function setValues(loc){
            $('[name="lat"]').val(loc.latLng.lat())
            $('[name="lng"]').val(loc.latLng.lng())
        }

        $('[name="country"]').change(function(event){
            console.log(event.target.value);
            $("[name='state']").select2({
                ajax: {
                    url: 'something-else',
                    type: 'get'
                }
            });
        });

    </script>
@endpush
