<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Password Reset</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.customer.passwordreset', $customers->id ) }}" class="ajax-form" method="post" >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control"  name="password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" class="form-control"  name="c_password">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Reset</button>
        </div>
    </form>
</div>