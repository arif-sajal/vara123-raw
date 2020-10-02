<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Add Customer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.customer.add') }}" class="ajax-form" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="first_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" name="country">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" placeholder="State" name="state">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" name="city">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Post Code</label>
                        <input type="text" class="form-control" placeholder="Post Code" name="p_code">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select your gender</label>
                        <select name="gender" class="form-control">
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Others</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="Email Address" name="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>NID Number</label>
                        <input type="number" name="nid_number" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Birth Certificate Number</label>
                        <input type="number" name="birth_certificate_number" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Passport Number</label>
                        <input type="number" name="passport_number" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Emergency Contact Number</label>
                        <input type="number" name="e_contact_number" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Upload Image</label> <br>
                        <input type="file" class="form-control-file dropify" name="image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="c_password" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Add</button>
        </div>
    </form>
</div>