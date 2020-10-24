<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Payout Request</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @if( $provider->balance != 0 )
    <form action="{{ route('app.form.submission.payout.request', $provider->id) }}" class="ajax-form" method="post"  >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" name="amount">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </form>
    @else
    <h1 class="text-center">Insufficient Balance</h1>
    @endif
</div>


