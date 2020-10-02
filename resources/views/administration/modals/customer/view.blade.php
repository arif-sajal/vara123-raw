<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Customer Information</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    @if( $customers->avatar == NULL )
                    <p class="badge badge-danger">No image uploaded</p>
                    @else
                    <img src="{{ Storage::url($customers->avatar) }}" width="50px" alt=""> <br> <br>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>First Name</b></label>
                    <p>
                       {{ $customers->first_name }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Last Name</b></label>
                    <p>
                        {{ $customers->last_name }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Address</b></label>
                    <p>
                        {{ $customers->address }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Country</b></label>
                    <p>
                        {{ $customers->country }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>State</b></label>
                    <p>
                        {{ $customers->state }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>City</b></label>
                    <p>
                        {{ $customers->city }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Post Code</b></label>
                    <p>
                        {{ $customers->post_code }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>gender</b></label>
                    <p>
                        @if( $customers->gender == 1 )
                            Male
                        @elseif( $customers->gender == 2 )
                            Female
                        @elseif( $customers->gender == 3 )
                            Others
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Date of Birth</b></label>
                    <p>
                        {{ $customers->date_of_birth }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Email Address</b></label>
                    <p>
                        {{ $customers->email }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Phone Number</b></label>
                    <p>
                        {{ $customers->phone }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>NID Number</b></label>
                    <p>
                        {{ $customers->nid_number }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Birth Certificate Number</b></label>
                    <p>
                        {{ $customers->birth_certificate_number }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Passport Number</b></label>
                    <p>
                        {{ $customers->passport_number }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Emergency Contact Number</b></label>
                    <p>
                        {{ $customers->emergency_contact_number }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Username</b></label>
                    <p>
                        {{ $customers->username }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
    </div>
</div>