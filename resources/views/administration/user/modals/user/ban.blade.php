<div class="modal-header">
    <h5 class="modal-title">Ban {{ $user->profile->full_name }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.user.ban',$user->id) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">Reason</label>
            <textarea class="form-control" name="ban_reason" type="text" placeholder="Write The Reason Behind Ban Him/Her"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ban Now</button>
    </div>
</form>
