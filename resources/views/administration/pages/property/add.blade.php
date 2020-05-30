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
                                    <textarea name="description" class="form-control" rows="6"></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select name="company_country" class="select2" style="width:100%;">
                                        <option value="">Select Country</option>
                                        @forelse(\App\Models\Country::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @empty
                                            <option value="">No Country Found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select name="company_country" class="select2" style="width:100%;">
                                        <option value="">Select Country</option>
                                        @forelse(\App\Models\Country::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @empty
                                            <option value="">No Country Found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select name="company_country" class="select2" style="width:100%;">
                                        <option value="">Select Country</option>
                                        @forelse(\App\Models\Country::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
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
                                <div id="map" style="height: 400px; width: 100%;"></div>
                            </div>

                        </div>
                    </div>

                    <div class="pull-right mt-2">
                        <button type="submit" class="btn btn-primary">Add Property</button>
                    </div>

                </form>
            </div>
        </div>

        <script>

            $(".select2").select2();

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

        </script>

    </div>
@endsection

@push('title')
    Add Property
@endpush
