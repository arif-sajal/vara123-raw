@extends('administration.layout')
@section('mainContent')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header border-bottom-danger">
                <h4 class="card-title">Edit Property</h4>
            </div>
            <div class="card-body">
                <form class="ajax-form" action="{{ route('admin.property.edit',$property->id) }}" method="POST">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Property Name</label>
                                    <input type="text" class="form-control" placeholder="Property Name" name="name" value="{{ $property->name }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="6" placeholder="Description">{{ $property->description }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" class="form-control" placeholder="Phone" value="{{ $property->phone }}"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" class="form-control" placeholder="Email" value="{{ $property->email }}"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>City</label>
                                    <select name="city" class="select2" style="width:100%;">
                                        <option value="">Select City</option>
                                        @forelse(\App\Models\City::all() as $city)
                                            <option value="{{ $city->id }}" @if($property->city_id == $city->id) selected @endif>{{ $city->name }}, {{ $city->state->name }}, {{ $city->country->name }}</option>
                                        @empty
                                            <option value="">No Country Found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $property->address }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" class="form-control" placeholder="Latitude" name="lat"  value="{{ $property->lat }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" class="form-control" placeholder="Longitude" name="lng" value="{{ $property->lng }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3" id="map" style="height: 400px; width: 100%;"></div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Featured Image</label>
                                    <input type="file" class="form-control dropify" placeholder="Longitude" name="featured_image" @if(\Illuminate\Support\Facades\Storage::has($property->featured_image)) data-default-file="{{ \Illuminate\Support\Facades\Storage::url($property->featured_image) }}" @endif>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Always Open</label>
                                    <fieldset>
                                        <div class="float-left">
                                            <input type="checkbox" class="switch-alternative" name="is_always_open" @if($property->is_always_open) checked @endif/>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="pull-right mt-2">
                        <button type="submit" class="btn btn-primary">Save Property</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection

@push('title')
    Edit Property
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
            var pos = {lat: {{ $property->lat }}, lng: {{ $property->lng }}};

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

            addMarker(pos);

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
