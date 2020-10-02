<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Edit Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <form action="{{ route('app.form.submission.admin.update', $admin->id ) }}" class="ajax-form" method="post" >

        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ $admin->first_name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ $admin->last_name }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select your gender</label>
                        <select name="gender" class="form-control">
                            <option value="1"  @if ( $admin->gender == 1 ) selected @endif >Male</option>
                            <option value="2"  @if ( $admin->gender == 2 ) selected @endif  >Female</option>
                            <option value="3"  @if ( $admin->gender ==3 ) selected @endif >Others</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" value="{{ $admin->date_of_birth }}" name="date_of_birth" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="Email Address" value="{{ $admin->email }}" name="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" value="{{ $admin->phone }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Emergency Contact number</label>
                        <input type="text" name="emergency_number" value="{{ $admin->emergency_contact_number }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username" value="{{ $admin->username }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Avater</label> <br>
                        <input type="file" name="image" class="form-control-file dropify" @if(\Illuminate\Support\Facades\Storage::exists($admin->avatar)) data-default-file="{{ \Illuminate\Support\Facades\Storage::url($admin->avatar) }}" @endif>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Save</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').each(function(){
        $(this).dropify();
    })
</script>
