<div class="modal-header">
    <h5 class="modal-title">Add User</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.user.add') }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">First Name</label>
            <input class="form-control" name="first_name" type="text" placeholder="First Name"/>
        </div>
        <div class="form-group">
            <label class="form-label">Last Name</label>
            <input class="form-control" name="last_name" type="text" placeholder="Last Name"/>
        </div>
        <div class="form-group">
            <label class="form-label">Date Of Birth</label>
            <input type='text' class="form-control date-picker" placeholder="Select Date Of Birth" name="date_of_birth"/>
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type='email' class="form-control" placeholder="Email" name="email"/>
        </div>
        <div class="form-group">
            <label class="form-label">Designation</label>
            <select name="designation_id" class="select2" style="width:100%;">
                @foreach($departments as $department)
                    <optgroup label="{{ $department->department }}">
                        @foreach($department->designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">User Type</label>
            <select name="user_type" class="select2" style="width:100%;">
                <option value="Admin">Admin</option>
                <option value="Employee">Employee</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Date Of Joining</label>
            <input type='text' class="form-control date-picker" placeholder="Select Date Of Joining" name="date_of_joining"/>
        </div>
        <div class="form-group">
            <label class="form-label">Username</label>
            <input class="form-control" name="username" type="text" placeholder="Username"/>
        </div>
        <div class="form-group">
            <label class="form-label">Password</label>
            <input class="form-control" name="password" type="password" placeholder="Password"/>
        </div>
        <div class="form-group">
            <label class="form-label">Confirm Password</label>
            <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password"/>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add User</button>
    </div>
</form>
<script>
    $('.select2').select2();
    $('.date-picker').pickadate({
        selectMonths: true,
        selectYears: true,
    });
</script>
